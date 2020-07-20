<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include('conexion.php');

$response = array();

$sql= "SELECT id_reunion, sala.id_sala id_sala, sala.nombre nombre, hora_inicio, hora_fin, fecha, concepto FROM reunion, sala WHERE reunion.id_sala = sala.id_sala";

if ($resultado = mysqli_query($mysqli, $sql)) 
{	
	while($row = mysqli_fetch_array($resultado)){
		$reunion = array();
		$reunion["id_reunion"]=$row["id_reunion"];
		$reunion["id_sala"]=$row["id_sala"];
		$reunion["nombre"]=$row["nombre"];
		$reunion["hora_inicio"]=$row["hora_inicio"];
		$reunion["hora_fin"]=$row["hora_fin"];
		$reunion["fecha"]=$row["fecha"];
		$reunion["concepto"]=$row["concepto"];
		array_push($response,$reunion);
    }
	$resultado->close();
}
 $mysqli->close();
 echo json_encode($response);
 
?>