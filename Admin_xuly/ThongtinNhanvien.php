<?php
    include("../connect.php");
    include("nav.php");
    if(isset($_GET['id'])){
        $ma =  $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="container">
      <?php
          $sql = " call ThongtinNhanvien('$ma')";
          $query = mysqli_query($conn,$sql);
          if(mysqli_num_rows($query)!=0){

            while($row = mysqli_fetch_array($query)){
       ?>
      <div class="row">
        <div class="col-md-4">
          <div class="row">
            <div class="avatar" id="avatar">
            <img src="<?php echo $row['Hinhanh']  ?> " class="text-muted"  width="250px" height="300 px" >
            </div>
          </div>
          <!-- Cap nhat hinh anh -->
            <div class="row">
              <a  href="#" id="avatar" data-toggle="modal" data-target="#change_img" class="nav-link">
                <i class="fas fa-camera-retro" style="font-size: 50px;"></i> Cập nhật ảnh </a>
            </div>
            <div class="row">
              <div class="modal" id="change_img">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title">Thêm ảnh</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                      <form class="form-group" enctype="multipart/form-data" method="post">
                        <input type="text" name="manv" id="manv" class="form-control text-muted" value=" <?php echo $ma; ?>" readonly>
                        <input type="file" name="img" class="form-control" id="img" value="" placeholder=".jpg\png" required>
                        <p class="text-danger"></p>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" id="Up" name="button">Tải lên</button>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- thong tin nhan vien -->
          </div>
        <div class="col-md-8">
          <h3>Thông tin nhân viên</h3>
          <div class="row">
            <div class="col-md-3">
              <div class="text-secondary">
                <p>Họ tên</p>
                <p>Năm sinh</p>
                <p>Giới tính</p>
                <p>CMND</p>
                <p>Số điện thoại</p>
                <p>Công việc</p>
                <p>Địa chỉ</p>
                <p>Tài khoản</p>
                <p>Thời gian vào làm việc</p>
                <p>Trạng thái</p>
                <a   class="btn btn-outline-primary" href="SuaNhanvien.php?id= <?php echo $row['MSNV']; ?>" >Sửa</a>
                <button class="btn btn-outline-primary" id="btn-xoaNV" value=" <?php echo $row['MSNV']; ?>">Xóa</button>
              </div>
            </div>
            <div class="col-md-4">
              <p><?php echo $row['Hoten_NV']; ?> </p>
              <p><?php echo $row['NgaysinhNV']; ?> </p>
              <p><?php echo $row['Gt']; ?> </p>
              <p><?php echo $row['CMND_NV']; ?> </p>
              <p><?php echo $row['SDT_NV']; ?> </p>
              <p><?php echo $row['Chucvu']; ?> </p>
              <p><?php echo $row['DiaChi_NV']; ?> </p>
              <p><?php echo $row['usr']; ?> </p>
              <p><?php echo $row['Ngayvaolam']; ?> </p>
              <p><?php echo $row['Trangthaicv']; ?> </p>

            </div>
          </div>
        </div>
      </div>

    </div>
  </body>
</html>
<?php
}
}else{
  echo ("Lỗi hệ thống!");

}

  }

 ?>
 <script type="text/javascript">
      $(document).ready(function(){
    // Xử lý thêm ảnh
        $('input').change(function(){
          var img = $('#img').val();
          var dd_img= img.slice(img.indexOf('.')+1,img.length);
          var d_img = dd_img.toUpperCase();
          if(d_img == 'JPG' || d_img == 'GIF' || d_img == 'PNG'){
            $('p').html(" ");
            $('#Up').click(function (e) {
              e.preventDefault();
              var manv = $('#manv').attr("name");
              var formData = new FormData();
              formData.append('img',$('#img')[0].files['0']);
              formData.append('manv','<?php echo $ma; ?>');
              //Post to server
              $.ajax({
                url: "Anhnhanvien.php",
                method: 'POST',
                dataType: 'text',
                processData:false,
                contentType: false,
                data: formData,
                success: function(re){
                    //
                    $('#avatar').html(re);
                    $('#img').val('');
                    location.reload();
                }
              });


        });
          }else {
            $('p').html("Ảnh không đúng định dạng!");
          }
        });
    // Hàm xoas nhan vien
      $('#btn-xoaNV').click(function(){
        var manv = $('#btn-xoaNV').val();
        var xacnhan = confirm('Xóa nhân viên ra khỏi hệ thống?');
        if(xacnhan){
          $.get("XL_Xoanv.php",{manv:manv},function(thongbao){
            alert(thongbao);
            $(location).attr('href', 'Admin.php?d=dsnv');
          })
        }
      });

});
 </script>
