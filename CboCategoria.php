<?php
include_once("utilerias_sistema.php");
$rest=consultaCategoria();



print"<select name='idcate' id='idcate' class='form-control'>";

while(!$rest->EOF)
{
    $id=$rest->fields['id'];
    $nom=$rest->fields['NomCategoria'];
    
    
    print"  <option value='$id'>$nom</option>";
    $rest->MoveNext();
    
}

print"</select>";
?>
