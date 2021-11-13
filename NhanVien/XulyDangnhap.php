<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
  include_once("../connect.php");
  $username = $_POST['usr'];
  $sql = "select MSNV from Taikhoan where username='$username'";
  if(mysqli_query($conn,$sql)){
    $row=mysqli_fetch_array(mysqli_query($conn,$sql));
    $_SESSION['username'] = $username;
    $_SESSION['MSNV'] = $row['MSNV'];
    header("Location:index.php?d=trangchu");
  }

 ?>
