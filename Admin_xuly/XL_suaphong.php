
 <?php
 include ("../connect.php");
     $n = "0";
     $maphong = $_GET['ma'];
     $tenloai =$_GET['loaiphong'];
     $tphong = $_GET['tenphong'];
     $tphong = trim($tphong);
     $tphong1 = mb_strtolower($tphong, "utf8");
     $giap = $_GET['gia'];
 //    $tenloai = rtrim($tenloai, 'end');

    $sql = "select TenPhong from phong where not MSP = $maphong";
     $query = mysqli_query($conn,$sql);
     if(mysqli_num_rows($query) != 0){
   //    $row = mysqli_fetch_array($query);
       while ($row = mysqli_fetch_array($query)) {
         if($tphong1 == mb_strtolower($row['TenPhong'], "utf8")){
           echo("Tên phòng đã tồn tại!");
           $n = "1";
           die();
         }
       }
     }else {
         $n = "0";
     }



         if($n != "1"){
           $tphong =  ucfirst($tphong1);
           $sql ="call Suaphong('$maphong','$tenloai','$tphong','$giap')";
         //  mysqli_query($conn, $sql);
           if(mysqli_query($conn, $sql))
               echo("Thành công");
           else
               echo("Lỗi hệ thống");

         }

 ?>
