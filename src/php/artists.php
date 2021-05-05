  
<?php  
  
  if (mysqli_connect_errno())
  {
  echo "Fallo al conectar MySQL: ".mysqli_connect_error();
  }else{
    echo "Conectada";
  }

  $query = "SELECT * FROM artists";
  $result = mysqli_query($db, $query); 
  ?>
  <table>
  <tr>
     <td>Artista</td>
     
    
   <tr>

  <?php

while($row = mysqli_fetch_array($result))
{ 

   printf("<tr><td> %s</td></tr>", $row["name"]); 

 } 

 mysqli_free_result($result); 

 mysqli_close($link); 
 
?>
</table>