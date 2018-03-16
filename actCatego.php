<?php
include_once("utilerias_sistema.php");

$id=isset($_REQUEST['idc'])?$_REQUEST['idc']:0;
$nom=$_REQUEST['nomc'];
$edo=$_REQUEST['edo'];
$bot=$_REQUEST['boton'];
$res=0;

if($bot=="agregar")
{
  $res=agregarCategoria($nom,$edo);    
}

if($bot=="actualizar"){
   $res= actualizaCategoria($id,$nom,$edo);
}

if($bot=="borrar"){
   $res= borraCategoria($id);
}

print "$res";

//header("location:categoria.php")//se regresa
?>
