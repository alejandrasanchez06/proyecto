<?php
 
  include_once("utilerias_sistema.php");

   $idc=isset( $_REQUEST['idcat'])?$_REQUEST['idcat']:1;
 $edo=isset( $_REQUEST['Estado'])?$_REQUEST['Estado']:1;
 
   

  $res=consultaProducto($idc,$edo);


 print"<table align='center' class='table-responsive table-bordered table-hover table-condensed table-striped'>
       <tr><th>Seleccionar</th> <th>Nombre del producto</th> <th>Existencia</th>  <th>Foto</th><th>Estado</th><th>Fecha Creacion</th> </tr> ";
    while(!$res->EOF)
    {
        $idp=$res->fields['idProd'];
        $idc=$res->fields['idCategoria'];
        $nomp=$res->fields['NomProd'];
        $exi=$res->fields['Existencia'];
        $fot=$res->fields['Foto'];
        $edo=$res->fields['Estado'];
        $fecha=$res->fields['fechaCreacion'];
        print"<tr>
        <td><a href='#' class='selecciona' data-idp='$idp' data-nomp='$nomp' data-exist='$exi'  data-fot='$fot' data-edo='$edo' data-idcat='$idc' > Click</a></td> <td>$nomp</td> <td>$exi</td>  <td>$fot</td><td>$edo</td><td>$fecha</td></tr>";
        
       $res->MoveNext();
    }
print "</table>";


?>
