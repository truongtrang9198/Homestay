<?php
    include("../connect.php");
      $maphong = $_POST['maphong'];
      $hinhphong = $_FILES['hinhphong']['name'];
      $tmp_name = $_FILES['hinhphong']['tmp_name'];
      $path="Anhphong/";
      move_uploaded_file($tmp_name,$path.$hinhphong);
      $img_url = $path.$hinhphong;
      $sql = "insert into Anhphong(MSP,Hinhphong) values('$maphong','$img_url')";
      if(mysqli_query($conn,$sql)){
        echo("Tải ảnh thành công");
      }else{
        echo "Tải ảnh thất bại!";
      }

 ?>
