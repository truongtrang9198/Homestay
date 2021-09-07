$(document).ready(function(){

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


  $('form').submit(function(event){
    event.preventDefault();
      var count = 0;
      // kiem tra chon phong
      if($('#phong').val() !=''){
        count ++;
      }else{
        $('#phong').css("border-color","red");
      }
      var ngayden = $('#ngayden').val();
      var ngaydi = $('#ngaydi').val();

      Tinhsongay(ngayden,ngaydi);
      var time_in = new Date(ngayden);
      var time_out = new Date(ngaydi);

      // kiem tra thoi gian check in check out

      var today = new Date();
      // kiem tra nam
      var year_in = time_in.getFullYear();
      var year_out = time_out.getFullYear();
      var m_in = time_in.getMonth();
      var m_out = time_out.getMonth();
      if(year_in == year_out && ((m_in < m_out) || (m_in==m_out)) && year_in==today.getFullYear() ){
          if(m_in==m_out){
            var d_in = time_in.getDate();
            var d_out = time_out.getDate();
            var songay = d_out - d_in;
            if(songay < 0){
              alert("Ngày check out không hợp lệ!");
              $('#ngaydi').css("border-color","red");
            }
          }
            count++;

      }else{
        alert("Ngày check out không hợp lệ!");
        $('#ngaydi').css("border-color","red");
        $('#ngayden').css("border-color","red");
      }

      // kiem tra ngay sinh
      var ngaysinh = $('#ngaysinh').val();
      var ns = new Date(ngaysinh);
      // var namsinh = ns.getFullYear();
      // var nam = today.getFullYear();

      var tuoi = today.getFullYear() - ns.getFullYear();
      if(tuoi > 18 && tuoi < 100){
        count++
      }else{
        alert("Bạn chưa đủ tuổi!");
        $('#ngaysinh').css("border-color","red");
      }
      // thuc hien sub submit
      if(count==3){
        let ten = $('#hoten').val();
        $.get("Khachhang_temp.php",{ten:ten},function(data){
              // alert("Click 'Đặt phòng' để hoàn thành thao tác");
              $('form').unbind('submit').submit();

        });

      }

  });
  $('#huy').click(function(){
    $(location).attr('href','Trangchu.php?d=xemphong');
  });

});
