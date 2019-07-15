<?php session_start();
if (isset($_SESSION['order'])) {
	include '../bdConnect.php';  
	$dbname = $hostingName.'sushi';
	$tableName = 'menu';
	$conn = new mysqli($servername, $username, $serverpassword , $dbname);  
	?>
	<div id="payment-in-process">
		<div id="spiner-for-payment"></div>
	</div>
	<div class="row order-basket-header">
		<div class="col-xs-3">NAME</div>
		<div class="col-xs-2">QUANTITY</div>
		<div class="col-xs-1"></div>
		<div class="col-xs-2 text-center">PRICE</div>
		<div class="col-xs-2 text-center">SUMM</div>
		<div class="col-xs-2"></div>
	</div>
	<?php
	for ($i=0; $i < $_SESSION['i'] ; $i++) { 
		if ($_SESSION['order'][$i] != '') {
			preg_match('/id=(.*?)\*/', $_SESSION['order'][$i], $match);
			$id[$i] = $match[1];
			preg_match('/quantity=(.*?)\//', $_SESSION['order'][$i], $q);
			$quantity[$i] = $q[1];
			$sql = "SELECT price , name FROM $tableName where id= '$id[$i]'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc() ; 
			$price = $row['price'];
			$sushiName =  strtoupper($row['name']);
			$totalPrice = $quantity[$i] * $price;
			?>	
			<div class="row order-basket-row" >
				<div class="col-xs-3 sushiName" ><?php echo $sushiName ?></div>
				<div class="col-xs-2 "><?php echo $quantity[$i]?></div>
				<div class="col-xs-1">x</div>
				<div class="col-xs-2 text-center">&#163; <?php echo $price?></div>
				<div class="col-xs-2 text-center"> &#163; <?php echo $totalPrice  ?> </div>
				<div class="col-xs-2 text-right"> 
					<button class="delete-order-btn , btn , btn-danger" onclick="deleteOrder(<?php echo '\''.$id[$i].'\'' .','.'\''.$quantity[$i].'\'' .','. '\''.$i.'\''; ?> )">
						DELETE  
					</button>
				</div>
			</div> 
			<?php 
		}
	}?>
	<div class="row order-total-summ-row">
		<div class="col-xs-8"   >TOTAL SUMM IS:</div>
		<div  class="col-xs-2 text-center totalSumm"> &#163; <?php echo $_SESSION['totalSumm'] ?> </div>
		<div class="col-xs-2"></div>
	</div>
	<?php
	//if you are logeed in then you can proceed and pay buy card  or cash , if not - text "you should be logged in to proceed"
	if (isset($_SESSION['id']) and isset($_SESSION['hash'])){
		include '../bdConnect.php';  
		$dbname = $hostingName."users";
		$conn = new mysqli($servername, $username, $serverpassword , $dbname); 
		$sql = "SELECT  user_hash FROM usersforsushi WHERE id='".intval($_SESSION['id'])."'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc(); 
		if ($row['user_hash'] == $_SESSION['hash']) {
			?>
			<div id="payment-errors"></div>
			<div id="information-for-delivery">
				<h5 id="information-for-delivery-header">INFORMATION FOR DELIVERY</h5>
				<div class="row" >
					<div class="col-xs-2 padding-null" >
						<label>ADDRESS </label>
					</div>
					<div class="col-xs-10" >
						<input id="address" class="form-control" type="text"   onclick="$(this).removeClass('errorbg')" placeholder="ADDRESS">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-2 padding-null" >
						<label>POST CODE </label>
					</div>
					<div class="col-xs-10">
						<input id="post-code" class="form-control" type="text"   onclick="$(this).removeClass('errorbg')" placeholder="POST CODE">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-2 padding-null" >
						<label>PHONE NUMBER </label>
					</div>
					<div class="col-xs-10">
						<input id="phone" class="form-control" inputmode="numeric" type="number" onclick="$(this).removeClass('errorbg')" placeholder="PHONE NUMBER ">
					</div>
				</div>
		 	</div>
			<div id=payment-container >
			  <button class="payment-btn btn" id="payment-button"  onclick="cardPaymant(<?php echo $_SESSION['totalSumm'] ?>)">
			  	<span class="glyphicon glyphicon-credit-card"></span>
			  	PAY BY CARD
			  </button>
			  <p id="ajax-response"> </p>
				<button id="cash-payment-btn" class="payment-btn btn"  onclick="PayByCash()"> 
					<span class="glyphicon glyphicon-tag"></span> 
					PAY BY CASH
				</button>
			</div>
			<?php	
		} else {
			echo '<p  class="log-in-to-procced-text" > YOU MUST BE A  REGISTERED USER TO CONTINUE! <br> PLEASE LOG IN !</p>';
		}
	} else {
		echo '<p  class="log-in-to-procced-text"> YOU MUST BE A  REGISTERED USER TO CONTINUE! <br> PLEASE LOG IN !</p>';
	}
} else {
  echo 'YOUR BASKET IS EMPTY';
}
?>