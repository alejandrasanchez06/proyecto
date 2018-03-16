<?php
  include_once("utilerias_sistema.php");
  
  $result= consultaCategoria();
 

print"<table  align='center' class='table-responsive table-bordered table-hover table-condensed'>
    <tr>
        <th>Selecciona</th><th>Nombre de la Categoria</th><th>Estado</th>
    </tr>";
  while(!$result->EOF)
  {
    $id=$result->fields["id"];
      $nom=$result->fields["NomCategoria"];
      $edo=$result->fields["Estado"];
      print"    <tr>
        <td> <a href='#' class='selecciona' data-id='$id' data-nom='$nom' data-edo='$edo'>Click</a></td><td>$nom</td><td>$edo</td>
    </tr>";
      $result->MoveNext();
  }
  
  print"</table>";

?>
