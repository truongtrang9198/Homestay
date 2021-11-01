<header>
  <nav class="navbar navbar-expand-md fixed-top" id="nav-header">
    <ul class="navbar-nav mr-auto">
      <div class="title" id="title">
      <h3 class="text-left text-justify font-weight-bold">
        <span class=" align-top"><i class="fas fa-moon " style="color: yellow; font-size: 40px;"></i></span>
        <span class=" align-bottom">MOON's</span>
        <span class=" align-bottom">HOMETA<i class="fas fa-seedling"></i></span>
      </h3>
      <marquee style="width:300px; color:yellow;"> Moon's Homestay Welcome! -- 24/24</marquee>
      </div>
    </ul>


<!-- nav bar  -->
      <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="Trangchu.php?d=Trangchu" class="nav-link">TRANG CHỦ</a></li>
          <li class="nav-item"><a href="Trangchu.php?d=xemphong" class="nav-link">XEM PHÒNG</a></li>
            <li class="nav-item "><a href="Trangchu.php?d=Dulich" class="nav-link">DU LỊCH</a></li>
            <!-- <li class="nav-item "><a href="Trangchu.php?d=datphong" class="nav-link ">ĐẶT PHÒNG</a></li> -->
            <li class="nav-item "><a href="#" class="nav-link" data-toggle="modal" data-target="#hotro">HỖ TRỢ</a></li>
            <!-- kiểm tra sesson để hiển thị -->
            <?php
                if(isset($_SESSION['MSKH'])){ // session tồn tại
                  ?>
                  <li class="nav-item "><a href="#" class="nav-link" data-toggle="modal" data-target="#ql_taikhoan"><i class="fas fa-user"></i>
                  </a></li>
            <?php
              }else {
                  ?>
                  <li class="nav-item "><a href="#" class="nav-link" data-toggle="modal" data-target="#taikhoan"><i class="fas fa-user"></i>
                  </a></li>
                  <?php
                }
             ?>
      </ul>
    </nav>
  </header>
