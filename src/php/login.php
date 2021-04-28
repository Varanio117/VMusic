<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title> VMusic!</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<header>
    VMusic!
</header>

<body>
  
  <form method="post" action="login.php">
  	<h1>Iniciar sesión</h1>   
  	<?php include('errors.php'); ?>

	
  	<div class="input-group">
  		<label>Usuario:</label>
  		<input type="text" name="username" id="username" placeholder="Nombre de usuario">
  	</div>
  	<div class="input-group">
  		<label>Contraseña</label>
  		<input type="password" name="password" id="password" placeholder="Introduce contraseña">
  	</div>
	<div class="remember">  
	  <p>
          <input type="checkbox" name="remember" id="remember">
          <label for="remember">Recuérdame</label>
       </p>
	</div>   
	<div class="login">
		<span><a href="remember.php">Contraseña olvidada</a></span>
  		<button type="submit" class="btn" name="login_user">Entrar</button>
  	</div>
  	<p>
  		¿No es miembro todavía? <a href="register.php">Regístrese aquí</a>
  	</p>
  </form>
</body>
</html>