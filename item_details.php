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
    <link href="item_details.css" rel="stylesheet" />
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
if(!isset($_SESSION["username"]) || !isset($_GET["item_id"])){
    header("Location:display_items.php");

}
else
{

echo "<div class='container-fluid hero'>";
echo "<img src='images/aside4.svg' alt=''>";
echo "</div>";
echo "</header>";
$username = $_SESSION["username"];    

$DBHOST = "localhost";
$DBUSER ="root";
$DBPWD = "";
$DBNAME = "auction";

$conn = new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);

if($conn->connect_error){
     die("Connexion failed!".$conn->connect_error);
 }


$statement = "SELECT * FROM item WHERE item_id=?";
$iid = $_GET["item_id"];
$stmt = $conn->prepare($statement);
$stmt->bind_param("s",$iid);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$iid = $row["item_id"];
$iname = $row["item_name"];
$i_desc = $row["item_desc"];
$iiprice = $row["init_bid"];
$end = $row["endtime"];
$bid_num = $row["bid_num"];
$icprice = $row["current_bid"];
$iimg = "item/";
$iimg = $iimg.$row["item_pic"];

echo "<div class='box'>";
    echo "<div class='item-box'>";
    echo "<div class='item-image'>";
    //item Image 
    echo "<img src='$iimg' alt=''>";
    echo "</div>";
    echo "<div class='item-info'>";
    echo "<div class='item-title'>";
    //echo "<p>Item Id: $iid</p>";
    echo "<p>Item Name: $iname</p>";
    echo "<p>Item Description: $i_desc</p>";
    echo "<p>End Time: $end</p>";
    echo "<p>Number of Bids: $bid_num</p>";
    echo "<p>Current Bid: $$icprice </p>";
    echo "<form action='bid.php' method='POST'>";
echo "<input type='hidden' name='item_id' value='$iid'>";
echo "<input type='hidden' name='username' value='$username'>";
echo "<input name='bid'>";
//echo "<select name='bid'>";
//for($i=0; $i<10;$i++){
   // $j = $i*10;
    //echo "<option value='$j'>$$j</option>";
//}
echo "</select>";
echo "<input type='submit' value='Bid'>";
echo "</form>";
echo "<div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";

$conn->close();


}
?>
</body>
</html>