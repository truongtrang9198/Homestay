$(document).ready(function(){
  // function tính số ngày giữa 2 thời điểm nhất định
  function Tinhsongay( d1,d2){

    var d1 = new Date(d1);
    var d2 = new Date(d2);
    var songay = 0;
    var d_thang = 31;
    if(d1.getMonth()==d2.getMonth()){
      songay = d2.getDate() - d1.getDate();
    }
    if(d1.getMonth()<d2.getMonth()){
      if(d1.getMonth() ==4|| d1.getMonth() == 6 || d1.getMonth()==9 || d1.getMonth() ==11){
          d_thang = 30;
      }
      if(d1.getMonth() ==2 ){
        if((d1.getFullYear()%400==0) || (d1.getFullYear() %4==0 && d1.getFullYear() %100 !=0 )){
          d_thang = 29;
        }else{
          d_thang = 28;
        }
      }
        songay = (d_thang - d1.getDate())  + d2.getDate();
    }
        $('#songay').val(songay);
  };

// Xử lý dữ liệu đăng ký
    $('#form_dangky').submit(function(event){
      event.preventDefault();
      var hoten = $.trim($('#hoten').val());
      var gioitinh = $("input[name='gioitinh']:checked").val();
      var cmnd = $.trim($('#cmnd').val());
      var sdt = $('#sdt_dk').val();
      var diachi = $.trim($('#diachi').val());
      var email = $.trim($('#email').val());
      var matkhau = $('#matkhau_dk').val();
      var matkhau_xc = $('#xacnhan_mk').val();
      // alert(gioitinh);
      // kiem tra ngay sinh, nếu đúng thì chuyển qua xử lý gửi lên server
      var today = new Date();
      var ngaysinh = $('#ngaysinh').val();
      var ns = new Date(ngaysinh);
      var tuoi = today.getFullYear() - ns.getFullYear();
      if(tuoi > 18 && tuoi < 100){  // kiểm tra tuổi
        $('#ngaysinh').css("border-color","black");
          if(matkhau==matkhau_xc){  // Kiểm tra mật khẩu
            $.post("Xulydangky.php",{hoten:hoten,gioitinh:gioitinh,cmnd:cmnd,sdt:sdt,diachi:diachi,
                                      email:email,matkhau:matkhau,ngaysinh:ngaysinh},function(data){
                            if(data=="True"){ // nếu đăng ký thành công chuyển qua form để đăng nhập
                                $('#formDangnhap').modal('show');
                            }else{ // ngược lại hiển thị ra lỗi
                              $('#toast-content-err').html(data);
                              $('#Thongbaoloi').toast('show');
                            }
                            // alert(data);
              });
          }else{ // trường hợp mật khẩu không chính xác
            $('#matkhau_dk').css("border-color","red");
            $('#xacnhan_mk').css("border-color","red");

          }

      }else{ // trường hơp tuổi sai
        $('#toast-content').html('Bạn chưa đủ tuổi!');
        $('#Hienthithongbao').toast('show');
        $('#ngaysinh').css("border-color","red");
      }
    })
// xu ly dang nhap modal
$('#form_dn').submit(function(e){
    e.preventDefault();
    var sdt = $('#sdt').val();
    var pwd = $('#matkhau').val();
  //alert(sdt);

    $.post("KiemtraDN.php",{sdt:sdt,pwd:pwd},function(data){
      if(data =="true"){
        $('#form_dn').unbind('submit');
        $('#submit').click();
      }
       else {
           $('#Thongbaodangnhap').html(data);
       }
    });
});

// Kiểm tra đặt Phòng
// script đặt phòng
  $(".form-datphong").submit(function(e){
    e.preventDefault();
    var makhach = $('#makhach').val();
    if(makhach ==''){
      $('#formDangnhap').modal('show');
    }else{
      $('.form-datphong').unbind('submit');
      $('.btn-datphong').click();
    }
  });

// Ajax đặt Phòng
$('#btn-datphong').click(function(){
  var makhach = $('#makhach').val();
  var maphong = $('#maphong').val();
  var ngayden = $('#Ngayden').val();
  var ngaydi = $('#Ngaydi').val();
  var sodem = $('#sodem').val();
  var thanhgia = $('#thanhgia').val();
  var trangthai = "phongdat";
  if(makhach!='' && maphong!='' && ngayden!='' && ngaydi!='' && sodem!='' && thanhgia!=''){
    // alert("ok");
    $.post("Xulydatphong.php",{makhach:makhach,maphong:maphong,ngayden:ngayden,ngaydi:ngaydi,
         sodem:sodem,thanhgia:thanhgia,trangthai:trangthai},function(data){
           if(data=="true"){
             alert("Đặt phòng thành công!")
             location.href = "Trangchu.php";
           }


           else{
             alert(data)
           }
         });
  }else{
    alert("Lỗi!");
 }
});

// code js thong tin khách hàng //////////////////////////////////////////////////////////////////
// cập nhật thông tin khách hàng
$('#form-capnhattt').submit(function(event){
  event.preventDefault();

  var makhach = $('#makhachhang').val();
  var hoten = $.trim($('#hoten').val());
  var gioitinh = $("#gioitinh").val();
  var cmnd = $.trim($('#cmnd').val());
  var sdt = $('#sdt_dk').val();
  var diachi = $.trim($('#diachi').val());
  var email = $.trim($('#email').val());

  // kiem tra ngay sinh, nếu đúng thì chuyển qua xử lý gửi lên server
  var today = new Date();
  var ngaysinh = $('#ngaysinh').val();
//  alert(ngaysinh);
  var ns = new Date(ngaysinh);
  var tuoi = today.getFullYear() - ns.getFullYear();

  if(tuoi > 18 && tuoi < 100){  // kiểm tra tuổi
    $('#ngaysinh').css("border-color","");
     // Kiểm tra mật khẩu
        $.post("Xulycapnhat.php",{makhach:makhach,hoten:hoten,gioitinh:gioitinh,cmnd:cmnd,sdt:sdt,diachi:diachi,
                                  email:email,ngaysinh:ngaysinh},function(data){
                        if(data=="True"){ // nếu đăng ký thành công chuyển qua form để đăng nhập
                            location.reload();

                        }else{ // ngược lại hiển thị ra lỗi
                          $('#toast-content-err').html(data);
                          $('#Thongbaoloi').toast('show');
                        }

          });

  }else{ // trường hơp tuổi sai
    $('#toast-content').html('Bạn chưa đủ tuổi!');
    $('#Hienthithongbao').toast('show');
    $('#ngaysinh').css("border-color","red");
  }
});

// cập nhật mật khẩu
$('#form-matkhaumoi').submit(function(event){
  event.preventDefault();
  var matkhauhientai = $.trim($('#matkhauhientai').val());
  var matkhaumoi = $.trim($('#mk_moi').val());
  var xnmatkhaumoi = $.trim($('#xnmatkhaumoi').val());
  if(matkhaumoi!=xnmatkhaumoi){
    $('#mk_moi').css("border-color","red");
    $('#xnmatkhaumoi').css("border-color","red");

  }else{
    $('#mk_moi').css("border-color","");
    $('#xnmatkhaumoi').css("border-color","");
    $.post("Capnhatmatkhau.php",{Pwd_hientai:matkhauhientai,Pwd_moi:matkhaumoi},function(data){
          if(data=="true"){
              alert("Cập nhật thành công!");
              location.reload();
          }else{
            $('#err').html(data);
          }
    });
  }
})
// Hủy cập nhật khẩu mới
  $('#huy_mkmoi').click(function(){
      $('#matkhauhientai').val('');
      $('#mk_moi').val('');
      $('#xnmatkhaumoi').val('');
      $('#modal-matkhaumoi').modal('hide');
  });

})
