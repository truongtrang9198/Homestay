<?php
  include_once("../connect.php");
  if(isset($_GET['madp'])) {
  //  $homnay = date('Y-m-d');
   $madp = $_GET['madp'];
    $sql = "call Nhanphong('$madp')";
    mysqli_query($conn,$sql);
    $sql1="select Trangthai from Datphong where MaDP='$madp'";
    if(mysqli_query($conn,$sql1)){
        $result =  mysqli_fetch_array(mysqli_query($conn,$sql1));
        if($result['Trangthai'] == 'Nhanphong')
            echo "True";
        else {
            echo "Chưa đến thời gian nhận phòng!";
        }
    }else{
      echo "Lỗi hệ thống!";
     }
  }else {
    echo "Không nhận được dữ liệu!";
  }


 ?>
