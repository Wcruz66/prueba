<form role="form" method="POST">
              <div class="box-body">
<?php 
require_once "../Modelo/Productos.php";
               $id_producto=$_POST["id_producto"];
                         		echo '

                            <label>¿Desea eliminar la orden seleccionada? Se eliminara toda la informacion ingresada de este usuario.</label>
                          <input type="hidden" name="id" id="id_eliminar" value="'.$id_producto.'"/>  
                          ';
?>
      </div>
              <div class="box-footer">
                <input type="button" class="btn btn-primary" id="eliminar" name="submit" value="Confirmar" >
              
                <input type="button" class="btn btn-danger" onClick="location.href = 'ProductsView.php'" name="cancel" value="Cancelar" >
              </div>
            </form>
            <script>
document.getElementById('eliminar').addEventListener('click', eliminarInformacion);
                      function eliminarInformacion(){
                        var id_eliminar=document.getElementById('id_eliminar').value;
                       
                      $.ajax({  
                            url:`../Controlador/productosController.php?accion=eliminar`,  
                            method:"POST",  
                            data:{id_eliminar:id_eliminar},  
                            success:function(data){  
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