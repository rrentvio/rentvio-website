<!doctype html>
<html lang="tr" xmlns:display="http://www.w3.org/1999/xhtml" xmlns:align-items="http://www.w3.org/1999/xhtml"
      xmlns:justify-content="http://www.w3.org/1999/xhtml" xmlns:flex-direction="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=chrome">
    <title>Anasayfa</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css");?>">

</head>
<body class=" bg-secondary" >

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#">Rentvio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"> <?php echo $user->full_name; ?> </a>
        </li>
    </ul>
    <form class="form-inline ml-auto">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline- my-2 my-sm-0 text-light" type="submit">Search</button>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active mr-auto">
                <a class="nav-link" href=<?php echo base_url("cikis");?>>Exit</a>
            </li>
        </ul>
    </form>

</nav>

<div class="container card ">

    <div class="row">
        <div class="col-md-6 offset-3 ">
            <h4>Added Items</h4>
            <table class=" table table-hover table-striped table-bordered"  >
            <thead>
            <th>#id</th>
            <th>Items</th>
            </thead>
            <tbody>
            <tr>
            <td>#1</td>
            <td>"Monitör"</td></tr>
            <tr>
            <td>#1</td>
            <td>"Monitör"</td></tr>
            <tr>
            <td>#1</td>
            <td>"Monitör"</td></tr>
            <tr>
            <td>#1</td>
            <td>"Monitör"</td></tr>
            </tbody>
            </table>
        </div>
    </div>
</div>



</body>
</html>




