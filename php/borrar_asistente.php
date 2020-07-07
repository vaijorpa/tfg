<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$mysqli = mysqli_connect("localhost", "root", "", "tfg");


		$usuario=$_GET['usuario'];

		
		$query = "DELETE FROM persona_reunion WHERE usuario = ". $usuario;
			
		$response = mysqli_query($mysqli,$query);
		echo $response;

 $mysqli->close();

 
?>