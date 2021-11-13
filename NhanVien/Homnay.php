<div class="row">
<!-- hiển thị những đặt phòng sẽ check in hôm nay -->
  <div class="col-4">
  <div class="alert alert-primary" role="alert">
      <h4 class="text-center">Nhận Phòng Hôm Nay</h4>
  </div>

     <?php
      // $str = ob_get_clean();
      // lấy ngày hiện tại
      include_once("../connect.php");
      $sql = "call Checkin_homnay() ";
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
               <a href="Chitietdp.php?madp='.$row['MaDP'].'">Xem chi tiết</a>
            </div>
          </div>
          <br>';

        }
      } else { // trong trường hợp hôm nay không có check in
        echo "<div class='card'>
              <h5 class='text-center text-muted font-weight-light'> <i>Hôm nay không có khách nhận phòng!</i></h5>
              </div>
        ";
      }

       ?>
  </div>

<!-- hiển thị thông tin đặt phòng trả phòng   -->
  <div class="col-7 offset-1">
    <div class="alert alert-primary" role="alert">
        <h4 class="text-center">Trả Phòng Hôm Nay</h4>
    </div>
     <?php
      // lấy ngày hiện tại
      include("../connect.php");
      $sql = "call Checkout_homnay()";
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
              <span style="font-size:16px"><span class="text-muted">Check-in: </span>'.$row['Check_in'].'<span class="text-muted"> to </span> <span>'.$row['Check_out'].'</span>
              </span>
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
