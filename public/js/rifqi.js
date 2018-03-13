$(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    if(scroll == 0){
      $(".navbar").css('background-color', 'transparent');
      $(".navbar").css('height', '80px');
      $(".nav-pills .nav-link").css('color', '#fff');
      $(".nav-pills .nav-link.active, .nav-pills .show>.nav-link").css('color', '#fff');
      $(".navbar-light .navbar-brand").css('color', '#fff');
      $(".navbar").css("box-shadow", "0 0 0px rgba(0,0,0,.2)");
      $(".button-login").css("background-color", "#fff");
      $(".button-login").css("color", "#fff");
      $(".button-login").css("background", "linear-gradient(45deg, #19d9b4 0%, #92d275 100%)");
      $(".arrow").css('display', 'none');
    }else{
      $(".navbar").css('background-color', '#fff');
      $(".navbar").css('height', '70px ');
      $(".nav-pills .nav-link").css('color', 'rgba(0,0,0,0.5)');
      $(".nav-pills .nav-link.active, .nav-pills .show>.nav-link").css('color', '#E32415');
      $(".navbar-light .navbar-brand").css('color', '#000');
      $(".navbar").css("box-shadow", "0 0 15px rgba(0,0,0,.2)");
      $(".button-login").css("background-color", "#DF2029");
      $(".button-login").css("color", "#fff");
      $(".button-login").css("background", "linear-gradient(45deg, #ff6ba7 0%, #ff8765 100%)");
      $(".arrow").css('display', 'block');
    }
});
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();
});
// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 300, function() {
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) {
            return false;
          } else {
            $target.attr('tabindex','-1');
            $target.focus();
          };
        });
      }
    }
  });