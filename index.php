<?
include("validar.php");

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login - Lost Survivor MMO</title>
  <link rel="stylesheet" href="style/style.css">
  <!--[if lt IE 9]><![endif]-->
  <script src="scripts/script.js"></script>
</head>
<body>
  <span href="#" class="button" id="toggle-login">Lost Survivor MMO Log in</span>
 
<div id="login">
  <div id="triangle"></div>
  <h1>Log in</h1>
 
  <form action="login.php" method="post">
    <input type="email" name="email" placeholder="Email" />
    <input type="password" name="password" placeholder="Password" />
    <input type="submit" name="formulario" value="Log in" />
    <p><a href="rank.php">inicio</a></p>
  </form>
</div>
</body>
</html>