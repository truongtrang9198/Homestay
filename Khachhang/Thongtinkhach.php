 <style media="screen">
   /* #thongtinkhach{
     border-right: 2px solid;
   } */
 </style>
<?php
// Lấy mã khách
    if (session_status() == PHP_SESSION_NONE) {
            session_start();
    }
    if(isset($_SESSION['MSKH']))
        $makhach = $_SESSION['MSKH'];

    ob_start();
 ?>
<!-- Hiển thị thông tin khách hàng -->
    <h2 class="text-dark text-center">Thông Tin Khách Hàng</h2> <br>
    <div class="container-fluid">
      <div class="thongtinkhach">

        <div class="row" id=" ">
          <div class="col-3" id="thongtinkhach">
            <!-- <div class="card"> -->
              <!-- <div class="card-body"> -->
            <div class="card">
              <div class="card-body">


              <!-- <p><span class="text-muted font-italic">Mã khách: </span><span class="text-center" ></span></p> -->
              <input type="text" id="makhach" name="" value="{makhach}" class="form-control-plaintext" hidden>
              <p><span class="text-muted font-italic">Họ tên khách: </span><span class="text-center"> <b>{Hoten}</b> </span></p>

              <p><span class="text-muted font-italic"> Ngày sinh: </span><span class="text-center">{Ngaysinh}</span></p>
              <p><span class="text-muted font-italic">Giới tính: </span> <span class="text-center">{Gioitinh}</span></p>

              <p><span class="text-muted font-italic">CMND: </span><span class="text-center">{CMND}</span></p>

              <p><span class="text-muted font-italic">Số điện thoại: </span><span class="text-center">{sdt}</span></p>

              <p><span class="text-muted font-italic">Email: </span><span class="text-center">{email}</span></p>

              <p><span class="text-muted font-italic">Địa chỉ: </span><span class="text-center">{Diachi}</span></p>
              <button type="button" name="huy" class="btn1 btn btn-primary" id="matkhaumoi" data-toggle="modal" data-target="#modal-matkhaumoi">Mật Khẩu Mới</button> &ensp;
             <button type="submit" name="btn-datphong" class="btn1 btn btn-primary" id="btn-suathongtin" data-toggle="modal" data-target="#modal-suathongtin">Cập Nhật</button>
              </div>

        </div>
      </div>

<?php
    $s = ob_get_clean();
    // lấy thông tin khách hàng
    include("../connect.php");
    $sql = "SELECT*from Khachhang where MSKH='$makhach'";
    if(mysqli_query($conn,$sql)){
      $row=mysqli_fetch_array(mysqli_query($conn,$sql));
      $s = str_replace("{Hoten}",$row['HoTenKhach'],$s);
      $ngaysinhs= date("d-m-Y",strtotime($row['NgaysinhKH']));
      $s = str_replace("{Ngaysinh}",$ngaysinhs,$s);
      $s = str_replace("{Gioitinh}",$row['Gioitinh'],$s);
      $s = str_replace("{CMND}",$row['CMND'],$s);
      $s = str_replace("{sdt}",$row['SDT'],$s);
      $s = str_replace("{Diachi}",$row['DiaChi'],$s);
      $s = str_replace("{email}",$row['Email'],$s);
    }
  $s = str_replace("{makhach}",$makhach,$s);
  echo $s;
?>
<div class="col-9">
<!-- Hiển thị đơn đặt phòng của khách -->
  <div class="card">
  <h5>Trạng Thái Đặt Phòng</h5>
  <table class="table" id="trangthaidatphong">
    <thead>
      <tr>
        <th>MaDP</th>
        <th>Tên Phòng</th>
        <th>Giá/đêm</th>
        <th>Check in</th>
        <th>Check out</th>
        <th>Số lượng (đêm)</th>
        <th>Thành giá</th>
        <th>Trạng thái</th>
      </tr>
    </thead>
    <tbody>
      <?php
      //  $soluong = ($ngaydi-$ngayden);
      include("../connect.php");
     //  lấy thông tin bảng đặt phòng
      $sql = "Call Thongtindatphong(?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s",$makhach);
      $stmt->execute();
      $result = $stmt->get_result();
      while ($row = $result->fetch_assoc()) {

        $s="<tr>
          <td >{MaDP}</td>
          <td>{Tenphong}</td>
          <td>{Gia}</td>
          <td >{Ngayden} </td>
          <td >{Ngaydi}</td>
          <td >{Soluong} </td>
          <td >{Thanhgia}</td>
          <td>{Trangthai}</td>
        </tr> ";
        $s = str_replace("{MaDP}",$row['MaDP'],$s);
        $s = str_replace("{Tenphong}",$row['TenPhong'],$s);
        $s = str_replace("{Soluong}",$row['Sodem'],$s);
        $s = str_replace("{Ngayden}",$row['Check_in'],$s);
        $s = str_replace("{Ngaydi}",$row['Check_out'],$s);
        $s = str_replace("{Gia}",number_format($row['Gia']),$s);
        $s = str_replace("{Thanhgia}",number_format($row['Gia']*$row['Sodem']),$s);
        $s = str_replace("{Trangthai}",$row['Trangthai'],$s);
        echo $s;
    }

?>

    </tbody>
  </table>
   </div>


 </div>
 </div>

</div>
<br>
<hr>
<!-- Hiển thị tất cả hóa đơn của khách hàng -->
<div class="xemhoadon">
  <div class="row">
    <div class="col-12">
      <div class="card">
    <h5>Xem Hóa Đơn</h5>
    <div class="card-body">

    <table class="table table-bordered" id="xemhoadon">
      <tr>
        <th>MaHD</td>
        <th>Tên Phòng</th>
        <th>Giá/đêm</th>
        <th>Check in</th>
        <th>Check out</th>
        <th>Số lượng (đêm)</th>
        <th>Thành giá</th>
        <th>Phí khác</th>
        <th>Tổng tiền</th>
        <th>Thanh toán</th>
        <th>Ghi chú</th>
        <th>Thời gian</th>
      </tr>
      <?php
      include("../connect.php");
     //  lấy thông tin hóa đơn
      $sql = "Call Xemhoadon(?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s",$makhach);
      $stmt->execute();
      $result = $stmt->get_result();
      while ($row = $result->fetch_assoc()) {
        $s="<tr>
          <td >{MHD}</td>
          <td>{Tenphong}</td>
          <td>{Gia}</td>
          <td >{Ngayden} </td>
          <td >{Ngaydi}</td>
          <td >{Soluong} </td>
          <td >{Thanhgia}</td>
          <td>{Phikhac}</td>
          <td>{Tongtien}</td>
          <td>{Thanhtoan}</td>
          <td>{Ghichu}</td>
          <td>{Thoigian}</td>
        </tr> ";
        $s = str_replace("{MHD}",$row['MaHD'],$s);
        $s = str_replace("{Tenphong}",$row['TenPhong'],$s);
        $s = str_replace("{Soluong}",$row['Sodem'],$s);
        $s = str_replace("{Ngayden}",$row['Check_in'],$s);
        $s = str_replace("{Ngaydi}",$row['Check_out'],$s);
        $s = str_replace("{Gia}",number_format($row['Gia']),$s);
        $s = str_replace("{Thanhgia}",number_format($row['Gia']*$row['Sodem']),$s);
        $s = str_replace("{Phikhac}",number_format($row['Phikhac']),$s);
        $s = str_replace("{Tongtien}",number_format($row['Tongtien']),$s);
        $s = str_replace("{Thanhtoan}",$row['Thanhtoan'],$s);
        $s = str_replace("{Ghichu}",$row['Ghichu'],$s);
        $s = str_replace("{Thoigian}",$row['Check_out'],$s);

        echo $s;
      }
       ?>
    </table>

  </div>
</div>
  </div>
</div>
</div>
</div>
<br>



<!-- Modal sửa thông tin khách -->
<!-- The Modal -->
 <div class="modal" id="modal-suathongtin">
   <div class="modal-dialog">
     <div class="modal-content">

       <!-- Modal Header -->
       <div class="modal-header">
         <h4 class="modal-title">Cập Nhật Thông Tin</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
<?php
      include("../connect.php");
      $sql = "select *from Khachhang where MSKH='$makhach'";
      ob_start();

 ?>
        <!-- Modal body -->
        <form class="form-group" id="form-capnhattt" action="#" method="post">
        <div class="modal-body">
            <input type="text" name="" id="makhachhang" value="{makhach}" hidden>
            <label for="hoten">Họ tên</label>
            <input type="text" name="hoten" class="form-control" id="hoten" value="{hoten}" required>
            <label for="ngaysinh">Ngày sinh</label>
            <input type="text" name="ngaysinh" id="ngaysinh" value="{ngaysinh}" class="form-control" placeholder="YYYY/MM/DD" required pattern="[0-9]">
              <!-- gioi tinh -->
            <label for="gioitinh" class="form-check-label" >Giới tính:</label>
            <input  class="form-control" type="text" name="gioitinh" id="gioitinh" value="{gioitinh}" placeholder="Nữ/Nam/Khác" required maxlength="5">
            <label for="cmnd">CMND</label>
            <input type="text" name="cmnd" id="cmnd" class="form-control" value="{cmnd}" required pattern="[0-9]{9}">
            <label for="sdt">Số điện thoại</label>
            <input type="text" name="sdt" id="sdt_dk" class="form-control" value="{sdt}" required length='10' pattern="[0]?[0-9]{10,11}">
            <label for="diachi">Địa chỉ</label>
            <input type="text" name="diachi" id="diachi" class="form-control"value="{diachi}" required>
            <label for="email">Email</label>
            <input type="mail" name="email" id="email" class="form-control" value="{email}">
            <br>

            <div class="modal-footer">
              <button type="submit" name="tieptuc" class="btn1 btn btn-primary" id="btn-capnhattt">Cập Nhật</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>

<?php
    $str = ob_get_clean();
    $row = mysqli_fetch_array(mysqli_query($conn,$sql));
    $str = str_replace("{makhach}",$row['MSKH'],$str);
    $str = str_replace("{hoten}",$row['HoTenKhach'],$str);
    $str = str_replace("{ngaysinh}",$row['NgaysinhKH'],$str);
    $str = str_replace("{gioitinh}",$row['Gioitinh'],$str);
    $str = str_replace("{cmnd}",$row['CMND'],$str);
    $str = str_replace("{sdt}",$row['SDT'],$str);
    $str = str_replace("{diachi}",$row['DiaChi'],$str);
    $str = str_replace("{email}",$row['Email'],$str);
    echo $str;

  ?>
</div>
</div>
</div>

<!-- modal đổi mật khẩu -->
<div class="modal" id="modal-matkhaumoi">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Đổi Mật Khẩu</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form class="form-group" action="" id="form-matkhaumoi" method="post">
      <div class="modal-body">
          <label for="matkhauhientai">Mật khẩu hiện tại</label>
          <input type="password" name="" id="matkhauhientai" value="" class="form-control" required>
          <label for="mk_moi">Mật khẩu mới</label>
          <input type="password" name="" value="" id="mk_moi" class="form-control" required>
          <label for="xacnhanmatkhau">Xác nhận mật khẩu mới</label>
          <input type="password" name="" value="" id="xnmatkhaumoi" class="form-control" required>
          <p id="err" class="text-danger"></p>
      </div>
      <div class="modal-footer">
        <button type="submit" name="tieptuc" class="btn1 btn btn-primary" id="btn-matkhaumoi">Cập Nhật</button>
        <button type="button" class="btn" id="huy_mkmoi">Hủy</button>
      </div>
    </form>
   </div>
  </div>
</div>
