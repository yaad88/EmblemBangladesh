<?php
session_start();
if(isset($_POST['emb']))
{
  $filterName=$_POST['emb'];
  /*echo $_SESSION['filter'];*/
}
else
  echo "some error choosing your filter";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>EB Returns</title>
  <link rel="stylesheet" type="text/css" href="finalformstyle.css">

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
  <script
  src="https://code.jquery.com/jquery-2.1.0.js"
  integrity="sha256-D6d1KSapXjq2tfZ6Ie9AYozkRHyB3fT2ys9mO2+4Wvc="
  crossorigin="anonymous"></script>
  <script src="./libs/jquery.js" ></script>
  <script src="./dist/rcrop.min.js" ></script>
  <link href="./dist/rcrop.min.css" media="screen" rel="stylesheet" type="text/css">

  <style>
  main{
      min-height:500px;
      display: block
  }
  pre{
      overflow: auto;
  }
  .demo{
      padding: 0px;
  }
  .image-wrapper{
      width: 100%;
      height: auto;
  }
  /*.fleximage{
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 500px;
    height: auto;
  }*/
  img{
      max-width: 100%;
      height:auto;
  }



  label{
      display: inline-block;
      width: 60px;
      margin-top: 10px;
  }
  #update{
      margin: 10px 0 0 60px ;
      padding: 10px 20px;
  }

  #cropped-original, #cropped-resized{
    display: none;
      padding: 20px;
      border: 4px solid #ddd;
      min-height: 60px;
      margin-top: 20px;
  }
  #cropped-original img, #cropped-resized img{

      margin: 5px;
  }

  .hidden{
    display: none;
  }
  .navbar img{
    width:150px;
  }

  .btn-merge,.dload{

    border:none;
    font-size: 3vh;
    padding: 15px 32px;
    text-align: center;
    color:white;
    border-radius:10px;
    background-color: #4CAF50;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    margin-top:20px;
    margin-bottom: 20px;
  }
  .btn-merge:hover,.dload:hover{
    background-color:#AEEEEE;
    transform: translateY(-5px);
    color:black;

  }
  </style>

</head>
<body>
 <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent justify-content-center">
      <div class="container text-uppercase p-2">
      <a class="navbar-brand ml-4" href="index.php"><img src="images/logo.png" height="60px" alt="yaad" class="img-fluid"></a>
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
    <h1 class="text-center text-white">Upload Photo and Get into Action!</h1>
    <div class="form" id="showform">
      <label for="imgInp" class="custom-file-upload">
           Select Photo
      </label>
    <form id="form1" runat="server">
        <input type='file' id="imgInp" />
    </form>

    </div>
    <div class="upload_another" id="upload_another"style="display:none">
    <!--<a href="finalform.php"><button class="dload">Select Another Photo</button></a>-->
  </div>
    <div class="hiddencrop" id="hidecrop" style="display:none">
      <h1 class="text-center text-white">Crop and Select a Window</h1>
    <button class="dload text-center" id="crop" onclick="show()">Crop the Photo!</button>

  </div>

    <div class="banner">

      <main>

      <div class="demo">
          <div class="image-wrapper">
            <div class="fleximage">
                <img id="image-3" src="images/bd_back.jpg">
              </div>

                <div id="cropped-original" >

                </div>
            </div>
            <!--<button onclick="myFunction()">What up</button>-->

        </div>
        <!--<div id="marechu"></div>-->
        <!--<input class="file2" type="file" data-image-selector=".image2" />-->
        <br />
        <!--<div id="background"></div>-->
        <!--<img class="image1" src="images/cxcrO.png" alt="medium image 1" />-->
        <div class="textbox">
          <div id="custom-preview-wrapper"></div>
        <img class="image2"height="200px" width="200px" style="margin-bottom:20px;" src="<?php echo $filterName ?>" alt="emblem" />
        <br />

      </div>
      <div class="finalphoto" id="emblembutton"style="display:none">
      <input class="btn-merge" type="button" value="Get Emblemed!" />
      <br />
    </div>
        <div class="finalphoto" id="photo_ready" style="display:none">
          <h1>Your Emblem is Ready!</h1>
        <img class="merged-image hidden" alt="merged image" />
        <canvas id="canvas" class="hidden"></canvas>
      </div>

      <div class="finalphoto" id="download_ready" style="display:none">
      <button class="dload" onclick="download()">Download the Photo!</button>
      <br />
    </div>
  </main>


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

      <script>
        function readURL(input) {
             if (input.files && input.files[0]) {
                 var reader = new FileReader();

                 reader.onload = function (e) {
                     $('#image-3').attr('src', e.target.result);
                 }

                 reader.readAsDataURL(input.files[0]);
                 /*document.getElementById('imgInp').style.visibility = 'hidden';
                 document.getElementById('showform').style.display='none';*/
                 document.getElementById('hidecrop').style.display='block';
                 document.getElementById('upload_another').style.display='block';
             }
         }

         $("#imgInp").change(function(){
             readURL(this);
         });

         </script>

      <script>

          function show(){
            document.getElementById('crop').style.visibility='hidden';
            document.getElementById('emblembutton').style.display='block';
			
			document.getElementById('imgInp').style.visibility = 'hidden';
            document.getElementById('showform').style.display='none';


              $('#image-3').rcrop({
                  minSize : [50,50],
                  preserveAspectRatio : true,

                  preview : {
                      display: true,
                      size : [200,200],
                      wrapper : '#custom-preview-wrapper'
                  }
              });

              $('#image-3').on('rcrop-changed', function(){
                   srcOriginal = $(this).rcrop('getDataURL');
                  var srcResized = $(this).rcrop('getDataURL', 100,100);

                  document.getElementById("cropped-original").innerHTML='<img class="hey" src="'+srcOriginal+'">';

                  /**$('#cropped-original').append('<img src="'+srcOriginal+'">');**/
                  /**$('#cropped-resized').append('<img src="'+srcResized+'">');**/
              });
          }
            /*function myFunction() {
            document.getElementById("marechu").innerHTML = '<img class="hey" src="'+srcOriginal+'">';
          }*/
          </script>

          <script>
            $('.file1, .file2').on('change', function() {
            var reader = new FileReader(),
              imageSelector = $(this).data('image-selector');

            if (this.files && this.files[0]) {
              reader.onload = function(e) {
                imageIsLoaded(e, imageSelector)
              };
              reader.readAsDataURL(this.files[0]);
            }
          });

          $('.btn-merge').on('click', merge);

          function imageIsLoaded(e, imageSelector) {
            $(imageSelector).attr('src', e.target.result);
            $(imageSelector).removeClass('hidden');
          };

          function merge() {
            var canvas = document.getElementById('canvas'),
                ctx = canvas.getContext('2d'),
                imageObj1 = new Image(),
                imageObj2 = new Image();


            imageObj1.src = $('.hey').attr('src');
            wid=imageObj1.width;
            he=imageObj1.height;
            canvas.width = wid;
            canvas.height= he;
            console.log(canvas.width+"X"+canvas.height);
            console.log(wid, he);
            imageObj1.onload = function() {
              ctx.globalAlpha = 1;
              ctx.drawImage(imageObj1, 0, 0, wid, he);
              imageObj2.src = $('.image2').attr('src');;
              console.log(imageObj2.width, imageObj2.height);
              imageObj2.width=wid;
              imageObj2.height=he;
              console.log(imageObj2.width, imageObj2.height);
              imageObj2.onload = function() {
                ctx.globalAlpha = 1;
                ctx.drawImage(imageObj2, 0, 0, wid, he);
                img = canvas.toDataURL('image/jpeg');
                $('.merged-image').attr('src', img);
                $('.merged-image').removeClass('hidden');
                document.getElementById('photo_ready').style.display='block';
                document.getElementById('download_ready').style.display='block';



                canvas.style.display="none";


              }
            };
          }
            </script>
            <script>
            function download() {
              var link = document.createElement('a');
              link.href = img;
              link.download = 'Download.jpg';
              document.body.appendChild(link);
              link.click();
              document.body.removeChild(link);
			  window.location.href = 'index.php';
      }

            </script>
    </body>
    </html>
