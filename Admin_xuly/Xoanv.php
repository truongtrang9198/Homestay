<?php
include ("nav.php");
include ("../connect.php");
      if(isset($_GET['id'])) {
            $ma = $_GET['id'];


 ?>
 <script type="text/javascript">
    $(document).ready(function(){
      var result = window.confirm("Bạn muốn xóa nhân viên ra khỏi hệ thống? ");
      if(result){
          $.get("XL_Xoanv.php",{ma:<?php echo $ma; ?>},function(data){
            alert(data);
          })
}       <?php
          // header("Refresh:0; url=Admin.php?d=dsnv");
 ?>
      $(location).attr('href', 'Admin.php?d=dsnv');
    });
 </script>
 <?php
    }
  ?>
