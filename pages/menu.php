<?php session_start();
include 'bdConnect.php';
$dbname =  $hostingName."sushi";
$conn = new mysqli($servername, $username, $serverpassword, $dbname); 
$sql = "SELECT * FROM menu"; 
$result = $conn->query($sql); 
$i = 0;
//  CREATE divs WITH INFORMATION(IMG, TEXT) FROM DB AND ONCLICK ON IMG - SEND IMG PATCH FROM DB TO POP UP /ONCLICK ON BUTTON ADD to BSK INFO TO orderphp.php  
while($row = $result->fetch_assoc()) { ?>
  <div class="row row-eq-height menu-row"  >
    <div class="col-xs-5 col-sm-3 preloader row-eq-height">
      <div class="col-xs-8 menu-big-img-container"  onclick="ShowImgPreview<?php echo '(\''.$row["img1"]. '\',\''.$row["img2"]. '\',\''.$row["img3"]. '\',\''.$row["img4"].'\',\''.strtoupper($row["name"]).'\')'?>">
          <span class="helper"></span>
          <img class="  menu-big-img"  data-src=img/menu/<?php echo $row["img1"] ?> > 
          <p class="text-center clickToResize" >Click to Resize</p>  
      </div>
      <div class="col-xs-4 menu-all-small-img-container">
        <div class="col-xs-12 menu-small-single-img-container" onclick="ShowImgPreview<?php echo '(\''.$row["img2"]. '\',\''.$row["img3"]. '\',\''.$row["img4"]. '\',\''.$row["img1"].'\',\''.strtoupper($row["name"]).'\')'?>">
          <img class="img-responsive menu-small-img"   data-src=img/menu/<?php echo $row["img2"] ?> >
        </div>
        <div class="col-xs-12 menu-small-single-img-container" onclick="ShowImgPreview<?php echo '(\''.$row["img3"]. '\',\''.$row["img4"]. '\',\''.$row["img1"]. '\',\''.$row["img2"].'\',\''.strtoupper($row["name"]).'\')'?>">
            <img class="img-responsive menu-small-img" data-src=img/menu/<?php echo $row["img3"]?> > 
        </div>
        <div class="col-xs-12 menu-small-single-img-container" onclick="ShowImgPreview<?php echo '(\''.$row["img4"]. '\',\''.$row["img1"]. '\',\''.$row["img2"]. '\',\''.$row["img3"].'\',\''.strtoupper($row["name"]).'\')'?>">
          <img class="img-responsive menu-small-img"   data-src=img/menu/<?php echo $row["img4"]?> >
        </div>
      </div>
    </div>
    <div class="col-xs-5 col-sm-7 menu-description-box">
      <p class="sushi-name" ><?php echo strtoupper($row["name"]) ?></p>
      <p class="menu-description"><?php echo strtoupper($row["description"])?></p>
    </div>
    <div class="col-xs-2 menu-price-box">
      <div  class="add-to-basket-preloader">
        <div class="spinner-for-basket-preloader"></div>
      </div>
        <p class="menu-price"> PRICE: &#163; <?php echo $row["price"]?> </p>
          <form class="add-to-basker-form">
            <input class="quantity" type="number"   value="1" max="24" min="1"  oninput="max_quantity(<?php echo $i ?>)" /> 
            <button class="add-to-basceket-btn btn" onclick="buy<?php echo '(\''.$row["id"].'\',\''.$i.'\')'?>" >
              ADD TO BASKET
            </button> 
          </form>
      </div>
  </div>
  <?php
  $i++; //  index for ADD to bascket btn
}?>
 <!-- POP UP / SEND MAIL FORM-->
<div id="PopUp" >
  <div id="pop-up-left-container" onclick="PopUpHide()"></div>
  <div id="pop-up-header"> 
    <div id="pop-up-header-text"></div>
    <div id="x-button" class="text-right" onclick="PopUpHide()"></div> 
  </div>
  <!-- pop content -->
  <div id="PopUp-wrapper">
    <div id="back-btn-shevrone"></div> 
    <div id="PopUp-content"></div>    
    <div id="next-btn-shevrone" ></div>   
  </div>
  <div id="pop-up-right-container" onclick="PopUpHide()"></div> 
</div> 