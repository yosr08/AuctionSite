<html>
    <head>
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
          <form action="display_items.php" class="contact-btn form-inline my-2 my-lg-0">
            <!-- Contacgt Us Button -->
            <button>Home</button>
          </form>
          <form action="logout.php" class="contact-btn form-inline my-2 my-lg-0">
            <!-- Contacgt Us Button -->
            <button>Logout</button>
          </form>
        </div>
      </nav>
    </div>
<?php

echo "<header id='home'>";
echo "<div class='container-fluid hero'>";
echo "<img src='images/hero.svg' alt=''>";

$DBHOST = "localhost";
$DBUSER ="root";
$DBPWD = "";
$DBNAME = "auction";

$conn = new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);

if($conn->connect_error){
     die("Connexion failed!".$conn->connect_error);
 }

if(!isset($_POST["item_id"]))
{
    header("Location:display_items.php");
}
else
{
$item_id = $_POST["item_id"];
session_start();
$statement = "SELECT * FROM bid WHERE item_id=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s",$item_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if($_SESSION["username"] == $row["username"])
{   
    //echo "<div class='container'>";
    echo "<h1>You are already the highest bidder</h1>";
}
else
{
$statement = "SELECT * FROM item WHERE item_id=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s",$item_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$bid =$_POST["bid"];
$username = $_SESSION["username"];
if($bid > $row["current_bid"])
{
    $statement = "UPDATE item SET current_bid=? WHERE item_id=?";
    $stmt = $conn->prepare($statement);
    $stmt->bind_param("dd", $bid , $item_id);
    $stmt->execute();
    
    $statement = "UPDATE item SET bid_num= bid_num +1  WHERE item_id=?";
    $stmt = $conn->prepare($statement);
    $stmt->bind_param("d",$item_id);
    $stmt->execute();

    $statement = "INSERT INTO bid(username , item_id , bid_price) VALUES(?,?,?)";
    $stmt = $conn->prepare($statement);
    $stmt->bind_param("sid", $username , $item_id , $bid);
    $stmt->execute();

    $statement = "DELETE FROM bid WHERE bid_price<? AND item_id=?";
    $stmt = $conn->prepare($statement);
    $stmt->bind_param("dd", $bid , $item_id );
    $stmt->execute();
    
    //echo "<h1>Congratulations , the current bid value is $.$bid</h1>;
    echo "<h1>Congratulations , the current bid value is $bid $</h1>";

}
else
{
    echo "<h1>Your bid must be greater than the current bid</h1>";
}
}
//echo "</div>";
//echo "</div>";
//echo "</header>";
$conn->close();
}
?>
</body>
</html>