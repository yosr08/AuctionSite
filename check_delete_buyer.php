<html>
    <head><title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style></style>
</head>
<body>
    <?php
    if(!empty($_POST["username"]) && !empty($_POST["password"])){
    $DBHOST = "localhost";
    $DBUSER ="root";
    $DBPWD = "";
    $DBNAME = "auction";
   
    $conn = new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);
    if($conn->connect_error){
        die("Connexion failed!".$conn->connect_error);
    }

    $username = $_POST["username"];
    $password = $_POST["password"];

    $statement = "SELECT * FROM buyer WHERE username=?";
    $stmt = $conn->prepare($statement);
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows<=0)
    {
        $value ="no_account";
        header("Location:delete_buyer.php?buyer=$value");
    }
    else
    {
        $row = $result->fetch_assoc();
        if(password_verify($password,$row["password"]))
        {
            $statement ="DELETE FROM buyer WHERE username=?";
            $stmt = $conn->prepare($statement);
            $stmt->bind_param("s",$username);
            $stmt->execute();
            $value ="deleted";
            header("Location:delete_buyer.php?buyer=$value");
        }
        else{
            $value = "wrong_password";
            header("Location:delete_buyer.php?buyer=$value");
        }

    }
    $conn->close();
}
else
{
    header("Location:delete_buyer.php");
}
    ?>
</body>
</html>