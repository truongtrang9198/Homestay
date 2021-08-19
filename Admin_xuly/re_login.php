<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="filecss1.css">
    <title>Admin Login</title>
  </head>
  <body>
    <div class="container" align="center">



    <div class="form_login">
      <form class="" action="testAdmin.php" method="post" >
        <div class="username">
          <span>Username   </span>
          <input type="text" name="usr" id="usr" value=""  > <br>
        </div>
        <div class="passwd">
          <span>Password    </span>
          <input type="password" name="pwd" id="pwd" value="" > <br>
        </div>
        <div class="sub">
          &emsp;&emsp;&emsp;&emsp;&emsp;

           <button type="reset" name="Reset">Reset</button>
          <button type="submit" name="Login">Login</button>
        </div>

      </form>
    </div>
    <div class="alert alert-danger">
      Có vẻ tên đăng nhập hoặc mật khẩu của bạn không chính xác! Vui lòng nhập lại!
    </div>

  </div>
  </body>
</html>
