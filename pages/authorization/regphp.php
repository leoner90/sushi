<?php session_start(); 
//GET INPUT FIELD VALUE
$login = trim($_POST['login']," "); 
$login = htmlspecialchars($login);
$password = htmlspecialchars($_POST['password']);
$Rpassword = htmlspecialchars($_POST['Rpassword']);
$mail = trim($_POST['email']," ");
$mail = htmlspecialchars($mail);
//ERROR CHECK
if 	($login == '' ){
	$errors[] = '<span class="reg-errors"> Login is incorrect </span>';
}
if (!preg_match("/^[a-zA-Z0-9]*$/",$login) OR !preg_match("/^[a-zA-Z0-9]*$/",$password)) {
  	$errors[] = '<span class="reg-errors"> Only letters , numbers and space allowed!</span>'; 
} 
if ($password != $Rpassword OR $password =='' OR $Rpassword == '') {
	$errors[] = '<span class="reg-errors"> Passwords do not match </span>';	 
	
}
if (!filter_var($mail, FILTER_VALIDATE_EMAIL)  OR  $mail == '') {
    $errors[] = '<span class="reg-errors"> E-mail is incorrect !! </span>';
}
if (strlen($password) < 4) {
	$errors[] = '<span class="reg-errors"> Your password is too short need 4 or more character </span>';
}
//Check if such login or email exists in the database
include '../bdConnect.php';  
$dbname = $hostingName."users";
$conn = new mysqli($servername, $username, $serverpassword, $dbname);  
$sql = "SELECT login, email  FROM usersforsushi";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) { 
	if ($row['email'] == $mail ) {
		$errors[] = 'User with such an e-mail is already registered <br>';	
		break;	   		  	
	}	
	if ($row['login'] == $login ) {
		$errors[] = 'User with such login already exists <br>';	
		break;	   		  	
	}		 
} 
//IF NO ERRORS -> REGISTRATION AND LOG IN!
if (empty($errors)) { 
	$password = md5($password);
	$hash = md5(generateCode(10));
	$sql = "INSERT INTO usersforsushi (login, password, email, user_hash) 
	VALUES ('$login' ,'$password' ,'$mail', '$hash')";
	$conn->query($sql); 
	$_SESSION['hash'] = $hash; 
	$_SESSION['login'] = $login;
	$_SESSION['id'] = $conn->insert_id;
	exit;
} else {
 	$errors = json_encode($errors);
	echo $errors;
}
function generateCode($length=6) {
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
  $code = "";
  $clen = strlen($chars) - 1;  
  while (strlen($code) < 6) {
    $code .= $chars[mt_rand(0,$clen)];  
  }
  return $code;
}
?>