<?php 
    if (isset($product_details)){
        $product_details= reset($product_details);
        $id=$product_details->id;
        $postedbyId=$product_details->user_id;
        $name=$product_details->product_name;
        $price=$product_details->price;
        $description=$product_details->product_description;
        $category=$product_details->product_category;
        $renterid=$product_details->renter_id;
        $uploaddate=$product_details->upload_date;    
}
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo(reset($product_details)->product_name);?> </title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom2.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/slider.css");?>">

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
              echo'<a  class="nav-link fancy-font bgbetter" href="'.base_url("giris-yap").'" id="sign"> Log in</a>';
              //echo base_url("giris"); echo"> Signin</a>"; 
              }
            ?>
            <a  class="nav-link fancy-font d-none "  href="" data-toggle="modal" data-target="#signUp" data-whatever="buraya istediğin bir veriyi gir"  id="signup"> Sign in</a>
            </li>
    </ul>
  </nav>
  <div class="container card bgbetter">

    <div class="row">
    <div class="col-md-10 offset-1 ">  <!-- // offset baştan kaç boşluk bırakıcağın ?> -->
    <br><br><br><br>  
    <script src="<?php echo base_url("assets/js/sliderjs.js"); ?> "></script>
    <script src="<?php echo base_url("assets/js/slider2.js"); ?> "></script>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:500px;height:400px;overflow:hidden;visibility:hidden;background-color:#000000;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:500px;height:400px;overflow:hidden;">
        <?php if (!empty($product_images)){
                    foreach($product_images as $image){ 
                        echo '<div>
                        <img data-u="image" src="'.$image->pic_url.'"/> <img data-u="thumb" src="'.$image->pic_url.'"/>   </div>';}
                      }else echo '<div>
                      <img data-u="image" src="'.base_url("assets/pictures/nopic.png").'"/> <img data-u="thumb" src="'.base_url("assets/pictures/nopic.png").'"/>   </div>'
                        ?>
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
    <br><br>
    <h1 class="text-center text-white text-uppercase fancy-font">
    <?php 
    echo $name;

    ?>
    </h1>
    <hr class="hrforpview ">
    <h2 class="text-white fancy-font"> Description: </h2>
    <h6 class="text-white fancy-font" >  
    <?php 
    echo $description;
    ?>
    </h6>
    <hr class="hrforpview ">
    <div class="row">
        <div class="col-md-3 text-center text-white">
            <h6>Category:
                 <br>
                  <?php 
                    echo $category;
                  ?>
             </h6>
        </div>
        <div class="col-md-3 text-center text-white">
            <h6>Price Per Day:
                 <br>
                  <?php 
                    echo $price;
                  ?> $
             </h6>
        </div>
        <div class="col-md-3 text-center text-white">
            <h6>Addition Date:
                 <br>
                  <?php 
                    echo $uploaddate;
                  ?>
             </h6>
        </div>
        <div class="col-md-3 text-center text-white">
            <h6>Added By:
                 <br>
                  <?php 
                    echo $postedbyName;
                  ?>
             </h6>
        </div>
        
       
    </div>
    <hr class="hrforpview ">

    <?php if(isset($renterid)){?>
      <h5 class="text-center text-white fancy-font">Feel sorry to Tell you That But: </h5>
      <h5 class="text-center text-white fancy-font" >This product already rented</h5>
        <p class="text-center text-white fancy-font" >Check again in <?php echo $date  ?> </p>
    <?php }
    else echo('<button type="button" class="btn btn-lg btn-block text-deneme-bg text-white fancy-font" data-toggle="modal"  
    data-target="#rentproduct">-- RENT NOW --</button>')?>
    
    <br>

    <div class="modal" tabindex="-1" id="rentproduct" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Rent Now!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>BURAYI YARIN BİRLİKTE YAPARIZ KEKE.</p>
          <div class="slidecontainer slidercss">
            <input type="range" name="days" min="1" max="<?php echo date("t") ?>" value="1" class="slider" id="daySlider">
            <p>I will rent this product for: <span id="dayVal"> days.</span> days</p>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
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
              
      <script>
        var slider = document.getElementById("daySlider");
        var output = document.getElementById("dayVal");
        output.innerHTML = slider.value;

        slider.oninput = function() {
          output.innerHTML = this.value;
        }
      </script>
</body>
</html>

