<?php
session_start();
//IMAGE CHECKS
//CHECK THAT IMG NOT EMPTY AND SIZE NOT MORE THEN 2 GB
if ($_FILES['userImage']['size'] > 2097150 ) { 
	$errors[] = '<p class="change-avatar-errors"> File size is too big!. 2mb allowed </p>';
}
if ($_FILES['userImage']['error'] !== 0) {
	$errors[] = '<p class="change-avatar-errors"> Please select the file</p> ';
} else {
	$types = array('image/gif', 'image/png', 'image/jpeg', 'image/pjpeg' );
	if (!in_array($_FILES['userImage']['type'], $types)){
	      $errors[] =  '<p class="change-avatar-errors"> Allowed only: *.png, *.gif, *.jpg </p>';
	} 
	$blacklist = array(".php", ".phtml", ".php3", ".php4");
	foreach ($blacklist as $item) {
		if(preg_match("/$item\$/i", $_FILES['userImage']['name'])) {
			$errors[] =   '<p class="change-avatar-errors">PHP file not allowed!</p>';
		}
	}
}
//IF NO ERROS SAVE IMAGE ON SERVER 
if (empty($errors)) { 
	include '../bdConnect.php';  
	$dbname = $hostingName."users";
	$conn = new mysqli($servername, $username, $serverpassword , $dbname); 
	$sql = "SELECT  login , user_hash , id , avatar_url FROM usersforsushi WHERE id='".intval($_SESSION['id'])."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$sourcePath = $_FILES['userImage']['tmp_name']; //временный путь и имя файла
	$img_name = md5($row['login']).rand(); // unic name
	$targetPath = "../../img/avatars/".$img_name.".png";  // путь и имя куда сохраняется файл
	move_uploaded_file($sourcePath,$targetPath);
	//delete old img
	$filename = '../../img/avatars/'.$row['avatar_url'].'.png';
  if (file_exists($filename)) {
    unlink($filename);
  } 
	if ($row['user_hash'] == $_SESSION['hash']) {
		$sql2 = "UPDATE usersforsushi SET avatar_url='$img_name' WHERE id='".intval($_SESSION['id'])."'";
		$result = $conn->query($sql);
		$conn->query($sql2);
		$conn->close();  
	} else{
		$errors[] =   '<p class="change-avatar-errors">Problem with autorisation</p>';
		$errors = json_encode($errors);
		echo $errors;
		exit;
	}
} else { //IF ERRORS -RETURN ERROS
	$errors = json_encode($errors);
	echo $errors;
	exit;
}
?>