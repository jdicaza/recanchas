<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>Recanchas</title>

    <!-- CSS -->
    <link href="resources/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
  </head>

  <body>
    <header>
      <nav>
				<ul class="menu">
					<li class="logo"><a title="inicio" href="inicio.php"><img src="resources/img/logo_title.png" alt="inicio"</img></a></li>
					<li class="item button"><a href="login.php">Log In</a></li>
					<li class="toggle"><a href="#"><i class="fas fa-bars"></i></a></li>
        </ul>     
      </nav>
      <div class="contenedor">
        <form class="form-generic">
          <h2 class="form-login">Crear cuenta</h2>
          <input type="text" class="form-entrada" name="nombre" placeholder="Nombre" required autofocus>
          <label for="inputEmail" class="sr-only">Email address</label>
	        <input type="email" id="inputEmail" name="email" class="form-entrada" placeholder="Email" required>
          <label for="inputPassword" class="sr-only">Password</label>
	        <input type="password" id="inputPassword" name="password" class="form-entrada" placeholder="Contraseña" required>
          
          <button class="btnrelogin" type="submit" name="crear">Crear</button>         
        </form>
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