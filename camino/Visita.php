<?php

	//INICIAR SESION
    session_start();
    $nombrejesuita=$_SESSION["nombre"];
		
	//Conecta con la base de datos ($conexión)
    include './css/configdb.php'; //include del archivo con los datos de conexión
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD); //Conecta con la base de datos
    $conexion->set_charset("utf8"); //Usa juego caracteres UTF8	
	
	
	
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Visita</title>
        <meta name="autor" content="Victor Manuel Lozano Herrera">
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/camino.css">
    </head>
    <body>
        <?php
            echo "<h1>Hola, $nombrejesuita. ¿Donde deseas ir?</h1>";
        ?>
        <form name="Visita" method="get" action="./css/guardarVisita.php">
			<input type="hidden" name="idjesuita" value="<?= $idJesuita ?>">
            <label for="lugar">Lugar:</label><br>
            <select name="ipequipo" placeholder="IP">
                <?php
                    $sql="SELECT * FROM lugar";
                    $resultado=$conexion->query($sql); 
                    // Bucle para crear las opciones del 'select'
                    while ($fila = $resultado->fetch_array()) {
                        echo "<option value=".$fila["ip"].">".$fila["lugar"]."</option>";
                    }
                    // Cierra la conexión
                    $conexion->close();
                ?>
            </select>

            <input type="submit" value="Enviar">
        </form>
    </body>
</html>