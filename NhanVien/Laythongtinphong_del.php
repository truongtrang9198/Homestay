<?php
  include("../connect.php");
  if(isset($_GET['maphong'])){
    $maphong = $_GET['maphong'];
    $ngayden = $_GET['ngayden'];
    $ngaydi = $_GET['ngaydi'];
    ob_start();
  ?>


  <?php
      $s= ob_get_clean();
      $ngayden_1 = date("Y-m-d",strtotime($ngayden));
      $ngaydi_1 = date("Y-m-d",strtotime($ngaydi));
      $s = str_replace("{Ngayden}",$ngayden,$s);
      $s = str_replace("{Ngaydi}",$ngaydi,$s);
      $sql = "call Phongdat(?,?,?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("sss",$maphong,$ngayden_1,$ngaydi_1);
      $stmt->execute();
      $result = $stmt->get_result();
      while ($row = $result->fetch_assoc()) {
        $s = str_replace("{MSP}",$maphong,$s);
        $s = str_replace("{Tenphong}",$row['TenPhong'],$s);
        $s = str_replace("{Soluong}",$row['songay'],$s);
        $s = str_replace("{Mota}",$row['Mota'],$s);
        $s = str_replace("{Gia}",number_format($row['Gia']),$s);
        $s = str_replace("{Thanhgia1}",number_format($row['Gia']*$row['songay']),$s);
        $s = str_replace("{Thanhgia}",$row['Gia']*$row['songay'],$s);

    }
      echo $s;
  }else{
          echo "Không nhận được dữ liệu!";
        }



 ?>
