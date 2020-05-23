<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo(reset($product_details)->product_name);?> </title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom2.css");?>">
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark mb-10 mt-10 position-fixed wwww">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <?php 
            if (isset($user -> email)){
              echo'<a class="nav-link diffont h3 m-0 m-0 text-deneme " style="  padding: 0px 5px 0px 0px" href=';
              echo base_url("homepage/".md5($user -> email));   echo("  >Rentvio<</a>");
            }

            else{
              echo'<a class="nav-link text-bold diffont h3 m-0  text-deneme " style=" padding: 0px 5px 0px 0px" href=';
              echo base_url()." > Rentvio<</a>";
            }
            ?>
        </li>
        <li class="nav-item">
            <?php 
            if (isset($user -> email)){
              echo '<a class="nav-link fancy-font " href= ';
              echo base_url("profile/" .md5($user -> email)); echo ">",$user->full_name,"</a>";  ?> 
            <?php
            }
            else{              
              }
            ?>
        </li>
        <li class="nav-item">
            <div class="dropdown">
              <button class="btn btn-outline-light fancy-font dropdown-toggle col-12 xd" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                All Products
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item fancy-font" href="#">Photograph and Video</a>
                <a class="dropdown-item fancy-font" href="#">Book and Magazines</a>
                <a class="dropdown-item fancy-font" href="#">Sport Equitments</a>
                <a class="dropdown-item fancy-font" href="#">Home Improvemnet and Tools</a>
                <a class="dropdown-item fancy-font" href="#">Technical Electronics</a>
                <a class="dropdown-item fancy-font" href="#">Other Stuff</a>
              </div>
            </div>
          </li>
          <li>
            <form class="form-inline my-2 my-lg-0">
        <input class="form-control fancy-font mr-sm-2 ml-3" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline fancy-font text-deneme-bg text-white my-2 ml-2 my-sm-0" type="submit">Search</button>
        </form>
      </li>
          
    </ul>  


    <ul class="navbar-nav ml-auto">
        <li class="nav-item text-deneme-bg active ">
        
        <?php 
            if (isset($user -> email)){ 
              echo'<a class="nav-link fancy-font bgbetter" href=';
              echo base_url("logout/" .md5($user -> email));?>  <?php echo">Log out</a>"; ?>
            <?php
            }
            else{
              echo'<a  class="nav-link fancy-font bgbetter" href="" data-toggle="modal" data-target="#signinModal" data-whatever="buraya istediğin bir veriyi gir"  id="sign"> Log in</a>';
              //echo base_url("giris"); echo"> Signin</a>"; 
              }
            ?>
            <a  class="nav-link fancy-font d-none " data-toggle="modal" data-target="#signUp" data-whatever="buraya istediğin bir veriyi gir"  id="signup"> Sign in</a>
            </li>
    </ul>
  </nav>
  <div class="container card bgbetter">

<div class="row">
    <div class="col-md-10 offset-1 ">  <!-- // offset baştan kaç boşluk bırakıcağın ?> -->
    <br><br><br><br>  
    <script src="<?php echo base_url("assets/js/sliderjs.js"); ?> "></script>
    <script type="text/javascript">
        window.jssor_1_slider_init = function() {

            var jssor_1_SlideshowTransitions = [
              {$Duration:800,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $FillMode: 1,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 16,
                $SpacingY: 16
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 500;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 131 css*/
        .jssorb131 {position:absolute;}
        .jssorb131 .i {position:absolute;cursor:pointer;}
        .jssorb131 .i .b {fill:#000;fill-opacity:0.6;stroke:#fff;stroke-width:2000;stroke-miterlimit:10;stroke-opacity:0.7;}
        .jssorb131 .i:hover .b {fill:#fff;fill-opacity:.5;stroke:#000;stroke-width:2000;stroke-opacity:0.7;}
        .jssorb131 .iav .b {fill:#fff;stroke:#000;stroke-width:2000;fill-opacity:1;stroke-opacity:1;}
        .jssorb131 .i.idn {opacity:0.3;}

        /*jssor slider arrow skin 112 css*/
        .jssora112 {display:block;position:absolute;cursor:pointer;}
        .jssora112 .a {fill:#333;fill-opacity:.7;stroke:#fff;stroke-width:160;stroke-miterlimit:10;stroke-opacity:.7;}
        .jssora112:hover {opacity:.8;}
        .jssora112.jssora112dn {opacity:.4;}
        .jssora112.jssora112ds {opacity:.3;pointer-events:none;}
    </style>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:500px;height:400px;overflow:hidden;visibility:hidden;background-color:#000000;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:500px;height:400px;overflow:hidden;">
        <?php if (isset($product_images)){
                    foreach($product_images as $image){ 
                        echo '<div>
                        <img data-u="image" src="'.$image->pic_url.'"/> <img data-u="thumb" src="'.$image->pic_url.'"/>   </div>';}}?>
        </div><a data-scale="0" href="https://www.jssor.com" style="display:none;position:absolute;">animation</a>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb131" style="position:absolute;bottom:16px;right:16px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:11px;height:11px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora112" style="width:55px;height:55px;top:162px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M4576,7719.7l5678-5677.8c81.3-81.2,174.8-121.9,280.3-121.9c105.6,0,199,40.8,280.3,121.9 l609.1,609.2c81.3,81.2,121.8,174.5,121.8,280.3c0,105.8-40.5,199-121.8,280.3L6635.2,8000.1l4788.4,4788.5 c81.3,81.2,121.8,174.7,121.8,280.1c0,105.7-40.5,199.2-121.8,280.4l-609.2,609c-81.2,81.3-174.7,121.8-280.3,121.8 c-105.5,0-199-40.6-280.3-121.8L4576.3,8280.4c-81.2-81.2-121.8-174.7-121.8-280.3C4454.5,7894.5,4494.8,7801.1,4576,7719.7z"></path>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora112" style="width:55px;height:55px;top:162px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M11424,7719.7L5746,2041.9c-81.3-81.2-174.8-121.9-280.3-121.9c-105.6,0-199,40.8-280.3,121.9 l-609.1,609.2c-81.3,81.2-121.8,174.5-121.8,280.3c0,105.8,40.5,199,121.8,280.3l4788.4,4788.4l-4788.4,4788.5 c-81.3,81.2-121.8,174.7-121.8,280.1c0,105.7,40.5,199.2,121.8,280.4l609.2,609c81.2,81.3,174.7,121.8,280.3,121.8 c105.5,0,199-40.6,280.3-121.8l5677.7-5677.8c81.2-81.2,121.8-174.7,121.8-280.3C11545.5,7894.5,11505.2,7801.1,11424,7719.7z"></path>
            </svg>
        </div>
    </div>


<script src="<?php echo base_url("assets/js/sliderjs.js"); ?> "></script>
<script type="text/javascript">jssor_1_slider_init();
    </script>
<script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>
    <script>
function goBack() {
  window.history.back();
}
</script>
</body>
</html>

