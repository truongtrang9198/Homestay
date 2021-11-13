<?php
  include("../connect.php");
  if(isset($_GET['madp'])){
     $madp = $_GET['madp'];
    $sql = "update Datphong set Trangthai='Huy' where Madp='$madp' and Trangthai='phongdat'";
    mysqli_query($conn,$sql);
    $sql1 = "select Trangthai from Datphong where MaDP = '$madp'";
    $row = mysqli_fetch_array(mysqli_query($conn,$sql1));
    if($row['Trangthai']=='Huy'){
      echo "True";
    }else{
      echo "Đặt phòng không đủ điều kiện để hủy!";
    }
  }else{
    echo "Không nhận được dữ liệu!";
  }


 ?>
