<?php 
session_start();
//Get input field value
include '../bdConnect.php'; 
$dbname = $hostingName."users";
$conn = new mysqli($servername, $username, $serverpassword, $dbname); 
$oldPassword = htmlspecialchars($_POST['oldPassword']); 
$newPassword = htmlspecialchars($_POST['newPassword']);
$Rnewpassword = htmlspecialchars($_POST['Rnewpassword']);
$id = $_SESSION['id'];
//CHECK ON ERRORS
if (!preg_match("/^[a-zA-Z0-9]*$/",$oldPassword) OR !preg_match("/^[a-zA-Z0-9]*$/",$newPassword)) {
	$errors[] = ' <p class="change-psw-errors"> Only letters , numbers and space allowed!</span>'; 	
}
if (strlen($newPassword) < 4) {
	$errors[] = ' <p class="change-psw-errors"> Your new password is too short need 4 or more character</span> ';
}
if ($newPassword != $Rnewpassword) {
	$errors[] = '<p class="change-psw-errors"> New passwords do not match </span> ';	 
}
//CHECK OLD PASSWORD FROM DB
$sql = "SELECT password FROM usersforsushi WHERE id = $id";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
if (md5($oldPassword) != $row['password']) {
	$errors[] = ' <p class="change-psw-errors"> Old password is incorrect!  </span>';
}
//IF NO ERRORS -> CHANGE PASSWORD!
if (empty($errors)) { 
	$newPassword = md5($newPassword); 
	$sql = "UPDATE usersforsushi SET password = '$newPassword' WHERE id = $id";
	$conn->query($sql);
	exit;
} else {
 	$errors = json_encode($errors);
	echo $errors;
	exit;
}
mysqli_close($conn);
?>