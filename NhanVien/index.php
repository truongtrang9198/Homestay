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
        include("Morong.php");
        switch ($nv) {
          case 'trangchu':
              include("trangchu.php");
            break;
          case 'thongtin':
            require "ThongtinCanhan.php";
            break;
          case 'lichphong':
            require "Lichphong.php";
            break;
          case 'homnay':
            include 'Homnay.php';
            break;
          case 'tatca_checkin':
            include("Tatca_checkin.php");
            break;
          case 'tt_phong':
            include 'Tinhtrangphong.php';
            break;
          default:
            include 'Homnay.php';
          }

        ?>
    
    </div>
   </body>

 </html>
