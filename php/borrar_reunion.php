<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$mysqli = mysqli_connect("localhost", "root", "", "tfg");


		$id_reunion=$_GET['id_reunion'];
		

		
		$query = "DELETE FROM reserva WHERE id_reunion = ". (int) $id_reunion;
			
		$response = mysqli_query($mysqli,$query);

		class Result {}

		$response = new Result();
		$response->resultado = 'OK';
		

		header('Content-Type: application/json');
		echo json_encode($response);  

 
?>