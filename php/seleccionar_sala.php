<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


include('conexion.php');


  $id_sala=$_GET['id_sala'];
  
  $response = array();
  


	if ($resultado = mysqli_query($mysqli,"select id_sala, nombre, localizacion, capacidad, disponibilidad from sala where id_sala=".  $id_sala));
	{	
		while($row = mysqli_fetch_array($resultado)){
			$sala= array();
			$sala["id_sala"]=$row["id_sala"];
			$sala["nombre"]=$row["nombre"];
			$sala["localizacion"]=$row["localizacion"];
			$sala["capacidad"]=$row["capacidad"];
			$sala["disponibilidad"]=$row["disponibilidad"];
			array_push($response,$sala);
		}
		$resultado->close();
	}
 $mysqli->close();
 echo json_encode($response);
 header('Content-Type: application/json');
?>

