$(window).on('load', function() {
  $('#spinner').fadeOut(750);
  $('#page-preloader').fadeOut(1000);
  $(window).scrollTop(0);
})
function max_quantity(index) {
  var quantity = $('.quantity').eq(index).val();
  if (quantity > 24) {
    $('.quantity').eq(index).val('24');
  } else if (quantity < 1) {
    $('.quantity').eq(index).val('1');
  }
}
// menu affix
$(window).scroll(function() {
  if ($(document).width() < 760){
    var padding_top = 30;
    var scroll_from_top = 30;
  } else {
    var padding_top = 170;
    var scroll_from_top = 130;
  }
  if ($(this).scrollTop() > scroll_from_top) {
    $('#nav-bar-header').slideUp(0);
    $('#nav-bar').css('position' ,' fixed'); 
    $('.container-fluid').css('padding-top' ,padding_top); 
  } else {
    $('#nav-bar-header').slideDown(0);
    $('#nav-bar').css('position' ,' static'); 
    $('.container-fluid').css('padding-top' ,'0px'); 
  }
})
function page_reload(){
  changePage(); // reload content
}
function log_in(event) {   
  event.preventDefault();
  var login = $('#login').val(); 
  var password = $('#pwd').val();
  $.post("pages/authorization/loginphp.php",{login:login , password:password },function(data){
    if (data == '') {
      $("#authorization_form").load( "pages/userArea/userArea.php", function() {
        changePage(); 
      })
    } else {
      var result = JSON.parse(data) ;
      $("#login-err").hide().slideDown(200).html(result); 
      result = String(result);
      $('#login').addClass("errorbg");
      $('#pwd').addClass("errorbg");
    }
  })
}
function logout() {
  $.post("pages/authorization/logOut.php" ,function(){
    $("#authorization_form").load('pages/userArea/userArea.php');
    changePage();     
  }) 
}
//Delete one of order item (php handler is on same (this) page)
function deleteOrder(id , quantity,index) {  
  $.ajaxSetup({async: false});
  $.post("pages/orders/deleteOrder.php",{ id:id ,quantity:quantity,index:index },function(data){ 
    var result =  JSON.parse(data);//return tottal price
    $("#totalSumm").html(parseFloat(result.toFixed(2))); // reload bascet
    changePage(); // reload content
  })
}
function buy(event,id, index) {
  event.preventDefault();
  $('.add-to-basket-preloader').eq(index).fadeIn(0);
  var quantity = $('.quantity')[index].value; // get input value (quantity)
  $.post("pages/orders/orderphp.php",{id: id , quantity:quantity },function(data){  
    var result =  JSON.parse(data);//return tottal price
    $("#totalSumm").html(parseFloat(result.toFixed(2))); // reload bascet
    $('.quantity')[index].value = 1;
    $('.add-to-basket-preloader').fadeOut(1250);
  })
} 
//Send info from fields to payByCash.php and display success or errors by return
function PayByCash() {
  $("#payment-errors").hide();
  var address = $('#address').val(); 
  var phone = $('#phone').val(); 
  var post_code = $('#post-code').val(); 
  if ((address == '') || (phone == '') || (post_code == '') ) {
      $("#payment-errors").fadeIn(500).html('<p class="payment-err"> FILL ALL FIELDS PLEASE!</p>'); 
      if (address == '') {
        $('#address').addClass("errorbg");
      }
      if (phone == '') {
        $('#phone').addClass("errorbg");
      }
      if (post_code == '') {
        $('#post-code').addClass("errorbg");
      } 
  } else {
    $('#payment-in-process').css('display','block');
    $.post("pages/paymant/payByCash.php",{ address:address , phone:phone , postCode:post_code },function(data){ 
      if (data == '') {
        $('#payment-in-process').css('display','none');
        $.post('pages/orders/successOrder.php', {succes:'true'},function(data) { 
          $('#totalSumm').html('0.00');
          $('#main-content').html(data);
          $(window).scrollTop(0);
        })
      } else { 
        $("#payment-in-proces").fadeOut(750);
        var result = JSON.parse(data) ;
        $("#payment-errors").hide().fadeIn(500).html(result); 
      }    
    })
  }
}
function changePsw() {
  var oldPassword = $("#oldPassword").val();
  var newPassword = $("#newPassword").val();
  var Rnewpassword = $("#Rnewpassword").val();
  $.post("pages/userArea/passwordChangephp.php",{oldPassword:oldPassword , newPassword:newPassword , Rnewpassword:Rnewpassword  },function(data){
    if (data == '') {
        $.post("pages/userArea/userArea.php" ,function(){
           logout();    
        }) 
    } else {
      var result = JSON.parse(data) ;
      $("#change-psw-errors-container").hide().show(250).html(result); 
    }
  }) 
} 
//SEND DATA TO SERVER - CHECK ERRORS AND IF NO ERRORS WRITE TO DB AND DOWNLOAD FILES
function changeavatar() {
  var form =  new FormData($('#uploadForm')[0]);
  $.ajax({
    url: "pages/userArea/changeavatar.php",
    type: "POST",
    data:   form, //  передает объект , по сути всю форму 
    contentType: false,
    cache: false,
    processData:false,
      success: function(result){
        if (result === "") {
            $("#authorization_form").load('pages/userArea/userArea.php');
            page_reload(); 
        } else { 
          var result = JSON.parse(result) ;
          $("#change-avatar-errors-container").hide().show(250).html(result); 
        }            
      }      
  })    
}
// IMAGE PREVIEW FUNCTION
function SetPicturePreview(input , id) {
  var reader2 = new FileReader(); // READ FILES FROM USER PC
  reader2.onload = function(result) { 
    $(id).show();
    $(id).attr('src', result.target.result);
  }
  reader2.readAsDataURL(input.files[0]); 
}
//FUNCTION LOAD IMAGES INTO POP UP WHERE firstImg IS row[img1]  FROM DB , secondImg is row[img2] from db etc.
function ShowImgPreview(firstImg ,secondImg,thirdImg,fourthImg,tittle){
  $("#PopUp").show(250);
  $("#PopUp-content").html('<img class="img-responsive" width="50%" style="margin: 0 auto; max-height:100vh;" src="img/menu/'+firstImg+'">'); 
  $("#pop-up-header-text").html(tittle);
  //onclick next button
  var i = 0;
  $("#next-btn-shevrone").on("click", function(){
    var images = [firstImg, secondImg, thirdImg , fourthImg]; // create an array for busting
    i++; //counter to show next photo
    if (i > 3) {i = 0 }; // when counter is 4 then reset it to 0 , because we have only 4 photos
    $("#PopUp-content").html('<img class="img-responsive" width="50%" style="margin: 0 auto;" src="img/menu/'+ images[i] +'">');
  })
  //onclick  back button
  $("#back-btn-shevrone").on("click", function(){ 
    var images = [firstImg, secondImg, thirdImg , fourthImg];
    i--; //counter to show previus photo
    if (i < 0) {i = 3 }; //when counter is -1 then reset it to 3 , because we have only 4 photos
    $("#PopUp-content").html('<img class="img-responsive" width="50%" style="margin: 0 auto;" src="img/menu/'+ images[i] +'">');
  });
}
// function hide pop up on X button onclick
function PopUpHide(){
  $("#PopUp").hide(250);
}
//Hide pop up on ESC button
$(document).keyup(function(e) {
  var esc_btn = 27 ;
  if (e.keyCode === esc_btn) $('#PopUp').hide(250);
});
 // REGISTRATION FUNCTION 
function reg() {
  event.preventDefault();
  var email = $('#mail').val();
  var login = $('#reg-login').val();    
  var password = $('#password').val();
  var Rpassword = $('#Rpassword').val();  
  $.post("pages/authorization/regphp.php",{email: email ,login:login, password:password , Rpassword:Rpassword },function(data){
    if (data == '') {
      $("#authorization_form").load( "pages/userArea/userArea.php", function() {
        changePage(); 
      })
    } else {
      var result = JSON.parse(data) ;
      $("#reg-err-container").hide().show().html(result); 
      result = String(result);
      if (result.includes("E-mail")) {
        $('#mail').addClass("errorbg");
      }
      if (result.includes("Login")) {
        $('#reg-login').addClass("errorbg");
      }
      if (result.includes("Passwords")) {
        $('#password , #Rpassword').addClass("errorbg");
      } 
      
      $(window).scrollTop(0);
    }
  });
}
 // lazy img loading starts on every hash change
 function lazy_img_load(){
 Array.prototype.forEach.call( $('img[data-src]'),  function(img) {
      img.setAttribute('src', img.getAttribute('data-src'));
      img.onload = function() {
        setTimeout(function() {
          img.removeAttribute('data-src');
          $('.preloader').css("background-image" , "none");
          $('.clickToResize').css("display" , "block")
          
        }, 750)
      }
    })
}
// CARD PAYMENT
var handler = StripeCheckout.configure({
  // Put you publishable API key here. I can be found at https://dashboard.stripe.com/account/apikeys
  key: 'pk_test_VUhmrpq9oExL8VbmTcsPwXrC',
  image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
  locale: 'auto',
  currency: 'gbp',
  token: function(token) {
    $("#payment-in-process").show();
    var address = $('#address').val(); 
    var phone = $('#phone').val(); 
    $.ajax({
      method: 'POST',
      // Put the path of your server side script here
      url: 'pages/paymant/cardPaymant.php',
      data: { stripeToken: token.id, stripeEmail: token.email , address:address, phone:phone}
    })
    .done(function( msg ) {
      if (msg == '') {
        $.post('pages/orders/successOrder.php', {succes:'true'},function(data) { 
          $("#payment-errors, #spiner-for-payment").fadeOut(750); 
          $('#totalSumm').html('0.00');
          $('#main-content').html(data);
          $(window).scrollTop(0);
        })
      } else {
        $("#payment-errors, #spiner-for-payment").fadeOut(750); 
        var result = JSON.parse(msg) ;
        $("#payment-errors").hide().fadeIn(500).html(result); 
      }
    })
    .fail(function( jqXHR, textStatus ) {
      $('ajax-response').html('Something went wrong with the Ajax Call:' + textStatus);
    })
  }
})
function cardPaymant(price) {
  $("#payment-errors").hide();
  $('.container-for-g-recaptcha').hide();
  var address = $('#address').val(); 
  var phone = $('#phone').val();
  var post_code = $('#post-code').val(); 
  if ((address == '') || (phone == '') || (post_code == '') ) {
    $("#payment-errors").fadeIn(500).html('<p class="payment-err"> FILL ALL FIELDS PLEASE!</p>'); 
    if (address == '') {
      $('#address').addClass("errorbg");
    }
    if (phone == '') {
      $('#phone').addClass("errorbg");
    }
    if (post_code == '') {
      $('#post-code').addClass("errorbg");
    } 
  } else {
    handler.open({
      name: 'SUSHI-BAR.COM',
      description: 'SUSHI BAR',
      amount: price * 100,
    })
  }
}
// Close Checkout on page navigation:
$(window).on('popstate', function() {
  handler.close();
});