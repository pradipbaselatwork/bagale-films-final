<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="shortcut icon" href="{{ asset('front/images/favicon.png') }}" type="image/x-icon">
<title>Bagalefilms | Home</title>
<link rel="stylesheet" type="text/css" href="{{ asset('front/css/bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/fontawesome-free-6.0.0-web/css/fontawesome.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/fontawesome-free-6.0.0-web/css/solid.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/fontawesome-free-6.0.0-web/css/regular.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/fontawesome-free-6.0.0-web/css/brands.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/font-awesome-4.7.0/css/font-awesome-4.7.0.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/css/animate.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('front/lightbox/css/lightbox.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/css/hover-min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('front/css/owl.carouselv2.3.4.css') }}"/>
<link rel="stylesheet" type="text/css"  href="{{ asset('front/css/reset.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('front/css/responsive.css') }}" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400&display=swap" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>
    @yield('content')
<!--//back to top scroll--> 

<script type="text/javascript" src="{{ asset('front/js/jquery-1.9.1.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('front/js/owl.carouselv2.3.4.js') }}"></script> 
<script type="text/javascript">
 
$('.banner-slider .owl-carousel').owlCarousel({
  loop: true,
  rewind: true,
  margin: 10,
  dots:false,
  nav: true,
  navText: [
    "<i class='fa-solid fa-angle-left'></i>",
    "<i class='fa-solid fa-angle-right'></i>"
  ],
  autoplay: true,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1
    }
	
  }
  
})

</script> 
<script type="text/javascript" src="{{ asset('front/js/fixed-nav.js') }}"></script> 
<script type="text/javascript" src="{{ asset('front/js/jquery.js') }}"></script> 
<script type="text/javascript" src="{{ asset('front/js/bootstrap.js') }}"></script> 
<script type="text/javascript" src="{{ asset('front/js/Push_up_jquery.js') }}"></script> 
<script type="text/javascript" src="{{ asset('front/js/annimatable_jquery.js') }}"></script> 
<script type="text/javascript" src="{{ asset('front/js/front_script.js') }}"></script> 

<!--Bootstrap Collapsible Panel With Up/Down Arrow Icon--> 
<script type="text/javascript">
	 $('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
  });

  $('.show-more-content').hide();

  $('.show-more').click(function() {
      $('.show-more-content').show(300);
      $('.show-less').show();
      $('.show-more').hide();
  });

  $('.show-less').click(function() {
      $('.show-more-content').hide(150);
      $('.show-more').show();
      $(this).hide();
  });
  "use strict";
        document.addEventListener('DOMContentLoaded', function() {
            // Activate only if not already activated
            if (window.hideYTActivated) return;
            // Activate on all players
            let onYouTubeIframeAPIReadyCallbacks = [];
            for (let playerWrap of document.querySelectorAll(".hytPlayerWrap")) {
                let playerFrame = playerWrap.querySelector("iframe");

                let tag = document.createElement('script');
                tag.src = "https://www.youtube.com/iframe_api";
                let firstScriptTag = document.getElementsByTagName('script')[0];
                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                let onPlayerStateChange = function(event) {
                    if (event.data == YT.PlayerState.ENDED) {
                        playerWrap.classList.add("ended");
                    } else if (event.data == YT.PlayerState.PAUSED) {
                        playerWrap.classList.add("paused");
                    } else if (event.data == YT.PlayerState.PLAYING) {
                        playerWrap.classList.remove("ended");
                        playerWrap.classList.remove("paused");
                    }
                };

                let player;
                onYouTubeIframeAPIReadyCallbacks.push(function() {
                    player = new YT.Player(playerFrame, {
                        events: {
                            'onStateChange': onPlayerStateChange
                        }
                    });
                });

                playerWrap.addEventListener("click", function() {
                    let playerState = player.getPlayerState();
                    if (playerState == YT.PlayerState.ENDED) {
                        player.seekTo(0);
                    } else if (playerState == YT.PlayerState.PAUSED) {
                        player.playVideo();
                    }
                });
            }

            window.onYouTubeIframeAPIReady = function() {
                for (let callback of onYouTubeIframeAPIReadyCallbacks) {
                    callback();
                }
            };

            window.hideYTActivated = true;
        });
	</script> 

<!--Bootstrap Collapsible Panel With Up/Down Arrow Icon-->

</body>
</html>
