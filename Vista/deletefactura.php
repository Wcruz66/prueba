<form role="form" method="POST">
              <div class="box-body">
<?php 
require_once "../Modelo/Ventas.php";
               $id_venta=$_POST["id_venta"];
                         		echo '

                            <label>¿Desea eliminar la venta seleccionada? Se eliminara toda la informacion ingresada de este usuario.</label>
                          <input type="hidden" name="id" id="id_eliminar" value="'.$id_venta.'"/>  
                          ';
?>
      </div>
              <div class="box-footer">
                <input type="button" class="btn btn-primary" id="eliminar" name="submit" value="Confirmar" >
              
                <input type="button" class="btn btn-danger" onClick="location.href = 'MostrarFacturas.php'" name="cancel" value="Cancelar" >
              </div>
            </form>
            <script>
document.getElementById('eliminar').addEventListener('click', eliminarInformacion);
                      function eliminarInformacion(){
                        var id_eliminar=document.getElementById('id_eliminar').value;
                       
                      $.ajax({  
                            url:`../Controlador/ventasController.php?accion=eliminar`,  
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