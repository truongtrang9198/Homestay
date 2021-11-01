<?php
    include_once("../connect.php");
    $sdt = $_POST['sdt'];
    $matkhau = md5($_POST['pwd']);

    // goi tu server
    $sql = "select SDT, Passwd from KhachHang where SDT = '$sdt'";
    if(mysqli_query($conn,$sql)){
      $row = mysqli_fetch_array(mysqli_query($conn,$sql));
        if($matkhau== $row['Passwd']){
          echo "true";
        }else{
          echo "Mật khẩu không chính xác!";
        }
    }else{
      echo("Số điện thoại chưa đăng ký!");
    }
 ?>
