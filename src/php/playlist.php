  
<?php  
  
  if (mysqli_connect_errno())
  {
  echo "Fallo al conectar MySQL: ".mysqli_connect_error();
  }

  $query = "SELECT * FROM playlist";
  
  $result = mysqli_query($db, $query); 
  $result2= mysqli_query($db, $query2); 
  ?>
  <table>
  <tr>
     
    <td>Artista</td>
    <td>Album</td>
    <td>Cancion</td>
   <tr>

  <?php

while($row = mysqli_fetch_array($result))
{ 
    $query2 = "SELECT * FROM song WHERE id={$row['album']}";
    $result2= mysqli_query($db, $query2);
    $row2 = mysqli_fetch_array($result2);
    $query3 = "SELECT * FROM album WHERE id={$row2['artist']}";
    $result3= mysqli_query($db, $query3);
    $row3 = mysqli_fetch_array($result3);
    printf("<tr><td> %s</td><td>%s</td><td>%s</td></tr>",$row3["name"],$row2["name"],$row["name"]); 

} 
 mysqli_free_result($result); 

 mysqli_close($link); 
 
?>
</table>
