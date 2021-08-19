<?php
include("../connect.php");

$CMND =$_POST['cmnd'];
$sdt = $_POST['sdt'];

$sql = "select * from NhanVien";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query) != 0){
  while ($row = mysqli_fetch_array($query)) {
  if($sdt== $row['SDT_NV'] ){
    echo("Số điện thoại đã tồn tại!");
    $n = "1";
    die();
  }
  if ($CMND == $row['CMND_NV']) {
    echo("CMND/CCCD đã tồn tại!");
    $n = "1";
    die();
  }
  }
}

    echo("2");





 ?>
