<?php
include("../connect.php");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>

</head>

<body>
  <nav class="navbar navbar-expand-md ">
    <ul class="navbar-nav mr-auto">
      <span class="" style="font-size:30px; color:#1D5B8F;">Danh sách phòng</span>
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
        <th scope="col">Mã phòng</th>
        <th scope="col">Tên phòng</th>
        <th scope="col">Giá/đêm</th>
        <th scope="col">Loại phòng</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <tr id="Sua">
        <?php
        $n = 0;
        $sql = "call DSPhong()";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) != 0) {
          //    $row = mysqli_fetch_array($query);
          while ($row = mysqli_fetch_array($query)) {

        ?>
            <th scope="row"> <?php echo $n ?> </th>
            <td id="ma"> <?php echo $row['MSP']; ?> </th>
            <td id="ten"> <?php echo $row['TenPhong'] ?> </th>
            <td id="gia"><?php echo $row['Gia']; ?></th>
            <td id="tenloai"><?php echo $row['TenLoai']; ?></th>
            <th scope="row"> <a style="color:black;" href="Suaphong.php?id= <?php echo $row['MSP']; ?>"> <i class="fas fa-edit"></i> </a> </th>
            <th scope="row" id="dete"> <a style="color:black;" href="Xoaphong.php?id= <?php echo $row['MSP']; ?>"> <i class="fas fa-trash-alt"></i> </a> </th>
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
