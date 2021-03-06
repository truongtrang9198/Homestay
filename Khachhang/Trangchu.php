<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
}
if(isset($_SESSION['TenKH'])){
    $tenKH = $_SESSION['TenKH'];
  }else{
    $tenKH = "Unknown";
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="Trangchu.css">
   <script src="Khachhang.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <title>Moon's Homestay Welcome!</title>

  </head>
  <body style="background-color:#fafafa;" data-spy="scroll" data-target="#nav-header">
      <!-- header -->

        <!-- Tieu de -->
<?php
  include_once("Header.php");

 ?>

  <!-- noi dung chinh -->
<div class="fluid-container">
    <br>

          <!-- hien thi noi dung -->
          <!-- <div class="col-lg-10 offset-1"> -->
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
                    case 'dangky':
                      require("Dangky.php");
                      break;
                    case 'phongtrong':
                      require("Phongtrong.php");
                      break;
                    case 'Trangchu':
                      require("Trangchu1.php");
                      break;
                    case 'thanhtoanonline':
                      require ("Thanhtoan.php");
                      break;
                    case 'dsphongtrong':
                      require("Phongtrong.php");
                      break;
                    case 'thongtinkhach':
                      require("Thongtinkhach.php");
                      break;
                    default:
                      require("Trangchu1.php");
                      break;
                  }
             ?>

          <!-- </div> -->


        </div>
</div>
<!-- Ph???n footer -->
  <div id="footer">
    <?php
        include("Footer.php");
     ?>
  </div>
<!-- ####################### Ph???n Modal ####################################################### -->

  <!-- modal hotro -->
<div class="modal fade" id="hotro">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="model-title">H??? Tr???</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="model-body">
        <a href="https://www.google.com/maps" class="nav-link"><span class="text-dark"> B???n ?????</span></a>
        <a href="Trangchu.php?d=thanhtoanonline" class="nav-link"><span class="text-dark">Thanh to??n </span></a>
        <a href="mailto:moonhome@gmail.com?subject=Hotro" class="nav-link"><span class="text-dark"> Email</span></a>
        <a href="#footer" class="nav-link" ><span class="text-dark"> Th??ng tin</span></a>
  </div>
</div>
</div>
  </div>
<!-- k???t th??c modal hotro -->


<!-- modal t??i kho???n  -->
<div class="modal fade" id="taikhoan">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="model-title">T??i Kho???n</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="model-body">
        <a href="Trangchu.php?d=dangky" class="nav-link"><span class="text-dark">????ng k??</span></a> <!-- li??n k???t t???i form ????ng k?? -->
        <a href="Trangchu.php?d=cocphong" class="nav-link" data-toggle="modal" data-target="#formDangnhap">
            <span class="text-dark">????ng nh???p</span></a>
      </div>
    </div>
  </div>
</div>

<!-- modal qu???n l??  t??i kho???n  -->
<div class="modal fade" id="ql_taikhoan">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="model-title">Qu???n l?? t??i kho???n</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="model-body">
        <a href="Trangchu.php?d=thongtinkhach" class="nav-link"><span class="text-dark"> <?php echo $tenKH; ?> </span></a> <!-- li??n k???t t???i form ????ng k?? -->
        <a href="Dangxuat.php" class="nav-link">
            <span class="text-dark">????ng xu???t</span></a>
      </div>
    </div>
  </div>
</div>

  <!-- Tao modal form dang nhap  -->
  <div class="modal fade bd-example-modal-sm" id="formDangnhap">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">????ng Nh???p</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form_dn" name="form_dn" id="form_dn" action="Xulydangnhap.php" method="post" >
        <div class="modal-body">
            <!-- input-group sdt -->
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-tty"></i></span>
              </div>
              <input type="text" name="sdt" id="sdt" value="" class="form-control" placeholder="S??? ??i???n tho???i" required length='10' pattern="[0]?[0-9]{10,11}">
            </div>
            <br>
            <!-- input group mat khau -->
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" name="matkhau" id="matkhau" value="" class="form-control" placeholder="M???t kh???u" required>
            </div>
            <p class="text-danger" id="Thongbaodangnhap"></p>
            <!-- submit button -->
            <div class="modal-footer">
              <a href="trangchu.php?d=dangky" class="text-primary"  >????ng k??</a>
              <button type="submit" id="submit" class="btn" name="button" value="">????ng Nh???p</button>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Ket thuc form-dang nhap -->


<!-- ###############################Toast th??ng b??o####################################### -->

  <!-- Toast th??ng b??o -->
  <div class="toast" id="Hienthithongbao" data-delay="3000">
  <div class="toast-header">
    <p> <b>Hi???n th??? th??ng b??o: </b> </p>
  </div>
  <div class="toast-body text-danger" id="toast-content">

  </div>
</div>
<!-- K???t th??c Toast -->

<!-- Toast th??ng b??o l???i-->
<div class="toast" id="Thongbaoloi" data-autohide="false">
<div class="toast-header">
   <b>Hi???n th??? th??ng b??o: </b>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>

</div>
<div class="toast-body text-danger" id="toast-content-err">

</div>
</div>
<!-- K???t th??c Toast -->
</body>
</html>
