<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Primero debes iniciar sesión";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!doctype html>
<html lang="es">
  <head>
    <title>VMusic!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/index.css">
  </head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<header>
  VMusic!
  <div id="content-log" class="content-log">
  
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Bienvenid@ <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">Logout</a>
			 
		 </p>
    <?php endif ?>
</div>
</header>
<div id="content-menu" class="content-menu">
  <label id="artists" > Artistas</label>
  <label id="albums"> Albums</label>
  <label id="songs" > Canciones</label>
  <label id="playlist" > Playlist</label>
  <input type="search" name="search" id="search" placeholder="Buscar">
</div>
<div id="albums">
  <p>
      <h2>Albums</h2>
  <ul id="list">
    <?php include('images.php')?>
  </ul>
</div>

<div id="content">
  <div id="range">
    <input type="range" id="range-val" value="10" min="0" max="143">
    <div id='tip'>Some tip</div>
  </div>
 <div id="time">
    <p>0:01</p>
 </div>
 <div id="buttons">
    <i class="fa fa-step-backward fa-3x"></i>
    <i class="fa fa-play fa-3x"></i>
    <i class="fa fa-step-forward fa-3x"></i>
 </div>
  <div id="total-time">
    <p>2:23</p>
  </div>
  </div>
<footer>
  <div id="repeat">
    <i class="fa fa-repeat"></i>
  </div>
    <div id="song-info">
    <h1>Voyage (Feat. DNAKM)</h1>
    <p>Mendum & Abandoned</p>
  </div>
<div id="random">
  <i class="fa fa-random"></i>
  </div>
</footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>