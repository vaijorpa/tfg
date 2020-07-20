
<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include('conexion.php');

$response = array();

$id_persona=$_GET['id_persona'];

$sql = "SELECT reunion.id_reunion id_reunion, reunion.id_sala id_sala, sala.nombre nombre_sala, reunion.concepto concepto, reunion.fecha fecha, reunion.hora_inicio hora_inicio, reunion.hora_fin hora_fin, asiste
		FROM asistente, reunion, sala
		WHERE reunion.id_reunion = asistente.id_reunion AND sala.id_sala = reunion.id_sala AND asistente.id_persona = $id_persona";

if ($resultado = mysqli_query($mysqli, $sql)) 
{	
	while($row = mysqli_fetch_array($resultado)){
		$asistente= array();
		$asistente["id_reunion"]=$row["id_reunion"];
		$asistente["id_sala"]=$row["id_sala"];
		$asistente["nombre_sala"]=$row["nombre_sala"];
		$asistente["concepto"]=$row["concepto"];
		$asistente["fecha"]=$row["fecha"];
		$asistente["hora_inicio"]=$row["hora_inicio"];
		$asistente["hora_fin"]=$row["hora_fin"];
		$asistente["asiste"]=$row["asiste"];

		array_push($response,$asistente);
    }
	$resultado->close();
}
 $mysqli->close();
 echo json_encode($response);
 
?>