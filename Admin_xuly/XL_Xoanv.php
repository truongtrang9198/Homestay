<?php
include("../connect.php");
    $ma = $_GET['manv'];
    $sql = "delete from Nhanvien where MSNV='$ma'";
    if(mysqli_query($conn,$sql)){
      echo "Xóa thành công!";
    }
    else
        echo "Lỗi hệ thống!";
 ?>
