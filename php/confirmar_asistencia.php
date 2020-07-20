
<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include('conexion.php');

$response = array();

$id_persona=$_GET['id_persona'];
$id_reunion=$_GET['id_reunion'];

$sql = "UPDATE asistente SET asiste = 1 WHERE id_persona = $id_persona AND id_reunion=$id_reunion";

$response = mysqli_query($mysqli,$query);
echo $response;
?>