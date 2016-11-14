<html>
<body>
<head><h2>Form validation</h2></head>
<?php
$name=$email=$gender=$website=$comment=" ";
$nameERR=$emailERR=$genderERR=$websiteERR=$commentERR=" ";
if($_SERVER["REQUEST_METHOD"]=="POST")
{ 
	if(empty($_POST["name"]))
	{
		$nameERR="Name is required";
	}
	else
	{
	$name=test_input($_POST["name"]);		
        if (!preg_match("/^[a-zA-Z]*$/",$name)) 
		    {
             $nameERR = "Only letters and white space allowed"; 
            }
	}
	if(empty($_POST["email"]))
	{
		$emailERR="Email is required";
	}
	else
	{
	$email=test_input($_POST["email"]);
	 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailERR = "Invalid email format"; 
	}
	}
	if(empty($_POST["website"]))
	{
		$website=" ";
	}
	else
	{
	$website=test_input($_POST["website"]);
	If (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteERR = "Invalid URL"; 
	}
	}
	if(empty($_POST["comment"]))
	{
		$comment=" ";
	}
	else
	{
	$comment=test_input($_POST["comment"]);
	}
	if(empty($_POST["gender"]))
	{
		$genderERR="gender is required";
	}
	else
	{
	$gender=test_input($_POST["gender"]);
	}
}
function test_input($data)
{
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<p><span class="error">* required field.</span></p>
Name:    <input type="text" name="name" value="<?php echo $name;?>">
<span class="error">*<?php echo $nameERR;?></span>
<br><br>
Email:   <input type="text" name="email" value="<?php echo $email;?>"> 
<span class="error">* <?php echo $emailERR;?></span>
<br><br>
<br>
Website: <input type="text" name="website"value="<?php echo $website;?>" > 
<span class="error">* <?php echo $websiteERR;?></span>
<br><br>
<br>
comment:<textarea name="comment" row="5" col="40"><?php echo $comment;?></textarea><br>
<br>
Gender:<br>
 <input type="radio" name="gender" value="female" <?php if (isset($gender) && $gender=="female") echo "checked";?> > Female
 <input type="radio" name="gender" value="male" <?php if (isset($gender) && $gender=="male") echo "checked";?> > Male
 <span class="error">* <?php echo $genderERR;?></span>
<br><br>
<br>
<input type="submit" name="button">
</form>
<?php
echo "<h2>your input</h2>";
#echo !preg_match("/^[a-zA-Z]*$/",$name);
echo"<br>";
echo $name;
echo"<br>";
echo $email;
echo"<br>";
echo $website;
echo"<br>";
echo $comment;
echo"<br>";
echo $gender;
?>
</body>
</html>