<?PHP
include("validar.php");
?>
<?PHP
echo 'Bienvenido, ';
if ($loginx == 1) {
		echo 'Connected';
		echo '<b>'.$Customer.'</b>.';
	
}
/*else if($loginx == 0){
	//echo 'bad';
		<div class="testing"> <?PHP echo "<p align=left>GameCoins : </p>"?> <?PHP echo " ". $GC . ""?></div>
}*/
?>
<?PHP if($loginx == 0){

echo "<b><font color=red> Bad email or password </font></b>";
die('.');
}
else
{
 
  

}
?>;



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rank - Lost Survivor MMO</title>
<body bgcolor="#000000"></body>
<link rel="shortcut icon" href="http://forum.lostsurvivorMMO.com/favicon.ico" type="image/x-icon">
</head>

<body>
<p></p>
<center>

<img src="http://i.imgur.com/2oc9VnO.png" />

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login - Lost Survivor MMO</title>
  <link rel="stylesheet" href="style/style.css">
  <!--[if lt IE 9]><![endif]-->
  <script src="scripts/script.js"></script>
</head>
<body>
  <span href="#" class="button" id="toggle-login">Lost Survivor MMO</span>
 
<div id="login">
  <div id="triangle"></div>
  <h1>My account info</h1>
 <?PHP
// Especificar tabela a usar
    $table = 'UsersChars';

    // Query
    $strSQL = "SELECT Gamertag, XP, Reputation, Health, Stat01, Stat02 FROM UsersChars WHERE CustomerID='$Customer'";
?>
  <form action="login.php" method="post">
  
    <table border="1" style="300">
    <tr>
    <td><b><span class="gold-shadowr" ><font color="blue">GameCoins</font></span></b></td>
    <td><b><span class="gold-shadowr" ><font color="blue">GameDollars</font></span></b></td>
    </tr>
    <tr>
    <td><?PHP echo "<b><font color=red>" . $GC . "</font></b>"?></td>
    <td><?PHP echo "<b><font color=red>" . $GD . "</font></b>"?></td>
    </tr>
    </table>
    <br></br>
    <table border="1" style="600">
    <tr>
    <td><b><span class="gold-shadowr" ><font color="blue">Name</font></span></b></td>
    <td><b><span class="gold-shadowr" ><font color="blue">Kills</font></span></b></td>
    <td><b><span class="gold-shadowr" ><font color="blue">XPERIENCIE</font></span></b></td>
    <td><b><span class="gold-shadowr" ><font color="blue">Reputation</font></span></b></td>
    <td><b><span class="gold-shadowr" ><font color="blue">Health</font></span></b></td>
    </tr>
    <?php
$usuario= 'user';
$pass = 'pw';
$servidor = 'IP';
$basedatos = 'Name';
	 
	$info = array('Database'=>$basedatos, 'UID'=>$usuario, 'PWD'=>$pass);
	$conexion = sqlsrv_connect($servidor, $info);  
	
	 $objQuery = sqlsrv_query($conexion, $strSQL);
	 
	 while($objResult = sqlsrv_fetch_array($objQuery))
    
    {
   		$CharacterName = $objResult["Gamertag"];
		$XPe = $objResult["XP"];
		$kills1 = $objResult["Stat01"];
		$kills2 = $objResult["Stat02"];
		$Vida = $objResult["Health"];
		$rep = $objResult["Reputation"];
		
		$Kills = $kills1 + $kills2;
	?>
    <tr>
    <td><?PHP echo "<b><font color=red>" . $CharacterName . "</font></b>"?></td>
    <td><?PHP echo "<b><font color=red>" . $Kills . "</font></b>"?></td>
    <td><?PHP echo "<b><font color=red>" . $XPe . "</font></b>"?></td>
    <td><?PHP echo "<b><font color=red>" . $rep . "</font></b>"?></td>
    <td><?PHP echo "<b><font color=red>" . $Vida . "</font></b>"?></td>
    </tr>
    <?PHP } ?>
    </table>
    <br />
 
  </form>
     <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="5N9CE45QHFWFS">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
  
</div>
</body>
</html>