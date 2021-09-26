
<?php
require("../connect.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>

  </style>
</head>

<body>

  <nav class="navbar navbar-expand-md ">
    <ul class="navbar-nav mr-auto">
      <span class="" style="font-size:30px; color:#1D5B8F;">Danh sách nhân viên</span>
    </ul>
    <ul class="navbar-nav ml-auto">
      <form class="form-inline" action="#" method="get">
        <input type="text" class="form-control mr-sm-2" id="Timkiem" name="" value="" placeholder="Search ...">
        <button type="submit" class="btn btn-primary" name="button"><i class="fas fa-search"></i> </button>
      </form>
    </ul>
  </nav>

  <table class="table table-striped table-hover" id="table">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">MSNV</th>
        <th scope="col">Họ tên</th>
        <th scope="col">Năm sinh</th>
        <th scope="col">Giới tính</th>
        <th scope="col">CMND</th>
        <th scope="col">SDT</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Công việc</th>
        <th scope="col">Trạng thái</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php
        $n = 0;
        $sql = "select * from Nhanvien";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) != 0) {
          //    $row = mysqli_fetch_array($query);
          while ($row = mysqli_fetch_array($query)) {

        ?>
            <th scope="row"> <?php echo $n ?> </th>
            <td id="ma"> <?php echo $row['MSNV']; ?> </td>
            <td id="hoten"> <?php echo $row['Hoten_NV'] ?> </td>
            <td id="ngaysinh"><?php echo $row['NgaysinhNV']; ?></td>
            <td id="gioitinh"><?php echo $row['Gt']; ?></td>
            <td id="cmnd"> <?php echo $row['CMND_NV']; ?> </td>
            <td id="sdt"> <?php echo $row['SDT_NV']; ?></td>
            <td id="diachi"> <?php echo $row['DiaChi_NV']; ?></td>
            <td id="congviec "> <?php echo $row['Chucvu']; ?></td>
            <td id="trangthai "> <?php echo $row['Trangthaicv']; ?></td>

            <td> <a style="color:black;" href="ThongtinNhanvien.php?id= <?php echo $row['MSNV']; ?>">
               <i class="fas fa-edit"></i> </a> </td>
            <td> <a style="color:black;" href="XoaNV.php?id= <?php echo $row['MSNV']; ?>" >
                  <i class="far fa-trash-alt"></i>
               </a> </td>
      </tr>
  <?php
            $n = $n + 1;
          }
        }
  ?>
    </tbody>
  </table>

</body>

</html>
<script type="text/javascript">
  $(document).ready(function() {
    //  tìm kiếm nv
    $('#Timkiem').on('keyup', function(event) {
      event.preventDefault();
      var key = $('#Timkiem').val().toLowerCase();
      $('#table tr').filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(key) > -1);
      });
    });

  })
</script>
