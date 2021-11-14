<?php
  include("../connect.php");
  if(isset($_POST['sdt_khach'])){
    $sdt_khach = $_POST['sdt_khach'];
    $sql = "select MSKH from Khachhang where SDT='$sdt_khach'";
    $query = mysqli_query($conn, $sql);
    if($row=mysqli_fetch_array($query)){
      $makhach = $row['MSKH'];
      session_start();
      $_SESSION['MaKH']= $makhach;
      header("Location:index.php?d=datphong1");
    }
  }



 ?>
