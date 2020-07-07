
<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$mysqli = mysqli_connect("localhost", "root", "", "tfg");

$response = array();

$sql = "SELECT empleado.id_persona id_persona, reserva.id_reunion id_reunion, empleado.nombre nombre, empleado.apellidos apellidos, reserva.fecha fecha, reserva.hora_inicio, reserva.hora_fin, asiste
		FROM asistente, empleado, reserva
		WHERE empleado.id_persona = asistente.id_persona AND reserva.id_reunion = asistente.id_reunion";






if ($resultado = mysqli_query($mysqli, $sql)) 
{	
	while($row = mysqli_fetch_array($resultado)){
		$asistente= array();
		$asistente["id_persona"]=$row["id_persona"];
		$asistente["id_reunion"]=$row["id_reunion"];
		$asistente["nombre"]=$row["nombre"];
		$asistente["apellidos"]=$row["apellidos"];
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