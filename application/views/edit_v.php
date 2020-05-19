<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php $user->full_name  ?> </title>
</head>
<body>


<h1>  <?php echo $user->full_name ?> </h1>
    <br>
<h1>  <?php echo $user->id ?> </h1>
<br>
<h1>  <?php echo $user->email ?> </h1>
<br>
<h1>  <?php echo $user->user_name ?> </h1>
<br>
<h1>  <?php echo ($user->password) ?> </h1>
<br>


bura user ın kendi sayfasını düzenlediği yer olacak berkeciğim kafana göre düzenle burdan bir form girecez 
form verileri başka sayfaya ordan da home page e atacak user ı 
formda adamın idsi hidden value olarak gönderilecek qnq 
 
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
</body>
</html>