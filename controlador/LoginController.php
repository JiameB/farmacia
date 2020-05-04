<?php
include_once '../modelo/usuario.php';
session_start();
$user = $_POST['user'];
$pass = $_POST['pass'];
	
$usuario = new Usuario();
 	
	
if (!empty($_SESSION['usuario_tipo'])) {
	switch($_SESSION['usuario_tipo']) {
		case 1:	
			header('Location: ../vista/adm_catalogo.php');
			break;	
		case 2:
			header('Location: ../vista/tec_catalogo.php');
			break;
	}
}
else {

$usuario->loguearse($user, $pass);

if (!empty($usuario->objetos)) {
	foreach ($usuario->objetos as $objeto){
	$_SESSION['usuario']=$objeto->id_usuario;
	$_SESSION['usuario_tipo']=$objeto->usuario_tipo;
	$_SESSION['nombre_usuario']=$objeto->nombre_usuario;
}
switch ($_SESSION['usuario_tipo']) {
	case 1:
		header('Location: ../vista/adm_catalogo.php');
		break;
case 2:
		header('Location: ../vista/tec_catalogo.php');
		break;
		
}
}
else{
	header('Location: ../index.php');
}
}
?>