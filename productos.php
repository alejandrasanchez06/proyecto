<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <form  name="form" id="form"  >
            <fieldset>
                <div class="form-group">
                    <label for="idp" class="contreol-label col-md-4"></label>
                    <div class="col-md-8">
                        <input type="hidden" name="idp" id="idp" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                 <label for="nomp" class="control-label col-md-4">Nombre del producto:</label>
                   <div class="col-md-8">
                      <input type="text" class="form-control" name="nomp" id="nomp" placeholder="Nombre completo del producto">
                   </div>
                </div>
                
                <div class="form-group">
                 <label for="exist" class="control-label col-md-4">Existencia: </label>
                   <div class="col-md-8">
                    <input type="number" name="exist" id="exist" placeholder="existencia en inventario del producto" class="form-control">
                  </div>
                </div>
                
                
                <div class="form-group">
                   <label for="fot" class="control-label col-md-4">Foto</label>
                      <div class="col-md-8">
                        <input type="text" name="fot" id="fot" placeholder="imagen del producto" class="form-control">
                     </div>
                </div>
                
                <div class="form-group">
                   <label for="idcategoria" class="control-label col-md-4">Categoria</label>
                   <div class="col-md-8">
                       <?php include_once("CboCategoria.php"); ?>
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
               
                <div class="form-group col-md-offset-5">
                    <div class="col-md-7">
                        <button type="button" class="btn btn-success" name="boton" id="boton" value="agregar" >Agregar</button>
                         <button type="button" class="btn btn-primary" name="boton" id="boton" value="actualizar" >Actualizar</button>
                          
                          <button type="button" class="btn btn-default" name="boton" id="boton" value="limpiar">Limpiar</button>
                    </div>
                </div>
                
                
                
            </fieldset>
            
        </form>
    </div>
    
    <div id="msj" align="center"> </div>
    <div id="tabla" align="center"> </div>
     
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.js"></script>
    
    <script>
     $("#tabla").load("tablaProd.php?idcat=3&edo=1");
        
        $("#tabla").on("click",".selecciona",function(){
         $("#idp").val($(this).attr("data-idp"));
         $("#nomp").val($(this).attr("data-nomp"));
         $("#exist").val($(this).attr("data-exist"));
        $("#fot").val($(this).attr("data-fot"));
          $("#edo").val($(this).attr("data-edo"));
         $("#fecha").val($(this).attr("data-fecha"));       
     });
     
        
        
        
        $("#idcate").change(function(){
            var idc=$("select[name=idcate]").val(); 
            
                 
        $("#tabla").load("tablaProd.php?idcat=" + idc);
                      });
        
        
        $("#edo").change(function(){
            
             var edo=$("select[name=edo]").val(); 
                 
        $("#tabla").load("tablaProd.php?&edo="+ edo);
                      });
        
        
 
        
        $("button[type=button]").click(function(){
         var bot=$(this).attr("value");
          if(bot=="limpiar")
           {
               alert("hola");
             $("#idp").val("");
             $("#nomp").val("");
             $("#exist").val("0");
             $("#fot").val("")
             $("#nomp").focus();
           
           }
            else{
                
         var parametros='idp='+$("#idp").val()+"&nomp="+$("#nomp").val()+"&exi="+$("#exist").val()+"&fot="+$("#fot").val()+"&idc="+$("#idcate").val()+"&edo="+$("#edo").val()+"&boton="+bot;     

               // alert(parametros);
            $.ajax({
               url:"actProd.php",
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
                       
                       $("#idp").val('');
                       $("#nom").val('');
                       $("#exist").val('1');
                       $("#fot").val('');
                       $("#edo").val('');
                       
                                              
                     
                     var idc=$("select[name=idcate]").val(); 
                       var edo=$("select[name=edo]").val(); 
                       $("#tabla").load("tablaProd.php?&idcat="+idc+ "&edo="+ edo );
                       $("#nomp").focus();  
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
    
