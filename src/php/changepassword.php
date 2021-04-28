<?php include('server.php')?>

<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <title>Cambio de contraseña</title>
 <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php
    if(isset($_GET['token'])){
        $token = $_GET['token'];
        $_SESSION['token'] = $token;
        echo $token;
      }else{
        echo "ERROR: Falta token";
      }
    ?>
 <form action="changepassword.php" method="post" >
    <h1>Cambio de contraseña</h1> 
  	<?php include('errors.php'); ?>
    <div class="input-group">
        <label>Nueva contraseña</label>
        <input type="password" name="new_password_1" placeholder="Introduzca su nueva contraseña">
    </div>
    <div class="input-group">
        <label>Confirme la nueva contraseña</label>
        <input type="password" name="new_password_2" placeholder="Repita su nueva contraseña">
    </div>
    <div class="input-group">
        <button type="submit" name="new_password" class="btn">Confirmar</button>
    </div>
 </form>
</body>
</html>
