<?php
include ("../connect.php");

    $tenloai =$_GET['loaiphong'];
    $tenphong = $_GET['tenphong'];
    $mota = $_GET['mota'];
    $tenphong = trim($tenphong);
    $tenphong1 = mb_strtolower($tenphong, "utf8");
    $gia = $_GET['gia'];
    $n ="0";
    $sql = "select* from phong";
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query) != 0){
      while ($row = mysqli_fetch_array($query)) {
      if($tenphong1 ==  mb_strtolower($row['TenPhong'],"utf8")){
        echo("Tên phòng đã tồn tại!");
        $n = "1";
        die();
      }
    }
  }

  if($n != "1"){
    $tenphong =  ucfirst($tenphong1);
    $sql ="call Themphong('$tenloai','$tenphong','$gia','$mota')";
  //  mysqli_query($conn, $sql);
    if(mysqli_query($conn, $sql))
        echo("2");
    else
        echo("Lỗi hệ thống");

  }

 ?>
