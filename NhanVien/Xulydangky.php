<?php
include_once '../connect.php';

// lấy dữ liệu POST
$hoten = $_POST['hoten'];
$gioitinh = $_POST['gioitinh'];
$sdt = $_POST['sdt'];
$cmnd =$_POST['cmnd'] ;
$ngaysinh = $_POST['ngaysinh'];
// $ngaysinh = date("d-m-Y",strtotime($ngaysinh));

$diachi = $_POST['diachi'];
$email = $_POST['email'];
$matkhau = $_POST['matkhau'];
$matkhau = md5($matkhau);
$ngayden = $_POST['ngayden'];
$ngaydi = $_POST['ngaydi'];
$sodem = $_POST['sodem'];
$thanhgia = $_POST['thanhgia'];
$maphong = $_POST['maphong'];
//  kiem tra sdt, cmnd co ton tai chua
$sql = "select SDT,CMND from KhachHang";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query) != 0){
//    $row = mysqli_fetch_array($query);
  while ($row = mysqli_fetch_array($query)) {
    if($row['SDT'] == $sdt){
      echo($sdt);
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
        $last_id = mysqli_insert_id($conn);
        $sql1 = "insert into Datphong(MSP,MSKH,Check_in,Check_out,Sodem,Tienphong,Trangthai,Loaidp)
                values('$maphong','$last_id','$ngayden','$ngaydi','$sodem','$thanhgia','phongdat','Tructiep')";
        if(mysqli_query($conn,$sql1)){
          echo "True";
        }else{
            echo "Thêm đặt phòng thất bại!";
        }
  }else{
    echo("Thêm khách hàng thất bại!");
  }
 ?>
