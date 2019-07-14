<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<script src="https://checkout.stripe.com/checkout.js"></script>
  <meta charset="utf-8" />
  <title>SUSHI BAR</title>
  <link rel="shortcut icon" type="image/png" href="favicon.ico">
  <!-- meta tag for mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap css CDN-->
  <link  rel="stylesheet" href="LibrariesAndFrameworks/bootstrap.min.css">
  <!-- My css file -->
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
<!-- Page preloader -->
<div id="page-preloader">
  <div id="spinner"></div> 
</div>
<!-- menu-->
<nav id="nav-bar">
  <!-- nav bar header -->
  <div id="nav-bar-header">
    <a href="#mainPage">
      <img id="logo" class="img-responsive" src="img/logo.png" />
    </a>
    <p id="headTittle" >SUSHI BAR</p>
    <p id="tagline" >Just try us..!</p>
  </div>
  <!-- nav bar menu -->
  <div id="nav-bar-menu" >
    <ul id="menu-list">
      <li class="mainPage"><a href="#mainPage">HOME</a></li>
      <li class="menu"><a href="#menu">MENU</a></li>
      <li class="contacts"><a href="#contacts">CONTACTS</a></li>
      <li class="orderbasket"> 
      <a  href='#orders/orderbasket'> 
        <span id="totalSumm">
          <?php   
            if (isset( $_SESSION['totalSumm'] )) {
              $result = round($_SESSION['totalSumm'], 2);
              echo number_format($result, 2);
            } else {
              echo '0.00 ';
            }
          ?> 
        </span> &#163; 
        <img id="order-basket-img" src="img/order.png" alt="order">  
      </a>
      </li>
      <li id="nav-bar-phone">
        <a href="#contacts"> 07741234234 </a>
      </li>
    </ul>
  </div>
</nav>
<!-- End of menu bar -->
<!-- Main blocks of content -->
<div class="container-fluid">
  <div class="row row-eq-height">
    <div id="main-content"class="col-xs-9 col-sm-10"> <!-- Page content loads here--></div>
    <div id="right-sidebar" class="col-xs-3 col-sm-2">
      <div id="authorization_form">
        <?php include ('pages/userArea/userArea.php');?>
      </div>
      <div class="advertising">
        <img class="right-bar-ad img-responsive" data-src="img/offers/offer1.jpg" >
        <img  class="right-bar-ad img-responsive" data-src="img/offers/offer2.jpg">
        <img  class="right-bar-ad img-responsive" data-src="img/offers/offer3.jpg">
        <img  class="right-bar-ad img-responsive" data-src="img/offers/offer4.jpg">
      </div>
    </div>
  </div>
</div> 
<footer id="footer"></footer>

<!-- Jqery -->
<script src="LibrariesAndFrameworks/jquery-3.3.1.min.js"></script>
<!-- bootstrap js -->
<script src="LibrariesAndFrameworks/bootstrap.min.js"></script>
<!-- Navigation -->
<script type="text/javascript" src="navigation.js"></script>
<!-- My js file -->
<script src="mainJS.js"></script>
<!-- Google captcha -->
<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>