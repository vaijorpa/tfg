<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include('conexion.php');

$response = array();

$sql= "SELECT id_persona, empleado.nombre nombre, apellidos, email, password_hash, rol.id_rol id_rol, rol.nombre rol FROM empleado, rol WHERE empleado.ID_ROL = rol.ID_ROL";

if ($resultado = mysqli_query($mysqli,$sql));
{	
	while($row = mysqli_fetch_array($resultado)){
		$empleado = array();
		$empleado["id_persona"]=$row["id_persona"];
		$empleado["id_rol"]=$row["id_rol"];
		$empleado["nombre"]=$row["nombre"];
		$empleado["apellidos"]=$row["apellidos"];
		$empleado["rol"]=$row["rol"];
		$empleado["email"]=$row["email"];
		$empleado["password_hash"]=$row["password_hash"];
		array_push($response,$empleado);
    }
	$resultado->close();
}


 $mysqli->close();
 echo json_encode($response);
 
?>