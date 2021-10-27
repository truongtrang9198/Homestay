<?php
include_once '../connect.php';

// lấy dữ liệu POST
$hoten = $_POST['hoten'];
$gioitinh = $_POST['gioitinh'];
$sdt = $_POST['sdt'];
$cmnd =$_POST['cmnd'] ;
$ngaysinh = $_POST['ngaysinh'];
$diachi = $_POST['diachi'];
$email = $_POST['email'];
$matkhau = $_POST['matkhau'];
$matkhau = md5($matkhau);

//  kiem tra sdt, cmnd co ton tai chua
$sql = "select SDT,CMND from KhachHang";
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
$sql = "insert into KhachHang(HoTenKhach,NgaysinhKH,Gioitinh,CMND,DiaChi,SDT,Email,Passwd)
          values('$hoten','$ngaysinh','$gioitinh','$cmnd','$diachi','$sdt','$email','$matkhau')";
  if(mysqli_query($conn,$sql)){
    echo("True");
  }else{
    echo("Thất bại!");
  }
 ?>
