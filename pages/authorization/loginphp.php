<?php session_start();
function generateCode($length=6) {
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
  $code = "";
  $clen = strlen($chars) - 1;  
  while (strlen($code) < 6) {
    $code .= $chars[mt_rand(0,$clen)];  
  }
  return $code;
}
// mysql_real_escape_string()
//GET INPUT FIELD VALUE
$login = trim($_POST['login']," ");
$login = htmlspecialchars($login);
$login = stripslashes($login);
$passwords = $_POST['password'];
$passwords = htmlspecialchars($passwords);
$passwords = stripslashes($passwords);
//checks for banned characters	
if (!preg_match("/^[a-zA-Z0-9]*$/",$login) OR !preg_match("/^[a-zA-Z0-9]*$/",$passwords)) {
	$errors[] = '<span class="reg-errors">Only letters , numbers and space allowed! </span>';	
} else { //if user exist starts sesion login and id
	include '../bdConnect.php';  
	$dbname = $hostingName."users";
	$passwords = md5($passwords);
	$conn = new mysqli($servername, $username, $serverpassword , $dbname);
	$sql = "SELECT  login , password , id  FROM usersforsushi WHERE login='$login'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc(); 	
	if ($row['login'] == $login and  $row['password'] == $passwords )  {
		$hash = md5(generateCode(10));
		$id = $row["id"];
		$sql2 = "UPDATE usersforsushi SET user_hash='$hash' WHERE id='$id'";
		$conn->query($sql2);
		$conn->close();
		$_SESSION['hash'] = $hash;		
	  	$_SESSION['id'] = $row['id'] ;  		  	
	}
} 
//if not exist send back errors otherwise exit
if (!isset($_SESSION['hash'])) {
	$errors[] = '<br />LOGIN OR PASSWORD <br />IS INCORRECT';
	$errors = json_encode($errors);
	echo $errors;
	exit;
} else {
	exit;
}
?> 