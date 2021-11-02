<?php
    include_once("../connect.php");
    if (session_status() == PHP_SESSION_NONE) {
            session_start();
    }
    $makhach = $_SESSION['MSKH'];
    if(isset($_POST['Pwd_hientai']) && isset($_POST['Pwd_moi'])){
      $matkhauht = md5($_POST['Pwd_hientai']);
      $matkhaumoi = md5($_POST['Pwd_moi']);
      $sql = "select Passwd from Khachhang where MSKH='$makhach'";
      if(mysqli_query($conn,$sql)){
        $row = mysqli_fetch_array(mysqli_query($conn,$sql));
      }
        if($row['Passwd']==$matkhauht){
          $sql = "update Khachhang set Passwd='$matkhaumoi' where MSKH='$makhach'";
          if(mysqli_query($conn,$sql)){
            echo "true";
          }else{
            echo "Lỗi truy vấn!";
          }
        }else{
          echo "Sai mật khẩu!";
          die();
        }

    }else{
      echo "Không nhận được dữ liệu!";
    }



 ?>
