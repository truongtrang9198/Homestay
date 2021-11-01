<?php
// Lấy mã khách
    if (session_status() == PHP_SESSION_NONE) {
            session_start();
    }
    if(isset($_SESSION['MSKH']))
        $makhach = $_SESSION['MSKH'];

    ob_start();
 ?>
<!-- Xử lý thông tin khách hàng -->
    <h2 class="text-dark text-center">Thông Tin Khách Hàng</h2> <br>
    <div class="container-fluid">
      <div class="thongtinkhach">

        <div class="row" id=" ">
          <div class="col-2" id="thongtinkhach">
            <br>
              <!-- <p><span class="text-muted font-italic">Mã khách: </span><span class="text-center" ></span></p> -->
              <input type="text" id="makhach" name="" value="{makhach}" class="form-control-plaintext" hidden>
              <p><span class="text-muted font-italic">Họ tên khách: </span><span class="text-center"> <b>{Hoten}</b> </span></p>

              <p><span class="text-muted font-italic"> Ngày sinh: </span><span class="text-center">{Ngaysinh}</span></p>
              <p><span class="text-muted font-italic">Giới tính: </span> <span class="text-center">{Gioitinh}</span></p>

              <p><span class="text-muted font-italic">CMND: </span><span class="text-center">{CMND}</span></p>

              <p><span class="text-muted font-italic">Số điện thoại: </span><span class="text-center">{sdt}</span></p>

              <p><span class="text-muted font-italic">Email: </span><span class="text-center">{email}</span></p>

              <p><span class="text-muted font-italic">Địa chỉ: </span><span class="text-center">{Diachi}</span></p>
            <br>
        </div>

<?php
    $s = ob_get_clean();
    // lấy thông tin khách hàng
    include("../connect.php");
    $sql = "SELECT*from Khachhang where MSKH='$makhach'";
    if(mysqli_query($conn,$sql)){
      $row=mysqli_fetch_array(mysqli_query($conn,$sql));
      $s = str_replace("{Hoten}",$row['HoTenKhach'],$s);
      $s = str_replace("{Ngaysinh}",$row['NgaysinhKH'],$s);
      $s = str_replace("{Gioitinh}",$row['Gioitinh'],$s);
      $s = str_replace("{CMND}",$row['CMND'],$s);
      $s = str_replace("{sdt}",$row['SDT'],$s);
      $s = str_replace("{Diachi}",$row['DiaChi'],$s);
      $s = str_replace("{email}",$row['Email'],$s);
    }
  $s = str_replace("{makhach}",$makhach,$s);
  echo $s;
?>
<div class="col-10">

  <div class="row">
  <h5>Trạng thái đặt phòng</h5>
  <table class="table" id="trangthaidatphong">
    <thead>
      <tr>
        <th>MSP</th>
        <th>Tên Phòng</th>
        <th>Giá/đêm</th>
        <th>Check in</th>
        <th>Check out</th>
        <th>Số lượng (đêm)</th>
        <th>Thành giá</th>
        <th>Trạng thái</th>
      </tr>
    </thead>
    <tbody>
      <?php
      //  $soluong = ($ngaydi-$ngayden);
      include("../connect.php");
     //  lấy thông tin bảng đặt phòng
      $sql = "Call Thongtindatphong(?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s",$makhach);
      $stmt->execute();
      $result = $stmt->get_result();
      while ($row = $result->fetch_assoc()) {

        $s="<tr>
          <td >{MSP}</td>
          <td>{Tenphong}</td>
          <td>{Gia}</td>
          <td >{Ngayden} </td>
          <td >{Ngaydi}</td>
          <td >{Soluong} </td>
          <td >{Thanhgia}</td>
          <td>{Trangthai}</td>
        </tr> "
        $s = str_replace("{MSP}",$row['MSP'],$s);
        $s = str_replace("{Tenphong}",$row['TenPhong'],$s);
        $s = str_replace("{Soluong}",$row['songay'],$s);
        $s = str_replace("{Mota}",$row['Mota'],$s);
        $s = str_replace("{Gia}",number_format($row['Gia']),$s);
        $s = str_replace("{Thanhgia}",number_format($row['Gia']*$row['songay']),$s);
        $s = str_replace("{Trangthai}",$row['Trangthai'],$s);
        echo $s;
    }

?>

    </tbody>
  </table>
   </div>


 </div>
 </div>

</div>
<div class="row" id="button-datphong">
&ensp;&ensp; <button type="button" name="huy" class="btn1 btn btn-primary" onclick="window.history.back();" id="huy">Hủy</button> &ensp;
<button type="submit" name="btn-datphong" class="btn1 btn btn-primary" id="btn-datphong">Đặt phòng</button>
</div>
</div>
<br>


<?php

}else{
   echo ("Không nhận được thông tin!");

}
 ?>
