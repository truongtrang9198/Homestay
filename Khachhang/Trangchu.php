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
  <body style="background-color:#fafafa;" data-spy="scroll" data-target="#nav-header">
      <!-- header -->

        <!-- Tieu de -->
        <header>
          <nav class="navbar navbar-expand-md fixed-top" id="nav-header">
            <ul class="navbar-nav mr-auto">
              <div class="title" id="title">
              <h3 class="text-left text-justify font-weight-bold">
                <span class=" align-top"><i class="fas fa-moon " style="color: yellow; font-size: 40px;"></i></span>
                <span class=" align-bottom">MOON's</span>
                <span class=" align-bottom">HOMETA<i class="fas fa-seedling"></i></span>
              </h3>
              <marquee style="width:300px; color:yellow;"> Moon's Homestay Welcome! -- 24/24</marquee>
              </div>
            </ul>

              <ul class="navbar-nav ml-auto">
                  <li class="nav-item"><a href="Trangchu.php?d=Trangchu" class="nav-link">TRANG CHỦ</a></li>
                  <li class="nav-item"><a href="Trangchu.php?d=xemphong" class="nav-link">XEM PHÒNG</a></li>
                    <li class="nav-item "><a href="Trangchu.php?d=Dulich" class="nav-link">DU LỊCH</a></li>
                    <li class="nav-item "><a href="Trangchu.php?d=datphong" class="nav-link ">ĐẶT PHÒNG</a></li>
                    <li class="nav-item "><a href="#" class="nav-link" data-toggle="modal" data-target="#hotro">HỖ TRỢ</a></li>

              </ul>
            </nav>
          </header>
            <!-- modal hotro -->
            <div class="modal fade" id="hotro">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="model-title">Hỗ trợ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="model-body">
                    <a href="https://www.google.com/maps" class="nav-link"><span class="text-info"> Bản đồ</span></a>
                    <a href="Trangchu.php?d=cocphong" class="nav-link"><span class="text-warning"> Cọc phòng</span></a>
                    <a href="mailto:moonhome@gmail.com?subject=Hotro" class="nav-link"><span class="text-warning"> Email</span></a>
                    <a href="#footer" class="nav-link"><span class="text-warning"> Thông tin</span></a>


                  </div>

                </div>
              </div>
            </div>
  <!-- noi dung chinh -->
    <div class=" ">

      <br>

        <div class="row">
          <!-- hien thi noi dung -->
          <div class="col-lg-10 offset-1">
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
                    case 'xacnhan':
                      require("Xacnhan.php");
                      break;
                    case 'xemphong':
                      require("Xemphong.php");
                    case 'Datphongs':
                      require("Datphongs.php");
                      break;
                      break;
                    case 'Trangchu':
                      require("Trangchu1.php");
                      break;
                    case 'cocphong':
                      require ("Cocphong.php");
                      break;
                    default:
                      require("Trangchu1.php");
                      break;
                  }
             ?>
             </div>
          </div>


        </div>
</div>
  <div id="footer">
    <?php
        include("Footer.php");


     ?>
  </div>


</body>

</html>
