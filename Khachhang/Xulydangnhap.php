<?php
  include_once("../connect.php");
  $sdt = $_POST['sdt'];
  $sql = "select * from KhachHang where SDT='$sdt' ";
  if(mysqli_query($conn,$sql)){
    $row = mysqli_fetch_array(mysqli_query($conn,$sql));
    // $mang_ten = explode(' ',$row['HoTenKhach']);
    // $ten = array_pop($mang_ten);
    session_start();
    $_SESSION['MSKH'] = $row['MSKH'];
    $_SESSION['TenKH'] = $row['HoTenKhach'];
    header("Location:Trangchu.php?d=xemphong");
  }

 ?>
