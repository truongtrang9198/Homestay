<?php
include("../connect.php");
// lấy mã khách hàng

    if(isset($_POST['maphong']) && isset($_POST['ngaydi']) && isset($_POST['ngayden'])){
      $maphong = $_POST['maphong'];
      $ngayden = $_POST['ngayden'];
      $ngaydi = $_POST['ngaydi'];
 ?>
    <script type="text/javascript" src="Datphong.js"></script>
    <h2 class="text-success text-center">Thông tin  đặt phòng</h2>
    <form class="form-group" id="form-datphong" action="Xulydatphong.php" method="post">
    <div class="row">
      <div class="col-lg-4 md-4">
      <label for="hoten">Họ tên</label>
      <input type="text" name="hoten" class="form-control" id="hoten" value="" required>
      <label for="ngaysinh">Ngày sinh</label>
      <input type="date" name="ngaysinh" id="ngaysinh" value="" class="form-control" required>
        <!-- gioi tinh -->
        <div class="form-check form-check-inline">
          <label for="gioitinh" class="form-check-label" >Giới tính:  </label>
        </div>

        <div class="form-check form-check-inline">
          <label class="form-check-label"> <input class="form-check-input" type="radio" name="gioitinh" id="nu" value="nữ">Nữ</label>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label"><input  class="form-check-input" type="radio" name="gioitinh" id="nam" value="nam">Nam</label>
        </div>
        <!--  -->
        <br>
        <label for="cmnd">CMND</label>
        <input type="text" name="cmnd" id="cmnd" class="form-control" value="" required pattern="[0-9]{9}">
        <label for="sdt">Số điện thoại</label>
        <input type="text" name="sdt" class="form-control" id="sdt" value="" required length='10' pattern="[0]?[0-9]{10,11}">
        <label for="diachi">Địa chỉ</label>
        <input type="text" name="diachi" id="diachi" class="form-control"value="" required>
        <label for="email">Email</label>
        <input type="mail" name="email" id="email" class="form-control" value="">
      <br>
        <!-- Thong bao doc noi quy homestay -->
        <button type="submit" class="btn" name="button">Đặt phòng</button>
        <button type="button" class="btn" name="button" onclick="window.history.back()">Hủy</button>

    </div>

<!-- lấy thông tin chi tiết đặt phòng -->
    <div class="col-lg-6 md-6 offset-1">
<div class="row">
      <a href="#" data-toggle="collapse" data-target="#thongtinphong" id="laythongtin" class="nav-link">
      <span class="text-warning"> Thông tin phòng</span> </a>
     <?php
        ob_start();

      ?>
      <table class="table" id="table-phongdat">
        <thead>
          <tr>
            <th>MSP</th>
            <th>Tên Phòng</th>
            <th>Giá/đêm</th>
            <th>Check in</th>
            <th>Check out</th>
            <th>Số lượng (đêm)</th>
            <th>Thành giá</th>
            <th>Mô tả phòng</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td >{MSP}</td>
            <td>{Tenphong}</td>
            <td>{Gia}</td>
            <td >{Ngayden} </td>
            <td >{Ngaydi}</td>
            <td >{Soluong} </td>
            <td >{Thanhgia1}</td>
            <td>{Mota}</td>
          </tr>
        </tbody>
      </table>
      <!-- tạo input ẩn để lưu thông tin -->
      <input type="text" id="maphong" name="" value="{MSP}" class="form-control-plaintext" hidden>
      <input type="text" name="" value="{Thanhgia}" id="thanhgia" class="form-control-plaintext" hidden >
      <input type="text" name="" id="Ngayden" value="{ngayden}" class="form-control-plaintext" hidden>
      <input type="text" name="" id="Ngaydi" value="{ngaydi}" class="form-control-plaintext" hidden>
      <input type="text" name="" id="sodem" value="{Soluong}" class="form-control-plaintext" hidden>
      <?php
          $s= ob_get_clean();
          $ngayden_1 = date("Y-m-d",strtotime($ngayden));
          $ngaydi_1 = date("Y-m-d",strtotime($ngaydi));
          $s = str_replace("{Ngayden}",$ngayden,$s);
          $s = str_replace("{Ngaydi}",$ngaydi,$s);
          // lưu ngay den ngay di theo dinh dang mysql
          $s = str_replace("{ngayden}",$ngayden_1,$s);
          $s = str_replace("{ngaydi}",$ngaydi_1,$s);
          //
          $sql = "call Phongdat(?,?,?)";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("sss",$maphong,$ngayden_1,$ngaydi_1);
          $stmt->execute();
          $result = $stmt->get_result();
          while ($row = $result->fetch_assoc()) {
            $s = str_replace("{MSP}",$maphong,$s);
            $s = str_replace("{Tenphong}",$row['TenPhong'],$s);
            $s = str_replace("{Soluong}",$row['songay'],$s);
            $s = str_replace("{Mota}",$row['Mota'],$s);
            $s = str_replace("{Gia}",number_format($row['Gia']),$s);
            $s = str_replace("{Thanhgia1}",number_format($row['Gia']*$row['songay']),$s);
            $s = str_replace("{Thanhgia}",$row['Gia']*$row['songay'],$s);

        }
          echo $s;
    ?>
</div>
    </div>
    </div>
    </form>
<?php
}else{
  // echo ("Không nhận được thông tin!");
}
 ?>
 <script type="text/javascript">
     $(document).ready(function(){
// xử lý đặt Phòng
    $('#form-datphong').submit(function(event){
      event.preventDefault();
      var hoten = $.trim($('#hoten').val());
      var gioitinh = $("input[name='gioitinh']:checked").val();
      var cmnd = $.trim($('#cmnd').val());
      var sdt = $('#sdt').val();
      var diachi = $.trim($('#diachi').val());
      var email = $.trim($('#email').val());
      var matkhau = "0";
      var ngayden = $('#Ngayden').val();
      var ngaydi = $('#Ngaydi').val();
      var maphong = $('#maphong').val();
      var ngaysinh = $('#ngaysinh').val();
      var sodem = $('#sodem').val();
      var thanhgia = $('#thanhgia').val();
      // xử lý đăng ký thành viên cho khách, nếu thành công thì tiến hành đặt phòng
      $.post("Xulydangky.php",{hoten:hoten,gioitinh:gioitinh,cmnd:cmnd,sdt:sdt,diachi:diachi,
                                email:email,matkhau:matkhau,ngaysinh:ngaysinh,maphong:maphong,ngayden:ngayden,
                              ngaydi:ngaydi,sodem:sodem,thanhgia:thanhgia},function(data){
          if(data=="True"){
               alert("Thành công!");
               location.href = "index.php?d=trangchu";

          }else {
              $('#toast-content-err').html(data);
              $('#Thongbaoloi').toast('show');
          }
              alert(data);
      });
      });
    })
 </script>
<!-- kiem tra thong tin ma phong va thoi gian neu thoi gian do phong co trong chi tiết HD thì hong duoc dat phong -->
