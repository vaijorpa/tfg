<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$mysqli = mysqli_connect("localhost", "root", "", "tfg");


  $id_rol=$_GET['id_rol'];
  
  $response = array();
  


	if ($resultado = mysqli_query($mysqli,"select id_rol, nombre, permiso_empleado, permiso_reunion, permiso_sala_reunion from rol where id_rol=".  $id_rol));
	{	
		while($row = mysqli_fetch_array($resultado)){
			$sala= array();
			$sala["id_rol"]=$row["id_rol"];
			$sala["nombre"]=$row["nombre"];
			$sala["permiso_empleado"]=$row["permiso_empleado"];
			$sala["permiso_reunion"]=$row["permiso_reunion"];
			$sala["permiso_sala_reunion"]=$row["permiso_sala_reunion"];
			array_push($response,$sala);
		}
		$resultado->close();
	}
 $mysqli->close();
 echo json_encode($response);
 header('Content-Type: application/json');
?>

