<!-- Modal -->
<?php
    //--------------------------------------------//
    $id_producto = $_POST['id_producto'];
    require_once "../Modelo/Productos.php";
    $productos = new Productos();
    $list = $productos->selectId($id_producto);
    foreach ($list as $value) {
?>

         <form >
          <input type="hidden" name="id_producto" id="id_producto" value="<?php echo $id_producto ?>">
        
            
            <div class="form-group">
                <label for="cliente">DESCRIPCION</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $value['descripcion'] ?>" >
                
            </div>

            <div class="form-group">
                <label for="esf_od">VALOR</label>
                <input type="text" class="form-control" id="valor" value="<?php echo $value['valor']?>" >
                
            </div>
            <div class="form-group">
                <label for="cil_od">Categoria </label>
                <input type="text" class="form-control" id="categoria" value="<?php echo $value['categoria']?>" >
                
            </div>

           
                <div class="form-group">
                  <input type="button" id="actualizar" class="btn btn-primary" value="Guardar" >
                
                </div>
        </form>
 <?php
   }
?>

<script>
document.getElementById('actualizar').addEventListener('click', actualizarInformacion);
                      function actualizarInformacion(){
                        var id_producto=document.getElementById('id_producto').value;
                        var descripcion=document.getElementById('descripcion').value;
                        var valor=document.getElementById('valor').value;
                        var categoria=document.getElementById('categoria').value;
                        
                        
                      
                      $.ajax({  
                            url:"../Controlador/productosController.php?accion=modificar&id_producto="+id_producto, 
                            method:"POST",  
                            data:{id_producto:id_producto,descripcion:descripcion,valor:valor,categoria:categoria},    
                            success:function(data){   
                                      console.log(data);
                                      var array = JSON.parse(data);
                                      if (array.type == "success") {
                                        alertaEspecial(array.tittle, "<h4>"+array.text+"</h4>", array.type, array.url);
                                      }else{
                                        alerta(array.tittle, "<h4>"+array.text+"</h4>", array.type);
                                      }
                            }  
                         });  
                      }
                       
</script> 