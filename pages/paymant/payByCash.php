<?php
session_start();
//GET INPUT FIELDS VALUE
$address = htmlspecialchars($_POST['address']);
$number = htmlspecialchars($_POST['phone']);
$postCode = htmlspecialchars($_POST['postCode']);
//CHECK ON ERRORS
if (trim($address) == '' OR trim($number) == '' OR trim($postCode) == '') {
	$errors[] = '<p class="payment-err"> Fill  all fields please!</p>';
}

if (!is_numeric($number)) {
	$errors[] = '<p class="payment-err"> incorrect phone number </p>';
}
//IF NO ERRORS
if(empty($errors)) { 
	
	// Add to user history
	include '../bdConnect.php';  
	$dbname = $hostingName.'users';
	$id = $_SESSION['id'];
	$tableName = 'usersforsushi';
	$conn = new mysqli($servername, $username, $serverpassword , $dbname); 
	date_default_timezone_set('Europe/London');
  	$sTime = date("d-m-Y H:i:s"); 
	$history = '<p class="history">'.$sTime. "<br> TOTAL SUMM:" . $_SESSION['totalSumm'].'</p>';
	$sql = "UPDATE $tableName SET history=CONCAT( history, '$history')  where id = '$id'";
	$result = $conn->query($sql);
	mysqli_close($conn);
	// UPDATE ORDER ID 
	$dbname = $hostingName.'sushi';
	$tableName = 'order_id';
	$conn = new mysqli($servername, $username, $serverpassword , $dbname);  
	$sql = "SELECT orderid FROM $tableName where id='0'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc(); 
	$newOrderId = $row['orderid'] + 1;
	$sql2 = "UPDATE order_id SET orderid='$newOrderId' WHERE id=0";
	$conn->query($sql2);
	//send message to restorant  about new order
	$message = '<html><body>';
	$dbname = $hostingName.'sushi';
	$tableName = 'menu';
	$conn = new mysqli($servername, $username, $serverpassword , $dbname);  
	for ($i=0; $i < $_SESSION['i'] ; $i++) { 
		if ($_SESSION['order'][$i] != '') {
			preg_match('/id=(.*?)\*/', $_SESSION['order'][$i], $match);
			$id[$i] = $match[1];
			preg_match('/quantity=(.*?)\//', $_SESSION['order'][$i], $q);
			$quantity[$i] = $q[1];
			$sql3 = "SELECT price , name FROM $tableName where id= '$id[$i]'";
			$result = $conn->query($sql3);
			$row = $result->fetch_assoc() ; 		 
			$message .='<p>'.strtoupper($row['name']) .' | '.$quantity[$i].'x'. $row['price'] .'='. $quantity[$i] * $row['price'].'</p>' ; 
		}
	}
	$message .=	'<p> ADDRESS:'. $address.'</p> <p>PHONE NUMBER:'. $number.'</p> <p> Total summ:'. $_SESSION['totalSumm'].'</p> </body> </html>';
	$headers = "From:  Private \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	mail("leonid.gurockin@gmail.com", "New question" ,$message , $headers);
	unset($_SESSION['totalSumm']);
  unset($_SESSION['order']);
} else { //IF ERRORS
	$errors = json_encode($errors);
	echo $errors;	
}
?>