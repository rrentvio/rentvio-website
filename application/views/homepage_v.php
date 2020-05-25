  <!doctype html>
  <html lang="tr" xmlns:display="http://www.w3.org/1999/xhtml" xmlns:align-items="http://www.w3.org/1999/xhtml"
      xmlns:justify-content="http://www.w3.org/1999/xhtml" xmlns:flex-direction="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=chrome">
    <title>Rentvio</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom2.css");?>">
  </head>
  <body class=" bg-secondary">


    <img src="<?php echo base_url("assets/pictures/giris.jpg");?>" alt="" class="keke" srcset="">


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
                <a class="dropdown-item fancy-font" href="#">Everything Else</a>
              </div>
            </div>
          </li>
          <li>
            <form class="form-inline my-2 my-lg-0" action="<?php  echo base_url("home/searchbar")?>" method="post">
      <select id="inputState" class="form-control dropdown fancy-font " aria-haspopup="true" name=searchCategory >
        <option value="*" selected>All produtcs</option>
        <option value="Photograph and Video">Photograph and Video</option>
        <option value="Book and Magazines">Book and Magazines</option>
        <option value="Sport Equitments">Sport Equitments</option>
        <option value="Home Improvemnet and Tools">Home Improvemnet and Tools</option>
        <option value="Technical Electronics">Technical Electronics</option>
        <option value="Everything Else">Everything Else</option>
      </select>
        <input class="form-control fancy-font mr-sm-2 ml-3" type="search" name="searchBar" <?php if(isset($fromsearch)){echo'value = "'.$fromsearch.'"';} ?> placeholder="Search" aria-label="Search">
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
        <br>   <br><br><br>
        <!-- Search error başlangıç -->  

        <?php if(isset($fromsearch)){ ?>
             <?php echo '
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>'.form_error("searchBar") .'</strong> You should check in your seach value above.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>';} ?>
            
          
        <h1 class="text-white diffont text-center fancy">Everything  &nbsp; You &nbsp; Need. &nbsp; All &nbsp; Right &nbsp; Here.</h1>
            <br>
            
            <div class="row">
                            
                  <?php

                  foreach ($products as $product){ ?>
                      <div class="col-md-4">
                        <div class="jumbotron p-3 text-deneme-bg text-white text-center ">
                          <a  class="text-decoration-none"  href=" <?php echo base_url( "product/".$product->id)?>">
                          <div class="row pointer " >  <!-- BURAYA İD --> 
                            <div class="col-md-8 offset-1">
                              <img src="<?php
                                if(isset($images)){
                                foreach($images as $image){
                                  if ($image->product_id == $product->id){
                                    $url = $image->pic_url;break;} 
                                    else{ $url = base_url("assets/pictures/nopic.png");}}
                                  }
                                    else{ $url = base_url("assets/pictures/nopic.png");} echo $url; ?> " alt="" class="no-image">
                              <br><br>
                              <h6 class="text-light fancy-font text-left "><?php echo $product->product_name; ?></h6>
                              <hr>
                              <h6 class="text-light fancy-font text-left"><?php echo $product->price?>$ Per Hour</h6>
                              <hr>
                              <h6 class="text-light fancy-font text-left"><?php echo $product->product_category?></h6>
                            </div>
                          </div></a>
                        </div>
                      </div>
                  <?php  }?>
        </div>
    </div>
  </div>

  <!--Sign in modal -->
  <div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="signinModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signinModalLabel">Log in</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?php  echo base_url("giris-yap")?>" method="post">
          <div class="form-group">
            <br>
            <label> E-mail</label>
              <input placeholder="E-mail"  type="email" class="form-control" name="email">
                  <?php if(isset($form_error)) {?>
                  <small class="float-right"><?php echo form_error("email") ?></small>
                    <?php } ?>
                      </div>
                        <div class="form-group">
                            <label> Password </label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <?php if(isset($form_error)) {?>
                            <small class="float-right"><?php echo form_error("password") ?></small>
                          <?php } ?>
                          <br>
                          <hr>
                        </div>
                        <?php if (isset($userconfirm)){ ?>
                        <div class="text-center">
                            <p class=  " text-danger" >  <?php print_r( $userconfirm); ?> </p> </div>
                        <?php } ?>
                        <button type="submit" class=" btn btn-primary  btn-block ">Giriş</button>
                        <br>
                    </form>

                    <div class="text-center" >
                    <p >Hala bir hesabın yokmu ? </p>
                    </div>
                    <div >
                    <a class="btn btn-danger btn-block " data-target="#signUp" data-dismiss="modal" data-toggle="modal" href="#signUp" role="button">Kayıt ol</a> 
                    </div>
                    <br>
              </div>
                </form>
            </div>
          </div>
      </div>
    </div>
  </div>
  </div>

  <!--sign up Modal -->

  <div class="modal fade" id="signUp" tabindex="-1" role="dialog" aria-labelledby="signupModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signUpModal">Sign Up </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
        <form action="<?php  echo base_url("sign-up") ?>" method="post">
    
    <div id=email  class="form-group">
        <br>
        <label> E-mail</label>
        <input placeholder="E-mail"  type="email" class="form-control" name="email">
        <?php if(isset($form_error)) {?>
        <small class="float-right"><?php echo form_error("email") ?></small>
       <?php } ?>
    </div>

    <div id=username class="form-group">
        <br>
        <label> User Name</label>
        <input placeholder="Username"  type="username" class="form-control" name="username">
        <?php if(isset($form_error)) {?>
        <small class="float-right"><?php echo form_error("username") ?></small>
       <?php } ?>
    </div>
   
    <div id=fullname  class="form-group">
        <br>
        <label> Full name </label>
        <input placeholder="Ali Atabak"  type="fullname" class="form-control" name="fullname">
        <?php if(isset($form_error)) {?>
        <small class="float-right"><?php echo form_error("fullname") ?></small>
       <?php } ?>
    </div>
    <div id ="password" class="form-group">
        <label> Password </label>
        <input type="password" class="form-control" name="password" placeholder="Password">
        <?php if(isset($form_error)) {?>
        <small class="float-right"><?php echo form_error("password") ?></small>
       <?php } ?>
       <br>
       <hr>
    </div>  
    <button type="submit" class=" btn btn-primary  btn-block ">Kayıt ol</button>
    <br>
    </form>
    <div class="text-center" >
    <p >Zaten bir hesabın var mı ? </p>
    </div>
    <div >
    <a class="btn btn-danger btn-block text-white" data-target="#signinModal" data-dismiss="modal" data-toggle="modal" role="button">Log in</a> 
    </form> 
  </div>
    <br>
      </div>
    </div>
           
    </div>
  </div>



<?php

if (isset($fromlogin)){
echo '
<script>
window.onload = function() {
  loginModal();
};
function loginModal() {
  document.getElementById("sign").click();
}
</script>
';
}

if (isset($fromsignup)){
  echo '<script>
  window.onload = function() {
    signupModal();
  };
  function signupModal() {
    document.getElementById("signup").click();
  }
  </script>
  ';
}

?>
<!--
<script>

document.getElementById('loginFromsignUp').onclick = function() {
  myFunction();
};
function myFunction() {
  document.getElementById("sign").click();
}
</script>
-->
<script src="<?php echo base_url("assets/js/custom.js"); ?> "></script>
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
</body>
</html>