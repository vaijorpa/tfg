
<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include('conexion.php');


$id_persona=$_GET['id_persona'];

		
$query = "DELETE FROM empleado WHERE id_persona = ". (int) $id_persona;
			
$response = mysqli_query($mysqli,$query);

class Result {}

	$response = new Result();
	$response->resultado = 'OK';

	header('Content-Type: application/json');
	echo json_encode($response);  
 
?>