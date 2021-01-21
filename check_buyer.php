<html>
<head><title></title>
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
<?php

if(!empty($_POST["username"]) && !empty($_POST["password"]))
{
$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "";
$DBNAME="auction";

$conn = new mysqli($DBHOST,$DBUSER, $DBPWD , $DBNAME);
if($conn->connect_error){
    die("Connexion failed!".$conn->connect_error);
}
$username = $_POST["username"];
$password = $_POST["password"];

$hashed = password_hash($password,PASSWORD_DEFAULT);

$statement = "SELECT * FROM buyer WHERE username=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s",$username);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows>=1)
{
    $value = "duplicate";
    header("Location: add_buyer.php?buyer=$value");
}
else
{
    $statement = "INSERT INTO buyer(username,password) VALUES(?,?)";
    $stmt = $conn->prepare($statement);
    $stmt->bind_param("ss",$username,$hashed);
    $stmt->execute();
    $value="successful";
    header("Location: add_buyer.php?buyer=$value");

}
$conn->close();
}
else{
    header("Location: add_buyer.php");
}
?>
</body>
</html>