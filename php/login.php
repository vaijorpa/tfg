<?php 
	header('Access-Control-Allow-Origin: *'); 
	header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
	header('Content-Type: application/json');

	$mysqli = mysqli_connect("localhost", "root", "", "tfg");

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$token = null;

	if(isset($postdata) && !empty($postdata))
	{
		$email = mysqli_real_escape_string($mysqli, trim($request->email));
		$password = mysqli_real_escape_string($mysqli, trim($request->password));

		$sql = "SELECT * FROM empleado WHERE email='$email' and password='$password'";

		$resultado = mysqli_query($mysqli, $sql);

	}

	if($resultado->num_rows > 0) {

		$token = bin2hex(openssl_random_pseudo_bytes(32));

		$sql = "UPDATE empleado SET token='$token', valido_hasta=DATE_ADD(NOW(), INTERVAL 10 MINUTE) WHERE email='$email'";
		mysqli_query($mysqli, $sql);
		echo json_encode(
			array(
				"mensaje" =>"Login exitoso. Bienvenid@",
				"token" => $token,
				"email" => $email
			));
				
			http_response_code(200);
	} else {
		echo json_encode(array("mensaje" => "Login Fallido. Vuelve a intentarlo "));
	}
  
    
?>

		

 
