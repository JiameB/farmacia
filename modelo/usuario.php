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
	function obtener_datos($id){
		$sql = "SELECT * FROM usuario join tipo_usuario on usuario_tipo = id_tipo_usuario and id_usuario = :id";
		$query = $this->acceso->prepare($sql);
		$query->execute(array(':id'=>$id));
		$this->objetos= $query->fetchall();
		return $this->objetos;
	}
	function editar($id_usuario,$telefono,$residencia,$correo,$sexo,$adicional){
		$sql = "UPDATE usuario SET telefono_usuario=:telefono,residencia_usuario=:residencia,correo_usuario=:correo,sexo_usuario=:sexo,adicional_usuario=:adicional where id_usuario=:id";
		$query = $this->acceso->prepare($sql);
		$query->execute(array(':id'=>$id_usuario, ':telefono'=>$telefono, ':residencia'=>$residencia, ':correo'=>$correo, ':sexo'=>$sexo, ':adicional'=>$adicional));
	}
	function cambiar_pass($id_usuario,$oldpass,$newpass){
		$sql = "SELECT * FROM usuario where id_usuario=:id and contrasena_usuario=:oldpass";
		$query = $this->acceso->prepare($sql);
		$query->execute(array(':id'=>$id_usuario, ':oldpass'=>$oldpass));
		$this->objetos=$query->fetchall();
		if (!empty($this->objetos)) {
			$sql="UPDATE usuario SET contrasena_usuario=:newpass where id_usuario=:id";
			$query = $this->acceso->prepare($sql);
			$query->execute(array(':id'=>$id_usuario, ':newpass'=>$newpass));
			echo 'update';
		}
		else{
			echo 'noupdate';
		}
	}
	function cambiar_foto($id_usuario,$nombre){
		$sql = "SELECT avatar FROM usuario where id_usuario=:id";
		$query = $this->acceso->prepare($sql);
		$query->execute(array(':id'=>$id_usuario));
		$this->objetos=$query->fetchall();
			$sql="UPDATE usuario SET avatar=:nombre where id_usuario=:id";
			$query = $this->acceso->prepare($sql);
			$query->execute(array(':id'=>$id_usuario,':nombre'=>$nombre));
			return $this->objetos;
	}
	function buscar(){
		if (!empty($_POST['consulta'])) {
			$consulta=$_POST['consulta'];
			$sql = "SELECT * FROM usuario join tipo_usuario on usuario_tipo=id_tipo_usuario where nombre_usuario LIKE :consulta";
		$query = $this->acceso->prepare($sql);
		$query->execute(array(':consulta'=>"%$consulta%"));
		$this->objetos=$query->fetchall();
		return $this->objetos;		
		}
		else{
		$sql = "SELECT * FROM usuario join tipo_usuario on usuario_tipo=id_tipo_usuario where nombre_usuario NOT LIKE '' ORDER BY id_usuario LIMIT 25";
		$query = $this->acceso->prepare($sql);
		$query->execute();
		$this->objetos=$query->fetchall();
		return $this->objetos;
		}
		
		
	}

}
?>