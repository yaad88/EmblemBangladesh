<?php
session_start();
if(isset($_POST['filter']))
{
  $_SESSION['filter']=$_POST['filter'];
  /*echo $_SESSION['filter'];*/
}
else
  echo "some error choosing your filter";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Responsive Crop. Advanced demos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <script
        src="https://code.jquery.com/jquery-2.1.0.js"
        integrity="sha256-D6d1KSapXjq2tfZ6Ie9AYozkRHyB3fT2ys9mO2+4Wvc="
        crossorigin="anonymous"></script>
        <script src="./libs/jquery.js" ></script>
        <script src="./dist/rcrop.min.js" ></script>
        <link href="./dist/rcrop.min.css" media="screen" rel="stylesheet" type="text/css">

        <style>
            body{margin: 0; padding: 0px}
            main{
                min-height:500px;
                display: block
            }
            pre{
                overflow: auto;
            }
            .demo{
                padding: 20px;
            }
            .image-wrapper{
                width: 100%;
                height: auto;
            }
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





        </style>




    </head>
    <body>
        <main>


            <div class="demo">


                <div class="image-wrapper">
                    <img id="image-3" src="images/bd_back.jpg">
                    <div id="custom-preview-wrapper"></div>

                    <div id="cropped-original" >

                    </div>
                </div>
                <!--<button onclick="myFunction()">What up</button>-->

            </div>
            <!--<div id="marechu"></div>-->
            <!--<input class="file2" type="file" data-image-selector=".image2" />-->
            <br />
            <div id="background"></div>
            <!--<img class="image1" src="images/cxcrO.png" alt="medium image 1" />-->
            <img class="image2"height="200px" width="200px" src="<?php echo $_SESSION['filter'] ?>" alt="medium image 2" />
            <br />
            <input class="btn-merge" type="button" value="Merge!" />
            <br />
            <img class="merged-image hidden" alt="merged image" />
            <canvas id="canvas" class="hidden"></canvas>





            <script>

                $(document).ready(function(){


                    $('#image-3').rcrop({
                        minSize : [200,200],
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
                },{ passive: false });
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
                      var img = canvas.toDataURL('image/jpeg');
                      $('.merged-image').attr('src', img);
                      $('.merged-image').removeClass('hidden');
                      canvas.style.display="none";
                    }
                  };
                }
                  </script>



        </main>
    </body>
</html>
