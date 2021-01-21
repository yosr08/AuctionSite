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
          <form action="add_item.php" class="contact-btn form-inline my-2 my-lg-0">
            <!-- Contacgt Us Button -->
            <button>Add Item</button>
          </form>
          &nbsp;
          &nbsp;
          &nbsp;
          <form action="delete_item.php" class="contact-btn form-inline my-2 my-lg-0">
            <!-- Contacgt Us Button -->
            <button>Delete Item</button>
          </form>
          &nbsp;
          &nbsp;
          &nbsp;
          <form action="delete_buyer.php" class="contact-btn form-inline my-2 my-lg-0">
            <!-- Contacgt Us Button -->
            <button>Delete Account</button>
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
<?php

session_start();
if(!isset($_SESSION["username"])){
    header("Location:login.html");

}
else
{

$DBHOST = "localhost";
$DBUSER ="root";
$DBPWD = "";
$DBNAME = "auction";

$conn = new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);

if($conn->connect_error){
     die("Connexion failed!".$conn->connect_error);
 }
//echo "<img src='auction.png' id='logo'>";
//echo "<a href='logout.php' class='logout_button'>Logout</a>";
echo "<div class='container-fluid hero'>";
echo "<img src='images/aside4.svg' alt=''>";
echo "</div>";
echo "</header>";

$statement = "SELECT * FROM item";
$result = $conn->query($statement);
while ($row = $result->fetch_assoc())
{
    $iid = $row["item_id"];
    $iname = $row["item_name"]; 
    $ipic = $row["item_pic"];
    $icurrentp = $row["current_bid"];
    $bidNum = $row["bid_num"];
    $end = $row["endtime"];
    $iimg = "item/";
    $iimg = $iimg.$row["item_pic"];
    $link = "item_details.php?item_id=";
    $item_details = $link.$iid;
    //echo "<div class='col-12 col-md-6 col-lg-4'>";
    echo "<div class='box'>";
    echo "<div class='item-box'>";
    echo "<div class='item-image'>";
    //item Image 
    echo "<img src='$iimg' alt=''>";
    echo "</div>";
    echo "<div class='item-info'>";
    echo "<div class='item-title'>";
    echo "<p>Item Name: $iname</p>";
    echo "<p>Current Bid: $$icurrentp </p>";
    echo "<p>Bid End Date: $end</p>";
    echo "<p><div class='item_detail'><a class='link' href='$item_details'>Item Details</a></div></p>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

}
$conn->close();
}
?>
</body>
</html>