<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$mysqli = mysqli_connect("localhost", "root", "", "tfg");

$response = array();

$sql= "SELECT id_reunion, sala.id_sala id_sala, sala.nombre nombre, hora_inicio, hora_fin, fecha, concepto FROM reserva, sala WHERE reserva.id_sala = sala.id_sala";

if ($resultado = mysqli_query($mysqli, $sql)) 
{	
	while($row = mysqli_fetch_array($resultado)){
		$reserva = array();
		$reserva["id_reunion"]=$row["id_reunion"];
		$reserva["id_sala"]=$row["id_sala"];
		$reserva["nombre"]=$row["nombre"];
		$reserva["hora_inicio"]=$row["hora_inicio"];
		$reserva["hora_fin"]=$row["hora_fin"];
		$reserva["fecha"]=$row["fecha"];
		$reserva["concepto"]=$row["concepto"];
		array_push($response,$reserva);
    }
	$resultado->close();
}
 $mysqli->close();
 echo json_encode($response);
 
?>