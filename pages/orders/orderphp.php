<?php session_start();
//GET INPUT FIELD VALUE AND CONNECT & SELECT INFO FROM DB
include '../bdConnect.php';  
$dbname = $hostingName.'sushi';
$id = $_POST['id'];
$tableName = 'menu';
$conn = new mysqli($servername, $username, $serverpassword , $dbname);  
$sql = "SELECT price FROM $tableName where id= '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc() ; 
$price = $row['price'];
$quantity = $_POST['quantity'];
if (!isset($_SESSION['totalSumm'])){
	$_SESSION['totalSumm'] = 0; 
}
$_SESSION['totalSumm'] = $_SESSION['totalSumm'] + ( $price *  $quantity);
if (!isset($_SESSION['i'])){
	$_SESSION['i'] = 0; 
}
$_SESSION['order'][$_SESSION['i']] = 'id='. $id .'* quantity=' . $quantity.'/';
$_SESSION['i']++;
//return total summ  to display price in order backet in main menu!
$totalSumm = json_encode($_SESSION['totalSumm']);
echo $totalSumm;
?>