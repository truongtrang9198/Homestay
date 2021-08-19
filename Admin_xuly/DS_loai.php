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
  <h3>Danh sách loại phòng</h3>
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Mã loại</th>
        <th scope="col">Tên loại phòng</th>
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
            <th scope="row"> <a style="color:black;" href="Sualoai.php?id= <?php echo $row['Maloai']; ?>"> <i class="fas fa-edit"></i> </a> </th>
            <th scope="row" id="dete"> <a style="color:black;" href="Xoaloai.php?id= <?php echo $row['Maloai']; ?>"> <i class="fas fa-trash-alt"></i> </a> </th>
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