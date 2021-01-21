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
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
      <!-- HEADER SECTION -->  
  <header id="home">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light ">
        <!-- Change Logo Img Here -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <div class="interactive-menu-button">
            <a href="#">
              <span>Menu</span>
            </a>
          </div>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          </ul>
          <form action="login.html" class="contact-btn form-inline my-2 my-lg-0">
            <!-- Contacgt Us Button -->
            <button>Login</button>
          </form>
        </div>
      </nav>
    </div>
<?php
 
session_start();
if (isset($_SESSION["username"]))
{
$_SESSION = array();
session_destroy();
echo "<header id='home'>";
echo "<div class='container-fluid hero'>";
echo "<img src='images/hero.svg' alt=''>";
echo "<div class='container'>";
echo "<h1>Thanks for Coming!<br> Bye Now!</h1>";
echo "</div>";
echo "</div>";
echo "</header>";
}
else
{
 header("Location:login.html");
}

?>
</body>
</html>