<?php include('server.php')?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Recordar contraseña</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	
  <form method="post" action="remember.php">
  	<h1>Solicitud de contraseña</h1> 
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Introduzca su correo electrónico">
  	</div>
 
  	<div class="input-group">
  	  <button type="submit" class="btn" name="forgot_password">Solicitar contraseña</button>
  	</div>
  	<p>
  		No he olvidado mi contraseña <a href="login.php">Inicie sesión</a>
  	</p>
  </form>
</body>
</html>