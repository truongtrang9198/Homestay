

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
   ></script>
   <style media="screen">
     button{
       background-color: #1D5B8F !important;
       color: white !important;
     }
   </style>
  </head>
  <body>
    <div class="container">
      <div class="p-2 mb-2 text-center" style="color:#1D5B8F; ">
        <h3 class=" ">Thêm loại phòng </h3>
      </div>
      <form class="" action="#" method="post">
        <div class="row">
          <div class="col-md-4 offset-5">
            <div class="row">
              <div class="form-group">
                <label for="tenloai">Tên loại phòng</label>
                <input type="text" class="form-control" name="tenloai" id="tenloai" >

              </div>
            </div>
              <div class="row">
                <button type="button" class="btn btn-primary" id="them" name="themploai" value="">Thêm loại phòng</button>&ensp;
                <button type="reset" class="btn btn-primary" name="" value="Tải lại" id="re">Tải lại</button>
              </div>
          </div>

        </div>
      </form>
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
             var ten = $.trim($("#tenloai").val());

             if(ten != ''){
               $.get("KTLoai.php",{ten:ten},function(data){
                  if(data == "2"){
                    alert("Thêm thành công!!");
                      location.reload();
                  }
                else
                    alert(data);
           });
         }else
              alert("Vui lòng nhập đủ thông tin!");


       });
       $("#re").click(function(){
         location.reload();
       });
       });
      </script>


  </body>
</html>
