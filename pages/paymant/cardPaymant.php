<?php 
session_start(); 
$address = htmlspecialchars($_POST['address']);
$number = htmlspecialchars($_POST['phone']);
require_once('stripe/init.php');
// Put your secret API key here. It can be found at https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey('sk_test_6kqAF5cQVHgukpBFAdjk9Npo');
$token = $_POST['stripeToken'];
$email = $_POST['stripeEmail'];
try {
  if (trim($address) == '' OR trim($number) == '') {
    throw new Exception('Fill  all fields please!');
  }
  $charge = \Stripe\Charge::create(array(
    "amount" =>  $_SESSION['totalSumm'] * 100 ,
    "currency" => "gbp",
    "source" => $token,
    "description" => "Charge for " . $email
  ));
  // Add to user history
  include '../bdConnect.php';  
  $dbname = $hostingName.'users';
  $id = $_SESSION['id'];
  $tableName = 'usersforsushi';
  date_default_timezone_set('Europe/London');
  $sTime = date("d-m-Y H:i:s");  
  $conn = new mysqli($servername, $username, $serverpassword , $dbname); 
  $history = '<p class="history">'.$sTime."<br> TOTAL SUMM:" . $_SESSION['totalSumm'].'</p>';
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
  $message .= '<p> ADDRESS:'. $address.'</p> <p>PHONE NUMBER:'. $number.'</p> <p> Total summ:'. $_SESSION['totalSumm'].'</p> </body> </html>';
  $headers = "From:  Private \r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n"; 
  mail("leonid.gurockin@gmail.com", "New question" ,$message , $headers);
  unset($_SESSION['totalSumm']);
  unset($_SESSION['order']);
} catch(\Stripe\Error\Card $e) {
  // The card can't be charged for some reason
  printError($e);
} catch (\Stripe\Error\RateLimit $e) {
  // Too many requests made to the API too quickly
  printError($e);
} catch (\Stripe\Error\InvalidRequest $e) {
  // Invalid parameters were supplied to Stripe's API
  printError($e);
} catch (\Stripe\Error\Authentication $e) {
  // Authentication with Stripe's API failed
  // (maybe you changed API keys recently)
  printError($e);
} catch (\Stripe\Error\ApiConnection $e) {
  // Network communication with Stripe failed
  printError($e);
} catch (\Stripe\Error\Base $e) {
  // Display a very generic error to the user, and maybe send
  // yourself an email
  printError($e);
} catch (Exception $e) {
  // Something else happened, completely unrelated to Stripe
  echo($e);
}
// Helper function to display errors back in the html page
function printError($error) {
  $body = $error->getJsonBody();
  $err  = $body['error'];
  print('An error happened in the server side script<br>');
  print('Status is: ' . $error->getHttpStatus() . '<br>');
  print('Type is: ' . $err['type'] . '<br>');
  print('Code is: ' . $err['code'] . '<br>');
  print('Param is: ' . $err['param'] . '<br>');
  print('Message is: ' . $err['message'] . '<br>');
}
?>