  
<?php  
  
  if (mysqli_connect_errno())
  {
  echo "Fallo al conectar MySQL: ".mysqli_connect_error();
  }

  $query = "SELECT * FROM albums";
  
  $result = mysqli_query($db, $query); 
  
$maxColumn = 4; 
$numColumn = 1;
$cont = mysqli_num_rows($result);
if($cont <= 0) 
{ 
echo "No se han encontrado imagenes"; 
} else { 
echo "<table><tr>";


while($row = mysqli_fetch_array($result))
{ 
  if ($numColumn > $maxColumn) {
    $numColumn = 1;
    echo "</tr><tr>";
    }
    echo "<td>";
  ?>
  
		<img src="../../images/<?php echo $row['name'];?>.jpg"  width="200" height="200" alt=""><br>
    <?php echo $row['name'];
    echo "</td>";
    $numColumn++;
    } 
    echo "</tr>"; 

 } 

 mysqli_free_result($result); 

 mysqli_close($link); 
 
?>
</table>