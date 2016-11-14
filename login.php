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


  l
// username and password sent from form 
$email=$_POST['email']; 
$password=$_POST['password']; 

// To protect MySQL injection (more detail about MySQL injection)
$email = stripslashes($email);
$password = stripslashes($password);
$email = mysql_real_escape_string($email);
$password = mysql_real_escape_string($password);
$result=mysqli_query($connection,"select * FROM `myguest` WHERE email='$email' limit 1");

$row = mysqli_fetch_array($result);
//echo $row['email'];
	//if($result){
	echo $row['password'];
	echo "<br/>";
	echo $password;
	echo "<br/>";
	echo crypt($password, $row['password']);
	echo "<br/>";
	echo ($row['password'] === crypt($password, $row['password']));
	
if( $row['password'] === crypt($password, $row['password'])) {
	echo "logged in";
//header("location:Index.html");
}
else {
echo "Wrong Username or Password";
//header("location:Login.html");
}
?>