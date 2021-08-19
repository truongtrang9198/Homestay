<?php

    include("../connect.php");

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      /* .body{
        margin-left: 10px;
      } */

      #button{
        padding-right: 0;

      }
      button{
        width: 100px !important;
        height: 50px !important;
        margin-left: 10px;
      }

    </style>
  </head>
  <body>
    <div class="body">


    <h2 class="text-success text-center">Thông tin  đặt phòng</h2>
    <form class="form-group" action="index.html" method="post">
    <div class="row">
      <div class="col-4">

      <label for="hoten">Họ tên</label>
      <input type="text" name="hoten" class="form-control" value="">
      <label for="ngaysinh">Ngày sinh</label>
      <input type="date" name="ngaysinh" value="" class="form-control">
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
        <input type="text" name="cmnd" class="form-control" value="">
        <label for="sdt">Số điện thoại</label>
        <input type="text" name="sdt" class="form-control" value="">
        <label for="diachi">Địa chỉ</label>
        <input type="text" name="diachi" class="form-control"value="">
        <label for="ngayden">Ngày check in</label>
        <input type="date" name="ngayden" class="form-control" value="">
        <label for="ngaydi">Ngay check out</label>
        <input type="date" name="ngaydi" class="form-control" value=""> <br>
        <div class="row" id="button">
          <button type="button" name="button" class="btn btn-primary">Hủy</button>
          <button type="button" name="button" class="btn btn-primary">Tiếp tục</button>
        </div>

    </div>
    <div class="col-6 offset-1">
      <div class="row">
      <!-- truy van phong -->
      <label for="phong">Phòng</label>
      <select class="form-control" name="phong" id="phong">
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
        Thông tin phòng</a>
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
    </div>
  </body>
</html>
