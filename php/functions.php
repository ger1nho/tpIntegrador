<?php

//validaciones
function validarRegistro (){

	$errors = [];

	//validar nombre
	$nombre = trim($_POST['nombre']);
	if ($nombre == "") {
		$errors[] = "Te faltó ingresar tu nombre";
	}

	//validar email
	$email = trim($_POST['email']);
	if ($email == "") {
		$errors[] = "Te faltó ingresar tu email";
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[] = "El email ingresado no es válido";
	}

	//validar edad
	$edad = trim($_POST['edad']);
	if (!is_numeric($edad)) {
		$errors[] = "La edad tiene que ser un número";
	}

	//validar pass
	if ($_POST['password'] != $_POST['password2']) {
		$errors[] = "Las contraseñas no coinciden";
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

function guardarUsuario(){
	//users es un array de arrays usuarios
	$users = getUsers();

	//newUser es un array del tipo usuario
	$newUser = [
		'nombre' => $_POST['nombre'],
		'email' => $_POST['email'],
		'edad' => $_POST['edad'],
		'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
	];

	//guardo newUser dentro del array de usuarios
	$users[] = $newUser;

	//lo codifico a json
	$users = json_encode($users);

	//guardarlo en el archivo json
	file_put_contents('../usuarios.json', $users);
}

function guardarImagen($upload, $path) {
	$errores = [];
	if ($_FILES[$upload]["error"] == UPLOAD_ERR_OK) {

		$nombre = $_FILES[$upload]["name"];
    $ext = pathinfo($nombre, PATHINFO_EXTENSION);
    $archivo = $_FILES[$upload]["tmp_name"];

		if ($ext != "png" && $ext != "jpg") {
			$errores[] = "No acepto la extension";
		}
    else {
      $nombre = uniqid();
			move_uploaded_file($archivo,$path.$_POST["name"].$nombre. "." . $ext);
		}
	}
  else {
		$errores[] = "No pude subir la foto";
	}
	return $errores;
}
