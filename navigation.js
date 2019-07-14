// When page loads first time
$(document).ready(function(){
  changePage(); 
})
//on hashchange load changepage function
$(window).on('hashchange', function() { 
  changePage(); 
})
//load page received from hash  into .content 
function changePage() {
  var link = location.hash.replace("#", ""); //delete # simvol from string
  if (link == ''){ //if hash empty then redirect to main page(first visit for example)
    link = "mainPage";
  } 
  //rewrite main content content!
  $.get('pages/'+ link + '.php', function(data) {
    $('#main-content').html(data);
    lazy_img_load();
    $(window).scrollTop(0);
    $('#menu-list>li').removeClass('active');
    if (link.includes("orderbasket")){
      link = "orderbasket";
    } 
    if (link.includes("cms") || link.includes("registration") ){
      link = "";
    } else {
      $('.'+link).addClass('active');
    }
  })
//If page not exist (if error)
  .fail(function() {
    $.get('pages/404.php', function(data)  { 
     $('#main-content').html(data);
     $(window).scrollTop(0);
    })
  })
}