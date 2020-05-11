<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=chrome">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css");?>">
</head>
<body>


<h3 class="text-center">Kayıt ol</h3>
<hr>


<div class="container giriskutusu">

    <div class="row">
        <div class="col-md-6 card card bg-secondary text-white offset-3">
            <form action="<?php  echo base_url("sign-up")?>" method="post">
    
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
                <a class="btn btn-danger btn-block " href=  <?php echo (base_url("giris")); ?> role="button">Giriş Yap</a>
                </div>
                <br>
        </div>
      
    </div>

</div>

</body>
</html>
