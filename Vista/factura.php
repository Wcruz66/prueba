<?php

require_once "../Modelo/Ventas.php";
$VentasModel = new Ventas();

$result = $VentasModel->ListCliente();
$result2 = $VentasModel->ListProducto();
$result3 = $VentasModel->ListUsuario();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario PHP con Bootstrap</title>

    <!--bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- Incluir los estilos de Bootstrap -->
  <link href="../src/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="../src/vendor/jquery/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">


 <!-- Custom styles for this template -->
 <link href="../src/css/sb-admin-2.min.css" rel="stylesheet">
  
  <link href="../src/css/sweetalert2.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2>Insertar Datos de Factura</h2>
      <form class="rd-form rd-form-variant-2 rd-mailform" data-form-output="form-output-global" data-form-type="contact"  >
        <div class="form-group">
          <label for="Factura">Factura:</label>
          <input type="text" class="form-control" id="Factura" name="Factura" required>
        </div>
        <div class="form-group">
          <label for="Usuario">Usuario:</label>
          <select name="Usuario" id="Usuario">
            <?php
            // 3. Iterar sobre los resultados y construir las opciones de la lista desplegable
            if ($result3->num_rows > 0) {
                while($row = $result3->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["usuario"] . "</option>";
                }
            } else {
                echo "0 resultados";
            }
            ?>
        </select>
        </div>
        <div class="form-group">
          <label for="Cliente">Cliente:</label>
          <select name="Cliente" id="Cliente">
            <?php
            // 3. Iterar sobre los resultados y construir las opciones de la lista desplegable
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id_cliente"] . "'>" . $row["nombre"] . "</option>";
                }
            } else {
                echo "0 resultados";
            }
            ?>
        </select>
        </div>
        <div class="form-group">
          <label for="Producto">Producto:</label>
          <select name="Producto" id="Producto">
            <?php
            // 3. Iterar sobre los resultados y construir las opciones de la lista desplegable
            if ($result2->num_rows > 0) {
                while($row = $result2->fetch_assoc()) {
                    echo "<option value='" . $row["id_producto"] . "'>" . $row["descripcion"] . "</option>";
                }
            } else {
                echo "0 resultados";
            }
            ?>
        </select>
        </div>
       
        <div class="form-group">
          <label for="Cantidad">Cantidad:</label>
          <input type="number" class="form-control" id="Cantidad" name="Cantidad" required>
        </div>

        

        <button type="submit" class="button button-primary procesar" id="procesar">facturar</button>
        <a href="MostrarFacturas.php" class="button button-default" id="procesar">Regresar</button>
      </form>
    </div>
  </div>
</div>
 <!-- Javascript-->
 <script src="../js/core.min.js"></script>
    <script src="../js/script.js"></script>
    <!-- coded by Himic-->
      <!-- Bootstrap core JavaScript-->
  <script src="../src/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../src/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../src/js/sb-admin-2.min.js"></script>

<!-- Incluir el script de Bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="../src/js/sweetalert2.min.js"></script>
   <script src="../src/js/sweetAlert2.js"></script>

    <script>




  $(document).on('click', '.procesar', function(){  
          var Factura = document.getElementById('Factura').value; 
          var Cliente = document.getElementById('Cliente').value;
          var Producto = document.getElementById('Producto').value;
          var Cantidad = document.getElementById('Cantidad').value;
          var Usuario = document.getElementById('Usuario').value;
          $.ajax({  
                     url:"../Controlador/ventasController.php?accion=procesar",  
                     method:"POST",   
                     data:{Factura:Factura,Cliente:Cliente,Producto:Producto,Cantidad:Cantidad,Usuario:Usuario},  
                     success:function(data){ 
                      var array = JSON.parse(data);
                        if (array.type == "success") {
                          console.log(data);
                            alertaEspecial(array.tittle, "<h4>" + array.text + "</h4>", array.type, array.url);
                        } else {
                          console.log(data);
                            alerta(array.tittle, "<h4>" + array.text + "</h4>", array.type);
                        }
                       
                     }
                });  
           
      });
</script>

</body>
</html>
