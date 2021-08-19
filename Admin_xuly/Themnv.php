

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title></title>
   <style media="screen">
     button{
       background-color: #1D5B8F !important;
       color: white !important;
     }
   </style>
  </head>
  <body>

      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="p-2 mb-2 text-center" style="color:#1D5B8F; ">
              <h2 class=" ">Thêm nhân viên </h2>
            </div>
          </div>

        </div>

        <form class="form-group" enctype="multipart/form-data" action="XL_Themnv.php" method="post" id="form_nv" >
          <div class="form-row">
            <div class="col-md-4">


              <div class="row">
                <!-- <div class="form-group"> -->
                  <label for="hoten">Họ và tên</label>
                  <input type="text" class="form-control" name="hoten" value="" id="hoten" required>
                  <label for="ngaysinh">Ngày sinh</label>
                  <input type="date" class="form-control" name="ngaysinh" id="ngaysinh" required>
                  <label for="sdt">Số điện thoại</label>
                  <input type="text" name="sdt" class="form-control" placeholder="Sđt có 10 chữ số" id="sdt" required length='10' pattern="[0]?[0-9]{10,11}">
                  <label for="sdt">Chức vụ</label>
                  <input type="text" name="chucvu" class="form-control" placeholder="" id="cv" required>
                <!-- </div> -->

              </div>
              <div class="row">
                <label class="TK">
               <a data-toggle="collapse"  href="#show" position-relative> <i class="fas fa-check-square"></i> Thêm tài khoản</a></label>
              </div>
              <div class="row">
                <div class="collapse " id="show">
                  <input type="text" name="usr" value=""   placeholder="Username" id="usr">
                  <input type="password" name="pwd" value=""   placeholder="password" id="pwd">
                </div>
              </div>
              <br>
              <div class="row">
                <button type="submit" id="submit" class="btn " name="button">Thêm Nhân Viên</button>&ensp;
                <button type="reset" id="reset" class="btn  " name="button">Tải lại</button>
              </div>

            </div>
            <div class="col-md-4 offset-1">
              <!-- <div class="form-group" enctype="multipart/form-data"> -->


              <div class="row">

                  <label for="cmnd">CMND/CCCD</label>
                  <input type="text" class="form-control" name="cmnd"  placeholder="Nhập vào CMND/CCCD ..." id="cmnd" required pattern="[0-9]{9}">

              </div>
              <div class="row" >
                <div class="form-check form-check-inline">
                  <label for="gioitinh" class="form-check-label" >Giới tính:  </label>
                </div>

                <div class="form-check form-check-inline">
                  <label class="form-check-label"> <input class="form-check-input" type="radio" name="gioitinh" id="nu" value="nữ">Nữ</label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label"><input  class="form-check-input" type="radio" name="gioitinh" id="nam" value="nam">Nam</label>
                </div>
              </div>
              <div class="row">
                <!-- <div class="form-group"> -->
                  <label for="diachi">Địa chỉ</label>
                  <input type="text" class="form-control" name="diachi" value="" id="diachi" required>

                <!-- </div> -->
              </div>
              <div class="row">
                <!-- <div class="form" enctype="multipart/form-data"> -->
                  <label for="avatar">Ảnh</label>
                  <input type="file"  class="form-control-file" name="anh" value="" id="anh">
                <!-- </div> -->

              </div>
          <!-- </div> -->
            </div>

          </div>
        </form>

      </div>

  </body>
</html>

<script type="text/javascript">
      $('form').submit(function(e){
        e.preventDefault();
        var sdt = $.trim($("#sdt").val());
        var img = $("#anh").val();
        var dd_img= img.slice(img.indexOf('.')+1,img.length);
        var d_img = dd_img.toUpperCase();
        var cmnd =  $.trim($("#cmnd").val());
        if(d_img == 'JPG' || d_img == 'GIF' || d_img == 'PNG'){
          $.post("Test_ThemNV.php",{cmnd:cmnd,sdt:sdt},function(data){
              if(data=="2"){

                $('form').unbind('submit');
                $('#submit').click();
              }else
                  alert(data);
          })
        }else{
          alert("Định dạng ảnh không hợp lệ!");
        }
      })

</script>
