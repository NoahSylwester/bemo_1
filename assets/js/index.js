$(document).ready(function(){

  var div = $(".menu");
  var arrow = $("#up-arrow");

  arrow.on("click", function(){
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    })
  })

  $(window).scroll(function () {
   var windowpos = $(window).scrollTop();

   // if you scroll more than 200px, add additional styling
   if (windowpos >= (200)) {
     div.addClass("scrolled-menu");
     arrow.addClass("show-arrow");
   }
   //If scroll is less than 200px, remove
   else {
     div.removeClass("scrolled-menu");
     arrow.removeClass("show-arrow")
   }
 
    });
});

navbarClick = () => {
  var nav = document.getElementById("nav-links");
  var menu = document.getElementById("menu");
  if (nav.className === "nav-links") {
    nav.className += " responsive";
    menu.className += " responsive";
  } else {
    nav.className = "nav-links";
    menu.className = "menu";
  }
}