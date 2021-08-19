<?php
  include("../connect.php");
  $usr = $_POST['usr'];
  $pwd = md5($_POST['pwd']);
  $cmnd = $_POST['cmnd'];

    $sql = "call ThemTk('$usr','$pwd','$cmnd')";

    if(mysqli_query($conn, $sql))
        echo("Thêm Tài Khoản nhân viên thành công!");
    else
        echo("Lỗi hệ thống");

    



 ?>
