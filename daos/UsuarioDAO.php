<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. '/models/Usuario.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/config/database.php');

	class UsuarioDAO{
		public function listarUsuarios(){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
			
			if($db->conectar()) {
				$conexion = $db->getConexion();
				$sql = "SELECT * FROM usuario";
				$result = mysqli_query($conexion, $sql);
				
				if($result) {
					// Si hay registros
					if(mysqli_num_rows($result) !== 0) {
						while($row = mysqli_fetch_array($result)) {
							$usuario = new Usuario();
							
							$usuario->setId($row['id']);
							$usuario->setNombre($row['nombre']);
							$usuario->setEmail($row['email']);
							$usuario->setPassword($row['password']);
							$usuario->setEs_Administrador($row['es_administrador']);
							
							$usuarios[] = $usuario;
						}	
					}else{
						$usuarios = null;
					}
				}
				
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
			
			return $usuarios;
		}
		
		public function buscarUsuarioPorEmail($email){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
				
			if($db->conectar()) {
				$conexion = $db->getConexion();
				$sql = "SELECT * FROM usuario where email = '$email'";
				$result = mysqli_query($conexion, $sql);
				
				$usuario = new Usuario();
			
				if($result) {
					// Si solo hay un registro
					if(mysqli_num_rows($result) !== 0 && mysqli_num_rows($result) == 1) {
						while($row = mysqli_fetch_array($result)) {
							$usuario->setId($row['id']);
							$usuario->setNombre($row['nombre']);
							$usuario->setEmail($row['email']);
							$usuario->setPassword($row['password']);
							$usuario->setEs_Administrador($row['es_administrador']);
						}
					}else{
						$usuario = null;
					}
				}
			
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
				
			return $usuario;
		}
		
		public function buscarUsuarioPorId($id){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
		
			if($db->conectar()) {
				$conexion = $db->getConexion();
				$sql = "SELECT * FROM usuario where id = '$id'";
				$result = mysqli_query($conexion, $sql);
		
				$usuario = new Usuario();
					
				if($result) {
					// Si solo hay un registro
					if(mysqli_num_rows($result) !== 0 && mysqli_num_rows($result) == 1) {
						while($row = mysqli_fetch_array($result)) {
							$usuario->setId($row['id']);
							$usuario->setNombre($row['nombre']);
							$usuario->setEmail($row['email']);
							$usuario->setPassword($row['password']);
							$usuario->setEs_Administrador($row['es_administrador']);
						}
					}else{
						$usuario = null;
					}
				}
					
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
		
			return $usuario;
		}
		
		public function insertarUsuario($nombre, $email, $password, $es_administrador){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
				
			if($db->conectar()) {
				$conexion = $db->getConexion();
				$sql = "INSERT INTO usuario (nombre, email, password, es_administrador) VALUES ('$nombre', '$email', '$password', '$es_administrador')";
				$result = mysqli_query($conexion, $sql);
				
				if($result) {
					return true;
				}else{
					return false;
				}	
				
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
		}
		
		public function borrarUsuario($id){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
			
			if($db->conectar()) {
				$conexion = $db->getConexion();
				$sql = "DELETE FROM usuario where id = '$id'";
				$result = mysqli_query($conexion, $sql);
			
				if($result) {
					return true;
				}else{
					return false;
				}
			
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
		}
		
		public function editarUsuario($id, $nombre, $email, $es_administrador){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
			
			if($db->conectar()) {
				$conexion = $db->getConexion();
				$sql = "UPDATE usuario SET nombre = '$nombre', email = '$email', es_administrador = '$es_administrador' WHERE id = $id";
				$result = mysqli_query($conexion, $sql);
			
				if($result) {
					return true;
				}else{
					return false;
				}
			
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
		}
		
		
	}
?>