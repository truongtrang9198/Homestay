<?php
    include("../connect.php");
    if(isset($_GET['madp'])){
      $madp = $_GET['madp'];

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Xuất hóa đơn</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style media="screen">
      body{
        font-family: times;
      }
    </style>

  </head>
  <body>
    <p class="text-right">In</p>
    <div class="container border">
        <div class="row">
          <div class="col-4">
            <span class=""><b>Tên đơn vị: MoonHome</b></span>
          <br>  <span class="text-muted">Mã số thuế (Tax code):</span> <br>
            <span class="text-muted">Địa chỉ: đường 3/2, P.Xuân Khánh, Q.Ninh Kiều, TP.Cần Thơ</span> <br>
            <span class="text-muted">Điện thoại: 0949760662</span> <br>
            <span class="text-muted">Email: Moonhome@gmai.com</span>
          </div>
        
        </div>
        <div class="row">
          <div class="col-12">
            <h4 class="text-center">HÓA ĐƠN GIÁ TRỊ GIA TĂNG</h4>
            <p class="text-center"><span class="text-muted">Ngày hóa đơn:</span><?php echo date('d-m-Y') ?></p>
          </div>
        </div>
        <?php
          ob_start();
         ?>
        <div class="row">
          <div class="col-5">
            <span class="text-muted">Họ tên người mua hàng: </span>{hotenkhach} <br>
            <span class="text-muted">Điện thoại:</span> {sdt} <br>
             <span class="text-muted">Email: </span>{email} <br>
             <span class="text-muted">Địa chỉ: </span>{diachi} <br>
          </div>
          <div class="col-2 offset-5">
            <span class="text-muted">Mẫu số: </span>AG01234 <br>
            <span class="text-muted">Ký hiệu: </span>AA/17E <br>
            <span class="text-muted">Số: </span>00000 <br>
          </div>
        </div>
        <hr>
        <div class="row">

          <table class="table table-bordered">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên hàng hóa dịch vụ</th>
                <th>Đơn vị tính</th>
                <th>Số lượng</th>
                <th>Thời gian</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
                <th>Thuế GTGT</th>
                <th>Thành tiền đã có thuế</th>
              </tr>
            </thread>
            <tbody>
              <tr>
                <td>1</td>
                <td>{tenphong}</td>
                <td>Đêm</td>
                <td>{soluong}</td>
                <td>{chekin} - {checkout}</td>
                <td>{gia}</td>
                <td>{thanhtien}</td>
                <td>0.0</td>
                <td>{thanhtien}</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Phí khác</td>
                <td>Lần/lượt</td>
                <td>1</td>
                <td> </td>
                <td>{phikhac}</td>
                <td>{phikhac}</td>
                <td>0.0</td>
                <td>{phikhac}</td>
              </tr>
              <tr>
                <td>3</td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td>Tổng</td>
                <td colspan="7" class="text-right">{tongtien}</td>
              </tr>
              <tr><td colspan="9">*Hình thức {loaidp}</td></tr>
              <tr><td colspan="9">*Loại hình thanh toán {thanhtoan}</td></tr>
              <tr><td colspan="9">*Ghi chú: {ghichu}</td></tr>

            </tbody>
          </table>
            </div>
      <?php
            $str = ob_get_clean();
            $sql = "call LaythongtinHD('$madp')";
            $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query)>0){
              $row = mysqli_fetch_array($query);
              $checkin = date('d-m-Y',strtotime($row['Check_in']));
              $checkout = date('d-m-Y',strtotime($row['Check_out']));
              $str = str_replace("{tenphong}",$row['TenPhong'],$str);
              $str = str_replace("{checkin}",$checkin,$str);
              $str = str_replace("{checkout}",$checkout,$str);
              $str = str_replace("{soluong}",$row['Sodem'],$str);
              $str = str_replace("{hotenkhach}",$row['HoTenKhach'],$str);
              $str = str_replace("{sdt}",$row['SDT'],$str);
              $str = str_replace("{email}",$row['Email'],$str);
              $str = str_replace("{diachi}",$row['DiaChi'],$str);
              $str = str_replace("{loaidp}",$row['Loaidp'],$str);
              $str = str_replace("{thanhtoan}",$row['Thanhtoan'],$str);
              $str = str_replace("{gia}",number_format($row['Gia']),$str);
              $str = str_replace("{phikhac}",number_format($row['Gia']),$str);
              $str = str_replace("{thanhtien}",number_format($row['Tienphong']),$str);
              $str = str_replace("{tongtien}",number_format($row['Tongtien']),$str);
              $str = str_replace("{ghichu}",$row['Ghichu'],$str);

              echo $str;
            }


       ?>
       <div class="row">
         <div class="col-4">
           <span>Người mua hàng</span><br>
           <span class="text-muted"><i> (Ký ghi rõ họ tên)</i></span>
           <br>
           <br>
           <br>
         </div>
         <?php
         include("../connect.php");
           $sql = "select Hoten_NV from Nhanvien,Hoadon where Hoadon.MSNV = Nhanvien.MSNV
                and Hoadon.MaDP='$madp' ";
           $query = mysqli_query($conn,$sql);
           $row = mysqli_fetch_array($query);
          ?>
         <div class="col-2 offset-5">
           <span>Người bán hàng</span><br>
           <span class="text-muted"><i> (Nhân viên)<i></span><br>

            <span> <?php echo $row['Hoten_NV']; ?></span>
            <br>
            <br>
            <br>
         </div>
       </div>
    </div>
  <br>
  </body>
</html>
<?php
}else {
  echo "<p class='text-center'>Lỗi hệ thống!</p>";
}
 ?>
