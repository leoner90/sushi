<?php session_start();
if (isset($_SESSION['id']) and isset($_SESSION['hash'])){
	include '../bdConnect.php';  
	$dbname = $hostingName."users";
	$conn = new mysqli($servername, $username, $serverpassword , $dbname); 
	$sql = "SELECT  user_hash , login , email , history , avatar_url FROM usersforsushi WHERE id='".intval($_SESSION['id'])."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc(); 
	if ($row['user_hash'] == $_SESSION['hash']) {
		?>
		<div id="cms-user-area" class="row">
			<h3 class="text-center cms-page-headers" >USER INFO </h3>
			<div class="col-xs-4">
				<?php 
				$img = 'img/avatars/'.$row['avatar_url'].'.png';
				// 2 conditions otherwise will not work on reload becouse root is from main folder
				if((file_exists($img) OR (file_exists('../../'.$img))) ){
					echo '<img class="img-responsive cms-avatar-img" data-src="'.$img.'?'.rand().'">';
				} else {	
					echo '<img  class="img-responsive cms-avatar-img" src="img/avatars/default.png">';
				}
				?>
			</div>
			<div class="col-xs-8">
				<div class="row cms-info-row">
					<div class="col-xs-6">YOUR LOGIN</div>
					<div class="col-xs-6"><?php echo strtoupper($row['login']) ?></div>
				</div>
				<div class="row cms-info-row">
					<div class="col-xs-6">YOUR E-MAIL</div>
					<div class="col-xs-6"><?php echo strtoupper($row['email']) ?></div>
				</div>
			</div>
		</div>
		<!-- CHANGE PASSWORD -->
		<div  id="change-psw-panel" class="panel collapsed panel-danger ">
	 		<div class="panel-heading" data-toggle="collapse" data-target="#change-psw">
	 			<span class="glyphicon glyphicon-chevron-down"></span> 
	 			CHANGE PASSWORD
	 		</div>
	  		<div id="change-psw"  class="collapse , panel-body " > 
				<div id="change-psw-errors-container"> </div>
					OLD PASSWORD <input id="oldPassword" type="password" class="form-control" placeholder="Password"><br> 
					NEW PASSWORD <input id="newPassword" type="password" class="form-control" placeholder="Password"> <br>
					REPEAT PASSWORD <input id="Rnewpassword" type="password" class="form-control" placeholder="Repeat Password"> <br>
			  	<button class="btn btn-danger" onclick="changePsw()">Change password</button><br><hr>
	      </div> 
		</div>
		<!-- CHANGE AVATAR -->
		<div id="change-avatar-panel" class="panel collapsed panel-primary">
	 		<div class="panel-heading" data-toggle="collapse" data-target="#change-avatar">
	 			<span class="glyphicon glyphicon-chevron-down"></span>
	 			CHANGE AVATAR (max. size 2mb!!)
	 		</div>
	  		<div id="change-avatar"  class="collapse , panel-body"> 
			 		<div id= "change-avatar-errors-container"></div>
					<form id="uploadForm" enctype="multipart/form-data">
						<img class="img-responsive" id="change-avatar-img-preview" src="#"  alt="Select Image"> 
						<input id="select-picture-for-avatar"  type="file"   name="userImage" onchange="SetPicturePreview(this ,'#change-avatar-img-preview' )"> 
						<input type="submit" value="Submit" class="btn btn-success" onclick="changeavatar()" />
					</form>
	      </div>
		</div>
		<!-- ORDER HISTORY -->
		<div id="history-panel" class="panel">
			<div id="history-panel-heading" class="panel-heading" data-toggle="collapse" data-target="#order-history">
				<span class="glyphicon glyphicon-chevron-down"></span>
				ORDER HISTORY
			</div>
			<div id="order-history"  class="collapse , panel-body"> 
				<div class="history"><?php echo $row['history'] ?></div>
			</div>
		</div>
	<?php
	} else {
		echo '<script>  location.hash = "#mainPage";</script>';
	}	 			 	  		
} else {
	echo '<script>  location.hash = "#mainPage";</script>';
}
?>