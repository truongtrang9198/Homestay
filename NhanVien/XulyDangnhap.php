<?php
  session_start();
  $username = $_POST['usr'];
  $_SESSION['username'] = $username;
  header("Location:Nhanvien.php?d=trangchu");

 ?>
