<?php

define('DB_HOST', 'localhost');
define('DB_DATABASE', 'recursos');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
include("../adodb5/adodb.inc.php");

$Cn = NewADOConnection('mysqli');
$Cn->Connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

function Ejecuta($sentencia)    
{   
      global $Cn;
    if($Cn->execute($sentencia)===false)
       return 'error al insertar'.$Cn->ErrorMsg().'<br>';
    else 
        return "1";   
}

//catalogo de categorias

function consultaCategoria()
{
	global $Cn;
	$sql = 'SELECT id,NomCategoria,Estado From Categoria Order  By NomCategoria';
	return $Cn->Execute($sql);
}

function agregarCategoria($NomCategoria, $Estado)
{
  
    $sql = "Insert into Categoria(NomCategoria,Estado) values('{$NomCategoria}', {$Estado})";
    return Ejecuta($sql);
    
    
}


function actualizaCategoria($idCategoria,$NomCategoria,$Estado)
{
    
    $sql = "Update Categoria set NomCategoria='{$NomCategoria}', Estado={$Estado} where id={$idCategoria}";
   return Ejecuta($sql);
    
}
function borraCategoria($idCategoria)
{
  
    $sql = "Delete from Categoria where idCategoria={$idCategoria}";
    return Ejecuta($sql);
    
}

//productos

function consultaProducto($idcat,$edo)
{
 global $Cn;
    $sql="SELECT idProd,NomProd,Existencia,Foto,fechaCreacion,idCategoria,Estado from productos where idCategoria={$idcat} ";
    return $Cn->Execute($sql);
    
}

function agregarProducto($nomp,$exis,$fot,$idcat,$edo)
{
    $sql="insert into productos(NomProd,Existencia,Foto,idCategoria,Estado)values('{$nomp}',{$exis},'{$fot}',{$idcat},{$edo})";
  
    return Ejecuta($sql);
}

function actualizaProducto($idp,$nomp,$exis,$fot,$idcat,$edo)
{
    
    $sql="Update productos set NomProd='{$nomp}', Existencia={$exis} , Foto='{$fot}', idCategoria={$idcat}, Estado={$edo} where idProd={$idp}";
     return Ejecuta($sql);
}


?>
