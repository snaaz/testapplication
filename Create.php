<?php
$servername="localhost";
$username="root";
$password="";
$dbname="mydb";


// create connection
$conn = new mysqli($servername,$username,$password,$dbname);
  if($conn->connect_error)
  {
	  die("connection failed".$conn->connect_error);
	  
  }

 /*$sql = "CREATE Table MYGuest(
 id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 firstname varchar(30) not null,
 lastname varchar(30) not null,
 email varchar(50),
 reg_date TIMESTAMP
 )";*/
 
 $states =mysqli_query($conn,"select * FROM `states` WHERE 1");
 
 
 if(isset($_POST['submit'])){
$first_name=$_POST['fname'];
$last_name=$_POST['lname'];
$email=$_POST['email'];
$password=$_POST['password'];
$phone=$_POST['phone'];
$addr=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$error = "";


$cost = 10;
// Create a random salt
$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

// Prefix information about the hash so PHP knows how to verify it later.
// "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
$salt = sprintf("$2a$%02d$", $cost) . $salt;

// Value:
// $2a$10$eImiTXuWVxfM37uY4JANjQ==
// Hash the password with the salt
$hash = crypt($password, $salt);


//$sql = "INSERT INTO MyGuest(firstname,lastname,email)
 // values('".$_POST['fname']."', '".$_POST['lname']."','".$_POST['email']."')";

 
// create new records 
 $sql = "INSERT INTO MyGuest(firstname,lastname,email,password,Phone,Address,city,state)
  values('$first_name', '$last_name','$email','$hash','$phone','$addr','$city','$state')";
  
  
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	//$_SESSION['notice'] = "New record created successfully";
	session_start();
   $_SESSION["message"]="NEW RECORD INSERTED SUCCSESSFULLY";
	header('Location: index.html');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	$_SESSION['error'] = "Error: " . $sql . "<br>" . $conn->error;
	header('Location: create.html');
}
 }


$conn->close();
?>