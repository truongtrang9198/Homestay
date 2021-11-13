<?php
  include("../connect.php");
  include("Header_nav.php");
  if(isset($_GET['madp'])){
    $madp = $_GET['madp'];
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <br>
    <div class="container-fluid">

<!-- hiển thị nội dung đặt phòng -->
       <div class="row">
      <?php
       ob_start();
      ?>
        <div class="col-4">
        <div class="card">
            <h5><i class="far fa-address-card"></i>Thông tin khách</h5>
            <div class="card-body">
              <span class="font-weight-bold">{hoten}</span> <br>
              <span class="text-muted">Ngày sinh: </span>{ngaysinh} <br>
              <span class="text-muted">Giới tính: </span>{gioitinh}<br>
              <span class="text-muted">CMND: </span>{cmnd} <br>
              <span class="text-muted">Di động: </span>{sdt} <br>
              <span class="text-muted">Email: </span>{email}<br>
              <span class="text-muted">Địa chỉ: </span>{diachi}<br>

            </div>
        </div>
        </div>
        <div class="col-4">
          <div class="card">
            <h5><i class="fas fa-tasks"></i> Thông tin đặt phòng</h5>
            <div class="card-body">
              <span class="text-muted">MaDP: {madp}</span><br>
              <span class="text-muted">Tên phòng: </span>{tenphong} <br>
              <span class="text-muted">Check in: </span>{checkin} <br>
              <span class="text-muted">Check out: </span>{checkout} <br>
              <span class="text-muted">Số lượng: </span>{soluong}<span class="text-muted"> (Đêm)</span> <br>
              <span class="text-muted">Thành tiền: </span>{thanhtien}<span class="text-muted"> VND</span> <br>
              {trangthai}

          </div>
          </div>
        </div>
        <div class="col-4 text-center">
            <br> <br> <br> <br>
            <button type="button" class="btn"  name="button" onclick="window.history.back();">Trở về</button> &ensp;
            <button type="button" class="btn" id="btn-nhanphong" name="button">Nhận Phòng</button> &ensp;
            <button type="button" class="btn" name="button" id="btn-huydp">Hủy Đặt Phòng</button>
        </div>
  <?php
            $str = ob_get_clean();
            $sql = "select * from Khachhang,Datphong,Phong where MaDP='$madp' and Datphong.MSKH=Khachhang.MSKH
                                                                and Phong.MSP=Datphong.MSP";
          // lấy thông tin đặt phòng khách hàng
            $query = mysqli_query($conn,$sql);
            if(mysqli_num_rows($query)>0){
              $row=mysqli_fetch_array($query);
                // định dạng lại ngày
                $ns = date('d-m-Y',strtotime($row['NgaysinhKH']));
                $checkin = date('d-m-Y',strtotime($row['Check_in']));
                $checkout = date('d-m-Y',strtotime($row['Check_out']));
                $s = "<span><i class='fas fa-thumbtack'></i>Đặt phòng</span>";
                $s1 = "<span class='text-danger'><i class='fas fa-window-close'></i>Hủy</span>";
                $s2 = "<span class='text-success'><i class='fas fa-check-double'></i>Nhận phòng</span>";

                // gán giá trị
                $str = str_replace("{hoten}",$row['HoTenKhach'],$str);
                $str = str_replace("{ngaysinh}",$ns,$str);
                $str = str_replace("{gioitinh}",$row['Gioitinh'],$str);
                $str = str_replace("{cmnd}",$row['CMND'],$str);
                $str = str_replace("{sdt}",$row['SDT'],$str);
                $str = str_replace("{email}",$row['Email'],$str);
                $str = str_replace("{diachi}",$row['DiaChi'],$str);
                $str = str_replace("{madp}",$row['MaDP'],$str);
                $str = str_replace("{tenphong}",$row['TenPhong'],$str);
                $str = str_replace("{checkin}",$checkin,$str);
                $str = str_replace("{checkout}",$checkout,$str);
                $str = str_replace("{soluong}",$row['Sodem'],$str);
                $str = str_replace("{thanhtien}",number_format($row['Tienphong']),$str);
        // kiểm tra trạng thái
                if($row['Trangthai']=="phongdat"){
                  $str = str_replace("{trangthai}",$s,$str);

                }
                if($row['Trangthai']=="Nhanphong"){
                  $str = str_replace("{trangthai}",$s2,$str);

                }
                if($row['Trangthai']=="Huy"){
                  $str = str_replace("{trangthai}",$s1,$str);

                }
                echo $str;
            }else{
              echo "<p class='text-muted'>Lỗi hệ thống</p>";
            }

    ?>

      </div>
<hr>

    <p class="text-center"> Vui lòng xác nhận thông tin khách hàng trước khi bấm <kbd>Nhận Phòng</kbd></p>
    <br>
    </div>
  </body>
</html>
<!-- tạo 1 input ẩn chứa thông tin  madp -->
<input type="text" name="" id="madp" value="<?php echo $madp; ?>" hidden>
<script type="text/javascript">
  $(document).ready(function(){
    // xác nhận check in
    $('#btn-nhanphong').click(function(){
        var madp = $('#madp').val();
        $.get("Xulynhanphong.php",{madp:madp},function(data){
            if (data=="True") {
                  location.reload();
            }else {
                $('#toast-content-err').html(data);
                $('#Thongbaoloi').toast('show');
            }
        });
    });

// hủy đặt phòng
    $('#btn-huydp').click(function(){
      var madp = $('#madp').val();
      $.get("Xulyhuyphong.php",{madp:madp},function(data){
        if(data=="True"){
          location.reload();
        }else{
          $('#toast-content-err').html(data);
          $('#Thongbaoloi').toast('show');
        }
      });
    });
  })

</script>










  <?php
  }
 ?>
