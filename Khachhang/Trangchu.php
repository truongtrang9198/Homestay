<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <!-- FIle chinh css thu cong -->
   <link rel="stylesheet" href="Trangchu.css">
   <title>Moon's Homestay Welcome!</title>

  </head>
  <body style="background-color:#fafafa;">
    <div class="fluid-container">
      <!-- header -->
      <header>
        <!-- Tieu de -->
        <h3 class="text-left text-justify font-weight-bold">
          <span class=" align-top"><i class="fas fa-moon " style="color: yellow; font-size: 40px;"></i></span>
          <span class=" align-bottom">MOON's</span>
          <span class=" align-bottom">HOMETA<i class="fas fa-seedling"></i></span>
        </h3>

            <marquee style="width:300px; color:yellow;"> Moon's Homestay Welcome! </marquee>


        <!-- Thanh tiem kiem -->
        <div class="form-search">
            <form class="form-inline" action="#" method="post">
              <div class="input-group mb-3">
                <input type="search" name="Tiemkiem" id="Tiemkiem" class="form-control"  placeholder="..." value="">
                <div class="input-group-append">
                  <button type="button" class="btn btn-outline-light" name="button"><i class="fas fa-search" style="color:white; font-size:20px;"></i></button>
                </div>
              </div>
          </form>
        </div>
      </header>
      <!-- noi dung chinh -->
      <div class="body">
        <div class="row">
          <!-- hien thi noi dung -->
          <div class="col-lg-10">
            <div class="noidunght">


            <?php
                if(isset($_GET['d'])){
                  $Noidung = $_GET['d'];
                }else {
                  $Noidung ='';
                }
                  switch ($Noidung) {
                    case 'Dulich':
                      require("Dulich.php");
                      break;
                    case 'Noidung':
                      require("Noidung.php");
                      break;
                    case 'datphong':
                      require("Datphong.php");
                      break;
                    default:
                      require("Trangchu1.php");
                      break;
                  }
             ?>
             </div>
          </div>
          <!-- Hien thi navbar -->
          <!-- <div class="col-lg-1"></div> -->
          <div class="col-lg-2">
              <nav class="navbar ">
                <ul class="navbar-nav">
                  <div class="dropleft">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <i class="fas fa-bars" style="font-size:50px;"></i>
                    </a>
                    <div class="dropdown-menu">
                      <li class="dropdown-item"><a href="Trangchu.php?d=Trangchu" class="nav-link ">Trang chủ</a></li>
                      <div class="dropdown-divider"></div>
                      <li class="dropdown-item"><a href="Trangchu.php?d=Dulich" class="nav-link">Du lịch</a></li>
                      <div class="dropdown-divider"></div>
                      <li class="dropdown-item"><a href="Trangchu.php?d=datphong" class="nav-link">Đặt phòng</a></li>
                      <div class="dropdown-divider"></div>
                      <li class="dropdown-item"><a href="https://www.google.com/" class="nav-link">Chỉ đường</a> </li>
                    </div>
                  </div>
                </ul>
              </nav>

          </div>
        </div>
      </div>
      <!-- footer -->
      <footer>

        <p>Mọi thông tin chi tiết xin vui lòng liên hệ: </p>
        <p><i class="fas fa-home"></i> Moon's Homestay Khu II, đường 3/2, P.Xuân Khánh, Q.Ninh Kiều, TP.Cần Thơ</p>
        <p><i class="fas fa-mobile-alt"></i> 0949760662</p>
        <p><i class="fas fa-envelope"></i> Moonhomestay@gmail.com</p>
        <p><i class="fab fa-facebook-square"></i> Moon's Homestay</p>

        <p id="loiket">Moon's Homestay rất vui được phục vụ quý khách!</p>


      </footer>
    </div>
  </body>
</html>
