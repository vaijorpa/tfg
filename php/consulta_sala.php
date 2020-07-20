
<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include('conexion.php');

$response2 = array();

$sql= "SELECT * FROM sala";

if ($resultado = mysqli_query($mysqli, $sql)) 
{	
	while($row = mysqli_fetch_array($resultado)){
		$sala= array();
		$sala["id_sala"]=$row["id_sala"];
		$sala["nombre"]=$row["nombre"];
		$sala["localizacion"]=$row["localizacion"];
		$sala["capacidad"]=$row["capacidad"];
		$sala["disponibilidad"]=$row["disponibilidad"];
		array_push($response2,$sala);
		
    }
	$resultado->close();
}

 $mysqli->close();
 echo json_encode($response2);
 
?>