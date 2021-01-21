<html>
<head>
  <!-- Metas -->
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="LionCoders" />
    <!-- Links -->
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="icofont.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/slick.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <link href="css/login.css" rel="stylesheet" />
    <title>Smart bid</title>
</head>
<body>
<!-- HERO SECTION --> 
<header id="home"> 
<div class="container-fluid hero">
<img src="images/hero.svg" alt="">
<div class="container">
<!-- Hero Title -->
<h1>The Best <br>Auction Site.</h1>
<!-- Hero Title Info -->
<p>Buying and Selling Online.</p>
</div>
</div>
</header>
<?php
echo "<div class='container'>";
echo "<div class='row'>";
echo "<div class='col-12 col-sm-12 col-lg-4 service-txt'>";
echo "<div class='hero-btns service-btn'>";
echo "<form  class = 'login_form' action='check_buyer.php' method='POST'>";
if(isset($_GET["buyer"]))
{
if($_GET["buyer"] == "successful")
{
//echo "<h4>Sucessfully added user!</h4>";
header("Location: login.html");  
}
else if ($_GET["buyer"] == "duplicate")
{
echo"<h4>account already Exists. Please Enter Another Username and Password</h4>";
}
}
else
{
    echo "<h4>Please add your Username and password</h4>";
}
echo "<label class='label' for='username'>Username: </label>";
echo "<input class='form-control' type='text' name='username' placeholder='username'>";
echo "<br>";
echo "<label class='label' for='password'>Password: </label>";
echo "<input class='form-control' type='password' name='password' placeholder='password'>";
echo "<br>";
echo "<input class='submit' type='submit' value='sign up' >";
echo "</form>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
?>
</body>
</html>