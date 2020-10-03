<?php 
session_start();
//set_include_path($_SERVER['DOCUMENT_ROOT'].'/controller');
set_include_path($_SERVER['DOCUMENT_ROOT'].'/ebrebooted/controller');
require_once('DBconnection.php');

$var= "SELECT * FROM emblem";
$result=$conn->query($var);
$numOfBlog=$result->num_rows;

$blogList = array();
if($numOfBlog>0)
{
  $index=0;
  while ($row=$result->fetch_assoc()) {
  	//if($row['Approval']==1)
  	//{
    	//$blogList[$index]=array('eid'=>$row['eid'],'hface'=> $row['hero_face'], 'hmoment'=>$row['hero_moment'] );
		$blogList[$index]=array('eid'=>$row['eid'],'hname'=> $row['hero_name'], 'hface'=> $row['hero_face'], 'hmoment'=>$row['hero_moment'] );
    	// if($row['numberofFile']>0)
    	// 	array_push($blogList[$index],$row['File1']);
    	$index=$index+1;
    
  }
  //print_r($blogList);
}
$index=0;

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>EB Returns</title>



  <link rel="stylesheet" type="text/css" href="finalindexstyle.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  <link href="css/fontawesome-all.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
  <style>
    .swiper-container {
      width: 300px;
      height: 300px;
      position: relative;

    }

    .swiper-slide {
      background-position: center;
      background-size: cover;
    }
   .swiper-pagination-bullet {
   background-color:#008000;
 }

 .swiper-button-prev{
   color:#008000;

 }

 .overlay{
   position:absolute;
   top:50%;
   left:50%;
   background-color: transparent;
   height:100%;
   width:100%;

 }
 .ctr{
   position: absolute;
   transform: translate(-50%,-50%);
   text-align:center;
   padding-top: 27%;

 }

   /**glowing border***/
   @media(min-width:1030px){

    .swiper-container .swiper-wrapper .swiper-slide .flip-card .flip-card-front:before{
     position:absolute;
     top: -2px;
     left: -2px;
     bottom: -2px;
     right: -2px;

     content:'';
     border-radius:15px;
     border: 3px;
     background: #fff;
     z-index: -1;

   }
    .swiper-container .swiper-wrapper .swiper-slide .flip-card .flip-card-front:after{
     position:absolute;
     top: -2px;
     left: -2px;
     bottom: -2px;
     right: -2px;

     content:'';
     border-radius:15px;
     border: 3px;
     background: #fff;
     z-index: -2;
     filter: blur(40px);

   }

    .swiper-container .swiper-wrapper .swiper-slide .flip-card .flip-card-front:nth-child(2n+1):before,
    .swiper-container .swiper-wrapper .swiper-slide .flip-card .flip-card-front:nth-child(2n+1):after{
     background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(40,47,50,1) 35%, rgba(0,212,255,1) 100%);

   }
   }
   /***glowing border***/

   .textbox h1{
     color:#fff;
     font-size:3em;
     letter-spacing: 1px;
     border-radius:5px;
     border: 3px white groove;

   }

   @media(max-width:770px){
      #vid{
          display:none;
      }
  }

   @media(max-width:991px){
     .banner{

       padding:150px 50px 0;
       flex-direction:column;
       coverflow:hidden;
     }
     .banner:before{

       width: 300px;

     }
     .banner .textbox{

       position:relative;
       max-width:100%;
       z-index:2;
     }
   }
 </style>
 </head>
 <body>
   <div class="loader-wrapper">
     <span class="loader"><span class="loader-inner"></span></span>
   </div>
   <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-transparent justify-content-center">
        <div class="container text-uppercase p-2">
        <a class="navbar-brand ml-4" href="index.php"><img src="images/logo.png" height="60px" alt=""></a>
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto justify-content-center ">
            <li class="nav-item active">
              <a href="index.php"  class="nav-link"><p>Home <span class="sr-only">(current)</span></p></a>
            </li>
            <li class="nav-item">
              <a href="about.html"  class="nav-link"><p>About</p></a>
            </li>
            <li class="nav-item">
              <a href="index.php"  class="nav-link"><p>Marechu</p></a>
            </li>

          </ul>
          </div>

      </div>
      </nav>
      </header>
      <div class="banner">
        <video id="vid" src="images/bdwins.mp4" autoplay muted loop type="mp4"></video>
          <div class="textbox">
            <h1 class="text-center text-capitalize mb-5">choose Your Hero</h1>
            <div class="swiper-container">
                  <div class="swiper-wrapper">

                    <?php
                                
                      while($index < $numOfBlog) {

                        echo
                        '
                        <div class="swiper-slide">
                          <div class="flip-card">
                            <div class="flip-card-inner">
                              <div class="flip-card-front">
                              <img src="'.$blogList[$index]['hface'].'" alt="Avatar" style="width:300px;height:300px; border-radius:15px">
                                <div class="overlay ctr"><a href="'.'EBhero.php'.'?eid='.$blogList[$index]['eid'].'"><button type="button" class="btn btn-outline-light">'.$blogList[$index]['hname'].'</button></a></div>
                              </div>
                            </div>
                          </div>
                        </div>';

                        $index = $index+1;
                      }

                      $index = 0;

                    ?>

                  </div>

                  <!-- Add Pagination -->
                  <div class="swiper-pagination"></div>

                  <!-- Add Arrows -->
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-button-next"></div>
                </div>
                <p class="text-center text-white mt-5">How does it feel when Bangladesh beats India?

“As I said, on a good day, they can beat any team, and that includes India!” he said, recalling, that Bangladesh had defeated India on several occasions. He particularly remembers India losing to Bangladesh in the 2007 World Cup. He has a sense of satisfaction in seeing how far Bangladesh cricket has progressed over the past 26 years.

Bangladesh has not managed to perform well when it comes to the test format, but Mohinder Amarnath sees no dearth of talent among the Bangladesh boys. He recommends that Bangladesh concentrate on the test format of cricket. This should be introduced at the school level. The scope of first division cricket at a domestic level needed to be expanded, made more competitive. This required sporting wickets, playing shots according to the wicket and the merit of the ball. The new generation cricketers needed to build up these skills.</p>
            </div>
            <div class="hero animate__animated animate__zoomInUp animate__slower">
              <img src="images/faces.png" id="hero">
            </div>
        </div>

        <footer class="py-lg-5 py-3">
        		<div class="container-fluid px-lg-5 px-3">
        			<div class="row footer-top-w3layouts">
        				<div class="col-lg-3 footer-grid-w3ls">
        					<div class="footer-title">
        						<h3>About Us</h3>
        					</div>
        					<div class="footer-text">
        						<p>Serving the Nation in this Trying Times. To Know More <span> <a href ="contact.html">Click Here </a></span></p>
        						<ul class="footer-social text-left mt-lg-4 mt-3">

        							<li class="mx-2">
        								<a href="https://www.facebook.com/emblembangladesh">
        									<span class="fa fa-facebook-f"></span>
        								</a>
        							</li>
        							<li class="mx-2">
        								<a href="https://www.instagram.com/emblembangladesh">
        									<span class="fa">&#xf16d;</span>
        								</a>
        							</li>


        						</ul>
        					</div>
        				</div>
        				<div class="col-lg-3 footer-grid-w3ls">
        					<div class="footer-title">
        						<h3>Get in touch</h3>
        					</div>
        					<div class="contact-info">
        						<h4>Location :</h4>
        						<p>BUET, Dhaka</p>
        						<div class="phone">
        							<h4>Contact :</h4>
        							<p>Phone : +88 01738800508 </p>
        							<p>Email :
        								<a href="mailto:yaadmainul@gmail.com">Mail Us!</a>
        							</p>
        						</div>
        					</div>
        				</div>
        				<div class="col-lg-3 footer-grid-w3ls">
        					<div class="footer-title">
        						<h3>Quick Links</h3>
        					</div>
        					<ul class="links">
        						<li>
        							<a href="index.php">Home</a>
        						</li>
        						<li>
        							<a href="about.html">About</a>
        						</li>

        						<li>
        							<a href="shop.php">Shop</a>
        						</li>
        						<li>
        							<a href="contact.html">Contact Us</a>
        						</li>
        					</ul>
        				</div>





        			</div>
        			<div class="copyright-w3layouts mt-4">
        				<p class="copy-right text-center ">&copy; 2020 emblembangladesh.com. Private Property | Designed by
        					<a href="https://www.facebook.com/emblembangladesh"> Emblem Bangladesh.</a>
        				</p>
        			</div>
        		</div>
        	</footer>


          <script>
              $(window).on("load",function(){
                $(".loader-wrapper").fadeOut("slow");
              });
          </script>



  <!-- Initialize Swiper -->
  <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script>
          var swiper = new Swiper('.swiper-container', {
          effect: 'cube',
          grabCursor: true,
          cubeEffect: {
            shadow: true,
            slideShadows: true,
            shadowOffset: 20,
            shadowScale: 0.94,
          },
          pagination: {
            el: '.swiper-pagination',
          },
          navigation: {
           nextEl: '.swiper-button-next',
           prevEl: '.swiper-button-prev',
     },
    });
        </script>


        <script>
          (function() {
        var header = document.getElementById("hero");
        var selectBox = document.querySelector("select");
        var runButton = document.querySelector("button");
        triggerAnimation();

        // On SelectBox Change


        function triggerAnimation() {
          var animation ="appearing";
          header.className = "";
          setTimeout(function() {
            header.className = "mimic " + animation;
          }, 10);
        }
      })();

        </script>
   </body>
  </html>
