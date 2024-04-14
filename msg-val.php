<?php    

$Username=$_POST['username'];
$Email = $_POST['email'];
$message = $_POST['msg'];

function test_input($data)
{
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}

	//missing data

$cflag="0";
if(empty($Username)){
	$cflag="User name is missing";
	
}
else if (empty($Email)){
	$cflag="Email is missing";
	
}
else
{if (empty($message)){
	$cflag="message is missing";
	
}
	else 
	{   $Username=test_input($_POST['username']);
        $Email=test_input($_POST['email']);
		$message=test_input($_POST['msg']);
		
}
}

if($cflag !="0")
{
	echo " faild .... check your email, message and your user name"	;
}	



else
{	
$servername = "localhost";
$username = "root";
$password = "";
	$dbname = "project_uni";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO massage ( Username , email ,massage ,time)
VALUES ('$Username','$Email', '$message' , CURRENT_DATE)";
if ($conn->query($sql) === TRUE) {
	header("location: msg.php?msg=msgsuccess");
	exit();
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

	
	
}







?>
