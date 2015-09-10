
jQuery(document).ready(function() {

    /*
        Background slideshow on index.html
    */
    $('.imgcontainer').backstretch([
      "assets/img/backgrounds/1.jpg"
    , "assets/img/backgrounds/2.jpg"
    , "assets/img/backgrounds/3.jpg"
    ], {duration: 6000, fade: 1000});

    $('.loginwrapper').backstretch(["/mychef/assets/img/backgrounds/4.jpg"]);
    
    $('.loginwrap').backstretch(["/mychef/assets/img/backgrounds/loginbg.jpg"]);
    /*
	    Countdown initializer
	*/  
	// $('.timer').countdown('2015/07/15', function(event) {
	// 	$(this).find('.days').text(event.offset.totalDays);
	// 	$(this).find('.hours').text(event.offset.hours);
	// 	$(this).find('.minutes').text(event.offset.minutes);
	// 	$(this).find('.seconds').text(event.offset.seconds);
	// });

    /*
        Tooltips
    */
    $('.social a').tooltip();

    /*
        Subscription form
    */
    $('.subscribe form').submit(function(e) {
    	e.preventDefault();
        var postdata = $('.subscribe form').serialize();
        $.ajax({
            type: 'POST',
            url: 'assets/subscribe.php',
            data: postdata,
            dataType: 'json',
            success: function(json) {
                if(json.valid == 0) {
                    $('.success-message').hide();
                    $('.error-message').hide();
                    $('.error-message').html(json.message);
                    $('.error-message').fadeIn();
                }
                else {
                    $('.error-message').hide();
                    $('.success-message').hide();
                    $('.subscribe form').hide();
                    $('.success-message').html(json.message);
                    $('.success-message').fadeIn();
                }
            }
        });
    });

    $(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1500);
        return false;
      }
    }
  });
});

});

// $(document).ready(function() {
 
// var stickyNav = function(){
// var scrollTop = $(window).scrollTop();
      
// if (scrollTop > 0) { 
//     $('.navbar').addClass('sticky');
// } else {
//     $('.navbar').removeClass('sticky'); 
// }

// };

// var stickyFoot = function(){
//     var scrollTop = $(window).scrollTop();
    
//     if(scrollTop >= 550) 
//     {
//         $('#newsletter').removeClass('hidden');
//     }
//     else {
//         $('#newsletter').addClass('hidden');
//     }
// }
 
// stickyNav();
// stickyFoot();
 
// $(window).scroll(function() {
//     stickyNav();
//     stickyFoot();
// }); 
// });
