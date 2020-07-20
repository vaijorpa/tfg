<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


include('conexion.php');


  $id_reunion=$_GET['id_reunion'];
  
  $response = array();
  


	if ($resultado = mysqli_query($mysqli,"select id_reunion, id_sala, hora_inicio, hora_fin, fecha, concepto from reserva where id_reunion=".  $id_reunion));
	{	
		while($row = mysqli_fetch_array($resultado)){
			$sala= array();
			$sala["id_reunion"]=$row["id_reunion"];
			$sala["id_sala"]=$row["id_sala"];
			$sala["hora_inicio"]=$row["hora_inicio"];
			$sala["hora_fin"]=$row["hora_fin"];
			$sala["fecha"]=$row["fecha"];
			$sala["concepto"]=$row["concepto"];
			array_push($response,$sala);
		}
		$resultado->close();
	}
 $mysqli->close();
 echo json_encode($response);
 header('Content-Type: application/json');
?>

