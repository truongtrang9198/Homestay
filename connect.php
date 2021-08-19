<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$database = "homestay";

//create connection

$conn = new mysqli($servername,$username,$password,$database );
// check connect
if( $conn->connect_error)
  die("Loi hien thi: ".$conn->connect_error);


 ?>
