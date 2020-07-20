
<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include('conexion.php');


		$usuario=$_GET['usuario'];
		$id_reunion=$_GET['id_reunion'];
		$asiste=$_GET['asiste'];
		
		
		$query = "INSERT INTO persona_reunion(usuario, id_reunion, asiste) VALUES
			(".$usuario.", ".$id_reunion.",".$asiste.")";
		
		$response = mysqli_query($mysqli,$query);
		echo $response;

 $mysqli->close();

 
?>