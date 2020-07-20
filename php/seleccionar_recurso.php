<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


include('conexion.php');


  $id_recurso=$_GET['id_recurso'];
  
  $response = array();
  


	if ($resultado = mysqli_query($mysqli,"select id_recurso, nombre, tipo_recurso, cantidad from recurso where id_recurso=".  $id_recurso));
	{	
		while($row = mysqli_fetch_array($resultado)){
			$sala= array();
			$sala["id_recurso"]=$row["id_recurso"];
			$sala["nombre"]=$row["nombre"];
			$sala["tipo_recurso"]=$row["tipo_recurso"];
			$sala["cantidad"]=$row["cantidad"];
			array_push($response,$sala);
		}
		$resultado->close();
	}
 $mysqli->close();
 echo json_encode($response);
 header('Content-Type: application/json');
?>

