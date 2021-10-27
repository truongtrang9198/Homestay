<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
  include("../connect.php");

  $hoten = $_POST['hoten'];
  $ngaysinh = $_POST['ngaysinh'];
  $gioitinh = $_POST['gioitinh'];
  $sdt = $_POST['sdt'];
  $email = $_POST['email'];
  $cmnd = $_POST['cmnd'];
  $diachi = $_POST['diachi'];
  $ngayden = $_POST['ngayden'];
  $ngaydi = $_POST['ngaydi'];
  $maphong = $_POST['phong'];
  $songay = $_POST['songay'];

  // dinh dang lai ngay
  $ngaysinh1 = date("d/m/Y",strtotime($ngaysinh));
  $ngaydi1 = date("d/m/Y",strtotime($ngaydi));
  $ngayden1 = date("d/m/Y",strtotime($ngayden));
 $today = date("d/m/Y");
  if ($maphong !='') {
    $sql = "select * from Phong where MSP='$maphong'";
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0){
      $row = mysqli_fetch_array($query);
  }else{
    echo "Không lấy được thông tin phòng";
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      .name{
        font-family:georgia;
         font-size:10px !important;
      }
      .xacnhan{
        padding-top: 20px;
        padding-bottom: 20px;

      }
      .form{
        padding-left: 5px;
      }
      #btn-xacnhan{
        margin-left: 600px;
        margin-bottom: 5px;
        width: 200px !important;
      }
      #btn-huy{
        margin-left: 5px;
      }
      input{
        border: 1px;

      }
      #title-xacnhan{
        font-family: times;
      }

    </style>
  </head>
<body>

    <div class="row">
    <div class="col-8 offset-2">

      <div class="row">

          <div class="xacnhan">
            <div class="border border-info rounded" style="background-color:white;">
              <p class="name text-muted"> <span class=" align-top"><i class="fas fa-moon " style="color: yellow;"></i></span>
              <span class=" align-bottom">MOON's</span>
              <span class=" align-bottom">HOMETA<i class="fas fa-seedling"></i></span></p>
              <h3 class="text-center font-weight-normal" id="title-xacnhan">&mdash;XÁC NHẬN ĐẶT PHÒNG	&mdash;</h3>
              <hr>
              <form class="form" action="index.html" method="post">
                <label for="Hoten" class="text-muted">Khách hàng: </label>
                <input type="text"  id="hoten" name="hotenn" value="<?php echo $hoten; ?>"> <br>
                <label for="" class="text-muted">Ngày sinh: </label>
                <input type="text" name="ngaysinh" value="<?php echo $ngaysinh1; ?>"> <br>
                <input type="date" id="ngaysinh" name="" value="<?php echo $ngaysinh; ?>" hidden>
                <label for="gioitinh" class="text-muted">Giới tính: </label>
                <input type="text" id="gioitinh" name="gioitinh" value="<?php echo $gioitinh; ?>"> <br>
                <label for="cmnd" class="text-muted">CMND: </label>
                <input type="text" id="cmnd" name="cmnd" value="<?php echo $cmnd; ?>"> <br>
                <label for="sdt" class="text-muted">Số điện thoại: </label>
                <input type="text" id="sdt" name="sdt" value="<?php echo $sdt; ?>"> <br>
                <label for="email" class="text-muted">Email: </label>
                <input type="text" name="email" id="email" value="<?php echo $email; ?>"> <br>
                <label for="diachi" class="text-muted">Địa chỉ: </label>
                <input type="text" id="diachi" name="diachi" value="<?php echo $diachi; ?>">
                <input type="date" name="ngayden" id="ngayden" value="<?php echo $ngayden; ?>" hidden>
                <input type="date" name="ngaydi" id="ngaydi" value="<?php echo $ngaydi; ?>" hidden>
                <input type="number" name="songay" id="songay" value="<?php echo $songay; ?>" hidden>
                <input type="text" name="maphong" id="maphong" value="<?php echo $maphong; ?>" hidden>
              </form>
              <blockquote class="blockquote-footer"> <?php echo $today; ?> </blockquote>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Tên phòng</th>
                    <th scope="col">Check in</th>
                    <th scope="col">Check out</th>
                    <th scope="col">Đơn vị(đêm)</th>
                    <th scope="col">Đơn giá (VND)</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Cọc trước</th>
                    <th scope="col">Còn lại</th>
                  </tr>
                </thread>
                <tbody>
                  <tr>
                    <td><?php echo $row['TenPhong'];?></td>
                    <td><?php echo $ngayden1; ?></td>
                    <td><?php echo $ngaydi1; ?></td>
                    <td><?php echo $songay; ?></td>
                    <td><?php echo number_format($row['Gia']); ?></td>
                    <td><?php echo number_format($songay*$row['Gia']) ?> VND</td>
                    <td><?php echo number_format($songay*$row['Gia']*0.3) ?> VND</td>
                    <td><?php echo number_format($songay*$row['Gia'] - $songay*$row['Gia']*0.3) ?> VND</td>
                  </tr>
                </tbody>
              </table>
              <p style="font-size:10px;">
              <span class="text-muted" >Moon's Homestay sẽ gửi mail hoặc gọi điện cho bạn trong thời gian sớm nhất!</span> <br>
              <span class="text-warning" >Quý khách vui lòng thanh toán tiền cọc trong 24h để hoàn tất quá trình đặt phòng<a href="#">
               <span class="text-info">Hướng dẫn cọc phòng  </span></a></span>
              </p>
                    <button type="button" name="button" class="btn btn-info" id="btn-huy" onclick="window.history.back();"><i class="far fa-caret-square-left"></i></button>
                    <button type="button" class="btn btn-info text-nowrap" id="btn-xacnhan" name="button" data-toggle="tooltip"
                    title="Kiểm tra thông tin trước khi bấm xác nhận">Đặt Phòng</button>
            </div>
            </div>
          </div>

          </div>
          <input type="button" name="" data-toggle="modal" class="hidden" data-target="#chucmung" id="thanhcong" value="" hidden>
          <!-- <button type="button" data-toggle="modal" class="hidden" data-target="#chucmung" id="thanhcong" name="button"></button> -->
          <!-- modal -->
          <!-- The Modal -->
 <div class="modal fade" id="chucmung">
   <div class="modal-dialog">
     <div class="modal-content">

       <!-- Modal Header -->
       <div class="modal-header">
         <h4 class="modal-title">Đặt hàng thành công </h4>
       </div>

       <!-- Modal body -->
       <div class="modal-body">
         <h2>🎉🎉🎉🎉</h2>
         <p class="text-muted">Hẹn gặp bạn sớm!</p>
       </div>

       <!-- Modal footer -->
       <div class="modal-footer">
         <button type="button" class="btn btn-info" data-dismiss="modal" id="trangchu"><i class="fas fa-home"></i></button>
       </div>
</div>
</div>
</div>


</div>
</body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
     $('[data-toggle="tooltip"]').tooltip();
    $('#btn-xacnhan').click(function(){
      var hoten = $('#hoten').val();
      var email = $('#email').val();
      var diachi =$('#diachi').val();
      var gioitinh =$('#gioitinh').val();
      var ngaysinh = $('#ngaysinh').val();

      var sdt = $('#sdt').val();
      var cmnd = $('#cmnd').val();


      var ngayden = $('#ngayden').val();
      var ngaydi = $('#ngaydi').val();
      var songay = $('#songay').val();
      var maphong = <?php echo $maphong; ?>;

      $.post("Xulydatphong.php",{hoten:hoten,ngaysinh:ngaysinh,gioitinh:gioitinh,sdt:sdt,cmnd:cmnd,email:email,ngayden:ngayden,ngaydi:ngaydi,
                        diachi:diachi,songay:songay,maphong:maphong},function(data){
                            if (data=="true") {
                               $('#thanhcong').click();
                            }else {
                              alert("Lỗi hệ thống!");
                            }
                            // dan toi trang dat hang thanh cong va thao tac ve trang chu

                        });
    });
  });

  // chuyen huong toi trang chuyen
  $('#trangchu').click(function(){
    $(location).attr('href','Trangchu.php?d=trangchu');
  });

</script>
    <?php
  }else{
    echo "Không xác định được mã phòng!";
  }

     ?>
