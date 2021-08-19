<?php
include ("../connect.php");
    $n = "0";
    $maloai = $_GET['ma'];
    $tenloai = $_GET['ten'];
    $tenloai = trim($tenloai);
//    $tenloai = rtrim($tenloai, 'end');
    $tenloai1 = mb_strtolower($tenloai, "utf8");
    $sql = "select Tenloai from Loaiphong where not Maloai = $maloai";
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
    }else {
        $n = "0";
    }



        if($n != "1"){
          $tenloai =  ucfirst($tenloai1);
          $sql ="update Loaiphong set Tenloai = '$tenloai' where Maloai = '$maloai'";
        //  mysqli_query($conn, $sql);
          if(mysqli_query($conn, $sql))
              echo("Thành công!");
          else
              // error_function(errno, errstr, errfile, errline, errcontext);
              echo("Lỗi hệ thống");

        }

?>
