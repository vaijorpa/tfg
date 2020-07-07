<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$mysqli = mysqli_connect("localhost", "root", "", "tfg");


 $id_persona=$_GET['id_persona'];
  
 $response = array();
  


	if ($resultado = mysqli_query($mysqli,"select id_persona, id_rol, nombre, apellidos, email, password from empleado where id_persona=".  $id_persona));
	{	
		while($row = mysqli_fetch_array($resultado)){
			$sala= array();
			$sala["id_persona"]=$row["id_persona"];
			$sala["id_rol"]=$row["id_rol"];
			$sala["nombre"]=$row["nombre"];
			$sala["apellidos"]=$row["apellidos"];
			$sala["email"]=$row["email"];
			$sala["password"]=$row["password"];
			array_push($response,$sala);
		}
		$resultado->close();
	}
 $mysqli->close();
 echo json_encode($response);
 header('Content-Type: application/json');
?>


