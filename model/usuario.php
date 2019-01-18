<?php
class Usuario
{    
	public $idUsuario;
	public $idTipo;
	public $nombreUsuario;
	public $usuario;
	public $email;
	public $pass;
	public $passnueva;
	public $foto;
	private $pdo;
	
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	//Metodo para listar todos los usuarios activos
	public function Listar()
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM usuarios, tipousuario WHERE usuarios.idTipo=tipousuario.idTipo AND activo=1");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Metodo para listar todos los usuarios
	public function ListarInactivos()
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM usuarios, tipousuario WHERE usuarios.idTipo=tipousuario.idTipo AND activo=0");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	//Metodo para contar los usuarios
	public function Contador()
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT COUNT(*) FROM usuarios");
			$stm->execute();
			$cont = implode($stm->fetchAll(PDO::FETCH_COLUMN));
			return $cont;	
		}
		catch(Exception $e)
		{
			//die($e->getMessage());
			$this->error=true;
			$this->mensaje="Se ha producido un error";
		}
	}
    //Metodo para registrar usuarios
	public function Registrar(Usuario $data)
	{

		$sql ="INSERT INTO usuarios VALUES(?,?,?,?,?,?,'usuario.png',1)";
		$this->pdo->prepare($sql)
		->execute(
			array(
				null,
				$data->idTipo,
				$data->nombreUsuario,
				$data->usuario,
				$data->email,
				$data->pass
			)
		);
	}
	
	//Metodo para actualizar usuarios
	public function Actualizar(Usuario $data)
	{
		$sql ="UPDATE usuarios SET 
		idTipo=?,
		nombreUsuario=?,
		usuario=?,
		email=?,
		pass=?  
		WHERE idUsuario=?";
		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->idTipo,
				$data->nombreUsuario,
				$data->usuario,
				$data->email,
				$data->pass,
				$data->idUsuario
			)
		);
	}

	//Metodo para actualizar perfil de usuarios
	public function ActualizarPerfil(Usuario $data)
	{
		$sql ="UPDATE usuarios SET 
		nombreUsuario=?,
		usuario=?,
		email=? 
		WHERE idUsuario=?";
		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->nombreUsuario,
				$data->usuario,
				$data->email,
				$data->idUsuario
			)
		);
	}
	//Metodo para actualizar perfil de usuarios
	public function ActualizarPic(Usuario $data)
	{
		$sql ="UPDATE usuarios SET 
		foto=? 
		WHERE idUsuario=?";
		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->foto,
				$data->idUsuario
			)
		);
	}
//Metodo para actualizar password de usuarios
	public function ActualizarPass(Usuario $data)
	{
		$sql ="UPDATE usuarios SET 
		pass=? 
		WHERE idUsuario=?";
		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->passnueva,
				$data->idUsuario
			)
		);
	}
	//Metodo para desactivar usuarios
	public function Desactivar($idUsuario)
	{
		$sql ="UPDATE usuarios SET activo=0 WHERE idUsuario=?";
		$this->pdo->prepare($sql)
		->execute(
			array(
				$idUsuario
			)
		);
	}

	//Metodo para desactivar usuarios
	public function Activar($idUsuario)
	{
		$sql ="UPDATE usuarios SET activo=1 WHERE idUsuario=?";
		$this->pdo->prepare($sql)
		->execute(
			array(
				$idUsuario
			)
		);
	}

	//Verificar usuarios existentes para dar acceso en login
	public function Verificar(Usuario $data)
	{
		$sql= $this->pdo->prepare("SELECT * FROM usuarios, tipousuario WHERE email = ? AND BINARY pass = ? AND usuarios.idTipo = tipousuario.idTipo");
		$resultado=$sql->execute(
			array(
				$data->email,
				$data->pass
			)
		);
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}

		//Verificar usuarios existentes para dar acceso en login
	public function VerificarCorreo($email)
	{
		$sql= $this->pdo->prepare("SELECT * FROM usuarios WHERE email = '$email'");
		$resultado=$sql->execute();
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}
	public function VerificarPass($password)
	{
		$sql= $this->pdo->prepare("SELECT * FROM usuarios WHERE pass = '$password'");
		$resultado=$sql->execute();
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}
}