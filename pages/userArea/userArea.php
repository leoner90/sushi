<?php session_start();
if (isset($_SESSION['id']) and isset($_SESSION['hash'])){
	if(file_exists ('../bdConnect.php')) {
		include '../bdConnect.php'; 
	} else { 
		include 'pages/bdConnect.php'; //in case of reload 
	}
	$dbname = $hostingName."users";
	$conn = new mysqli($servername, $username, $serverpassword , $dbname); 
	$sql = "SELECT  user_hash , login , avatar_url FROM usersforsushi WHERE id='".intval($_SESSION['id'])."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc(); 
	if ($row['user_hash'] == $_SESSION['hash']) {
		//if avatar picture not exist  - load defaul avatar img
		$img = 'img/avatars/'.$row['avatar_url'].'.png';
		// 2 conditions otherwise will not work on reload becouse root is from main folder
		if((file_exists($img) OR (file_exists('../../'.$img))) ){
		?> 
			<img class="avatar-img img-responsive"  data-src=<?php echo '"img/avatars/'.$row['avatar_url'].'.png?'.rand().'"'?>>
		<?php
		} else {
			?>
			<img  class="img-responsive , avatar" src="img/avatars/default.png">
			<?php
		}
		?>
		<div class="user-name">
			<?php echo strtoupper($row['login'])?>
		</div>
		<a href="#userArea/cms">
			<button class="my-Acc-btn btn btn-primary">MY ACCOUNT</button> 
		</a>
		<button class="log-out-btn btn btn-danger" onclick="logout()">
			<span class="glyphicon glyphicon-log-out"></span> LOG OUT
		</button> 
		<?php $conn->close();
	}
} else {
	?>
	<form>
		<p id="login-err"></p>
		<input id="login" type="text" class="form-control" placeholder="Login" onfocus="$(this).removeClass('errorbg')">
		<input id="pwd" type="password" class="form-control" placeholder="Password" onfocus="$(this).removeClass('errorbg')"> 
		<button id="login-btn" type="submit" class="btn  btn-success btn-sm" onclick="log_in()">LOGIN</button>
	</form>
	<a href="#/authorization/registration">
	  <button id="reg-btn" class="btn btn-primary btn-sm">REGISTRATION</button>
	</a>
	<?php 
} 
?>