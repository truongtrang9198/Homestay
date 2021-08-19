<?php
  include("../connect.php");
  $manv = $_POST['manv'];
  $hoten = $_POST['hoten'];
  $ngaysinh = $_POST['ngaysinh'];
  $gioitinh  = $_POST['gioitinh'];
  $sdt  = $_POST['sdt'];
  $cmnd  = $_POST['cmnd'];
  $diachi  = $_POST['diachi'];
  $chucvu  = $_POST['chucvu'];
  $n = "0";
  $sql = "select SDT_NV,CMND_NV from Nhanvien where not MSNV = $manv";
  $query = mysqli_query($conn,$sql);
  if(mysqli_num_rows($query)!=0){
    while ($row = mysqli_fetch_array($query)) {
      if(($sdt == $row['SDT_NV']) && ($cmnd == $row['CMND_NV'])){
        echo("Số điện thoại hoặc CMND đã tồn tại!");
        $n ="1";
        die();
      }
    }
  }else {
    $n="0";
  }
  
  //  update thong tin
  if($n!="1"){
    $sql = "update Nhanvien set Hoten_NV = '$hoten',NgaysinhNV = '$ngaysinh', Gt='$gioitinh',CMND_NV='$cmnd',SDT_NV='$sdt',
    DiaChi_NV ='$diachi',Chucvu='$chucvu' where MSNV = '$manv'";
    if(mysqli_query($conn,$sql)){
    echo("Thành công!");

    }else{
    echo("Lỗi hệ thống!");
    }
  }
 




 ?>
