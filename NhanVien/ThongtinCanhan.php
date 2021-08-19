<?php
  include("../connect.php");
    if(isset($_GET['d'])){
      $usr = $_GET['d'];
      // lay masnv
  ?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <style media="screen">
      .border {
     border-width:2px !important;
}
      </style>
    </head>
    <body  >
      <div class="container border border-primary">
        <?php
            $sql = " call Thongtincanhan('$usr')";
            $query = mysqli_query($conn,$sql);
            if(mysqli_num_rows($query)!=0){

              while($row = mysqli_fetch_array($query)){
         ?>
        <div class="row">
          <div class="col-md-4">
            <div class="row">
              <div class="avatar" id="avatar">
              <img src="../Admin_xuly/<?php echo $row['Hinhanh'] ?>" alt="Err: 404!" width="250px" height="300 px" >
              </div>

            </div>

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
                  <p>Chức vụ</p>
                  <p>Địa chỉ</p>
                  <p>Tài khoản</p>
                  <p>Thời gian vào làm việc</p>
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
                <p><?php echo $row['username']; ?> </p>
                <p><?php echo $row['Ngayvaolam']; ?> </p>
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
