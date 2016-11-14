<?php
$servername="localhost";
$username="root";
$password="";
$dbname="mydb";
// create connection
$connection = new mysqli($servername,$username,$password,$dbname);
  if($connection->connect_error)
  {
	  die("connection failed".$connection->connect_error);
  }
  
$guests=mysqli_query($connection,"select * FROM `myguest` WHERE 1");

 
 

?>