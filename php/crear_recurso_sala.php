<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include('conexion.php');

$id_recurso=$_GET['id_recurso'];
$id_sala=$_GET['id_sala'];

$sql = "insert into sala_recurso(id_sala, id_recurso) values ($id_sala, $id_recurso)";

mysqli_query($mysqli, $sql);

		class Result {}

		$response = new Result();
		$response->resultado = 'OK';
		$response->mensaje = $sql;

		header('Content-Type: application/json');
		echo json_encode($response);  

?>