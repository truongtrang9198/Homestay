 $(document).ready(function() {
   // hàm tính tuổi
   function Tinhtuoi(ngaysinh) {
     var ns = new Date(ngaysinh);
     var today = new Date();
     var tuoi = today.getFullYear() - ns.getFullYear();
     // alert(tuoi);
     return tuoi;
   }
   //  Hàm thêm nhân viên
   $('form').submit(function(e) {
     e.preventDefault();
     var ngaysinh = $('#ngaysinh').val();
     var sdt = $.trim($("#sdt").val());
     var img = $("#anh").val();
     var dd_img = img.slice(img.indexOf('.') + 1, img.length);
     var d_img = dd_img.toUpperCase();
     var cmnd = $.trim($("#cmnd").val());
     if (d_img == 'JPG' || d_img == 'GIF' || d_img == 'PNG') {
       if (Tinhtuoi(ngaysinh) > 18) {
         $.post("KT_ThemNV.php", {
           cmnd: cmnd,
           sdt: sdt
         }, function(data) {
           if (data == "2") {

             $('form').unbind('submit').submit();
           } else
             alert(data);
         });
       } else {
         $('#ngaysinh').css("border-color", "red");
       }



     } else {
       alert("Định dạng ảnh không hợp lệ!");
     }
   });

 })
