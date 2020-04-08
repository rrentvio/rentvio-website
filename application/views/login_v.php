<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css");?>">
</head>
<body>


<h3 class="text-center">Giriş</h3>
<hr>


<div class="container">

    <div class="row">
        <div class="col-md-6 card card bg-secondary text-white offset-3">
            <form action="<?php  echo base_url("giris-yap")?>" method="post">
                <div class="form-group">
                    <br><br>
                    <label> Email</label>
                    <input placeholder="E-mail"  type="email" class="form-control" name="eposta">
                </div>
                <div class="form-group">
                    <label> Password </label>
                    <input type="password" class="form-control" name="sifre" placeholder="Password">
                </div>
                <button type="submit" class=" btn btn-primary  btn-block ">Giriş</button>
                <br>
            </form>
        </div>

    </div>

</div>




</body>
</html>
