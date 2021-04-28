<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <title>Resetear contraseña</title>
 <link rel="stylesheet" href="css/style.css">
</head>
<body>

 <form class="input-form" action="login.php" method="post" style="text-align: center;">
  <p>
    Hemos enviado un mensaje de correo electrónico a <b><?php echo $_GET['email'] ?></b> con las instrucciones de recuperación. 
  </p>
     <p>Por favor, revisa tu cuenta de correo electrónico y pulsa el enlace que te hemos enviado para cambiar tu contraseña. <a href="login.php">Volver</a></p>
 </form>
  
</body>
</html>