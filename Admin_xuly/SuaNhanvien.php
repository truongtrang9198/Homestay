
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
               <h2 class=" ">Sửa thông tin </h2>
             </div>
           </div>

         </div>

         <form class="form-group" enctype="multipart/form-data" action="XL_Themnv.php" method="post" id="form_nv" >
           <div class="form-row">
             <div class="col-md-4">
               <div class="row">
                 <!-- <div class="form-group"> -->
                 <?php
                      $sql = "select * from Nhanvien where MSNV = $ma";
                      $query = mysqli_query($conn,$sql);
                      if(mysqli_num_rows($query)!=0){
                        $row = mysqli_fetch_array($query);


                  ?>
                   <label for="hoten">Họ và tên</label>
                   <input type="text" class="form-control" name="hoten" value="<?php echo $row['Hoten_NV']; ?> " id="hoten" required>
                   <label for="ngaysinh">Ngày sinh</label>
                   <input type="date" class="form-control" name="ngaysinh" id="ngaysinh" value="<?php echo $row['NgaysinhNV']; ?> " required>
                   <label for="sdt">Số điện thoại</label>
                   <input type="text" name="sdt" class="form-control" placeholder="Sđt có 10 chữ số" id="sdt" required length='10' pattern="[0]?[0-9]{10,11}" value="<?php echo $row['SDT_NV']; ?>">
                   <label for="sdt">Chức vụ</label>
                   <input type="text" name="chucvu" class="form-control" placeholder="" id="cv" value="<?php echo $row['Chucvu']; ?>" required>
                 <!-- </div> -->

               </div>

               <br>
               <div class="row">
                 <button type="submit" id="submit" class="btn " name="button">Lưu thay đổi</button>&ensp;
                 <button type="button" id="reset" class="btn  " name="button">Hủy</button>
               </div>

             </div>
             <div class="col-md-4 offset-1">
               <!-- <div class="form-group" enctype="multipart/form-data"> -->


               <div class="row">

                   <label for="cmnd">CMND/CCCD</label>
                   <input type="text" class="form-control" name="cmnd"  placeholder="Nhập vào CMND/CCCD ..." id="cmnd" required pattern="[0-9]{9}" value="<?php echo $row['CMND_NV']; ?>">

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
                   <input type="text" class="form-control" name="diachi"   id="diachi"  required value="<?php echo $row['DiaChi_NV']; ?>">

                 <!-- </div> -->
               </div>

           <!-- </div> -->
             </div>

           </div>
         </form>

       </div>

   </body>
 </html>
 <?php
}
}

  ?>

 <script type="text/javascript">
      $(document).ready(function(){
        $('form').submit(function(e){
         e.preventDefault();
         var manv = <?php echo $ma; ?>;
         var hoten = $.trim($('#hoten').val());
         var ngaysinh = $('#ngaysinh').val();
         var diachi = $.trim($('#diachi').val());
         var chucvu =$.trim($('#chucvu').val());
         var gioitinh = $('input[name="gioitinh"]:checked').val();
         var sdt = $.trim($("#sdt").val());
         var cmnd =  $.trim($("#cmnd").val());

           $.post("Xl_SuaNV.php",{manv:manv,hoten:hoten,ngaysinh:ngaysinh,diachi:diachi,
                    chucvu:chucvu,gioitinh:gioitinh,sdt:sdt,cmnd:cmnd},function(data){
                   alert(data);
           })

       });
      $('#reset').click(function(){
        $(location).attr('href','ThongtinNhanvien.php?id=<?php echo $ma;?>');
      })
      })


 </script>
