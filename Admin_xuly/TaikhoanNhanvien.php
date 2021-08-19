<?php
  include("../connect.php");

  $n = 0;
  $sql = "call DanhsachTaikhoan()";
  $query = mysqli_query($conn,$sql);
  if(mysqli_num_rows($query)!=0){
      while($row = mysqli_fetch_array($query))  {

      ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <div class="container">
       <h3>Tài khoản nhân viên</h3>
       <table class="table table-hover">
         <thead>
           <tr>
             <th scope="col">STT</th>
             <th scope="col">Tên tài khoản</th>
             <th scope="col">Họ tên nhân viên</th>
           </tr>
         </thead>
         <tbody>
           <tr>
             <td><?php echo $n ?> </td>
             <td><?php echo $row['username']; ?> </td>
             <td><?php echo $row['Hoten_NV']; ?></td>
           </tr>
         </tbody>
       </table>
     </div>
   </body>
 </html>
 <?php
      $n = $n +1;
      }
    }
  ?>
