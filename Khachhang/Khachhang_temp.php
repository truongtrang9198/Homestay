<?php
  include("../connect.php");
  $tenkhach = $_GET['ten'];
  $sql = "insert into Khachhang_temp(TenKH) values('$tenkhach')";
  if(mysqli_query($conn,$sql)){
    echo "true";
  }else {
    echo("Không thêm được");
  }


 ?>
