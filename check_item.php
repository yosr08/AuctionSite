<html>
    <head><title></title>
</head>
<body>
<?php
if(!empty($_POST["item_name"]) && !empty($_POST["item_description"]) && !empty( $_POST["endtime"]) && !empty( $_FILES["item_pic"]["name"]))
{
 $DBHOST = "localhost";
 $DBUSER ="root";
 $DBPWD = "";
 $DBNAME = "auction";

 $conn = new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);

 if($conn->connect_error){
     die("Connexion failed!".$conn->connect_error);
 }
  $iname = $_POST["item_name"];
  $idesc = $_POST["item_description"];
  $iipic = $_FILES["item_pic"]["name"];
  $endtime = $_POST["endtime"];

  $statement = "SELECT * FROM item WHERE item_name=?";
  $stmt = $conn->prepare($statement);
  $stmt->bind_param("s",$iname);
  $stmt->execute();

  $result = $stmt->get_result();
  if($result->num_rows>=1){
      $value = "duplicate";
      $conn->close();
      header("Location:add_item.php?item=$value");

  }
  else
  {
      $statement = "INSERT INTO item(item_name, item_desc , item_pic ,endtime) VALUES(?,?,?,?)";
      $stmt = $conn->prepare($statement);
      $stmt->bind_param("ssss",$iname,$idesc,$iipic,$endtime);
      $stmt->execute();
      $value ="successful";
      $conn->close();
      header("Location:add_item.php?item=$value");
  }
}
else{
    header("Location:add_item.php");
}


?>
</body>
</html>
