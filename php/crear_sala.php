
<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include('conexion.php');

$json = file_get_contents('php://input');

$params = json_decode($json);


$sql = "INSERT INTO sala(nombre, localizacion, capacidad, disponibilidad ) VALUES ('$params->nombre', '$params->localizacion', $params->capacidad, $params->disponibilidad)";



mysqli_query($mysqli, $sql);

		class Result {}

		$response = new Result();
		$response->resultado = 'OK';
		$response->mensaje = $sql;
		
		$sql = "SELECT max(id_sala) id_sala from sala";
		$resultado = mysqli_query($mysqli, $sql);
		$row = mysqli_fetch_array($resultado);

		$response->id_sala = $row["id_sala"];

		header('Content-Type: application/json');
		echo json_encode($response);  


 
?>

  