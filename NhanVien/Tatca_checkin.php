<div class="row">
  <div class="col-4">
    <div class="alert alert-primary" role="alert">
        <h4 class="text-center">Tất cả đặt phòng</h4>
    </div>
    <!-- <form class="" action="index.html" method="post">
      <input type="text" name="" value="">
      <button type="button" name="button">Tìm</button>
    </form> -->
     <?php
      // lấy ngày hiện tại
      include("../connect.php");
      $sql = "call Tatca_checkin() ";
      $query = mysqli_query($conn,$sql);
      if(mysqli_num_rows($query)>0){
        while ($row=mysqli_fetch_array($query)){
          echo '
          <div class="card">
            <h4><i class="fas fa-tasks"></i></h4>
            <div class="card-body">
               <h6><span class="text-muted">MaDP: </span>'.$row['MaDP'].'</h6>
               <h6><span class="text-muted">Khách: </span>'.$row['HoTenKhach'].'</h6>
               <h6><span class="text-muted">Phòng: </span> <span>'.$row['TenPhong'].'</span></h6>
               <h6><span class="text-muted">Check-in: </span>'.$row['date'].'<span class="text-muted"> to </span> <span>'.$row['Check_out'].'</span>
               </h6>
               <a href="Chitietdp.php?madp='.$row['MaDP'].'">Xem chi tiết</a>
            </div>
          </div>
          <br>';
        }
      } else { // trong trường hợp hôm nay không có check in
        echo "<div class='card'>
              <h5 class='text-center text-muted font-weight-light'> <i>Danh sách rỗng!</i></h5>
              </div>
        ";
      }

       ?>

  </div>

  <!-- Tất cả nhận phòng -->
  <div class="col-4 offset-1">
    <div class="alert alert-primary" role="alert">
        <h4 class="text-center">Danh sách nhận phòng</h4>
    </div>
     <?php
      // lấy ngày hiện tại
      include("../connect.php");
      $sql = "select Datphong.MaDP,Khachhang.HoTenKhach,Phong.TenPhong,Check_in,Check_out,Trangthai from Datphong,Khachhang,Phong where Datphong.MSP=Phong.MSP and Khachhang.MSKH=Datphong.MSKH
                       and Trangthai='Nhanphong'";
      $query = mysqli_query($conn,$sql);
      if(mysqli_num_rows($query)>0){
        while ($row=mysqli_fetch_array($query)){
          echo '
          <div class="card">
            <h4><i class="fas fa-tasks"></i></h4>
            <div class="card-body">
               <h6><span class="text-muted">MaDP: </span>'.$row['MaDP'].'</h6>
               <h6><span class="text-muted">Khách: </span>'.$row['HoTenKhach'].'</h6>
               <h6><span class="text-muted">Phòng: </span> <span>'.$row['TenPhong'].'</span></h6>
               <h6><span class="text-muted">Check-in: </span>'.$row['Check_in'].'<span class="text-muted"> to </span> <span>'.$row['Check_out'].'</span>
               </h6>
               &emsp;<a href="Hoadon.php?madp='.$row['MaDP'].'" class="btn" role="button">Trả Phòng</a>

            </div>
          </div>
          <br>';
        }
      } else { // trong trường hợp hôm nay không có check in
        echo "<div class='card'>
              <h5 class='text-center text-muted font-weight-light'> <i>Danh sách rỗng!</i></h5>
              </div>
        ";
      }

       ?>

  </div>
</div>
