<?php 
session_start();
set_include_path($_SERVER['DOCUMENT_ROOT'].'/ebrebooted/controller');
//set_include_path($_SERVER['DOCUMENT_ROOT'].'/globev2.1/controller');
require_once('DBconnection.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>EB Returns</title>



  <link rel="stylesheet" type="text/css" href="finalstyle.css">

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
    .flip-card {
      border-radius:25px;
      background-color: transparent;
      width: 300px;
      height: 300px;
      perspective: 1000px;

    }

    .flip-card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      text-align: center;
       border-radius:25px;
      transition: transform 0.6s;
      transform-style: preserve-3d;
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }

    .flip-card:hover .flip-card-inner {
      border-radius:25px;
      transform: rotateY(180deg);
    }

    .flip-card-front, .flip-card-back {
      position: absolute;
       border-radius:20px;
      width: 100%;
      height: 100%;
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
    }

    .flip-card-front {
      border-radius:25px;
      background-color: #bbb;

      color: black;
    }

    .flip-card-back {
      border-radius:25px;
      background-color: transparent;
      color: white;
      transform: rotateY(180deg);
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

    .swiper-container {
      width: 100%;
      padding-top: 50px;
      padding-bottom: 50px;
    }

    .swiper-slide {
      background-position: center;
      background-size: cover;
      width: 300px;
      height: 300px;

    }

    .swiper-pagination-bullet {
    background-color:#008000;
  }

  .swiper-button-prev{
    color:#008000;

  }

  /**glowing border***/
  @media (min-width:1030px) {


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

  /***fake_m er upor emblem boshano**/
  .wrapper{
  width: 100%;
  height: max-content;
  position: relative;
  }
  .shamne{
  width: 100%;
  height: 100%;
  object-fit: cover;
  }
  .pichone{
  width:100%;
  height:100%;
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translate(-50%,0);
  }
 .banner .textbox h1{
    color:#fff;
    font-size:3em;

    border-radius:10px;
    border: 3px white groove;
    letter-spacing: 2px;

  }

  h1{

    background:-webkit-linear-gradient(#eee, #333);
 -webkit-background-clip: text;
 -webkit-text-fill-color: transparent;
  }

  *--/contact--*/
  .contact_grid_right{
    padding-top:4em;
  }
  .contact_grid_right {
      width: 100%;
  }
  .contact_left_grid label {
    color: #313233;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 0.85em;
    font-weight: 500;
  }
  .contact_grid_right input[type="text"],
  .contact_grid_right input[type="email"],
  .contact_grid_right input[type="number"],
  .contact_grid_right textarea {
      outline: none;
      padding: 15px 15px;
      font-size: 14px;
      color: #777;
      background: #f7f7f7;
      width: 100%;
      letter-spacing: 1px;
    border: 1px solid #ebeeef;
  }
  .contact_grid_right textarea {
      min-height: 150px;
      margin: 1em 0em;
      resize: none;
  }

  .contact_grid_right input[type="submit"] {
    outline: none;
      padding: 20px 0;
      font-size: 14px;
      color: #fff;
      background: #0e0f10;
      border: none;
      letter-spacing: 2px;
      text-transform: uppercase;
      -webkit-transition: 0.5s all;
      -moz-transition: 0.5s all;
      -o-transition: 0.5s all;
      -ms-transition: 0.5s all;
      transition: 0.5s all;
    font-weight:600;
    cursor: pointer;
  }

  .contact_grid_right input[type="submit"]:hover {
      background: #ff4e00;
  }

  .contact-left h4 {
      color: #444;
      font-size: 1em;
      margin-bottom: .5em;
      letter-spacing: 1px;
      font-weight: 700;
  }

  .contact-left p {
      font-size: 1em;
      letter-spacing: 1px;
  }

  .contact-text a {
      color: #888;
  }

  .contact-text a:hover {
      color: #fb383b;
  }

  .contact_grid_right h6,
  .contact-left h6 {
      font-size: 1.2em;
      color: #292b2c;
      margin-bottom: 1.5em;
      letter-spacing: 1px;
      font-weight: 400;
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

    .contact_grids_info {
      padding: 0;
      margin-top: 1em;
    }
    .input {
      max-width: 100%;
    }

  }

  @media(max-width:600px) {
      .contact_grid_right {
          padding-top:3em;
      }
  }

  @media(max-width:440px) {
      .contact_grid_right {
          padding-top:2em;
      }
  }

  

}


  </style>
  </head>
  <body>
   <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-transparent justify-content-center">
        <div class="container text-uppercase p-2">
        <a class="navbar-brand ml-4" href="index.html"><img src="images/logo.png" height="60px" alt=""></a>
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto justify-content-center ">
            <li class="nav-item active">
              <a href="index.html"  class="nav-link"><p>Home <span class="sr-only">(current)</span></p></a>
            </li>
            <li class="nav-item">
              <a href="about.html"  class="nav-link"><p>About</p></a>
            </li>
            <li class="nav-item">
              <a href="index.html"  class="nav-link"><p>Marechu</p></a>
            </li>

          </ul>
          </div>

      </div>
      </nav>
      </header>

      <div class="contact_grid_right">
      <p class="footer-title">1st image Hero moment, 2nd Hero Face, Erpor Emblem Multiple</p>

					<form action="./controller/EmblemUpload.php" method="post" enctype="multipart/form-data">
						<div class="row contact_left_grid">
							<div class="col-md-6 con-left">
								<div class="form-group">
									<label class="my-2">Hero Name</label>
									<input type="text" name="hname" placeholder="" required="">
                </div>
                
                <input type="file" name="hmoment" accept="image/*" required="" />
                <input type="file" name="hface" accept="image/*" required="" />
								

														
							</div>
							
							<div class="col-md-6 con-right">
							    
							    
								<div class="form-group">
									<label>Description</label>
									<textarea id="textarea" name = "desc" placeholder="" required=""></textarea>
                </div>
                
                
                <input type="file" name="file[]" accept="image/*" multiple="multiple" />
																
								
								<input class="form-control" type="submit" value="Submit">

							</div>
						</div>
					</form>
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
        								<a class="fb" href="https://www.facebook.com/emblembangladesh">
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





          <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
          <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
          <script>
          var swiper = new Swiper('.swiper-container', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflowEffect: {
              rotate: 50,
              stretch: 0,
              depth: 100,
              modifier: 5,
              slideShadows: true,
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
