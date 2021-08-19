<?php
  include("../connect.php");
  include("nav.php");
  if(isset($_GET['id'])){
      $ma =  $_GET['id'];
    //  echo $ma;

 ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title></title>
  </head>
  <body>
    <div class="container">
      <div class="p-2 mb-2 bg-primary text-white text-center">
        <h3 class=" ">Sửa phòng </h3>
      </div>
       <form class="" action="xuly_themphong.php" method="post">
        <div class="row">
          <div class="col-md-4 lg-4">
            <div class="row">
              <div class="form-group">
                <label for="loaiphong">Loại phòng</label>
                <select class="form-control" name="lp" id="lp">
                  <?php
                    //  include("../connect.php");
                      $sql = "select * from Loaiphong";
                      $query = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($query) != 0) {
                      while ($row = mysqli_fetch_array($query)) {
                   ?>
                  <option value="<?php echo $row['Tenloai']; ?>"> <?php echo $row['Tenloai']; ?> </option>
                <?php
                }
              } else {
                echo "Không truy vấn được!";
              }
                ?>
                </select>

                <label for="maloai">Mã phòng</label>
                <?php
                    $sql = "select * from Phong where MSP = '$ma'";
                    $query = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($query) != 0){
                        while ($row = mysqli_fetch_array($query)) {
                 ?>
                <input type="text" class="form-control" name="maphong" id="maloai" value=" <?php echo $ma; ?> " readonly>
                <label for="tenphong">Tên phòng</label>
                <input type="text" class="form-control" name="tenphong" id="tenphong" value="<?php echo $row['TenPhong']; ?> ">
                <label for="gia">Giá tiền/đêm</label>
                <input type="text" class="form-control" name="gia" id="gia" value="<?php echo $row['Gia']; ?>">
              <?php
                    }
                }
               ?>
              </div>
            </div>
              <div class="row">
                <input type="button" class="btn btn-primary" name="" value="Hủy" id="reset">&ensp;
                <input type="button" class="btn btn-primary" name="themphong" id="themphong" value="Lưu thay đổi">

              </div>
          </div>
          <!-- Them anh cho phong -->
            <div class="col-md-6 lg-6 offset-2">
              <a  class="nav-link" data-toggle="collapse" href="#form-themanh" >
                <span class="text-muted display-1"><i class="fas fa-camera" ></i></span>
                <br> <p class="text-muted pl-3">  Thêm ảnh</p></a>
                <div class="collapse" id="form-themanh">
                  <form class="" id="form-anh" method="post" enctype="multipart/form-data">
                  <div class="input-group">
                    <input type="text" name="maphong" id="maphong" value="<?php echo $ma; ?>" disabled> <br>
                      <input type="file" class="form-control" name="hinhphong" id="hinhphong" value="">
                      <div class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary" id="Taianh" name="button">Tải lên</button>
                      </div>
                      </form>
                  </div>
                </div>
            </div>

        </div>
        </form>
    </div>
  </body>
</html>



<script type="text/javascript">
  $(document).ready(function(){
     $("#themphong").on('click',function(){
       var loai = $("#lp").val();
       var ten = $("#tenphong").val();
       var gia = $("#gia").val();

       $.get("XL_suaphong.php",{ma:<?php echo $ma; ?>,loaiphong:loai,tenphong:ten,gia:gia},function(data){
           alert(data);
        // $(location).attr('href', 'Admin.php?d=dsphong');
       });
     });

     // nut reset
   $("#reset").click(function(){
      $(location).attr('href', 'Admin.php?d=dsphong');
   });
   // tai anh
    $('#Taianh').click(function(){
        // var formData = new FormData($('#form-anh')[0]);
        if($('#hinhphong').val() !=''){
          var hinhphong = $("#hinhphong").val();
          var hinhphong1= hinhphong.slice(hinhphong.indexOf('.')+1,hinhphong.length);
          var hinhphong1 = hinhphong1.toUpperCase();
          if(hinhphong1 == 'JPG' || hinhphong1 =='PNG'){
            var maphong = $('#maphong').attr("name");
            var fd = new FormData();
            fd.append('hinhphong',$('#hinhphong')[0].files['0']);
            fd.append('maphong','<?php echo $ma; ?>');
            $.ajax({
              url: "Taianhlen.php",
              method: 'POST',
              dataType: 'text',
              processData:false,
              contentType: false,
              data: fd,
              success: function(re){
                  //
                  alert(re);
                  $('#hinhphong').val('');
              }
            })
          }else{
            alert("Ảnh không đúng định dạng!");
          }

        }else{
          alert("Không có file!");
        }

    })


   });


</script>
<?php
} else {
    echo ("Không nhận được dữ liệu!");
}
 ?>
