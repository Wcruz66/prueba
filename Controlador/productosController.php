<?php 
require_once "../Modelo/Productos.php";
$accion=$_GET['accion'];

if ($accion=='procesar') {
    $descripcion = $_POST['Descripcion'];

    $valor = $_POST['Valor'];
    $categoria = $_POST['Categoria'];
    

    $productosModel = new Productos();
    $productosModel->setDescripcion($descripcion);
    $productosModel->setValor($valor);
    $productosModel->setCategoria($categoria);
    $save =$productosModel->save();
   
       if ($save['complete']==true) {
      
        
           $informacion = [
            "tittle" => "Correcto",
            "text" => "producto guardado con exito",
            "type" => "success",
            "url" => "insert.php"
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
  
      
if (isset($_POST['descripcion'])) {
    $descripcion = $_POST['descripcion'];
}else{
    $descripcion =NULL;
}
if (isset($_POST['valor'])) {
    $valor=$_POST['valor'];
}else{
    $valor=NULL;
}
if (isset($_POST['categoria'])) {
    $categoria=$_POST['categoria'];
}else{
    $categoria=NULL;
}

$productosModel = new Productos();
$productosModel->setDescripcion($descripcion);
$productosModel->setValor($valor);
$productosModel->setCategoria($categoria);
$save =$productosModel->update($id_producto);

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
        
        $productosModel = new Productos();
       
        $delete =$productosModel->delete($id_eliminar);
       
           if ($delete==TRUE) {
           $informacion = [
               "tittle" => "Correcto",
               "text" => "Producto  ha sido ELIMINADO",
               "type" => "success",
               "url" => "ProductsView.php"
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