<?php
include("../connect.php");
    $ma = $_GET['ma'];
    $sql = "delete from Phong where MSP='$ma'";
    if(mysqli_query($conn,$sql)){
      echo "Xóa thành công!";
    }
    else
        echo "Lỗi hệ thống!";
 ?>
