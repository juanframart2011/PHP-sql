<?php
 
$usuario= 'user';
$pass = 'pw';
$servidor = 'IP';
$basedatos = 'Name';
 
$info = array('Database'=>$basedatos, 'UID'=>$usuario, 'PWD'=>$pass);
$conexion = sqlsrv_connect($servidor, $info);  

 
if(!$conexion){
 
 die( print_r( sqlsrv_errors(), true));
 
 }
 
if(!empty($_POST['formulario'])){
	$sp_bloqdis = "{call WEB_Account_Login2(?,?)}";
	 
		   
			$parablo= array(
			array($_POST['email'],SQLSRV_PARAM_IN),
			array($_POST['password'],SQLSRV_PARAM_IN)
		   
			);
	
	$querybloqueo = sqlsrv_query($conexion,$sp_bloqdis, $parablo)or die(print_r(sqlsrv_errors(),true));
	 
	$row = sqlsrv_fetch_array($querybloqueo);
	 
	if(!empty($row)){ 
	// Si la password es errada mostramos un mensaje.
		$loginx = 0;
		//echo 'error bad password';  
	}
	else {
	// Si el login es correcto obtenemos CustomerID
		$loginx = 1;
		$Email_Login = $_POST['email'];
		
		$sp_obtenerCustomerID = "{call WEB_GetCustomerID(?)} ";
		
		$querys = "SELECT CustomerID FROM Accounts WHERE email='$Email_Login'";
		$objQuery = sqlsrv_query($conexion, $querys);
		 while($objResult = sqlsrv_fetch_array($objQuery))
    	 {
  			  $Customer = $objResult["CustomerID"];
		 }
		/*$enviar_email = array(
			array($_POST['email'],SQLSRV_PARAM_IN)
		);
		
		$queryCustomerID = sqlsrv_query($conexion, $sp_obtenerCustomerID, $enviar_email) or die(print_r(sqlsrv_errors(), true));
		
		$CustomerID = sqlsrv_fetch_array($queryCustomerID);*/
		
		// MOSTRAMOS PUNTAJE DE CUSTOMERID
		
		$getInfoQ = "SELECT GamePoints, GameDollars
FROM UsersData
WHERE CustomerID = '$Customer'";  // OBTENEMOS LA INFORMACION NECESARIA
		$getInfo = sqlsrv_query($conexion, $getInfoQ);
		while($objResults = sqlsrv_fetch_array($getInfo))
    	 {
  			  $GC = $objResults["GamePoints"];
			  $GD = $objResults["GameDollars"];
			  
		 }
		 
		 /*OBTENEMOS CHARACTERS NAMES*/
		 
		/* $getInfoQ = "SELECT TOP 10 *
    FROM UsersChars 
    ORDER BY Reputation ASC"; //SELECT GamerTag FROM UsersChars WHERE CustomerID='$Customer'";	
		 $getInfo = sqlsrv_query($conexion, $getInfoQ);
		
    

		 while($objResults = sqlsrv_fetch_array($getInfo))
    	 {
			
			 
			  $CharacterName = $objResults["Gamertag"];	
			  
			 /* $Experiencia = $objResutls["XP"];
			   $kills = $objResults["Stat01"];
			   $kills2 = $objResults["Stat02"];
			  $Kills = $kills + $kills2;
			  $Reputation = $objResults["Reputation"];
			  $Health = $objResults["Health"];*/
			  
			  /*$CharacterName . "</font></b>"?></td>
    <td><?PHP echo "<b><font color=red>" . $Kills . "</font></b>"?></td>
    <td><?PHP echo "<b><font color=red>" . $Reputation . "</font></b>"?></td>
    <td><?PHP echo "<b><font color=red>" . $LastMap . "</font></b>"?></td>
    <td><?PHP echo "<b><font color=red>" . $Health*/
			
		// }
	//echo 'connected';  
	}
	 
}

/*foreach($stmt as $key => $value){
print_r($value);
}*/
 
sqlsrv_free_stmt( $stmt);
 
 
?>