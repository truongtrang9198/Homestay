<?php

  if(isset($_GET['id'])){
    $maloai = $_GET['id'];

  }else{
    $maloai='';
  }
 ?>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>

// xóa nhân viên
window.onload = function(){
  var maloai = <?php echo $maloai ?>;
  var xacnhan = confirm('Xóa loại phòng ra khỏi hệ thống?');
  if(xacnhan){
    $.get("Xulyxoaloai.php",{maloai:maloai},function(thongbao){
      alert(thongbao);

    })
  }
  $(location).attr('href', 'Admin.php?d=dsloai');
};

</script>
