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
      <h2>Insertar Datos</h2>
      <form class="rd-form rd-form-variant-2 rd-mailform" data-form-output="form-output-global" data-form-type="contact"  >
        <div class="form-group">
          <label for="Descripcion">Descripcion:</label>
          <input type="text" class="form-control" id="Descripcion" name="Descripcion" required>
        </div>
        <div class="form-group">
          <label for="Valor">Valor:</label>
          <input type="number" class="form-control" id="Valor" name="Valor" step="0.01" required>
        </div>
        <div class="form-group">
          <label for="Categoria">Categoria:</label>
          <input type="Categoria" class="form-control" id="Categoria" name="Categoria" required>
        </div>
       
        <button type="submit" class="button button-primary procesar" id="procesar">Insertar</button>
        <a href="ProductsView.php" class="button button-default" id="procesar">Regresar</button>
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
          var Descripcion = document.getElementById('Descripcion').value; 
          var Valor = document.getElementById('Valor').value;
          var Categoria = document.getElementById('Categoria').value;
          
          $.ajax({  
                     url:"../Controlador/productosController.php?accion=procesar",  
                     method:"POST",   
                     data:{Descripcion:Descripcion,Valor:Valor,Categoria:Categoria},  
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
