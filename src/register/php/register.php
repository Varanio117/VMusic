<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Registro</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	
  <form method="post" action="register.php">
  	<h1>Registro</h1> 
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Nombre de Usuario</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Elija un nombre de usuario">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Introduzca su correo electrónico">
  	</div>
  	<div class="input-group">
  	  <label>Contraseña</label>
  	  <input type="password" name="password_1" placeholder="Elija una contraseña">
  	</div>
  	<div class="input-group">
  	  <label>Confirmar contraseña</label>
  	  <input type="password" name="password_2" placeholder="Vuelva a introducir contraseña">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Registrarme</button>
  	</div>
  	<p>
  		¿Ya está registrado? <a href="login.php">Inicie sesión</a>
  	</p>
  </form>
</body>
</html>