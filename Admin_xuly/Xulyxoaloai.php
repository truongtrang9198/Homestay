<?php
  include("../connect.php");
  if(isset($_GET['maloai'])){
    $maloai = $_GET['maloai'];
  }else
    $maloai = '';

    $sql = "delete from Loaiphong where Maloai = '$maloai'";
    if(mysqli_query($conn,$sql)){
      echo "Thành công!";
    }else
      echo "Lỗi hệ thống!";


 ?>
