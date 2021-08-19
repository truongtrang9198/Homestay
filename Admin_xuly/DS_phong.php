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
 