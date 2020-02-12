<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/navbar.css" />
    <title>Document</title>
</head>
<body>
<div id="navbar">
    <div class="logo">
        <a class="logo" href="index.php">
            <img class="logo" src="assets/rentvioLogo/rentvio_logo_only.png" alt="Rentvio "></a>
    </div>
    <div id="search">
        <form id="Specify">
            <select name="specificSearch">
                <option value = "All" selected>All</option>
                <option value = "Hardware">Hardware</option>
                <option value = "Outdoor Activities">Outdoor</option>
                <option value = "Jobs and Services ">Jobs</option>
                <option value = "Baby and kid care">Baby</option>
                <option value = "Others">Others </option>
            </select>
            <input type = "text" name = "user_id" />
            <input type="button" name="Search!" value="OK">
        </form>
    </div>
    <div class="navButton">
        <a class="button" href="login.php"> Login</a>
    </div>
</div>
</body>
</html>
<?php
