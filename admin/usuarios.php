<?php
	session_start();

	/* Comprobamos que esta página solo pueda ser accesible por un usuario con perfil administrador */
	if ($_SESSION['keyid'] != md5(session_id()) && $_SESSION['idusuario'] != md5(1) || $_SESSION['esadmin'] != md5('yes')){  
		session_destroy();
		
		header('Location: ../login.php');
	}
	
	require_once ($_SERVER['DOCUMENT_ROOT']. '/models/Usuario.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/controllers/UsuarioController.php');
	
	/* Array para almacenar los usuarios */
	$usuarios = array();
	
	$usuarioController  = new UsuarioController();
	$usuarios = $usuarioController->listarUsuarios();
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
			<nav>
          <ul class="menu">
              <li class="logo"><a title="inicio" href="index.php"><img src="../resources/img/logo_title.png" alt="inicio"</img></a></li>
							<li><a href="usuarios.php">Usuarios</a></li>
							<li><a class="navbar-brand">Equipos</a></li>
							<li><a class="navbar-brand">Canchas</a></li>
							<li><a class="navbar-brand">Partidos</a></li>
							<li><a class="navbar-brand">Reservas</a></li>
							<li> <a class="navbar-brand"><?php echo $_SESSION['nombreusuario']?></a></li>
							
						<form method="post" action="../controllers/LoginController.php">
	            <ul class="nav navbar-nav navbar-right">
	      		   	<li><button class="btn-salir" type="submit" name="salir" id="salir"><span class="glyphicon glyphicon-log-in"></span>Cerrar Sesión</button></li>
	            </ul>
            </form>
          </ul> 
      </nav>
      
       <div class="container">
    		<div class="row">
    			<h3>Gestión de Usuarios</h3>
    		</div>
			<div class="row">
				<p><a href="crearUsuario.php" class="btn btn-success">Crear</a></p>
				<?php
					/* Si no hay usuarios en el array */
					if($usuarios == null) {
						echo("No se han insertado en BBDD usuarios");
					}else{
				?>
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>ID</th>
		                  <th>Nombre</th>
		                  <th>Email</th>
		                  <th>Administrador</th>
		                  <th>Acción</th>
		                </tr>
		              </thead>
		              
		              <?php	
							/* Si hay usuarios en el array */
							foreach($usuarios as $usuario) {
						 ?>
		              <tbody>
		              	<tr>
						  <td><?php echo $usuario->getId()?></td>
						  <td><?php echo $usuario->getNombre()?></td>
						  <td><?php echo $usuario->getEmail()?></td>
						  <td>
							  <?php 
							  if( $usuario->getEs_Administrador() == 1){
							  	echo ("Sí");
							  }else{
							  	echo ("No");
							  }
							  ?>
						  </td>
						  <?php 
						  		echo '<td class="actionTam">';
							   	echo '<a class="btn btn-primary" href="verUsuario.php?id='.$usuario->getId().'">Ver</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-warning" href="editarUsuario.php?id='.$usuario->getId().'">Editar</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" name="borrar" href="../controllers/UsuarioController.php?action=borrar&id='.$usuario->getId().'">Borrar</a>';
							   	echo '</td>';
						  ?>
					   </tr>
					  <?php				
						 }
						}
					   ?>
				      </tbody>
	            </table>
    	</div>
    </div> <!-- /container -->
  </body>
</html>