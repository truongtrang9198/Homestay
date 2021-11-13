<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
}
?>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Nhanvien.css">
    <title>Trang chủ nhân viên</title>
  </head>

    <div class="fluid-container">

      <header>
        <h3 class="text-center   text-justify font-weight-bold text-monospace mx-auto">
          <span class=" align-top"><i class="fas fa-moon " style="color: yellow; font-size: 40px;"></i></span>
          <span class=" align-bottom">MOON's</span>

          <span class=" align-bottom">HOMETA<i class="fas fa-seedling"></i>-Nhân viên</span>

        </h3>
      </header>
      <div class="navdrop">
      <nav class="navbar navbar-expand-md ">
          <a class="nav-link navbar-brand" href="index.php?d=trangchu"><i class="fas fa-moon " style="color: yellow;"></i> </a>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"> <a class="nav-link" href="index.php?d=lichphong">Lịch đặt phòng</a> </li>
          <li class="nav-item"><a class="nav-link" href="https://thanhnien.vn/">Tin tức</a> </li>
          <li class="nav-item"><a class="nav-link" href="https://www.google.com/maps">Bản đồ</a> </li>
          <li class="nav-item"><a class="nav-link" href="index.php?d=hotroKH" >Hỗ trợ khách hàng </a> </li>

        </ul>
        <!-- Tao dropdown menu thong tin nhan vien -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item" >
            <div class="dropleft">
              <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  href="#">
                <i class="fas fa-user"></i>

             <?php
               if(isset($_SESSION['username'])&& $_SESSION['username']){
                 $usr = $_SESSION['username'];
                 echo "".$_SESSION['username']."";;
               }else
                 echo "User";
              ?> </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php?d=thongtin">Thông tin cá nhân</a>
                <!-- Tạo hàng ngang ở giữa -->
                <div class="dropdown-divider"></div>
                <a  class="dropdown-item" href="Dangxuat.php">Đăng xuất</a>
              </div>
            </div>
           </li>
        </ul>
      </nav>
</div>

    </div>

    <!-- Toast thông báo lỗi-->
    <div class="toast" id="Thongbaoloi" data-autohide="false">
    <div class="toast-header">
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
      <b>Hiển thị thông báo: </b>
    </div>
    <div class="toast-body text-danger" id="toast-content-err">

    </div>
    </div>
