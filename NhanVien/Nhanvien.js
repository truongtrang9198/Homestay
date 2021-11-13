$(document).ready(function(){
  $('#form-dangnhap').submit(function(e){
      e.preventDefault();
      var usr = $('#usr').val();
      var pwd = $('#pwd').val();

         $.post("KiemtraDN.php",{usr:usr,pwd:pwd},function(data){
           if(data =="true"){
             $('#form-dangnhap').unbind('submit');
             $('#submit').click();

           }
            else {
                // hiển thị thông báo lỗi:
                $('#loi-dangnhap').html(data);
            }
         });

   });


})
$('[data-toggle="tooltip"]').tooltip();
