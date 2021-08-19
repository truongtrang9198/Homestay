<?php
include("../connect.php");
  // $manv = $_POST['manv'];
  $img = $_FILE['img']['name'];
  $path="HinhanhNV/";
  $tmp_name = $_FILES['img']['tmp_name'];
  move_uploaded_file($tmp_name,$path.$img);
  $img_url = $path.$img;
  // $sql="update Nhanvien set Hinhanh='$img' where MSNV='$manv'";
  // if(mysqli_query($conn,$sql)){
  //   echo("Thành công!");
  //
  // }else{
  //   echo "Lỗi hệ thống!";
  // }
  echo "Thanhcong'1";
 ?>
