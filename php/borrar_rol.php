<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include('conexion.php');


		$id_rol=$_GET['id_rol'];

		
		$query = "DELETE FROM rol WHERE id_rol = ". (int) $id_rol;
			
		$response = mysqli_query($mysqli,$query);

		class Result {}

		$response = new Result();
		$response->resultado = 'OK';
		$response->mensaje = '¿Estás seguro que quieres eliminar este elemento?';

		header('Content-Type: application/json');
		echo json_encode($response);  

 
?>