<?php

 if(isset($_GET['d'])){
      $nv = $_GET['d'];;
  }else{
      $nv ="";
  }
include("Header_nav.php");

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
<body>
  <div class="container-fluid">
    <?php
        switch ($nv) {
          case 'trangchu':
              include("trangchu.php");
            break;
          case 'thongtin':
            require "ThongtinCanhan.php";
            break;
          case 'homnay':
            include 'Homnay.php';
            break;
         case 'datphongs':
           include 'Datphongs.php';
           break;
        case 'datphong1':
           include 'Datphong1.php';
           break;
        case 'datphongs1':
          include 'Datphongs1.php';
          break;
          case 'tatca_checkin':
            include("Tatca_checkin.php");
            break;
          case 'datphong':
            include 'Datphong.php';
            break;
          case 'phongtrong':
            include 'Phongtrong.php';
            break;
          default:
            include 'Homnay.php';
            break;
          }

        ?>

    </div>
   </body>

 </html>
