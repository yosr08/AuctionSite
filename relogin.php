<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
echo "<img id='logo' src='auction.png'/>";
echo "<br>";
echo "<form  class = 'relogin_form' action='check_login.php' method='POST'>";
echo "<h4>Please Login Again</h4>";
echo "<label class='label' for='username'>Username: </label>";
echo "<input class='text' type='text' name='username' placeholder='username'>";
echo "<br>";
echo "<label class='label' for='password'>Password: </label>";
echo "<input class='password' type='password name='password' placeholder='password'>";
echo "<br>";
echo "<input class='submit' type='submit' value='Sign in'>";
echo "</form>";
?>
</body>
</html>