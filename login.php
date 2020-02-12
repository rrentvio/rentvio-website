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
        <a class="button" href="rent.php"> Rent!</a>
    </div>
</div>

<div>
    <h2> Dont you still have an account?</h2>
    <a href="register.php"> if you dont have an account please register from this link</a>
</div>
<?php
	require('includes/config.php');
    // If form submitted, insert values into the database.
    if (isset($_POST['userName'])){

		$username = stripslashes($_REQUEST['userName']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysqli_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: index.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>
<div id="loginForm">
    <form method="post">
        <input type="text" name="userName" placeholder="username" required>
        <input type="password" name="password" placeholder="password" required>
        <input type="submit" name="submit" value="Login">
    </form>
</div>
</body>
</html>
<?php }?>
