<?php

 include_once("utilerias_sistema.php");
 $id=$_REQUEST['idp'];

 $nomp=$_REQUEST['nomp'];
 $exis=$_REQUEST['exi'];
 $fot=$_REQUEST['fot'];
 $idcat=$_REQUEST['idc'];
 $edo=$_REQUEST['edo'];
 $bot=$_REQUEST['boton'];

$res="0";

if($bot=="agregar")
{
  $res= agregarProducto($nomp,$exis,$fot,$idcat,$edo);
}

if($bot=="actualizar")
{
    $res=actualizaProducto($id,$nomp,$exis,$fot,$idcat,$edo);
}
    
 if($bot=="borrar")
{
     $res=borraProducto($id);
 }

print $res;


?>
