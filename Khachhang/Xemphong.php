<?php
    include("../connect.php");

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style media="screen">
      #btn-datphong{
          margin-top: 100px;
      }
      .form-search{
        padding-left: 630px;
      }
    </style>
 <script src="Thoigian.js" charset="utf-8"></script>
  </head>
  <body>
    <div class="form-search">
      <form class=""  action="index.html" method="post">
        <label for="ngayden">Check in</label>
        <input type="text" name="ngayden" id="ngayden" value="">
        <label for="ngaydi">-</label>
        <input type="text" name="ngaydi" id="ngaydi" value="">
        <button type="button" name="button" id="search" class="btn-primary">Tìm</button>
      </form>
    </div>
<!-- php hien hinh -->

<?php
        $sql = "select MSP,TenPhong,Gia,Mota,Tenloai from Phong,Loaiphong where Phong.Maloai = Loaiphong.Maloai";
        $query = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query)>0){
          while ($row=mysqli_fetch_array($query)) {
              $msp =  $row['MSP'];
              $sql = "select * from Anhphong where MSP = '$msp' LIMIT 0,1";
              if(mysqli_query($conn,$sql)){
                $url=mysqli_fetch_array(mysqli_query($conn,$sql));
 ?>


    <div class="jumbotron" style="padding-top:5px;padding-bottom:5px;">
    <div class="d-flex flex-row">

      <div class="p-2 my-2"  >
        <img src="<?php echo "../Admin_xuly/".$url['Hinhphong'] ?>" alt="" width="600px" height="400px;">

      </div>
      <?php
          }
       ?>

      <div class="p-3 my-4">
          <!-- <div class="jumbotron" style="height:400px;"> -->
        <span class="text-muted">MSP: <?php echo $row['MSP'] ?></span> <br>
        <span class="text-muted">Loại: <?php echo $row['Tenloai'] ?></span>
        <p class="font-weight-bold">Phòng:<?php echo $row['TenPhong']; ?> </p>
         <span class="font-weight-bold">Mô tả: </span> <br>
        <span><?php echo $row['Mota']; ?></span><br>
        <span class="text-danger"><?php echo$row['Gia']; ?> VND</span> <br>
        <a href="Xemanh.php?d=<?php echo $row['MSP']; ?>" class="text-info"><i class="fas fa-images"></i> Xem thêm ảnh</a>
        <form class="" action="Trangchu.php?d=Datphongs" method="post">
          <input type="text" name="maphong" value="<?php  echo $row['MSP']; ?>" hidden>
          <button type="submit" class="btn btn-info" id="btn-datphong" name="button">Đặt phòng</button>
        </form>

      <!-- </div> -->
    </div>
      </div>
    </div>
  </body>
</html>
<?php
  }
}


 ?>
