<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include('conexion.php');

		$id_recurso=$_GET['id_recurso'];

		
		$query = "DELETE FROM recurso WHERE id_recurso = ". (int) $id_recurso;
			
		$response = mysqli_query($mysqli,$query);

		
		class Result {}

		$response = new Result();
		$response->resultado = 'OK';
		$response->mensaje = '¿Estás seguro que quieres eliminar este elemento?';

		header('Content-Type: application/json');
		echo json_encode($response);  
		
 
?>