<?php
    // Recoge la información del formulario
    echo $nombrejesu = $_POST["nombrejesuita"];
    echo $codigo = $_POST["codigo"];
    echo $nombreAlumno = $_POST["nombrealumno"];
    echo $firma = $_POST["firmasp"];
    echo $firmaIngles = $_POST["firmaing"];

    include './css/configdb.php'; //include del archivo con los datos de conexión
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD); //Conecta con la base de datos
    $conexion->set_charset("utf8"); //Usa juego caracteres UTF8

    // Desactiva errores
    $controlador = new mysqli_driver();
    $controlador->report_mode = MYSQLI_REPORT_OFF;



    $sql = "INSERT INTO jesuita (codigo, nombre, nombreAlumno, firma, firmaIngles) VALUES ('$codigo', '$nombrejesu', '$nombreAlumno', '$firma', '$firmaIngles')";
    echo $sql; // Enviar el contenido de la variable al navegador

	// Ejecuta la consulta
	$conexion->query($sql);
	if ($conexion->affected_rows > 0) {
		echo "<h2>consulta bien</h2>";
	} else {
		echo "<h2>Consulta mal</h2>";
		echo '<h3><a href="introducirjesuita.html"> Vuelve a intentarlo</a></h3>';
	}


    // Cierra la conexión
    $conexion->close();
?>