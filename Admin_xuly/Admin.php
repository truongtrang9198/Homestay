<?php
      include("nav.php");
     if(isset($_GET['d'])){
       $choose = $_GET['d'];;
     }else
      {
        $choose ="";
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
      //   require "Trangchu.php";
         if(isset($_GET['d'])){
           switch($choose){
             case 'trangchu':
               require "Trangchu.php";
               break;
             case 'themnv':
                 require "Themnv.php";
                 break;
             case 'dsnv':
                require "DS_nv.php";
                break;
            case 'themphong':
                require "Themphong.php";
                break;
            case 'dsphong':
                require "DS_phong.php";
                break;
            case 'thongke':
                require "Thongke.php";
                break;
            case 'themloai':
                require "Themloaiphong.php";
                break;
            case 'dsloai':
                require "DS_loai.php";
                break;
            case '':
                require "Trangchu.php";
                break;
            case 'tk_nv':
                  require "TaikhoanNhanvien.php";
                  break;
            default:
                require "Trangchu.php";

           }
         }


          ?>

     </div>
   </body>
 </html>
