<?php
	session_start();

	/* Comprobamos que esta página solo pueda ser accesible por un usuario con perfil administrador */
	if ($_SESSION['keyid'] != md5(session_id()) && $_SESSION['idusuario'] != md5(1) || $_SESSION['esadmin'] != md5('yes')){  
		session_destroy();
		
		header('Location: ../login.php');
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
		<header>
			<nav>
          <ul class="menu">
              <li class="logo"><a title="inicio" href="index.php"><img src="../resources/img/logo_title.png" alt="inicio"</img></a></li>
							<li> <a class="navbar-brand"><?php echo $_SESSION['nombreusuario']?></a></li>
						<form method="post" action="../controllers/LoginController.php">
	            <ul class="nav navbar-nav navbar-right">
	      		   	<li><button class="btn-salir" type="submit" name="salir" id="salir"><span class="glyphicon glyphicon-log-in"></span>Cerrar Sesión</button></li>
	            </ul>
            </form>
          </ul>     
      </nav>
      
       <!-- Contenedor -->
      <div class="contenedor">
      	<div class="text-center">
		        <h1>Panel de Administración</h1>
	      </div>
      </div>
		</header>
		<!-- FOOTER -->
		<footer>
			<div class="sociales">
				<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
				<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
				<a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a>
			</div>
    </footer>	
  </body>
</html>