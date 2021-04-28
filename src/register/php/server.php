<?php
session_start();

$username = "";
$email    = "";
$errors = array(); 

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'db');

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno())
{
echo "Fallo al conectar MySQL: ".mysqli_connect_error();
}

// REGISTRO
if (isset($_POST['reg_user'])) {
  
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // ERRORES DEL FORMULARIO
  if (empty($username)) { array_push($errors, "Se requiere un nombre de usuario"); }
  if (empty($email)) { array_push($errors, "Se requiere dirección de correo electŕonico"); }
  if (empty($password_1)) { array_push($errors, "Se requiere contraseña"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Las contraseñas no coinciden");
  }

  // COMPROBAR SI EXISTE EL USUARIO EN LA BASE DE DATOS
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "El nombre de usuario ya existe");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email ya existe");
    }
  }

  
  if (count($errors) == 0) {
  	$password = md5($password_1);

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Inicio de sesión correcto";
  	header('location: index.php');
  }
}
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Se requiere un nombre de usuario");
    }
    if (empty($password)) {
        array_push($errors, "Se requiere contraseña");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "Inicio de sesión correcto";
          header('location: index.php');
        }else {
            array_push($errors, "Nombre de usuario o contraseña no válidos");
        }
    }
  }
  
  ?>