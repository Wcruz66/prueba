<?php

require_once "../Modelo/Productos.php";
$ProductosModel = new Productos();

$Listord = $ProductosModel->select();

?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Home</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <!-- Custom fonts for this template -->
  <link href="../src/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../src/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.min.css" rel="stylesheet">
  
  <link href="../src/css/sweetalert2.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

  <!-- Custom styles for this page -->
  <link href="../src/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
   <script src="../src/vendor/jquery/jquery.min.js"></script> 

    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:400,500,600%7CTeko:300,400,500%7CMaven+Pro:500">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/style.css">
     <!-- Custom styles for this template-->
  <link href="../src/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../src/css/sweetalert2.css" rel="stylesheet" />
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body id="page-top">
     <div class="preloader">
      <div class="preloader-body">
        
        </div>
      </div>
    </div>
    <div class="page">
      <div id="home">
        <!-- Top Banner-->    
        <!-- Page Header-->
        <header class="section page-header">
          <!-- RD Navbar-->
          <div class="rd-navbar-wrap">
            <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
              <div class="rd-navbar-main-outer">
                <div class="rd-navbar-main">
                  <!-- RD Navbar Panel-->
                  <div class="rd-navbar-panel">
                    <!-- RD Navbar Toggle-->
                    <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                    <!-- RD Navbar Brand-->
                    
                  </div>
                  <div class="rd-navbar-main-element">
                    <div class="rd-navbar-nav-wrap">
                      <!-- RD Navbar Share-->
                      
                      <ul class="rd-navbar-nav">
                        <li class="rd-nav-item active"><a class="rd-nav-link" href="../index.php">Inicio</a></li>
                     
                        
                        <li class="rd-nav-item"><a class="rd-nav-link" href="insert.php">INSERTAR</a></li>
                        <li class="rd-nav-item"><a class="rd-nav-link" href="MostrarFacturas.php">CONSULTAR</a></li>
                        <li class="rd-nav-item"><a class="rd-nav-link" href="factura.php">FACTURAR</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="row row-30 justify-content-left">
                <div class="col-md-7 col-lg-5 col-xl-6 text-lg-left wow fadeInUp">
                   
                </div>
                </div>
              </div>
            </nav>
          </div>
        </header>

        <section class="section section-sm section-last bg-default text-left" id="contacts">
        <div class="w3-container">

  
            <div class="w3-panel w3-light-grey w3-card-4">
              <center><h3>Lista Productos</h3></center>
            </div>
        </div>

<!---------------------------------------------------------------------------------------------->
<div class="container-fluid">
<div class="row">


         
<div class="card-body">
              
              <!-- tabla de Registro -->
              
              <br>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataRegistro" width="100%" cellspacing="0">
                
                <br>
                  <thead>
                        
                  <tr>
                  <th>ID</th>
                  <th>DESCRIPCION</th>
                  <th>VALOR</th>
                  <th>CATEGORIA</th>
                  
                  <th>Editar</th>
                  <th>Eliminar</th>
               
                </tr>
                  </thead>
                  <tbody>
                  <?php
          
          foreach ($Listord as $dato) {
           
            
            ?>


            <tr>
            <td> <?php echo $dato['id_producto']; ?> </td>
            <td><?php echo $dato['descripcion']; ?></td>
            <td><?php echo $dato['valor']; ?></td>
            <td> <?php echo $dato['categoria']; ?> </td>
            <td><input type="button" name="edit" value="Editar"  id_producto="<?php echo $dato["id_producto"]?>"   class="btn btn-warning update_data" /></td>
                <td>
                <div class="btn-toolbar" role="toolbar">
                <button type="button"  name="edit" value="Eliminar" id_producto="<?php echo $dato["id_producto"]?>" class=" btn btn-danger delete_data" >Eliminar</button>
                </div>
                </td>
                
          </tr>
          <?php
          
        }
           
          ?>
            
      </tbody>
                </table>
          
              </div>

              <!-- fin Tabla de Registro -->
           
         



            </div>

            
            </div>
            </div>
<!----------------------------------------------------------------------------------------------->
 

      </section>
      <!-- Bottom Banner-->
      
      <!-- modal para actualizar-->

      <div id="dataModal3" class="modal fade">  
                                  <div class="modal-dialog">  
                                       <div class="modal-content">  
                                            <div class="modal-header">  
                                            </div>  
                                            <div class="modal-body" id="employee_forms3">  

                                            </div>  
                                            <div class="modal-footer">  
                                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                                            </div>  
                                       </div>  
                                  </div>  
</div>

      <!-- Page Footer-->
      <footer class="section section-fluid footer-minimal context-dark">
        <div class="bg-gray-15">
          <div class="container-fluid">
            <!--<div class="footer-minimal-inset oh">
              <ul class="footer-list-category-2">
                <li><a href="#">UI Design</a></li>
                <li><a href="#">Windows/Mac OS Apps</a></li>
                <li><a href="#">Android/iOS Apps</a></li>
                <li><a href="#">Cloud Solutions</a></li>
                <li><a href="#">Customer Support</a></li>
              </ul>
            </div>-->
            <div class="footer-minimal-bottom-panel text-sm-left">
              <div class="norow row-10 align-items-md-center">
                <div class="col-sm-6 col-md-4 text-sm-right text-md-center">
                  <div>
                    <ul class="list-inline list-inline-sm footer-social-list-2">
                      <li><a class="icon fa fa-facebook" href="#"></a></li>
                      <li><a class="icon fa fa-twitter" href="#"></a></li>
                      <li><a class="icon fa fa-google-plus" href="#"></a></li>
                      <li><a class="icon fa fa-instagram" href="#"></a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-md-4 order-sm-first">
                  <!-- Rights-->
                  <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span> <span></span>
                  </p>
                </div>
                <div class="col-sm-6 col-md-4 text-md-right"><span>All rights reserved.</span> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>

     
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
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

<!-- Page level plugins -->
<script src="../src/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../src/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="../src/js/demo/datatables-demo.js"></script>
   <script src="../src/js/sweetalert2.min.js"></script>
   <script src="../src//js/sweetAlert2.js"></script>
<script>


$(document).ready(function(){ 
  
   
  $("#dataTable").dataTable().fnDestroy();
  var table = $('#dataRegistro').DataTable( {
    deferRender: true, 
    scrollX:true,
    responsive: true,
    order: [[0, "desc"]],
    "autoWidth": false,     
    "search": {
    "regex": true,
    "caseInsensitive": true,
  },
        lengthChange: false,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );

  });
  table.buttons().container().appendTo( '#example_wrapper .col-md-6:eq(0)' );
    </script>
    <script>



  //------------------------------------------------------------

  //------------------------------------------------------------

  //------------------------------------------------------//
  $(document).on('click', '.update_data', function(){  
          var id_producto = $(this).attr("id_producto");  
          
                $.ajax({  
                     url:"update.php",  
                     method:"POST",  
                     data:{id_producto:id_producto},  
                     success:function(data){  
                          $('#employee_forms3').html(data);  
                          $('#dataModal3').modal('show');  
                     }  
                });  
              
      }); 
      //------------------------------------------------------------//
      $(document).on('click', '.delete_data', function(){  
          var id_producto = $(this).attr("id_producto");  
           
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id_producto:id_producto},  
                     success:function(data){  
                          $('#employee_forms3').html(data);  
                          $('#dataModal3').modal('show');  
                     }  
                });  
              
      }); 
      //------------------------------------------------------------//
</script>

  </body>
</html>