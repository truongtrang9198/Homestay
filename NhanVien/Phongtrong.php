
<?php
    if (session_status() == PHP_SESSION_NONE) {
            session_start();
    }
    $makhach ='';
    if(isset($_SESSION['MaKH']))
       $makhach = $_SESSION['MaKH'];

// Kết nối csdl, lấy giá trị ngày nhận được
  include_once("../connect.php");
  if(isset($_POST['ngayden']) && isset($_POST['ngaydi'])){
    $ngayden = $_POST['ngayden'];
    $ngaydi = $_POST['ngaydi'];

// Case 1: dùng procedure mysql để kiểm tra
    // chuyển ngày về dạng YYYY-MM-DD cho phù hợp với định dạng ngày trong mysql
    $ngayden_1 = date("Y-m-d",strtotime($ngayden));
    $ngaydi_1 = date("Y-m-d",strtotime($ngaydi));
    // gọi procedure kiểm tra, lấy ra danh sách mã phòng trống

    $sql = "call DSphongtrong(?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $ngayden_1,$ngaydi_1);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {

        $maphong=$row['MSP'];

?>

<!-- Tạo 1 div lưu trữ thông tin của 1 phòng -->


      <div class="jumbotron" style="padding-top:5px;padding-bottom:5px;">
      <div class="d-flex flex-row">
<?php // lấy ra ảnh của phòng
      include("../connect.php");
      $sql = "select * from Anhphong where MSP = '$maphong' LIMIT 1";
      // echo ("abc");
      if (mysqli_query($conn,$sql)){
      $url = mysqli_fetch_array(mysqli_query($conn,$sql));
      // echo $url['Hinhphong'];
?>
<!-- Hiện ảnh lên trang web -->
<div class="p-2 my-2"  >
  <img src="<?php echo "../Admin_xuly/".$url['Hinhphong'] ?>" alt="" width="600px" height="400px;">

</div>

<?php
      }else{
        echo "Không thực hiện được truy vấn!";
      }
//  truy vấn thông tin phòng
    include("../connect.php");
    $sql = "select MSP,TenPhong,Gia,Mota,Tenloai from Phong,Loaiphong where Phong.Maloai = Loaiphong.Maloai and MSP = '$maphong'";
    if(mysqli_query($conn,$sql)){
      $row=mysqli_fetch_array(mysqli_query($conn,$sql));
      ob_start();
  ?>
    <!-- Hiển thị thông tin phòng  -->
    <div class="p-3 my-4">
        <!-- <div class="jumbotron" style="height:400px;"> -->
       <span class="text-muted">MSP: {MSP}</span> <br>
      <span class="text-muted">Loại: {Tenloai}</span>
      <p class="font-weight-bold">Phòng:{Tenphong} </p>
       <span class="font-weight-bold">Mô tả: </span> <br>
      <span>{Mota}</span><br>
      <span class="text-danger">{Gia} VND</span> <br>
<!-- Điều hướng đặt phòng -->
<?php
    if($makhach!=''){
      echo '<form class="form-datphong" action="index.php?d=datphongs1" method="post">';

    }else{
        echo '<form class="form-datphong" action="index.php?d=datphongs" method="post">';
    }
 ?>
        <!--  -->
        <!-- tạo 1 input lưu trữ mã khách dưới dạng ẩn -->
        <input type="text" name="ngaydi" value="<?php echo $ngaydi; ?>" hidden>
        <input type="text" name="ngayden" value="<?php echo $ngayden; ?>" hidden>
        <input type="text" name="maphong" value="{MSP}" hidden>
        <button type="submit" class="btn btn-info btn-datphong"  name="button">Đặt phòng</button>
        <!-- <button type="submit" class="btn btn-info btn-datphong"  name="button">Đặt phòng</button> -->

      </form>

    <!-- </div> -->
    </div>
  <?php
    $s = ob_get_clean();
    $s = str_replace("{MSP}",$row['MSP'],$s);
    $s = str_replace("{Tenloai}",$row['Tenloai'],$s);
    $s = str_replace("{Tenphong}",$row['TenPhong'],$s);
    $s = str_replace("{Mota}",$row['Mota'],$s);
    $s = str_replace("{Gia}",number_format($row['Gia']),$s);
    echo $s;
}else{
  echo "Lỗi truy vấn!";
}

 ?>
</div>
</div>
<?php
}
  echo"<p class='text-center text-muted'>Không còn phòng để hiển thị!</p>";


}    ?>
<input type="text" name="makhach" id="makhach" value="<?php echo $makhach; ?>" hidden>
