
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   <script src="Nhanvien.js"></script>
    <title>Đăng nhập tài khoản nhân viên</title>
      <style media="screen">
      body{
        background-image:url(Anh_DN2.jpg)  ;
        background-size:cover;
        background-repeat: no-repeat;
        background-position: center;
      }
      .form-login{
        box-shadow: 0px 8px 9px 0px rgba(69, 69, 69, 0.25);
        margin-top: 100px;
        padding-top: 10px;

      }
      button{
        padding: 10px 38px;
        letter-spacing: 2px;
        outline: none;
        display: table;
        cursor: pointer;
        margin: auto;
      }
      h3{
      /*   */
        text-decoration: overline;
      }

      </style>
  </head>
  <body>
    <div class="container">
       <div class="row">
         <div class="col-lg-4 col-sm-4">

         </div>
         <div class="col-lg-4 col-sm-4">
           <div class="form-login border">
             <h3 class="text-center">LOGIN</h3>
             <!-- <form class="form-group" action="Nhanvien.php?d=trangchu" onsubmit="return Kiemtra();"> -->
             <form class="form-group" action="XulyDangnhap.php" id="form-dangnhap"   method="post">
                <label for="usr">Username</label>
                <input type="text" name="usr" id="usr" class="form-control" value="" required>
                <label for="pwd">Password</label>
                <input type="password" name="pwd" id="pwd" class="form-control" value="" required> <br>
                <p class="text-danger text-center" id="loi-dangnhap"></p>
                <button type="submit" name="button" data-toggle="tooltip" title="Double Click!" class="btn-dark text-white" id="submit">Login</button>
             </form>
           </div>
         </div>
         <div class="col-lg-4 col-sm-4">

         </div>
       </div>

      </div>


  </body>
</html>
<script type="text/javascript">


</script>
