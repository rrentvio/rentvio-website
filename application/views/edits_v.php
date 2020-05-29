<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo ($user->full_name) ?></title>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <meta charset="UTF-8">
    <meta name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=chrome">
    <title> <?php echo ($user ->full_name) ?></title>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/bootstrap.min.css");?>>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom2.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/dropzone/dropzone.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/dropzone/basic.css");?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src=<?php echo base_url("assets/js/bootstrap.bundle.js");?>></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="<?php echo base_url("assets/dropzone/dropzone.js");?>"></script>
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

<br><br><br><br><br><br>

<div class="container">
<div class="row flex-lg-nowrap">
  <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
  </div>
  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="height: 140px; width: 140px;"> <!-- resimi strech değilde düz olacak burdan ayarla kanka 140x140 box yapma --> 
                  <img   style="height: 140px; width: 140px;" class="d-flex justify-content-center align-items-center rounded" src=" <?php echo $user->user_pic ?>" alt="">
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo ($user->full_name) ?></h4>
                    <p class="mb-0">@<?php echo ($user->user_name) ?></p>
                    <div class="mt-2">
                      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#changepic">
                        <i class="fa fa-fw fa-camera"></i>
                        <span>Change Photo</span>
                      </button>
                      
                    </div>
                  </div>
                  <div class="text-center text-sm-right">
                    <div class="text-muted"><small>Rentvio</small></div>
                  </div>
                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href=" <?php echo(base_url("pedit/".md5($user -> email)." settings")); ?> " class="active nav-link">Settings</a></li>
                <li class="nav-item"><a href=" <?php echo(base_url("pedit/".md5($user -> email)." password")); ?> " class="nav-link">Password</a></li>
              </ul>
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                  <form class="form " action=<?php echo(base_url("updtusrn/".md5($user -> email))); ?> method="post">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Full Name</label>
                              <input class="form-control" type="text" name="name" value="<?php echo ($user->full_name) ?>">
                              <?php if(isset($form_error)) {?>
                                  <small class="float-right"><?php echo form_error("name") ?></small>
                              <?php } ?>
                              <input class="form-control d-none" type="text" name="referance"  value="<?php echo ($user->id) ?>">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>User Name</label>
                              <input class="form-control" type="text" name="username"  value="<?php echo ($user->user_name) ?>">
                              <?php if(isset($form_error)) {?>
                                  <small class="float-right"><?php echo form_error("username") ?></small>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" type="text" name="email" value="<?php echo ($user->email) ?>">
                              <?php if(isset($form_error)) {?>
                                  <small class="float-right"><?php echo form_error("email") ?></small>
                              <?php } ?>                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col d-flex justify-content-end">                                    
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>

<!-- change pic -->
<div class="modal fade" id="changepic" tabindex="-1" role="dialog" aria-labelledby="changepicModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changepicLabel">Change Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center" >
      <form action="<?php echo base_url("pupdtusr/".$user->id)?>"
          class="dropzone"
          id="ppic">
        </form>
      <small class="text-center" > <i>To experience the change please click <b>Save changes</b> button</i></small>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button onClick="window.location.reload();" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
  
</body>
</html>


<script>
function goBack() {
  window.history.back();
}
</script>
<script>
  Dropzone.prototype.defaultOptions.dictMaxFilesExceeded = "You can only upload one picture silly:).";
  Dropzone.prototype.defaultOptions.dictDefaultMessage = "Drag and Drop your profile pic <br> <small> Please drop only one image!</small>";
  Dropzone.options.ppic = {
    maxFiles:1,
    init: function () {
      this.hiddenFileInput.removeAttribute('multiple');
      
         }}
</script>