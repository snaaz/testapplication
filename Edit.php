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

  
  //view the details of selected record.....
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
	$guest=mysqli_query($connection,"select * FROM `myguest` WHERE id='".$id."'");
	}
	
$state=mysqli_query($connection,"select * FROM `states` WHERE 1");
	
	
// update the selected records......
		
 if(isset($_POST['Update']))
{	
	$Fname_save=$_POST['firstname'];
    $Last_save=$_POST['lastname'];
    $email_save=$_POST['email'];
	$pwd_save=$_POST['password'];
	$Phn_save=$_POST['phone'];
    $Addr_save=$_POST['address'];
    $city_save=$_POST['city'];
	$state_save=$_POST['state'];
	$id=$_POST['id'];

	
	
	$updated=mysqli_query($connection,"UPDATE myguest SET  firstname ='".$Fname_save."', lastname ='".$Last_save."',
		 email ='".$email_save."',Password='".$pwd_save."', Phone='".$Phn_save."', Address='".$Addr_save."', city='".$city_save."', state='".$state_save."' WHERE id = '".$id."'");
		 
	//echo "c";
	//echo $Fname_save;
	//echo $Last_save;
	//echo $email_save;
	//echo $id;
	if($updated)
  {
  $msg="Successfully Updated!!";
  
  header("Location:index.html");
  session_start();
  $_SESSION["message"]="RECORD UPDATED SUCCSESSFULLY";

  }
else {
	 echo "Error: " . $updated. "<br>" . $conn->error;
	$_SESSION['error'] = "Error: " . $updated . "<br>" . $conn->error;
	
	  header('Location:Edit.html');
	  
     }
	
	 
}

 

?>