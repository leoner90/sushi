<?php 
$succes = htmlspecialchars($_POST['succes']);
$succes = 'true';
include '../bdConnect.php';  
$dbname = $hostingName.'sushi';
$tableName = 'order_id';
$conn = new mysqli($servername, $username, $serverpassword , $dbname);  
$sql = "SELECT orderid FROM $tableName where id='0'";
$result = $conn->query($sql);
$row = $result->fetch_assoc(); 
if ($succes) {
	?>
	<div class="row" >
		<div class="col-xs-6" >
			<img class="img-responsive" src="img/SuccessOrderImg.gif" height="75px" >
		</div>
		<div class="col-xs-6">
			<h2 class="bold success-header">SUCCESS</h2>
			
			<p class="succes-page-text-row">
				<span class="glyphicon glyphicon-ok"></span> 
			 	&nbsp;YOUR ORDER IS PROCCEES TO MAIN OFFICE
			 </p>
			 <p class="succes-page-text-row">
				<span class="glyphicon glyphicon-ok"></span> 
				&nbsp;YOUR ORDER NUMBER IS 
				<span class="order-number"><?php echo $row['orderid']; ?> </span>
			</p>
			<a class="success-page-back-to-main-page-link" href="#mainPage" >
				<span class="glyphicon glyphicon-home"></span>
				&nbsp;BACK TO MAIN PAGE 
			</a>
			<p class="succes-page-text-row">
				<span class="glyphicon glyphicon-time"></span>
				<span> &nbsp;DELIVERY TIME: </span>
				<span id="delivery-time-left"></span>
			</p>
		</div>
	</div>
<?php
 }
 else {
?>
<script type="text/javascript">location.hash = "#mainPage";</script>
<?php
 }
?>
<script type="text/javascript">
	clearInterval(deliveryTime);
	var time_left = 25 * 60 ;
	var deliveryTime = setInterval(timeLeft, 1000);
	function timeLeft() {
		time_left = time_left - 1;
		if (time_left <= 0) {
			clearInterval(deliveryTime);   
		}
		var min = Math.floor( time_left / 60 ) + ' MIN ';
		var sec = time_left  % 60 + ' SEC';
		$('#delivery-time-left').html( min + sec);
	}
</script>