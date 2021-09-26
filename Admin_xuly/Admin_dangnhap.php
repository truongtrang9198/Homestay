<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="filecss1.css">
    <title>Admin Login</title>
  </head>
  <body>
    <div class="container" align="center">


    <div class="img_avatar">
      <img src="./avatar.jpg" alt="" class="avatar">
    </div>
    <h3 align="center">ADMIN LOGIN</h3>
    <div class="form_login">
      <form class="" action="testAdmin.php" method="post" >
        <div class="username">
          <span>Username   </span>
          <input type="text" name="usr" id="usr" value=""  >  <br>

        </div>
        <div class="passwd">
          <span>Password    </span>
          <input type="password" name="pwd" id="pwd" value="" >  <br>
        </div>
        <div class="sub">
          &emsp;&emsp;&emsp;&emsp;&emsp;

           <button type="reset" name="Reset">Reset</button>
          <button type="submit"  name="Login">Login</button>
        </div>

      </form>
    </div>
  </div>
  </body>
</html>
