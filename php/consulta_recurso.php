<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include('conexion.php');

$response = array();

$sql= "SELECT * FROM recurso";


if ($resultado = mysqli_query($mysqli, $sql)) 
{	
	while($row = mysqli_fetch_array($resultado)){
		$recurso = array();
		$recurso["id_recurso"]=$row["id_recurso"];
		$recurso["nombre"]=$row["nombre"];
		$recurso["tipo_recurso"]=$row["tipo_recurso"];
		$recurso["cantidad"]=$row["cantidad"];
		array_push($response,$recurso);
    }
	$resultado->close();
}
 $mysqli->close();
 echo json_encode($response);
 
?>

