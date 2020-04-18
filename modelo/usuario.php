<?php
include_once 'conexion.php';

class Usuario{
	var $objetos;
	public  function __construct()
	{
		$db = new Conexion();
		$this->acceso = $db->pdo;
	}
	function loguearse($dni, $pass){
		$sql = "SELECT * FROM usuario inner join tipo_usuario on usuario_tipo = id_tipo_usuario where cedula_usuario=:dni and contrasena_usuario=:pass";
		$query = $this->acceso->prepare($sql);
		$query->execute(array(':dni'=>$dni, ':pass'=>$pass));
		$this->objetos= $query->fetchall();
		return $this->objetos;
	}
}
?>