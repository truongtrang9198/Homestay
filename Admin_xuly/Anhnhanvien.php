<?php
    include("../connect.php");
      $manv = $_POST['manv'];
      $hinhanh = $_FILES['img']['name'];
      // lay link anh cũ
      $sql = "select Hinhanh from Nhanvien where MSNV = $manv";
      $query = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($query);
    //  echo $query;
      // tao ten random cho anh de khong bi loi khi anh trung trong thu muc
      $type = explode(".",$hinhanh);
      $file_type = end($type);
      $hinhanh1 = rand().".".$file_type;
      $tmp_name = $_FILES['img']['tmp_name'];
      $path="HinhanhNV/";
      move_uploaded_file($tmp_name,$path.$hinhanh1);
      $img_url = $path.$hinhanh1;
      $sql = "update Nhanvien set Hinhanh = '$img_url' where MSNV = $manv";
      if(mysqli_query($conn,$sql)){
        // xoa anh cũ
        if($query !=''){
          // echo $row['Hinhanh'];
          unlink($row['Hinhanh']);
        }

        echo('<img src="'.$img_url.'" alt="" width="250px" height="300 px">');
        // echo "'.$img_url.'";
      }else{
        echo "Tải ảnh thất bại!";
      }
          //header("Refresh:0");
 ?>
