<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. '/config/config.php');
	
	class Database{
		private $conexion;
		private $db;
			
		public function conectar(){
			/* Conexión con MySQL */
			$this->conexion = mysqli_connect(host, username, password);
			
			/* Para las tildes */
			mysqli_query($this->conexion, "SET NAMES utf8");
			
			if ($this->conexion == 0){
				DIE("Error al conectar con MySQL: " . mysqli_error());
			}
			
			/* Conexión con la BBDD */
			$this->db = mysqli_select_db($this->conexion, dbname);
			if ($this->db == 0){
				DIE("Error al conectar con la base datos: " . dbname);
			}
	 
			return true;
		}
		
		/* Función para usar la conexión fuera de la clase con MySQL */
		public function getConexion(){
			return $this->conexion;
		}
	 
		public function desconectar(){
			if ($this->conexion) {
				mysqli_close($this->conexion);
			}
		}
	}
?>



