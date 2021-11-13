<?php
include_once("Header_nav.php");
include("../connect.php");
  if(isset($_GET['madp'])){
    $madp = $_GET['madp'];

  ?>
  <style media="screen">
    #div-ttkhach{
      border: 1px solid;
      border-color: #DDDDDD;
      padding: 15px 15px 15px 15px;
    }
    #div-taohoadon{
      border-left: 1px solid;
      border-top: 1px solid;
      border-bottom: 1px solid;
      border-color: #DDDDDD;
      padding: 15px 20px 15px 15px;

    }
     #div-taohoadon1{
       border-right: 1px solid;
       border-top: 1px solid;
       border-bottom: 1px solid;
       border-color: #DDDDDD;
       padding: 15px 15px 15px 10px;
     }
     #title-taoHD{
       padding: 5px 0px;
     }
     #btn-tieptuc{
       height: 30px !important;
       width: 100px !important;
       margin-left: 260px !important;
       margin-top: 10px;
     }
  </style>
<div class="container-fluid">


  <h3 class="text-center" id="title-taoHD">Tạo Hóa Đơn</h3>
  <div class="row">
    <?php
    ob_start();
     ?>
<!-- Hiển thị thông tin khách hàng -->
    <div class="col-4" >
      <form class="form-group rounded" action="index.html" id="div-ttkhach" method="post">
        <label for="">Họ tên khách hàng</label>
        <input type="text" name="" value="{hotenkhach}" class="form-control" readonly>
        <label for="">Giới tính</label>
        <input type="text" name="" value="{gioitinh}" class="form-control" readonly>
        <label for="">Ngày sinh</label>
        <input type="text" name="" value="{ngaysinh}" class="form-control" readonly>
        <label for="">Số điện thoại</label>
        <input type="text" name="" value="{sdt}" class="form-control" readonly>
        <label for="">CMND</label>
        <input type="text" name="" value="{cmnd}" class="form-control" readonly>
        <label for="">Email</label>
        <input type="text" name="" value="{email}" class="form-control" readonly>
        <label for="">Địa chỉ</label>
        <input type="text" name="" value="{diachi}" class="form-control" readonly>
      </form>
    </div>
    <?php
        $str = ob_get_clean();
        $sql = "select HoTenKhach,NgaysinhKH,Gioitinh,CMND,SDT,Email,DiaChi from Khachhang
                inner join Datphong on Datphong.MSKH = Khachhang.MSKH
                where Datphong.MaDP = '$madp'";
        if(mysqli_query($conn, $sql)){
            $row = mysqli_fetch_array(mysqli_query($conn, $sql));
            $ns = date('d-m-Y',strtotime($row['NgaysinhKH']));
            $str = str_replace("{hotenkhach}",$row['HoTenKhach'],$str);
            $str = str_replace("{ngaysinh}",$ns,$str);
            $str = str_replace("{gioitinh}",$row['Gioitinh'],$str);
            $str = str_replace("{cmnd}",$row['CMND'],$str);
            $str = str_replace("{sdt}",$row['SDT'],$str);
            $str = str_replace("{email}",$row['Email'],$str);
            $str = str_replace("{diachi}",$row['DiaChi'],$str);
            echo $str;
        }
     ?>
<!-- form lập hóa đơn -->
<?php
    ob_start();
 ?>
    <div class="col-3 offset-1 rounded" id="div-taohoadon">
        <input type="text" name="" value="{msdp}" id="msdp" hidden>
        <label for="">Loại đặt phòng</label>
        <input type="text" name="" value="{loaidp}" class="form-control" readonly>
        <label for="">Thời gian nhận phòng</label>
        <input type="text" name="" value="{checkin}" class="form-control" readonly>
        <label for="">Thời gian trả phòng</label>
        <input type="text" name="" value="{checkout}" class="form-control" readonly>
        <label for="">Loại phòng</label>
        <input type="text" name="" value="{loaiphong}" class="form-control" readonly>
        <label for="">Tên phòng</label>
        <input type="text" name="" value="{tenphong}" class="form-control" readonly>
        <label for="">Số đêm</label>
        <input type="text" name="" value="{sodem}" class="form-control" readonly>
        <label for="">Thành tiền</label>
        <input type="text" name="" value="{thanhtien}" id="tienphong" class="form-control" readonly>


    </div>
    <div class="col-3 rounded" id="div-taohoadon1">
      <label for="">Phí khác</label>
      <input type="text" name="" value="" id="phikhac" class="form-control">
      <label for="">Ghi chú</label>
      <input type="text" name="" value="" id="ghichu" class="form-control">
      <label for="">Hình thức thanh toán</label>
      <select class="form-control" name="loaithanhtoan" id="Loaithanhtoan">
        <option value="Tiền mặt">Tiền mặt</option>
        <option value="Thẻ tín dụng">Thẻ tín dụng</option>
        <option value="Ví điện tử">Ví điện tử</option>
      </select>
      <hr>
      <label for="">Tổng tiền</label>
      <input type="text" name="" value="{thanhtien}" id="Tongtien" class="text-right form-control-plaintext text-danger" readonly>
      <button type="button" name="button" class="btn" id="btn-tieptuc"><i class="fas fa-arrow-circle-right"></i></button>
    </div>
  </div>

  <input type="text" name="" value="{tienphong1}" id="tongtien1" hidden>
  <input type="text" name="" value="{tienphong1}" id="tienphong1" hidden>

 <?php
     $str = ob_get_clean();
     $sql = "call Traphong('$madp')";
     $query = mysqli_query($conn,$sql);
     if(mysqli_num_rows($query) >0){
       $row = mysqli_fetch_array($query);
       $checkin = date('d-m-Y H:i:s',strtotime($row['Check_in']));
       $checkout = date('d-m-Y H:i:s');
       $str = str_replace("{loaidp}",$row['Loaidp'],$str);
       $str = str_replace("{loaiphong}",$row['Tenloai'],$str);
       $str = str_replace("{tenphong}",$row['TenPhong'],$str);
       $str = str_replace("{checkin}",$checkin,$str);
       $str = str_replace("{checkout}",$checkout,$str);
       $str = str_replace("{sodem}",$row['sl'],$str);
       $str = str_replace("{msdp}",$madp,$str);
       $tienphong = $row['Gia']*$row['sl'];
       $str = str_replace("{thanhtien}",number_format($tienphong),$str);
      $str = str_replace("{tongtien}",number_format($tienphong),$str);
      $str = str_replace("{tienphong1}",$tienphong,$str);

       echo $str;
     }else{
       echo "<p class='text-center'>Chưa thực hiện thao tác nhận phòng</p>!";
     }
}else{
  echo "<p class='text-center'> Lỗi hệ thống!</p>";
}
  ?>
</div>
<!-- </div> -->
<script type="text/javascript">
$(document).ready(function(){
  // script tính tổng tiền phòng
  $('#phikhac').change(function(){
    var tongtien = parseInt($('#tongtien1').val()) + parseInt($('#phikhac').val());
   $('#Tongtien').val(tongtien.toFixed(3));
   $('#tongtien1').val(tongtien.toFixed(3));
  })
  // script lưu thông tin
  $('#btn-tieptuc').click(function(){
    var msdp = $('#msdp').val();
    var phikhac = $('#phikhac').val();
    var ghichu = $('#ghichu').val();
    var loaithanhtoan = $('#Loaithanhtoan').val();
    var tongtien = parseInt($('#tongtien1').val());
    var tienphong = $('#tienphong').val();
    $.get("XulytaoHD.php",{msdp:msdp,phikhac:phikhac,tienphong:tienphong,ghichu:ghichu,loaithanhtoan:loaithanhtoan,tongtien:tongtien},
        function(data){
           if(data=="true"){
               location.href = "XuatHD.php?madp=<?php echo $madp; ?>";
           }else{
             $('#toast-content-err').html(data);
             $('#Thongbaoloi').toast('show');
           }
    })
  })
})

</script>
