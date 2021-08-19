<?php
include("../connect.php");
    $ma = $_GET['ma'];
    $sql = "delete from Loaiphong where Maloai='$ma'";
    if(mysqli_query($conn,$sql)){
      echo "Xóa thành công!";
    }
    else
        echo "Lỗi hệ thống!";
 ?>
