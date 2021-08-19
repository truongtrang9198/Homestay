<?php
include ("../connect.php");
    $n = "0";
    $tenloai = $_GET['ten'];
    $tenloai = trim($tenloai);
//    $tenloai = rtrim($tenloai, 'end');
    $tenloai1 = mb_strtolower($tenloai, "utf8");
    $sql = "select Tenloai from Loaiphong";
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query) != 0){
  //    $row = mysqli_fetch_array($query);
      while ($row = mysqli_fetch_array($query)) {
        if($tenloai1 == mb_strtolower($row['Tenloai'], "utf8")){
          echo("Tên loại phòng đã tồn tại!");
          $n = "1";
          die();
        }
      }
    }

        if($n != "1"){
          $tenloai =  ucfirst($tenloai1);
          $sql ="insert into Loaiphong(Tenloai) value('$tenloai')";
        //  mysqli_query($conn, $sql);
          if(mysqli_query($conn, $sql))
              echo("2");
          else
              echo("Lỗi hệ thống");

        }


    

?>
