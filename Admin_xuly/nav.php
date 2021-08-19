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

      <style media="screen">

        header{
          background-color: #1D5B8F;
          height: 80px;
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
          opacity: 0.0 - 1.0;

        }
      </style>
    <title></title>

  </head>
  <body>
    <?php
      session_start();
     ?>
    <div class="fluid-container ">
      <header>
        <h3 class="text-center   text-justify font-weight-bold text-monospace mx-auto">
          <span class=" align-top"><i class="fas fa-moon " style="color:yellow; font-size: 40px;"></i></span>
          <span class=" align-bottom">MOON's</span>

          <span class=" align-bottom">HOMETA<i class="fas fa-seedling"></i>- Admin</span>

        </h3>
      </header>


           <nav class="navbar navbar-expand-md navdrop">
             <ul class="navbar-nav mr-auto">
               <li class="nav-item">
                 <ul class="navbar-nav mr-auto">
                   <a href="Admin.php?d=trangchu" class="nav-link">Trang chủ</a>
                 </ul>

               </li>
               <li class="nav-item">
                 <ul class="navbar-nav mr-auto">
                    <div class="dropdown">
                      <a  href="#"   class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Quản lý nhân viên</a>
                      <div class="dropdown-menu">
                        <li class="dropdown-item"> <a  class="nav-link" href="Admin.php?d=themnv">Thêm nhân viên</a> </li>
                        <div class="dropdown-divider"></div>
                        <li class="dropdown-item"> <a class="nav-link" href="Admin.php?d=dsnv">Danh sách nhân viên</a> </li>
                        <div class="dropdown-divider"></div>
                        <li class="dropdown-item"> <a class="nav-link" href="Admin.php?d=tk_nv">Tài khoản nhân viên</a> </li>
                      </div>

                    </div>
                 </ul>

               </li>
               <li>
                 <ul class="navbar-nav mr-auto">
                   <div class="dropdown">
                     <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Quản lý loại phòng</a>
                     <div class="dropdown-menu">
                       <li class="dropdown-item"> <a class="nav-link" href="Admin.php?d=themloai">Thêm loại phòng</a> </li>
                         <div class="dropdown-divider"></div>
                       <li class="dropdown-item"> <a class="nav-link" href="Admin.php?d=dsloai">Danh sách loại phòng</a> </li>
                     </div>
                   </div>
                 </ul>

               </li>
               <li>
                 <ul class="navbar-nav mr-auto">
                   <div class="dropdown">
                     <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Quản lý phòng</a>
                     <div class="dropdown-menu">
                       <li class="dropdown-item"> <a class="nav-link" href="Admin.php?d=themphong">Thêm phòng</a> </li>
                         <div class="dropdown-divider"></div>
                       <li class="dropdown-item"> <a class="nav-link" href="Admin.php?d=dsphong">Danh sách phòng</a> </li>
                                 </div>
                   </div>
                 </ul>

               </li>
             </ul>
<!-- user -->
             <ul class="navbar-nav ml-auto">
               <li class="nav-item" >
                 <div class="dropleft">
                   <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  href="#">
                     <i class="fas fa-user"></i> Admin </a>
                   <div class="dropdown-menu">
                     <a  class="dropdown-item" href="Login_Admin.php">Logout</a>
                   </div>
                 </div>
                </li>
             </ul>
           </nav>



</div>

  </body>
</html>
