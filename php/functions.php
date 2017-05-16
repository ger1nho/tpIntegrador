<?php

//validaciones
function validarRegistro($datos,$users){

	$errors = [];

	//validar nombre
	$nombre = trim($datos['nombre']);
	$largoNombre = strlen($nombre);
	if ($nombre == "" || $largoNombre < 3 || $largoNombre > 15 ) {
		$errors[] = "El nombre ingresado no es valido";
		$_SESSION["nombre"] = "";
	}
	else{
		$_SESSION["nombre"] = $nombre;
	}

	//validar apellido
	$apellido = trim($datos['apellido']);
	$largoApellido = strlen($apellido);
	if ($apellido == "" || $largoApellido < 3 || $largoApellido > 15) {
		$errors[] = "El apellido ingresado no es valido";
		$_SESSION["apellido"] = "";
	}
	else{
		$_SESSION["apellido"] = $apellido;
	}

	//validar usuario
	$usuario = trim($datos["usuario"]);
	$largoUsuario = strlen($usuario);
	if($usuario == "" || $largoUsuario < 3){
		$errors[] = "El usuario ingresado no es valido";
		$_SESSION["usuario"] = "";
	}
	else{
		$_SESSION["usuario"] = $usuario;
	}

	//validar email



	$mail = trim($datos['mail']);
	$valido = true;
	foreach ($users as $campos){
			if($campos["mail"] == $mail){
				$valido = false;
			}
	}
	if ($mail == "") {
		$errors[] = "Te faltó ingresar tu email";
		$_SESSION["mail"] = "";
	} elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
		$errors[] = "El email ingresado no es válido";
		$_SESSION["mail"] = "";
	}
	elseif(!$valido){
		$errors[] = "El mail ya existe";
		$_SESSION["mail"] = "";
	}
	else{
		$_SESSION["mail"] = $mail;
	}

	//validar pass
	$password = trim($datos["password"]);
	$password2 = trim($datos["password2"]);

	if($password == "" || $password2 == ""){
		$errors[] = "No se completo alguna de las contraseñas";
	}
	elseif($password != $password2){
		$errors[] = "Las contraseñas no coinciden";
	}

	//validar imagen
	if($validar = validarImagenRegistro('foto-perfil')){
		$errors[] = $validar;
	}

	//devuelvo los errores
	return $errors;

}
//----------

//abm usuario
function getUsers (){

	$users = @file_get_contents('../usuarios.json');
	if (!$users) {
		$users = [];
	} else {
		$users = json_decode($users, true);
	}
	return $users;
}

function guardarUsuario($datos,$users){
	//users es un array de arrays usuarios

	//subo la imagen
	guardarImagenRegistro('foto-perfil', "../images/");

	//newUser es un array del tipo usuario
	$newUser = [
		'nombre' => $datos['nombre'],
		'apellido' => $datos["apellido"],
		'usuario' => $datos["usuario"],
		'mail' => $datos['mail'],
		'password' => password_hash($datos['password'], PASSWORD_DEFAULT)
	];

	//guardo newUser dentro del array de usuarios
	$users[] = $newUser;
	//lo codifico a json
	$users = json_encode($users);
	//guardarlo en el archivo json
	file_put_contents('../usuarios.json', $users);
}

function validarLogin($datos,$users){

	$usuario = $datos["usuario"];
	$password = $datos["password"];
	if($datos["remember"]){
		setcookie("usuario",$usuario,time()+(60*60*24),'/');
	}
	else{
		setcookie("usuario",$usuario,time() - 3600,'/');
		unset($_COOKIE["usuario"]);
	}

	foreach ($users as $campos){
			if($campos["usuario"] == $usuario && password_verify($password, $campos["password"])){
				$_SESSION["usuario"] = $campos["usuario"];
				return true;
			}
	}
	$_SESSION["usuario"] = $usuario;
	$_SESSION["log-errores"] = "El usuario o contraseña es incorrecto";
	return false;
}

function validarImagenRegistro($upload){

	$nombre = $_FILES[$upload]["name"];
	$ext = pathinfo($nombre, PATHINFO_EXTENSION);

	if($_FILES[$upload]["error"] != UPLOAD_ERR_NO_FILE){
			if (!$_FILES[$upload]["error"] == UPLOAD_ERR_OK) {
				$error = "No se pudo subir la foto";
			}
			elseif ($ext != "png" && $ext != "jpg") {
					$error = "No acepto la extension del archivo";
			}
			else{
				$error = "";
			}
			return $error;
	}
}

function guardarImagenRegistro($upload, $path) {

		$nombre = $_FILES[$upload]["name"];
    $ext = pathinfo($nombre, PATHINFO_EXTENSION);
    $archivo = $_FILES[$upload]["tmp_name"];

    $nombre = uniqid();
		move_uploaded_file($archivo,$path.$_POST["usuario"].$nombre. "." . $ext);
}
