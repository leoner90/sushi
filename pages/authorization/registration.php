<?php 
session_start();      
//IF LOGПED IN -  REDIRECT TO MAIN PAGE , IF NOT SHOW REGISTRATION FORM 
if (isset($_SESSION['hash'] )) {
    echo '<script> location.hash = "#mainPage"; </script>';
} else {?>
  <div id="reg-page-header" class="tittle text-center">REGISTRATION </div> 
  <div id="reg-err-container"></div>
  <form id="reg-form">
    <label for="login">Email address:</label>
    <input type="email" class="form-control" id="mail"  onfocus="$(this).removeClass('errorbg')">
    <label for="login">Your Login:</label>
    <input type="login" class="form-control" id="reg-login" onfocus="$(this).removeClass('errorbg')">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="password" onfocus="$(this).removeClass('errorbg')">
    <label for="r-pwd">Repeat Password:</label>
    <input type="password" class="form-control" id="Rpassword" onfocus="$(this).removeClass('errorbg')">
    <button id="reg-page-btn" onclick="reg(event)" type="submit" class="btn btn-success">Registration</button>
  </form>
<?php
}
?>