<?php
  include("../connect.php");
 ?>

    <style media="screen">
      .form-search{
        padding-left: 10px;
      }
    </style>
 <script src="Thoigian.js"></script>
 <input type="text" name="makhach" value="<?php echo $makhach; ?>" hidden>
    <div class="form-search">
      <form class="form-inline"  action="Trangchu.php?d=phongtrong" method="post">
        <label for="ngayden"> Check in </label> &ensp;
        <input type="text" name="ngayden" id="ngayden" value="" class="form-control" required> &ensp;
        <label for="ngaydi">-</label> &ensp;
        <input type="text" name="ngaydi" id="ngaydi" value="" class="form-control" required> &ensp;
        <button type="submit" name="button" id="search" class="btn">Tìm</button>
      </form>
    </div>
<br>
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

 <!-- <div class="col-10 offset-1"> -->

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

<!-- </div> -->
<?php
  }
}
 ?>
