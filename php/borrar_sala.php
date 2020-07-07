
<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$mysqli = mysqli_connect("localhost", "root", "", "tfg");


		$id_sala=$_GET['id_sala'];

		
		$query = "DELETE FROM sala WHERE id_sala = ". (int) $id_sala;
			
		$response = mysqli_query($mysqli,$query);
		//echo $response;
		//echo "sala borrada";
		
		
		class Result {}

		$response = new Result();
		$response->resultado = 'OK';
		$response->mensaje = '¿Estás seguro que quieres eliminar este elemento?';

		header('Content-Type: application/json');
		echo json_encode($response);  
		

 //$mysqli->close();
 //header('Content-Type: application/json');
 
?>