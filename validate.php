<?php
$name=$email=$gender=$website=$comment=" ";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$name=test_input($_POST["name"]);
	$email=test_input($_POST["email"]);
	$website=test_input($_POST["website"]);
	$comment=test_input($_POST["comment"]);
	$gender=test_input($_POST["gender"]);
}
function test_input($data)
{
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
echo "<h2>your input</h2>";
echo "name is $name";
echo"<br>";
echo "email address $email";
echo"<br>";
echo "your website $website";
echo"<br>";
echo "comments-->$comment";
echo"<br>";
echo "GENDER-$gender";
?>