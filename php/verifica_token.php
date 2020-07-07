<?php 
	header('Access-Control-Allow-Origin: *'); 
	header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
	header('Content-Type: application/json');

	$mysqli = mysqli_connect("localhost", "root", "", "tfg");

    $token = $_GET['token'];

    $empleado= array();
    $empleado["id_persona"]='0';

	$sql = "SELECT id_persona, empleado.id_rol, empleado.nombre, apellidos, email, rol.nombre as rol FROM empleado, rol WHERE empleado.id_rol = rol.id_rol and  token='$token' and valido_hasta > now()";

	$resultado = mysqli_query($mysqli, $sql);
	while($row = mysqli_fetch_array($resultado)){
		$empleado= array();
		$empleado["id_persona"]=$row["id_persona"];
		$empleado["id_rol"]=$row["id_rol"];
		$empleado["nombre"]=$row["nombre"];
		$empleado["apellidos"]=$row["apellidos"];
		$empleado["email"]=$row["email"];
		$empleado["rol"]=$row["rol"];
	}
    if($resultado->num_rows > 0) {
		$sql = "UPDATE empleado SET valido_hasta=DATE_ADD(NOW(), INTERVAL 10 MINUTE) WHERE token='$token'";
		mysqli_query($mysqli, $sql);
    }
  	echo json_encode($empleado);
?>

		

 
