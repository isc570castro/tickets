<?php 

require_once 'model/usuario.php';

class LoginController{
	public $model;
	private $mensaje;
	private $error;


	public function __CONSTRUCT(){
		$this->model = new Usuario();
	} 

	public function Index(){
		require_once 'view/login/index.php';
	}

	public function Acceder(){
		header ('Location: ?c=inicio');
	}

	public function Verificar(){

		$usuario = new Usuario();
		$usuario->email = $_REQUEST['email'];
		$usuario->pass = $_REQUEST['password'];
		//password = md5($password);
		//$password = crc32($password);
		//$password = crypt($password,"xtem");
		//$usuario->pass= sha1($password);
		try {
			$consulta=$this->model->Verificar($usuario);
			if($consulta!=null){

				if($consulta->activo==1){
					$this->Session($consulta->nombreUsuario, $consulta->email, $consulta->usuario, $consulta->idTipo, $consulta->idUsuario, $consulta->foto);
				echo 'ok';
				}else{
					echo "Acceso denegado";
				}
			} else {
				echo 'Acceso incorrecto';	
			}
		} catch (Exception $e) {
			echo 'Algo salio mal. Intentelo de nuevo';
			// $e->getMessage();
		}	
	}

	public function Session($nombreUsuario, $email, $usuario, $tipo, $idUsuario, $foto)
	{
		$_SESSION['email'] = $email;
		$_SESSION['idUsuario']= $idUsuario;
		$_SESSION['usuario'] = $usuario;
		$_SESSION['nombreUsuario'] = $nombreUsuario;
		$_SESSION['idTipo'] = $tipo;
		$_SESSION['seguridad'] = "ok";
		$_SESSION['idEmbudo'] = 1;
		$_SESSION['nombre'] = "AMMMEC";
		$_SESSION['logo'] = "logoammmec.png";
		$_SESSION['foto'] = $foto;
	}

	public function Logout()
	{
		session_destroy();
		unset($_SESSION['nombreUsuario']);
		unset($_SESSION['email']);
		unset($_SESSION['usuario']);
		unset($_SESSION['idTipo']);
		unset($_SESSION['seguridad']);
		header ('Location: ./');
	}

	public function VerificarCorreo(){
		$email = $_POST['email'];
		$usuario=$this->model->VerificarCorreo($email);
		if($usuario != null){
			if($usuario->activo != 0){
				try {
					$this->Recuperar($email);
				} catch (Exception $e) {
					echo "Ah ocurrido un error al intentar recuperar contraseña";
				}
				echo 'ok';
			}else{
				echo 'denegado';
			}
		}else{
			echo "El correo electronico ingresado no existe en el sistema, vuelva a intentarlo";
		}
		
	}

	public function Recuperar($email)
	{
		$correo=$email;

		$mail = "Prueba de mensaje";
		//Titulo
		$titulo = "PRUEBA DE TITULO";
		//cabecera
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
		//dirección del remitente 
		$headers .= "From: Geeky Theory < tu_dirección_email >\r\n";
		//Enviamos el mensaje a tu_dirección_email 
		$bool = mail($correo,$titulo,$mail,$headers);
		if($bool){
			echo "Mensaje enviado";
		}else{
			echo "Mensaje no enviado";
		}
	}
}

?>
