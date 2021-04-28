<?php
session_start();

require 'PHPMailer/class.phpmailer.php';
require 'PHPMailer/class.smtp.php';

$username = "";
$email    = "";
$errors = array(); 

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'dbusers');

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

  if (empty($username)) { array_push($errors, "Se requiere un nombre de usuario"); }
  if (empty($email)) { array_push($errors, "Se requiere dirección de correo electŕonico"); }
  if (empty($password_1)) { array_push($errors, "Se requiere contraseña"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Las contraseñas no coinciden");
  }
  
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

  	$query = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Inicio de sesión correcto";
  	header('location: index.php');
  }
}

//INICIO DE SESION
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

  //CORREO PARA RECUPERAR CONTRASEÑA
  if (isset($_POST['forgot_password'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $query = "SELECT email FROM users WHERE email='$email'";
    $results = mysqli_query($db, $query);
  
    if (empty($email)) {
      array_push($errors, "Se requiere dirección de correo electrónico");
    }else if(mysqli_num_rows($results) <= 0) {
      array_push($errors, "Correo electrónico no registrado");
    }
    
    $token = bin2hex(random_bytes(50));
    if (count($errors) == 0) {
      $sql = "INSERT INTO tokens(email, token) VALUES ('$email', '$token')";
      $results = mysqli_query($db, $sql);
          
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->SMTPDebug  = 0;
      $mail->Host       = 'smtp.gmail.com';
      $mail->Port       = 587;
      $mail->SMTPSecure = 'tls';
      $mail->SMTPAuth   = true;
      $mail->Username   = "*****@gmail.com";
      $mail->Password   = "*****";
      $mail->SetFrom('*****@gmail.com', 'VMusic');
      $mail->AddAddress($email, $username);
      $mail­->CharSet = "UTF-­8";
      $mail­->Encoding = "quoted­printable";
      $mail->Subject = 'Solicitud de cambio de contraseña de VMusic';
      //$mail->MsgHTML(file_get_contents('message.html'), dirname(filedir));
      $mail->MsgHTML("Haz click <a href=\"http://localhost:3000/src/php/changepassword.php?token=" . $token . "\">aquí</a> para obtener una nueva contraseña");
      $mail->AltBody = "Haz click <a href=\"http://localhost:3000/src/php/changepassword.php?token=" . $token . "\">aquí</a> para obtener una nueva contraseña";
      if(!$mail->Send()) {
        echo "Error: " . $mail->ErrorInfo;
      } else {
        echo "Enviado!";
      }

      header('location: message.php?email=' . $email);
    }
  }
  
  if (isset($_POST['new_password'])) {
    $new_password_1 = mysqli_real_escape_string($db, $_POST['new_password_1']);
    $new_password_2 = mysqli_real_escape_string($db, $_POST['new_password_2']);
    $token = $_SESSION['token'];
    
    if (empty($new_password_1) || empty($new_password_2)) array_push($errors, "Se requiere contraseña");
    if ($new_password_1 !== $new_password_2) array_push($errors, "La contraseña no coincide");
    if (count($errors) == 0) {
      $sql = "SELECT email FROM tokens WHERE token='$token' LIMIT 1";
      $results = mysqli_query($db, $sql);
      $email = mysqli_fetch_assoc($results)["email"];
      
      if ($email) {
        $new_pass = md5($new_password_1);
        $sql = "UPDATE users SET password='$new_pass' WHERE email='$email'";
        $results = mysqli_query($db, $sql);
        array_push($errors, "Contraseña cambiada. Intente iniciar sesión ahora");
        header('location: changed.php');
        
        
        
      }
    }
  }
  
?>