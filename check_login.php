<html>
    <head><title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="css/login.css" rel="stylesheet" />
</head>
<body>
<?php
if(!empty($_POST["username"]) && !empty($_POST["password"]))
{
 $DBHOST = "localhost";
 $DBUSER ="root";
 $DBPWD = "";
 $DBNAME = "auction";

 $conn = new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);

 if($conn->connect_error){
     die("Connexion failed!".$conn->connect_error);
 }
  $username = $_POST["username"];
  $statement = "SELECT * FROM buyer WHERE username=?";
  $stmt = $conn->prepare($statement);
  $stmt->bind_param("s",$username);
  $stmt->execute();

  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $hash = $row["password"];
  if(password_verify($_POST["password"],$hash))
  {   
      echo "Successful login";
      session_start();
      $_SESSION["username"] = $_POST["username"];
      $conn->close();
      header("Location:display_items.php");
  }
  else
  {   
      $conn->close();
      echo "Login failed";
      echo "<br>";
      header("Location:relogin.html");
  }
}
else
{
  header("Location:login.html");
}



?>
</body>
</html>
