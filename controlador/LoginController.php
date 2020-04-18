<?php
include_once '../modelo/usuario.php';
session_start();
$user = $_POST['user'];
$pass = $_POST['pass'];
echo $user."  ".$pass;

$usuario = new Usuario();
 
$usuario->loguearse($user, $pass);

foreach ($usuario->objetos as $objeto){
	print_r($objeto);
}
?>