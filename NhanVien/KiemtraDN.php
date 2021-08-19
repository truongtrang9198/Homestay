<?php

  include("../connect.php");
    $usr = trim(addslashes($_POST['usr']));
    $pwd = trim(addslashes($_POST['pwd']));
    $pwd = md5($pwd);

    $sql = "select * from TaiKhoan where username = '$usr'";
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query) > 0){
      $row = mysqli_fetch_array($query);
      if($pwd != $row['passwd']){
        echo("Mật khẩu không chính xác!");
        die();
      }else
          echo("true");


}else{
      echo("Tên đăng nhập không tồn tại!");
      die();
      // header("Location:Nhanvien.php?d=trangchu");
}
 ?>
