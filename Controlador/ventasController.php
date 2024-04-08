<?php 
require_once "../Modelo/Ventas.php";
$accion=$_GET['accion'];

if ($accion=='procesar') {
    $Factura = $_POST['Factura'];

    $Cliente = $_POST['Cliente'];
    $Producto = $_POST['Producto'];
    $Cantidad = $_POST['Cantidad'];
    $Usuario = $_POST['Usuario'];

    $VentasModel = new Ventas();
    $save =$VentasModel->saveFactura($Factura,$Cliente,$Usuario,$Producto,$Cantidad);
   
       if ($save['complete']==true) {
      
        
           $informacion = [
            "tittle" => "Correcto",
            "text" => "factura guardado con exito",
            "type" => "success",
            "url" => "factura.php"
            ];
            echo json_encode($informacion);
        
       }else{
           //header('Location: ../list/paqueterios.php?error=incorrecto');
                       $informacion = [
                           "tittle" => "Error",
                           "text" => "No fue posible guardar el producto, por favor verifique los datos y vuelva a intentarloERROR",
                           "type" => "error",
                         ];
                         echo json_encode($informacion);
       }
    }

    elseif($accion=='modificar'){
//-------------------------------------------------------------------------------------------


    $id_producto=$_GET['id_producto'];
  
      
if (isset($_POST['Factura'])) {
    $Factura = $_POST['Factura'];
}else{
    $Factura =NULL;
}
if (isset($_POST['Cliente'])) {
    $Cliente=$_POST['Cliente'];
}else{
    $Cliente=NULL;
}
if (isset($_POST['Producto'])) {
    $Producto=$_POST['Producto'];
}else{
    $Producto=NULL;
}

$VentasModel = new Ventas();
$VentasModel->setFactura($Factura);
$VentasModel->setCliente($Cliente);
$VentasModel->setProducto($Producto);
$save =$VentasModel->update($id_producto);

   if ($save['complete']==true) {
  
    
       $informacion = [
        "tittle" => "Correcto",
        "text" => "producto guardado con exito",
        "type" => "success",
        "url" => "ProductsView.php"
        ];
        echo json_encode($informacion);
    
   }else{
       //header('Location: ../list/paqueterios.php?error=incorrecto');
                   $informacion = [
                       "tittle" => "Error",
                       "text" => "No fue posible guardar el producto, por favor verifique los datos y vuelva a intentarloERROR".$_SESSION['mensaje'],
                       "type" => "error",
                     ];
                     echo json_encode($informacion);
   }




//--------------------------------------------------------------------------------------------


    }
    else if ($accion=='eliminar') {
        $id_eliminar=$_POST['id_eliminar'];
        
        $VentasModel = new Ventas();
       
        $delete =$VentasModel->delete($id_eliminar);
       
           if ($delete==TRUE) {
           $informacion = [
               "tittle" => "Correcto",
               "text" => "Factura  ha sido ELIMINADO",
               "type" => "success",
               "url" => "MostrarFacturas.php"
             ];
             echo json_encode($informacion);
           }else{
               //header('Location: ../list/clienterios.php?error=incorrecto');
                           $informacion = [
                               "tittle" => "Error",
                               "text" => "No fue posible guardar el producto, por favor verifique los datos y vuelva a intentarlo",
                               "type" => "error",
                             ];
                             echo json_encode($informacion);
           }
    }

else{
    $informacion = [
        "tittle" => "Error",
        "text" => "No fue posible realizar esta accion por favor verifique los datos y vuelva a intentarlo",
        "type" => "error",
      ];
      echo json_encode($informacion);
}

?>