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
    <link href="display_item.css" rel="stylesheet" />
    <title>Smart Bid</title>
    <style></style>
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
          <form action="display_items.php" class="contact-btn form-inline my-2 my-lg-0">
            <!-- Contacgt Us Button -->
            <button>Home</button>
          </form>
          &nbsp;
          &nbsp;
          &nbsp;
          <form action="logout.php" class="contact-btn form-inline my-2 my-lg-0">
            <!-- Contacgt Us Button -->
            <button>Logout</button>
          </form>
        </div>
      </nav>
    </div>
    </header>
 <header id="home"> 
 <div class="container-fluid hero">
 <img src="images/hero.svg" alt="">
 <div class="container">
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
    echo "<form  class = 'login_form' action='check_delete_item.php' method='POST'>";
    if(isset($_GET["item"])){
        if($_GET["item"]== "no_item")
        {
            echo "<h4>No Such item exists</h4>";
            echo "<br>";
            echo "<h4>Please Try Again</h4>";
        }
        else if($_GET["item"]== "successful"){
            echo "<h4>Successfully deleted the item!</h4>";

        }
    }
    else
    {
    echo "<h4> To Delete An Item , Please Enter The Item Name</h4>";
    }
    echo "<label class='label' for=''>Item Name: </label>";
    echo "<input class='form-control' type='text' name='item_name' placeholder='Item name'>";
    echo "<input class='submit' type='submit' value='Delete Item'>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    
    ?>
</body>
</html>