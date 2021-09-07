<?php

    include("../connect.php");

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  
    <script type="text/javascript" src="Datphong.js"></script>

  </head>


<body>
    <h2 class="text-success text-center">Thông tin  đặt phòng</h2>
    <form class="form-group" action="Trangchu.php?d=xacnhan" method="post">
    <div class="row">
      <div class="col-lg-4 md-4">

      <label for="hoten">Họ tên</label>
      <input type="text" name="hoten" class="form-control" id="hoten" value="" required>
      <label for="ngaysinh">Ngày sinh</label>
      <input type="date" name="ngaysinh" id="ngaysinh" value="" class="form-control" required>
        <!-- gioi tinh -->
        <div class="form-check form-check-inline">
          <label for="gioitinh" class="form-check-label" >Giới tính:  </label>
        </div>

        <div class="form-check form-check-inline">
          <label class="form-check-label"> <input class="form-check-input" type="radio" name="gioitinh" id="nu" value="nữ">Nữ</label>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label"><input  class="form-check-input" type="radio" name="gioitinh" id="nam" value="nam">Nam</label>
        </div>
        <!--  -->
        <br>
        <label for="cmnd">CMND</label>
        <input type="text" name="cmnd" class="form-control" value="" required pattern="[0-9]{9}">
        <label for="sdt">Số điện thoại</label>
        <input type="text" name="sdt" class="form-control" value="" required length='10' pattern="[0]?[0-9]{10,11}">
        <label for="diachi">Địa chỉ</label>
        <input type="text" name="diachi" class="form-control"value="" required>
        <label for="email">Email</label>
        <input type="mail" name="email" id="email" class="form-control" value="">
        <label for="ngayden">Ngày check in</label>
        <input type="date" name="ngayden" id="ngayden" class="form-control" value="" required>
        <label for="ngaydi">Ngay check out</label>
        <input type="date" name="ngaydi" id="ngaydi" class="form-control" value="" required> <br>
        <input type="number" name="songay" value="" class="form-control" id="songay" hidden>
        <!-- Thong bao doc noi quy homestay -->
        <p  style="font-size:10px;"><span class="text-muted">\*Vui lòng đọc 'Nội quy homestay' trước khi đặt phòng</span>
        <a href="Trangchu.php?d=Trangchu/#Xemnoiqui" class="text-info">Nội quy honestay</a> </p>
        <div class="row" id="button">
        &ensp;&ensp;  <button type="button" name="huy" class="btn1 btn btn-primary" id="huy">Hủy</button> &ensp;
          <button type="submit" name="tieptuc" class="btn1 btn btn-primary" id="tieptuc">Tiếp tục</button>
        </div>

    </div>
    <div class="col-lg-6 md-6 offset-1">
      <div class="row">
      <!-- truy van phong -->
      <label for="phong">Phòng</label>
      <select class="form-control" name="phong" id="phong">
        <option value="">Chọn phòng</option>
      <?php

          $sql = "select MSP,Tenphong from Phong";
          $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) != 0) {
          while ($row = mysqli_fetch_array($query)) {
       ?>
       <option value="<?php echo $row['MSP']; ?>"> <?php echo $row['Tenphong']; ?> </option>
    <?php
    }
  } else {
    echo "Không truy vấn được!";
  }
    ?>
</select>
</div>
<div class="row">
      <a href="#" data-toggle="collapse" data-target="#thongtinphong" id="laythongtin" class="nav-link">
      <span class="text-warning"> Thông tin phòng</span> </a>
      <div class="collapse" id="thongtinphong">
        <p class="text-muted" id="thongbao"></p>
        <!-- <p id="thongtinphong"></p> -->
        <script type="text/javascript">
            $(document).ready(function(){
              $('#laythongtin').click(function(){
                var maphong = $('#phong').val();
                if(maphong==''){
                  $('#thongbao').html('Không có thông tin.');
                }else{
                  $.get("Laythongtinphong.php",{maphong:maphong},function(data){
                      $('#thongtinphong').html(data);
                  });
              }
            });
          });
        </script>
      </div>
</div>
    </div>
    </div>
    </form>
  </body>

</html>
<!-- kiem tra thong tin ma phong va thoi gian neu thoi gian do phong co trong chi tiết HD thì hong duoc dat phong -->
