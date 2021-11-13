<?php
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    $manv = $_SESSION['MSNV'];
  ob_start();
 ?>
 <div class="container-fluid" id="thongtincanhan">
   <div class="row">
     <!-- <h2 class="text-center">Thông Tin Nhân Viên</h2> -->
     <div class="col-4">

  <!-- card hiển thị hình ảnh -->
  <br>
  <div class="card">
      <img src="../Admin_xuly/{url}" alt="Chưa cập nhật!" width="250px" height="300px" >
    <div class="card-body">
      <h4>{hoten}</h4>
      <a  href="#" id="avatar" data-toggle="modal" data-target="#change_img" class="nav-link">
        <i class="fas fa-camera-retro"></i> Cập nhật ảnh </a>
    </div>
  </div>
  <br>
  <!-- card hiển thị thông tin -->
  <div class="card">
    <span><i class="far fa-address-card"></i> Thông tin cá nhân </span>
    <div class="card-body">
    <span class="text-muted">MSNV: </span>{msnv}<br>
    <span class="text-muted">Họ tên: </span>{hoten}<br>
    <span class="text-muted">Ngày sinh: </span>{ngaysinh}<br>
    <span class="text-muted">Giới tính: </span>{gioitinh}<br>
    <span class="text-muted">CMND: </span>{cmnd}<br>
    <span class="text-muted">Di động: </span>{sdt}<br>
    <span class="text-muted">Địa chỉ: </span>{diachi}<br>
    <span class="text-muted">Chức vụ: </span>{chucvu}<br>
    <span class="text-muted">Trạng thái: </span>{trangthai}<br>
    <span class="text-muted">Ngày vào làm: </span>{ngayvaolam}<br>

  </div>
  </div>
  </div>
  <!-- Lưu thông tin quá trình làm việc - nâng cấp sau -->

  <div class="col-8">
    <br>
    <div class="card">
      <h5 class="text-center">Lịch Làm Việc</h5>
      <p class="text-muted text-center">(Chức năng sẽ sớm được cập nhật)</p>
    </div>
  </div>
</div>
<br>
</div>

<?php
  $s = ob_get_clean();
  $sql = "select * from Nhanvien where MSNV='$manv'";
  include("../connect.php");
  if(mysqli_query($conn,$sql)){
    $row = mysqli_fetch_array(mysqli_query($conn,$sql));
    $s = str_replace("{url}",$row['Hinhanh'],$s);
    $s = str_replace("{msnv}",$row['MSNV'],$s);
    $s = str_replace("{hoten}",$row['Hoten_NV'],$s);
    $s = str_replace("{ngaysinh}",$row['NgaysinhNV'],$s);
    $s = str_replace("{gioitinh}",$row['Gt'],$s);
    $s = str_replace("{cmnd}",$row['CMND_NV'],$s);
    $s = str_replace("{diachi}",$row['DiaChi_NV'],$s);
    $s = str_replace("{sdt}",$row['SDT_NV'],$s);
    $s = str_replace("{chucvu}",$row['Chucvu'],$s);
    $s = str_replace("{trangthai}",$row['Trangthaicv'],$s);
    $s = str_replace("{ngayvaolam}",$row['Ngayvaolam'],$s);
    echo $s;
  }else{
    echo "<p class='text-center'>Hệ thống lỗi!</p>";
  }
 ?>

 <!-- modal cập nhật ảnh -->
 <div class="row">
   <div class="modal" id="change_img">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h3 class="modal-title">Thêm ảnh</h3>
             <button type="button" class="close" data-dismiss="modal">&times;</button>

         </div>
         <div class="modal-body">
           <form class="form-group" enctype="multipart/form-data" method="post">
             <input type="text" name="manv" id="manv" class="form-control text-muted" value="<?php echo $manv; ?>" readonly>
             <input type="file" name="img" class="form-control" id="img" value="" placeholder=".jpg\png" required>
             <p class="text-danger" id="loi-dinhdang"></p>
           </form>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-primary" id="Up" name="button">Tải lên</button>
         </div>
       </div>
     </div>
   </div>
 </div>
