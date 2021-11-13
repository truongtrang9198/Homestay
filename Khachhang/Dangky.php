<?php
include_once("../connect.php");

 ?>

<div class="container">
  <div class="row">


    <div class="col-md-4 offset-4">
      <h3>Đăng ký thành viên</h3>
      <form class="form-group" id="form_dangky" action="Trangchu.php?d=xacnhan" method="post">

        <label for="hoten">Họ tên</label>
        <input type="text" name="hoten" class="form-control" id="hoten" value="" required>
        <label for="ngaysinh">Ngày sinh</label>
        <input type="date" name="ngaysinh" id="ngaysinh" value="" class="form-control" required>
          <!-- gioi tinh -->
          <div class="form-check form-check-inline">
            <label for="gioitinh" class="form-check-label" >Giới tính:  </label>
          </div>

          <div class="form-check form-check-inline">
            <label class="form-check-label"> <input class="form-check-input" type="radio" name="gioitinh" id="nu" value="nữ">Nữ</label>
          </div>
          <div class="form-check form-check-inline">
              <label class="form-check-label"><input  class="form-check-input" type="radio" name="gioitinh" id="nam" value="nam">Nam</label>
          </div>
          <!--  -->
          <br>
          <label for="cmnd">CMND</label>
          <input type="text" name="cmnd" id="cmnd" class="form-control" value="" required pattern="[0-9]{9}">
          <label for="sdt">Số điện thoại</label>
          <input type="text" name="sdt" id="sdt_dk" class="form-control" value="" required length='10' pattern="[0]?[0-9]{10,11}">
          <label for="diachi">Địa chỉ</label>
          <input type="text" name="diachi" id="diachi" class="form-control"value="" required>
          <label for="email">Email</label>
          <input type="mail" name="email" id="email" class="form-control" value="">
          <label for="matkhau_dk">Mật khẩu</label>
          <input type="password" name="matkhau_dk" id="matkhau_dk" value="" maxlength="10" class="form-control" required>
          <label for="xacnhan_mk">Xác nhận mật khẩu</label>
          <input type="password" name="xacnhan_mk" id="xacnhan_mk" value="" class="form-control" required>
          <br>
          <div class="row" id="button">
          &ensp;&ensp;  <button type="button" name="huy" class="btn1 btn btn-primary" id="huy">Hủy</button> &ensp;
            <button type="submit" name="tieptuc" class="btn1 btn btn-primary" id="tieptuc">Đăng Ký</button>
          </div>
      </form>
    </div>

  </div>

</div>
