<?php
include("../connect.php");

$makhach = $_POST['makhach'];
$maphong = $_POST['maphong'];
$ngayden = $_POST['ngayden'];
$ngaydi = $_POST['ngaydi'];
$sodem = $_POST['sodem'];
$thanhgia = $_POST['thanhgia'];
$trangthai = $_POST['trangthai'];

// up len server
    // echo $ngayden;
 $sql = "insert into Datphong(MSP,MSKH,Check_in,Check_out,Sodem,Tienphong,Trangthai)
         values('$maphong','$makhach','$ngayden','$ngaydi','$sodem','$thanhgia','$trangthai')";
//$stmt->execute();
if(mysqli_query($conn,$sql)){
  echo("true");
}else{
  echo "Lỗi truy vấn!";
}


 ?>
