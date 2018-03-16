<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  
</head>
<body>
    <header>
        <div class="container">
            <h2 align="center">Catalogo de Categorias</h2>
        </div>
    </header>
    
    <div class="container">
        <form name="frm" id="frm" method="" >
            <filedset>
                <div class="form-group" >
                    <label for="idc" class="control-label col-md-4"></label>
                 <div class="col-md-8">
                   <input type="hidden" name="idc" id="idc" class="form-control">
                 </div>
                </div>
                <div class="form-group">
                    <label for="nomc" class="control-label col-md-4">Nombre de la categoria:</label>
                     <div class="col-md-8">
                         <input type="text" name="nomc" id="nomc" class="form-control " placeholder="Ingresa el nombre de la categoria solo letras y numeros">
                     </div>
                </div>
                
                <div class="form-group">
                    <label for="edo" class="control-label col-md-4">Estado:</label>
                    <div class="col-md-8">
                       <select name="edo" id="edo" class="form-control">
                           <option value="1">Activo</option>
                           <option value="0">inactivo</option>
                       </select>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-2">
                        <button type="button" class="btn btn-success" name="boton" id="boton" value="agregar">Agregar</button>
                        
                        <button type="button" class="btn btn-primary" name="boton" id="boton" value="actualizar">Actualizar</button>
                        
                          <button type="button" class="btn btn-danger" name="boton" id="boton" value="limpiar">Limpiar</button>
                        
                    </div>
                </div>
                
            </filedset>
        </form>
        <br>
    </div>
    
       <div id="msj" align="center"></div>
          
       <div id="tabla" align="center"></div>
    
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.js"></script>
    
 <script>
     
     $("#tabla").load("tablaCatego.php");
     $("#tabla").on("click",".selecciona",function(){
         $("#idc").val($(this).attr("data-id"));
         $("#nomc").val($(this).attr("data-nom"));
         $("#edo").val($(this).attr("data-edo"));
         
     });
     
     
   //elemeto a programar-evento -funcion -
   $("button[type=button]").click(function(){
       var bot=$(this).attr("value");
    if(bot=="limpiar")
       {
        $("#idc").val("");
        $("#nomc").val("");
        $("#nomc").focus();
       }
       else{
           var parametros='idc='+$("#idc").val()+"&nomc="+$("#nomc").val()+"&edo="+$("#edo").val()+"&boton="+bot;
           $.ajax({
               url:"actCatego.php",
               type:"GET",
               data:parametros,
               success:function(respuesta){
                  // alert(respuesta);
                   
                if($.trim(respuesta)==1)
                   {
                     $("#msj").html("<h3> Transaccion Exitosa </h3>"); 
                       setTimeout(function(){
                           $("#msj").fadeOut(2000);
                       },2000);
                       
                       $("#idc").val('');
                       $("#nomc").val('');
                       $("#edo").val('1');
                       $("#nomc").focus();
                       $("#tabla").load("tablaCatego.php"); 
                   }
                   else
                   {
                        $("#msj").html("<h3>Error: Transaccion No Exitosa </h3>"); 
                       setTimeout(function(){
                           $("#msj").fadeOut(2000);
                       },2000);
                        $("#nomc").focus();
                   }
            }
           });
       }
       
   });
     
    
  </script>
</body>
</html>
