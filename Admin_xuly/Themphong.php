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
      <div class="p-2 mb-2 text-center" style="color:#1D5B8F; ">
        <h3 class=" ">Thêm phòng </h3>
      </div>
      <!-- <form class="" action="xuly_themphong.php" method="post"> -->
        <div class="row">
          <div class="col-md-4 offset-5">
            <div class="row">
              <div class="form-group">
                <label for="loaiphong">Loại phòng</label>
                <select class="form-control" name="lp" id="lp">
                  <?php
                      include("../connect.php");
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
                <label for="tenphong">Tên phòng</label>
                <input type="text" class="form-control" name="tenphong" id="tenphong">
                <label for="gia">Giá tiền/đêm</label>
                <input type="text" class="form-control" name="gia" id="gia">
                <label for="mota">Mô tả</label>
                <input type="text" name="mota" id="mota" class="form-control" value="">
              </div>
            </div>
              <div class="row">
                <button type="button" class="btn" name="themphong" id="themphong" value="">Thêm phòng </button>&ensp;
                <button type="reset" class="btn" name="" value="Tải lại" id="reset">Tải lại</button>
              </div>
          </div>

        </div>
      <!-- </form> -->
    </div>
  </body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
     $("#themphong").click(function(){
       var loai = $("#lp").val();
       var mota = $.trim($('#mota').val());
       var ten = $.trim($("#tenphong").val());
       var gia = $.trim($("#gia").val());
       if(ten !='' && gia!=''){
         $.get("XL_themphong.php",{loaiphong:loai,tenphong:ten,mota:mota,gia:gia},function(data){
           if(data == "2"){
             alert("Thêm thành công!!");
               location.reload();
           }
         else
             alert(data);
         });
       }else {
            alert("Vui lòng nhập đầy đủ thông tin!");
       }

     });

   $("#reset").click(function(){
     location.reload();
   });
   });
</script>
