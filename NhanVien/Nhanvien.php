<?php

     if(isset($_GET['d'])){
       $nv = $_GET['d'];;
     }else
      {
        $nv ="";
      }


 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <div class="fluid-container">
       <?php
                include("Header_nav.php");
                switch ($nv) {
                  case 'trangchu':
                     include("trangchu.php");
                    break;
                  case 'thongtin':
                    require "ThongtinCanhan.php";
                    break;
                  default:
                    // code...
                    break;
                }




        ?>


     </div>

   </body>
 </html>
