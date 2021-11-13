<?php
  include("../connect.php");
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
  $manv=$_SESSION['MSNV'];
  if(isset($_GET['loaithanhtoan']) && isset($_GET['tongtien']) && isset($_GET['msdp'])){
      $phikhac = $_GET['phikhac'];
      $loaithanhtoan = $_GET['loaithanhtoan'];
      $tongtien = $_GET['tongtien'];
      $ghichu = $_GET['ghichu'];
      $madp = $_GET['msdp'];
      $tienphong = $_GET['tienphong'];
      $sql1="call CapnhatDatphong('$madp','$tienphong')";
      mysqli_query($conn,$sql1);
      $sql = "call TaoHD('$madp','$tongtien','$phikhac','$loaithanhtoan','$ghichu','$manv')";
      mysqli_query($conn, $sql);
      $sql2 = "select MaDP from Hoadon where MaDP='$madp'";
      $query = mysqli_query($conn, $sql2);
      if(mysqli_num_rows($query)>0){
        echo "true";
      }else {
        echo "Tạo hóa đơn không thành công!";
      }

}else{
      echo "Không nhận được dữ liệu!";
}


 ?>
