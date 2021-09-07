<?php
$servername = "localhost";
$username ="root";
$password = "123456";
$database = "Homestay";

$conn = new mysqli($servername,$username,$password,$database);

if($conn ->connect_error){
  die("Connect fail: ".$conn->connect_error);
}
// else
//   echo "kết nối được ròi!";

session_start();

$user =addslashes( $_POST['usr']);
$pw  = addslashes($_POST['pwd']);
$pw = md5($pw);

$sql = "select usr, Pwd from _admin where usr = '$user'";
 $query = mysqli_query($conn, $sql);
if(mysqli_num_rows($query) != 0){
    $row = mysqli_fetch_array($query);
    if($pw!= $row['Pwd']){
      // echo 'Mật khẩu không khớp!';
      // echo "".$pw." - ".$row['password'];
      header('Location:re_login.php');
      exit;
    }
    else {
        $_SESSION['username'] = $user;
      //  echo "Xin chào " . $user . ". Bạn đã đăng nhập thành công. <a href='index.php?d=trangchu'>Về trang chủ</a>";
        header('Location:Admin.php?d=Trangchu');
        die();

    }
}
else {
    header('Location:re_login.php');
    exit;
}




 ?>
