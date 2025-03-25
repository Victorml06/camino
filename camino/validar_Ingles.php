<?php
	session_start();
	$nombre= $_POST["nombrejesuita"]; //asigna el valor que se envía del formulario, recuerda acabar con ;
	$codigon= 	$_POST["codigo"]; 
	
	//Conecta con la base de datos ($conexión)
    include './css/configdb.php'; //include del archivo con los datos de conexión
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD); //Conecta con la base de datos
	$conexion->set_charset("utf8"); //Usa juego caracteres UTF8
	
	$sql = "SELECT idJesuita,nombre, codigo FROM jesuita WHERE nombre = '$nombre'";
	$resultado = $conexion->query($sql);
	if ($resultado->num_rows > 0) {
				$fila=$resultado->fetch_array();
				//VERIFICAR QUE LA CONTRASEÑA SEA CORRECTA
			 if (password_verify($codigon, $fila["codigo"])) {  
					$_SESSION["idJesuita"]=$fila["idJesuita"];
					$_SESSION["nombre"]=$fila["nombre"];			
					/*echo "Contraseña e usuario son corecto<br>";*/
					echo "<h2>Hello good, $nombre go make your visit: </h2>";
					echo '<h3><a href="Visita_ingles.php">Go visit</a></h3>';
				}else{
					echo "<h2>Error: Incorrect name or code</h2>";
					echo '<h3><a href="Jesuita_Ingles.html">try again</a></h3>';			
				}
				}else {
		echo "<h2>Error: Incorrect name or code</h2>";
		echo '<h3><a href="Jesuita.html">try again</a></h3>';
	}
	
	//Cierra la conexión
	$conexion->close();	
?>