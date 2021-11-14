<?php
    if(isset($_GET['ngayden']) && isset($_GET['ngaydi'])){
       $ngayden = $_GET['ngayden'];
       $ngaydi = $_GET['ngaydi'];
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
         <a href="Xemanh.php?d={MSP}" class="text-info"><i class="fas fa-images"></i> Xem thêm ảnh</a>
         <form class="form-datphong" action="Trangchu.php?d=datphong" method="post">
           <!--  -->
           <!-- tạo 1 input lưu trữ mã khách dưới dạng ẩn -->
           <input type="text" name="ngaydi" value="<?php echo $ngaydi; ?>" hidden>
           <input type="text" name="ngayden" value="<?php echo $ngayden; ?>" hidden>
           <input type="text" name="maphong" value="{MSP}" hidden>
           <button type="submit" class="btn btn-info btn-datphong"  name="button">Đặt phòng</button>
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
   <?php
   }
     echo"<p class='text-center text-muted'>Không còn phòng để hiển thị!</p>";


   }
    }



 ?>
