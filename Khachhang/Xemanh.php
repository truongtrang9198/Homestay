<?php
    include("../connect.php");
    if(isset($_GET['d'])){
      $maphong = $_GET['d'];
      $sql = "select * from Anhphong where MSP = $maphong";
      $query = mysqli_query($conn,$sql);

    ?>
    <h1 style="text-align:center;">Bộ sưu tập</h1>

    <?php
    if(mysqli_num_rows($query) >0){
      while($row = mysqli_fetch_array($query)){

     ?>
    <div class="d-flex p-2 m-2">
      <img src="<?php echo "../Admin_xuly/".$row['Hinhphong'] ?>" alt="" width="800px" height="600px;"> <hr>
    </div>

<?php
}
}
    }
 ?>
