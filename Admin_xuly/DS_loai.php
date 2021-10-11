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
      <span class="" style="font-size:30px; color:#1D5B8F;">Danh sách loại phòng</span>
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
        <th scope="col">Mã loại</th>
        <th scope="col">Tên loại</th>
        <th scope="col"></th>
        <th scope="col"></th>

      </tr>
    </thead>
    <tbody>
      <tr id="Sua">
        <?php
        $n = 0;
        $sql = "select * from Loaiphong";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) != 0) {
          //    $row = mysqli_fetch_array($query);
          while ($row = mysqli_fetch_array($query)) {

        ?>
            <th scope="row"> <?php echo $n ?> </th>
            <td id="ma"> <?php echo $row['Maloai']; ?> </th>
            <td id="ten"> <?php echo $row['Tenloai'] ?> </th>
            <td scope="row"> <a style="color:black;" href="Sualoai.php?id= <?php echo $row['Maloai']; ?>"> <i class="fas fa-edit"></i> </a> </td>
            <td scope="row"> <a style="color:black;" href="Xoaloai.php?id= <?php echo $row['Maloai']; ?>"> <i class="far fa-trash-alt"></i> </a> </td>

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
