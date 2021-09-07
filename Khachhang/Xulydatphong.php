<?php
include("../connect.php");

$hoten = $_POST['hoten'];
$ngaysinh = $_POST['ngaysinh'];
$gioitinh = $_POST['gioitinh'];
$sdt = $_POST['sdt'];
$email = $_POST['email'];
$cmnd = $_POST['cmnd'];
$diachi = $_POST['diachi'];
$ngayden = $_POST['ngayden'];
$ngaydi = $_POST['ngaydi'];
$maphong = $_POST['maphong'];
$songay = $_POST['songay'];

// up len server
$sql = "call Datphong('$hoten','$ngaysinh','$gioitinh','$cmnd','$diachi','$sdt',
                        '$email','$maphong','$ngayden','$ngaydi','$songay')";
if(mysqli_query($conn,$sql)){
  echo("true");
}else{
  echo "Lỗi truy vấn!";

}









 ?>
