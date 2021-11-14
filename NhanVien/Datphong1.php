<style media="screen">
  #form-search{
    margin-top: 150px !important;
    margin-left: 400px !important;

  }
  #title-search{
    margin-left: 200px !important;
  }
</style>
<script src="Thoigian.js"></script>
<div class="form-search" id="form-search">
  <p id="title-search">Nhập thời gian nhận trả phòng</p>
  <form class="form-inline" id="form-timkiem"  action="index.php?d=phongtrong" method="post">
    <label for="ngayden"> Check in </label> &ensp;
    <input type="text" name="ngayden" id="ngayden" value="" class="form-control" required> &ensp;
    <label for="ngaydi">-</label> &ensp;
    <input type="text" name="ngaydi" id="ngaydi" value="" class="form-control" required> &ensp;
    <button type="submit" name="button" id="btn-search" class="btn">Tìm</button>
  </form>
  <p class="text-success">Lấy thông tin thành công!</p>
</div>


<br>
