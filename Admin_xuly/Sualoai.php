<?php
include ("nav.php");
include ("../connect.php");
      if(isset($_GET['id'])) {
            $ma = $_GET['id'];

 ?>

  <body>
    <div class="container">
      <div class="p-2 mb-2 bg-primary text-white text-center">
        <h3 class=" ">Sửa loại phòng </h3>
      </div>
      <form class="" action="#" method="post">
        <div class="row">
          <div class="col-md-4">
            <div class="row">
              <div class="form-group">
                <label for="maloai">Mã loại phòng</label>
                <input type="text" class="form-control" name="maloai" id="maloai" value=" <?php echo $ma; ?> " readonly>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <label for="tenloai">Tên loại phòng</label>
                <?php
                    $sql = "select Tenloai from Loaiphong where Maloai = '$ma'";
                    $query = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($query) != 0){
                        while ($row = mysqli_fetch_array($query)) {
                 ?>
                <input type="text" class="form-control" name="tenloai" id="tenloai" value=" <?php echo $row['Tenloai']; ?> " >
                <?php
                  }
                    }
                 ?>
              </div>
            </div>
              <div class="row">
                <input type="button" class="btn btn-primary" id="them" name="themploai" value="Lưu thay đổi">&ensp;
                <input type="button" class="btn btn-primary" name="" value="Hủy bỏ" id="re">
              </div>
          </div>

        </div>
      </form>

      <?php

    }
       ?>
      <p id="notice"></p>
      <!--div class="collapse" id="annd"-->
      <script type="text/javascript">
        $(document).ready(function(){
         $("#tenloai").keydown(function(event){
           if(event.which === 13) {
             event.preventDefault();
             $("#them").click();
           }
         });
         $("#them").click(function(){
             var ma = <?php echo $ma; ?>;
             var ten = $("#tenloai").val();
          //   alert(ten);
             $.get("Xl_sualoai.php",{ma:ma,ten:ten},function(data){
                  alert(data);
         });

       });
       $("#re").click(function(){
         $(location).attr('href', 'Admin.php?d=dsloai');
       })
       });
      </script>


  </body>
</html>
