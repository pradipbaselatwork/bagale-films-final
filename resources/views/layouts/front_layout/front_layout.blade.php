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
<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<style>

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

video::cue {
  opacity: 0;
}

.caption_text {
  position: absolute;
  left: 50%;
  bottom: 10%;
  width: 90%;
  max-width: 90%;
  transform: translate(-50%, -50%);
  text-align: center;
  user-select: none;
  transition: bottom 0.3s;
  /*.video_player */
}

.caption_text.active {
  bottom: 0%;
}

.caption_text mark {
  background-color: #0000008f !important;
  color: #fff;
}


.material-icons {
  user-select: none;
  -webkit-user-select: none;
  cursor: pointer;
}

/* body {
  background-color: #002333;
} */

/* section {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: calc(100vh - 51px);
  width: 100%;
  padding: 1.7%;
}
*/
.show_video {
  position: relative;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
} 

/* Video player Styling */
.show_video .video_player {
  position: relative;
  width: 700px;
  height: 100%;
  background: #000;
  overflow: hidden;
}
.show_video .video_player .loader{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  width: 60px;
  height: 60px;
  border: 4px solid #fff;
  border-bottom-color: transparent;
  border-radius: 50%;
  z-index: 1;
  animation: animate 0.6s linear infinite;
  display: none;
}
@keyframes animate{
  0%{
    transform: translate(-50%,-50%) rotate(0deg);
  }
  100%{
    transform: translate(-50%,-50%) rotate(360deg);
  }
}
.show_video .video_player .thumbnail{
  position: absolute;
  bottom: 80px;
  left: calc(var(--x) + 11px);
  transform: translateX(-50%);
  width: 165px;
  height: 90px;
  background: #fff;
  border: 2px solid #fff;
  border-radius: 3px;
  display: none;
}
.show_video .video_player .main-video {
  position: relative;
  width: 100%;
  height: 100%;
  outline: none;
}

.video_player .progressAreaTime {
  position: absolute;
  left: calc(var(--x) + 11px);
  transform: translateX(-50%);
  bottom: 50px;
  min-width: 60px;
  text-align: center;
  white-space: nowrap;
  padding: 5px 10px;
  color: #fff;
  font-size: 14px;
  font-weight: 400;
  z-index: 1;
  display: none;
}

.show_video .video_player .controls {
  position: absolute;
  bottom: 0;
  left: 0;
  height: 50px;
  width: 100%;
  background: rgb(0 0 0 / 29%);
  box-shadow: 0 0 40px 10px rgb(0 0 0 / 25%);
  z-index: 3;
  /* transform: translateY(180%); */
  transition: 0.3s;
  padding: 0px 10px;
}

.show_video .video_player .controls.active {
  transform: translateY(0);
}

.video_player .controls .progress-area {
  width: 100%;
  height: 5px;
  margin: auto;
  background: #f0f0f063;
  cursor: pointer;
  position: relative;
}

.controls .progress-area .progress-bar {
  position: relative;
  width: 0%;
  background: rgb(255, 174, 0);
  height: inherit;
  border-radius: inherit;
  cursor: pointer;
}

.controls .progress-area .progress-bar::before {
  content: "";
  position: absolute;
  width: 14px;
  height: 14px;
  border-radius: 50%;
  right: -5px;
  top: 50%;
  transform: translateY(-50%);
  background: rgb(255, 174, 0);
}

.controls .progress-area .bufferedBar{
  position: absolute;
  top: 0%;
  right: 0%;
  width: 100%;
  height: inherit;
}

.controls .controls-list {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: nowrap;
  width: 97%;
  height: 46px;
  margin: 0 auto;
}

.controls .controls-list .controls-left,
.controls .controls-list .controls-right {
  display: flex;
  justify-content: center;
  align-items: center;
}

.controls .controls-left .timer {
  display: inline-block;
  font-size: 14px;
  white-space: nowrap;
  color: #fff;
  margin-left: 5px;
  text-align: center;
}

.controls .icon {
  display: inline-flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  color: #fff;
  margin-left: 8px;
  margin-right: 5px;
}

.controls .icon .material-icons {
  font-size: 26px;
  color: #fff;
  cursor: pointer;
}

.controls .icon .material-icons.fast-rewind:active {
  transition: 0.2s;
  transform: rotate(-45deg);
}

.controls .icon .material-icons.fast-forward:active {
  transition: 0.2s;
  transform: rotate(45deg);
}

.controls .icon .volume_range {
  -webkit-appearance: none;
  appearance: none;
  width: 0px;
  height: 3px;
  background: #fff;
  color: #fff;
  cursor: pointer;
  outline: none;
  border: none;
  transition: 0.4s;
}

.controls .icon .volume_range::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 12px;
  height: 12px;
  border-radius: 50%;
  border: none;
  outline: none;
  background: #fff;
  color: #fff;
  opacity: 0;
  transition: 0.3s;
}

.controls .icon:hover .volume_range {
  display: inline-block;
  width: 60px;
}

.controls .icon:hover .volume_range::-webkit-slider-thumb {
  opacity: 1;
  pointer-events: auto;
  transition: 0.5s;
}

.controls-right .icon .auto-play {
  width: 30px;
  height: 10px;
  border-radius: 20px;
  position: relative;
  margin-right: 8px !important;
  background: #b6b6b6;
}

.controls-right .icon .auto-play::before {
  content: "\e034";
  position: absolute;
  left: -5px;
  top: 50%;
  transform: translateY(-50%);
  width: 17px;
  height: 17px;
  line-height: 17px;
  font-size: 14px;
  background: #727272;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  border-radius: 50%;
  font-family: "Material Icons";
}

.controls-right .icon .auto-play.active::before {
  content: "\e037";
  left: 15px;
  font-family: "Material Icons";
}

.controls-right .icon .material-icons.settingsBtn {
  font-size: 24px;
  transition: 0.3s;
}

.controls-right .icon .settingsBtn.active {
  transform: rotate(45deg);
}
 
.video_player .captions,
.video_player .settings {
  position: absolute;
  right: 25px;
  bottom: 62px;
  background: rgb(28 28 28 / 90%);
  width: 200px;
  max-height: 250px;
  height: auto;
  color: #fff;
  overflow-y: auto;
  z-index: 20;
  display: none;
  border-radius: 5px;
}
 
.video_player .captions.active,
.video_player .settings.active {
  display: block;
}
 
.video_player .captions .caption span,
.video_player .settings > div > span {
  font-size: 14px;
  font-weight: 300;
  padding: 15px 30px;
  border-bottom: 1px solid rgb(83, 83, 83);
  display: flex;
  justify-content: space-between;
  align-items: center;
  white-space: nowrap;
}
.video_player .settings > div .icon{
  font-size: 14px;
  margin: 0 5px;
  cursor: pointer;
}
.video_player .settings > div ul li span{
 pointer-events: none;
}

.video_player .captions .caption ul,
.video_player .settings > div ul {
  position: relative;
}

.video_player .captions .caption ul li,
.video_player .settings > div ul li {
  position: relative;
  width: 100%;
  cursor: pointer;
  text-align: left;
  padding: 12px 33px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 14px;
}

 .video_player .captions .caption ul li:hover,
 .video_player .settings > div ul li:hover {
  background: rgba(28, 28, 28, 0.9);
}

.video_player .captions .caption ul li.active::before,
.video_player .settings > div ul li.active::before {
  content: "\e876";
  font-family: "Material Icons";
  position: absolute;
  left: 7px;
  top: 50%;
  transform: translateY(-50%);
  padding-right: 10px;
  font-size: 18px;
}

.video_player .captions::-webkit-scrollbar,
.video_player .settings::-webkit-scrollbar {
  width: 8px;
  background: transparent;
}

.video_player .captions::-webkit-scrollbar-thumb,
.video_player .settings::-webkit-scrollbar-thumb {
  height: 20px;
  border: 2px solid transparent;
  background: rgba(83, 83, 83, 0.9);
  border-radius: 20px;
}



@media (max-width: 430px) {
  .show_video {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  

  .controls .icon {
    margin-left: 5px;
    margin-right: 5px;
    font-size: 24px;
  }

  .volume,
  .volume_range,
  .auto-play,
  .fast-forward,
  .picture_in_picutre {
    display: none;
  }
}
</style>

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
<script type="text/javascript" src="{{ asset('front/js/video.js') }}"></script> 


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
//   "use strict";
        // document.addEventListener('DOMContentLoaded', function() {
        //     // Activate only if not already activated
        //     if (window.hideYTActivated) return;
        //     // Activate on all players
        //     let onYouTubeIframeAPIReadyCallbacks = [];
        //     for (let playerWrap of document.querySelectorAll(".hytPlayerWrap")) {
        //         let playerFrame = playerWrap.querySelector("iframe");

        //         let tag = document.createElement('script');
        //         tag.src = "https://www.youtube.com/iframe_api";
        //         let firstScriptTag = document.getElementsByTagName('script')[0];
        //         firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        //         let onPlayerStateChange = function(event) {
        //             if (event.data == YT.PlayerState.ENDED) {
        //                 playerWrap.classList.add("ended");
        //             } else if (event.data == YT.PlayerState.PAUSED) {
        //                 playerWrap.classList.add("paused");
        //             } else if (event.data == YT.PlayerState.PLAYING) {
        //                 playerWrap.classList.remove("ended");
        //                 playerWrap.classList.remove("paused");
        //             }
        //         };

        //         let player;
        //         onYouTubeIframeAPIReadyCallbacks.push(function() {
        //             player = new YT.Player(playerFrame, {
        //                 events: {
        //                     'onStateChange': onPlayerStateChange
        //                 }
        //             });
        //         });

        //         playerWrap.addEventListener("click", function() {
        //             let playerState = player.getPlayerState();
        //             if (playerState == YT.PlayerState.ENDED) {
        //                 player.seekTo(0);
        //             } else if (playerState == YT.PlayerState.PAUSED) {
        //                 player.playVideo();
        //             }
        //         });
        //     }

        //     window.onYouTubeIframeAPIReady = function() {
        //         for (let callback of onYouTubeIframeAPIReadyCallbacks) {
        //             callback();
        //         }
        //     };

        //     window.hideYTActivated = true;
        // });
        // alert('hello')
        

        // Function to reveal lightbox and adding YouTube autoplay
        // function revealVideo(div, video_id) {
        //     $('body').addClass('popup');
        //     // alert('home')
        //     window.location.href = "https://facebook.com";
        //     var video = document.getElementById(video_id).src;
        //     document.getElementById(video_id).src = video + '&autoplay=1'; // adding autoplay to the URL
        //     document.getElementById(div).style.display = 'block';
        // }
        // // Hiding the lightbox and removing YouTube autoplay
        // function hideVideo(div, video_id) {
        //     $('body').removeClass('popup');
        //     var video = document.getElementById(video_id).src;
        //     var cleaned = video.replace('&autoplay=1', ''); // removing autoplay form url
        //     document.getElementById(video_id).src = cleaned;
        //     document.getElementById(div).style.display = 'none';
        // }
        // jQuery(function() {
        // });

        // function onYouTubeIframeAPIReady() {
        //     alert('helo')
        //     player = new YT.Player('player', {
        //         height: '390',
        //         width: '640',
        //         videoId: 'M7lc1UVf-VE',
        //         playerVars: {
        //         'playsinline': 1
        //         },
        //         events: {
        //         'onReady': onPlayerReady,
        //         'onStateChange': onPlayerStateChange
        //         }
        //     });
        //     }
        // function Reset() 
        // {
        //     alert('hello')
        // }
	</script> 

<!--Bootstrap Collapsible Panel With Up/Down Arrow Icon-->

</body>
</html>
