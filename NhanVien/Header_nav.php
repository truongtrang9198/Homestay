<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <title>Trang chủ nhân viên</title>
    <style media="screen">
      header{
        height: 80px;
        width: inherit;
        background-color: #1D5B8F;
        color: white;
        border: 1px black;
        padding: 5px;
      }
      header >h3{
        padding-top: 12px;
      }
      .navdrop{
        /* background-color: #1D5B8F !important; */
        box-shadow: 0px 8px 9px 0px rgba(69, 69, 69, 0.25);
        /* margin-top: 100px;
        padding-top: 10px; */
        /* opacity: 0.0 - 1.0; */

      }

    </style>
  </head>
  <body>
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
          <a class="nav-link navbar-brand" href="Nhanvien.php?d=trangchu"><i class="fas fa-moon " style="color: yellow;"></i> </a>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"> <a class="nav-link" href="Nhanvien.php?d=lichphong">Lịch đặt phòng</a> </li>
          <li class="nav-item"><a class="nav-link" href="https://thanhnien.vn/">Tin tức</a> </li>
          <li class="nav-item"><a class="nav-link" href="https://www.google.com/maps">Bản đồ</a> </li>
          <li class="nav-item"><a class="nav-link" href="Nhanvien.php?d=hotroKH" >Hỗ trợ khách hàng </a> </li>
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
                <a class="dropdown-item" href="ThongtinCanhan.php?d=<?php echo $usr; ?>">Thông tin cá nhân</a>
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
  </body>
</html>
