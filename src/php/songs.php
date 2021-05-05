  
<?php  
  
  if (mysqli_connect_errno())
  {
  echo "Fallo al conectar MySQL: ".mysqli_connect_error();
  }

  $query = "SELECT * FROM songs";
  
  $result = mysqli_query($db, $query); 
  $result2= mysqli_query($db, $query2); 
  ?>
  <table>
  <tr>
     
    <td>Canción</td>
    <td>Album</td>
    <td>Artista</td>
   <tr>

  <?php

while($row = mysqli_fetch_array($result))
{ 
   $query2 = "SELECT * FROM albums WHERE id={$row['album']}";
   $result2= mysqli_query($db, $query2);
   $row2 = mysqli_fetch_array($result2);
   $query3 = "SELECT * FROM artists WHERE id={$row2['artist']}";
   $result3= mysqli_query($db, $query3);
   $row3 = mysqli_fetch_array($result3);
   printf("<tr><td> %s</td><td>%s</td><td>%s</td></tr>",$row["name"],$row2["name"],$row3["name"]); 
 
   ?><form method="post" action="songs.php">
     <script>
     var song_name = <?php $_REQUEST[$row["name"]]?>
     var song_id = <?php $_REQUEST[$row["song"]]?>
     function add_to_playlist( song_name,song_id ) {
        $song_name = song_name;
        $song_id = song_id;
     }
     </script>
   
   <tr><td><button type="button" onclick="add_to_playlist( song_name,song_id )">Añadir a playlist</button></td><td>
     <?php
     
     
  
}
if (isset($_POST['add_to_playlist'])) {
 
  $sql = "INSERT INTO playlist(`name`, `song`) VALUES ('$song_name', '$song_id')";
  header('location: index.php');
 
} 
 mysqli_free_result($result); 

 mysqli_close($link); 
 
?>
</table>
