<?php
    include("../connect.php");
    if (session_status() == PHP_SESSION_NONE) {
            session_start();
    }
    if(isset($_SESSION['MSKH'])){
      $makhach = $_SESSION['MSKH'];
    }else {
      $makhach ='';
    }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    
    <style media="screen">
      .form-search{
        padding-left: 630px;
      }
    </style>
 <script src="Thoigian.js" charset="utf-8"></script>
  </head>
  <body>
    <input type="text" name="makhach" id="makhach" value="<?php echo $makhach; ?>" hidden>
    <div class="form-search">
      <form class="form-inline"  action="Phongtrong.php" method="get">
        <label for="ngayden">Check in </label> &ensp;
        <input type="text" name="ngayden" id="ngayden" value="" class="form-control" required> &ensp;
        <label for="ngaydi">-</label> &ensp;
        <input type="text" name="ngaydi" id="ngaydi" value="" class="form-control" required> &ensp;
        <button type="submit" name="button" id="search" class="btn-primary">Tìm</button>
      </form>
    </div>
<!-- php hien hinh -->

<?php
        $sql = "select MSP,TenPhong,Gia,Mota,Tenloai from Phong,Loaiphong where Phong.Maloai = Loaiphong.Maloai";
        $query = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query)>0){
          while ($row=mysqli_fetch_array($query)) {
              $msp =  $row['MSP'];
              $sql = "select * from Anhphong where MSP = '$msp' LIMIT 1";
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
        <span class="text-danger"><?php echo number_format($row['Gia']); ?> VND</span> <br>
        <a href="Xemanh.php?d=<?php echo $row['MSP']; ?>" class="text-info"><i class="fas fa-images"></i> Xem thêm ảnh</a>
        <form class="form-datphong" action="Trangchu.php?d=Datphongs" method="post">
          <input type="text" name="maphong" value="<?php  echo $row['MSP']; ?>" hidden>
      <br>
          <button type="submit" class="btn"  name="button" disabled>Đặt phòng</button>
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
<script type="text/javascript">
  $(document).ready(function(){

    // script đặt phòng
      $(".form-datphong").submit(function(e){
        e.preventDefault();
        var makhach = $('#makhach').val();
        var maphong = $(this).serialize();
        var ngayden = $('#ngayden').val();
        var ngaydi = $('#ngaydi').val();
        if(makhach ==''){
          $('#formDangnhap').modal('show');
        }else{
            if(ngayden !=='' && ngaydi !=''){
                alert('hehe');
            }else{
                $('#toast-content-err').html('Bạn chưa chọn ngày!');
                $('#Thongbaoloi').toast('show');
                }
        }
      })


  })
</script>
