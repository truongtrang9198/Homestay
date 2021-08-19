<?php
    include("../connect.php");

        if(isset($_GET['maphong'])){
            $maphong = $_GET['maphong'];
            $sql = "call Thongtinphong('$maphong')";
            $query = mysqli_query($conn,$sql);
            if(mysqli_num_rows($query)>0){
              $row = mysqli_fetch_array($query);
              echo "
                <table class='table table-bordered'>
                  <thread>
                  <tr>
                    <th scope='col' >Mã số phòng</th>
                    <th scope='col' >Tên phòng</th>
                    <th scope='col'>Giá/đêm</th>
                    <th scope='col'>Loại phòng</th>
                    <th scope='col'>Mô tả</th>
                  </tr>
                </thread>
                <tbody>
                  <tr>
                    <td>" .$row['MSP']. "</td>
                    <td>" .$row['TenPhong']. "</td>
                    <td>"  .$row['Gia']. "</td>
                    <td>"  .$row['Tenloai'].  "</td>
                    <td>"   .$row['Mota']. " </td>
                  </tr>
                </tbody>

                </table>
              ";
            }
        }else{
          echo "Không nhận được dữ liệu!";
        }



 ?>
