<?php 
	header('Access-Control-Allow-Origin: *'); 
	header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
	header('Content-Type: application/json');

	include('conexion.php');

    $token = $_GET['token'];

    $empleado= array();
    $empleado["id_persona"]='0';

	$sql = "SELECT id_persona, empleado.nombre AS nombre, permiso_empleado, permiso_reunion, permiso_sala_reunion FROM empleado, rol WHERE empleado.id_rol = rol.id_rol and  token='$token' and valido_hasta > now()";

	$resultado = mysqli_query($mysqli, $sql);
	while($row = mysqli_fetch_array($resultado)){
		$empleado= array();
		$empleado["id_persona"]=$row["id_persona"];
		$empleado["nombre"]=$row["nombre"];
		$empleado["permiso_empleado"]=$row["permiso_empleado"];
		$empleado["permiso_reunion"]=$row["permiso_reunion"];
		$empleado["permiso_sala_reunion"]=$row["permiso_sala_reunion"];
	}
    if($resultado->num_rows > 0) {
		$sql = "UPDATE empleado SET valido_hasta=DATE_ADD(NOW(), INTERVAL 10 MINUTE) WHERE token='$token'";
		mysqli_query($mysqli, $sql);
    }
  	echo json_encode($empleado);
?>

		

 
