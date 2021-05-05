<?php include('server.php') ?>          
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
    <script src="//code.jquery.com/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="//code.jquery.com/jquery.min.js"></script>

  
 
  </head>
  

<header role="banner">
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
      <div class="form-group">
              
    </div>  

    <?php endif ?>
</div>

<ul class="topnav">
  <li><a href="#" onclick="openTab('playlist')" >Playlist</a></li>
  <li><a href="#" onclick="openTab('artists')">Artistas</a></li>
  <li><a href="#" onclick="openTab('albums')">Albums</a></li>
  <li><a href="#" onclick="openTab('songs')">Canciones</a></li>
  <li><div class="search-container">
              <form action="/search.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
  </div></li>
</header>
<div class="web-box">
<div id="playlist" class="topnav tab">
  
  <?php include('playlist.php')?> 
  
</div>
<div id="artists" class="topnav tab">
 
  <ul id="list">
  <?php include('artists.php')?> 
  </ul>
</div>

<div id="albums" class="topnav tab">
 
  
  <?php include('albums.php')?> 
 
</div>

<div id="songs" class="topnav tab">
 
 
    <?php include('songs.php')?>

</div>
</div>
<footer id="content">

<audio id="player" ontimeupdate="updateProgress()" autoplay>
		  <source  id="source">	
		  Audio no soportado	
</audio>
 <div id="buttons">
    <div id="input">
      <input type="range" id="input" value="0" max="100">
      
    </div>

 <div id="song-info">
    <span id="currentPlay"></span><br>
  </div>
  
    <i class="fa fa-repeat fa-3x"></i>
    <i class="fa fa-step-backward fa-3x" onclick="prevMusic()"></i>
    <i class="fa fa-play fa-3x" style="color:red" onclick='togglePlay()' id="iconPlay"></i> 
    <!-- <i class="fa fa-play fa-3x" style="color:red" onclick=<?php //echo "<script>'togglePlay();'</script>"?> id="iconPlay"></i> -->
    <i class="fa fa-step-forward fa-3x" onclick="nextMusic();"></i>
    <i class="fa fa-random fa-3x"></i>
    <i class="fa fa-volume-up fa-2x"></i>
  <div class="volumen">
      
			<input type="range" name="volumen" id="volumen" min="0" max="1" step="0.01" value="0.75"> 
			
    </div>
    
    </div>

  </footer>

  <script type="text/javascript" src="index.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>    