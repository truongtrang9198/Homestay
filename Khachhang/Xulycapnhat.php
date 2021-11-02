<?php
include_once '../connect.php';

// lấy dữ liệu POST
$makhach = $_POST['makhach'];
$hoten = $_POST['hoten'];
$gioitinh = $_POST['gioitinh'];
$sdt = $_POST['sdt'];
$cmnd =$_POST['cmnd'] ;
$ngaysinh = $_POST['ngaysinh'];
// $ngaysinh = date("d-m-Y",strtotime($ngaysinh));

$diachi = $_POST['diachi'];
$email = $_POST['email'];


//  kiem tra sdt, cmnd co ton tai chua
$sql = "select SDT,CMND from KhachHang where MSKH != '$makhach'";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query) != 0){
//    $row = mysqli_fetch_array($query);
  while ($row = mysqli_fetch_array($query)) {
    if($row['SDT'] == $sdt){
      echo("Số điện thoại đã được đăng ký!");
      die();
    }
    if($row['CMND'] == $cmnd){
      echo("Số CMND đã được đăng ký!");
      die();
    }
  }
}

// thêm dữ liệu vào server
$sql = "update KhachHang set HoTenKhach='$hoten',NgaysinhKH='$ngaysinh',Gioitinh='$gioitinh',CMND='$cmnd',
                      DiaChi='$diachi',SDT='$sdt',Email='$email' where MSKH='$makhach'";
  if(mysqli_query($conn,$sql)){
    echo("True");
  }else{
    echo("Thất bại!");
  }
//echo $ngaysinh;
 ?>
