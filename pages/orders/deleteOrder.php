<?php
session_start();
$id = $_POST['id'];
$index = $_POST['index'];
$quantity = $_POST['quantity'];
unset($_SESSION['order'][$index]);
for ($i=0; $i < $_SESSION['i'] ; $i++) { 	
	if ($_SESSION['order'][$i] != '') {
		$notempty = 1;
	}
}
if (!isset($notempty)) {
	unset($_SESSION['order']);
}
include '../bdConnect.php';  
$dbname = $hostingName.'sushi';
$tableName = 'menu';
$conn = new mysqli($servername, $username, $serverpassword, $dbname);
$sql = "SELECT price  FROM $tableName where id= '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc() ; 
$price = $row['price'];
$totalPrice = $quantity * $price;
$_SESSION['totalSumm'] = $_SESSION['totalSumm'] - $totalPrice;
$totalSumm = json_encode($_SESSION['totalSumm']);
echo $totalSumm;
?>