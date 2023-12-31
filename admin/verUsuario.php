<?php
	session_start();

	/* Comprobamos que esta página solo pueda ser accesible por un usuario con perfil administrador */
	if ($_SESSION['keyid'] != md5(session_id()) && $_SESSION['idusuario'] != md5(1) || $_SESSION['esadmin'] != md5('yes')){  
		session_destroy();
		
		header('Location: ../login.php');
	}
	
	require_once ($_SERVER['DOCUMENT_ROOT']. '/models/Usuario.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/controllers/UsuarioController.php');
	
	$id = null;
	
	/* Recogemos el ID del usuario a visualizar */
	if (!empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	/* Si es distinto de nulo buscamos el usuario que contiene ese ID */
	if ($id == null) {
		header("Location: index.php");
	} else {
		$usuarioController  = new UsuarioController();
		$usuario = $usuarioController->buscarUsuarioPorId($id);
	}	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>Recanchas</title>

    <!-- CSS -->
    <link href="../resources/css/style.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    	
  </head>

  <body>
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">La Liga</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Inicio</a></li>
               <li><a href="usuarios.php">Usuarios</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Información<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="equipos.php">Equipos</a></li>
                  <li><a href="clasificacion.php">Clasificación</a></li>
                  <li><a href="partidos.php">Partidos</a></li>
                </ul>
              </li>
            </ul>
            
            <form method="post" action="../controllers/LoginController.php">
	            <ul class="nav navbar-nav navbar-right">
	               <li> <a class="navbar-brand">¡Hola, <?php echo $_SESSION['nombreusuario']?>!</a></li>
	      		   	<li><button class="btn-link" type="submit" name="salir" id="salir"><span class="glyphicon glyphicon-log-in"></span>&nbspCerrar sesión</button></li>
	            </ul>
            </form>
          </div>
        </div>
      </nav>
      
      <div class="container">
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Visualizar usuario</h3>
		    		</div>
		    		
	    			<div class="form-horizontal" >
					  <div class="control-group">
					    <label class="control-label">ID:</label>
						<?php echo $usuario->getId();?>
					  </div>
					  
					  <div class="control-group">
					    <label class="control-label">Nombre:</label>
						<?php echo $usuario->getNombre();?>
					  </div>
					  
					  <div class="control-group">
					    <label class="control-label">Email</label>
						 <?php echo $usuario->getEmail()?>
					  </div>
					  
					  <div class="control-group">
					    <label class="control-label">Administrador:</label>
						<?php 
							if($usuario->getEs_Administrador() == 1){
							  	echo ("Sí");
							  }else{
							  	echo ("No");
							 }
						?>
					  </div>
					  
					   <div class="form-actions">
						  <a class="btn" href="usuarios.php">Volver</a>
					   </div>
					</div>
				</div>
		</div>
  </body>
</html>