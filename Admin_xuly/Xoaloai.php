<?php
include ("nav.php");
include ("../connect.php");
      if(isset($_GET['id'])) {
            $ma = $_GET['id'];


 ?>
 <script type="text/javascript">
      <?php
      $sql = "select Tenloai from Loaiphong where Maloai = '$ma'";
      $query = mysqli_query($conn,$sql);
      if(mysqli_num_rows($query) != 0){
          while ($row = mysqli_fetch_array($query)) {

       ?>
      var result = window.confirm("Bạn muốn xóa '<?php echo $row['Tenloai']; ?>' ra khỏi hệ thống? ");
    <?php
          }
      }
     ?>
      if(result){

              $.get("XL_Xoaloai.php",{ma:<?php echo $ma; ?>},function(data){
                alert(data);

              });
}
        $(location).attr('href', 'Admin.php?d=dsloai');
 </script>
 <?php
    }
  ?>
