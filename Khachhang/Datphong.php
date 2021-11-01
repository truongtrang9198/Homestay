<?php

      if(isset($_POST['maphong']) && isset($_POST['ngaydi']) && isset($_POST['ngayden'])
                                 && isset($_SESSION['MSKH'])){
        $maphong = $_POST['maphong'];
        $ngayden = $_POST['ngayden'];
        $ngaydi = $_POST['ngaydi'];
        $makhach = $_SESSION['MSKH'];
        ob_start();
 ?>

    <style media="screen">

      .datphong{
        /* border: 1px solid black; */
        /* margin-bottom: 100px; */
        background-color:#fafafa;
      }
      #thongtinkhach{
        /* margin-left: 50px; */
        border-right: 2px solid black;
        /* border-left: 2px solid black; */

      }
      #button-datphong{
        margin-right: 20px;
      }
    </style>

  <br>
  <h2 class="text-dark text-center">Thông Tin Đặt Phòng</h2> <br>
  <div class="container-fluid">

  <div class="datphong">

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
    <div class="col-10">
      <div class="row">
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
            <input type="text" id="maphong" name="" value="{MSP}" class="form-control-plaintext" hidden>
            <input type="text" name="" value="{Thanhgia}" id="thanhgia" class="form-control-plaintext" hidden >
            <input type="text" name="" id="Ngayden" value="{ngayden}" class="form-control-plaintext" hidden>
            <input type="text" name="" id="Ngaydi" value="{ngaydi}" class="form-control-plaintext" hidden>
            <input type="text" name="" id="sodem" value="{Soluong}" class="form-control-plaintext" hidden>
            <input type="text" name="" value="{Thanhgia1}"  class="form-control-plaintext" hidden>
          </tr>
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

  //  $soluong = ($ngaydi-$ngayden);
  include("../connect.php");
  $ngayden_1 = date("Y-m-d",strtotime($ngayden));
  $ngaydi_1 = date("Y-m-d",strtotime($ngaydi));
  // Hiển thị giá trị check in, check out
  $s = str_replace("{Ngayden}",$ngayden,$s);
  $s = str_replace("{Ngaydi}",$ngaydi,$s);
  // Giá trị check in, check out
  $s = str_replace("{ngayden}",$ngayden_1,$s);
  $s = str_replace("{ngaydi}",$ngaydi_1,$s);
 //  lấy thông tin phòng
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

}else{
   echo ("Không nhận được thông tin!");

}
 ?>
