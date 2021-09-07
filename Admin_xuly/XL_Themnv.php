<?php
include("../connect.php");
$hoten = trim($_POST['hoten']);
$CMND =$_POST['cmnd'];
$diachi =trim($_POST['diachi']);
$congviec =trim($_POST['congviec']);
$ngaysinh =trim( $_POST['ngaysinh']);
$sdt = $_POST['sdt'];
$gioitinh =$_POST['gioitinh'];
$hinhanh = $_FILES['anh']['name'];
$usr = trim($_POST['usr']);
$pwd = md5($_POST['pwd']);
$path="HinhanhNV/";
$tmp_name = $_FILES['anh']['tmp_name'];
move_uploaded_file($tmp_name,$path.$hinhanh);
$img_url = $path.$hinhanh;
// them tai khoan


 $sql = "insert into Nhanvien(Hoten_NV,NgaysinhNV,Gt,CMND_NV,DiaChi_NV,SDT_NV,Congviec,Hinhanh) values('$hoten','$ngaysinh','$gioitinh','$CMND','$diachi',
                  '$sdt','$congviec','$img_url')";
if(mysqli_query($conn,$sql)){
  if($usr !='' && $pwd!=''){
    $sql = "call ThemTK('$usr','$pwd','$CMND')";
    mysqli_query($conn,$sql);
  }

    header("Location:Admin.php?d=themnv");

}else
    echo("Lỗi hệ thống!");





 ?>
