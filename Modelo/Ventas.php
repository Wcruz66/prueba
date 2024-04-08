<?php 
require_once "conexion.php";
    class Ventas extends Conexion
    {
        private $factura;
        private $id_cliente;   
        private $id_producto; 
        private $cantidad;
        private $id_usuario;          
    
        public function __construct()
        {
            parent::__construct();//Llamada al constructor de la clase padre
            $this->factura = "";
            $this->id_cliente = 0;
            $this->id_producto =0;
            $this->cantidad =0;
            $this->id_usuario =0;
        }    
        
        
        public function getFactura() {
            return $this->$factura;
        }
    
        public function setFactura($factura) {
            $this->factura = $factura;
        } 

        public function getId_cliente() {
            return $this->$id_cliente;
        }
    
        public function setId_cliente($id_cliente) {
            $this->id_cliente = $id_cliente;
        } 

        public function getId_producto() {
            return $this->$id_producto;
        }
    
        public function setId_producto($id_producto) {
            $this->id_producto = $id_producto;
        } 
        public function getCantidad() {
            return $this->$cantidad;
        }
    
        public function setCantidad($cantidad) {
            $this->cantidad = $cantidad;
        } 
        public function getid_usuario() {
            return $this->$id_usuario;
        }
    
        public function setid_usuario($id_usuario) {
            $this->id_usuario = $id_usuario;
        } 
    //--------------------------------------------------------------------------//


    //--------------------------------------------------------------------------//
    public function saveFactura($fac,$idc,$idu,$idp,$cantidad){

        $corre="INSERT INTO ventas(factura,id_cliente,id_usuario) values('$fac',$idc,$idu)";
        $correlativo=$this->db->query($corre);
        if($correlativo==true) {
            $maximo="select max(id_venta) AS maximo from ventas;";
            $max = $this->db->query($maximo);
            $maxi=$max->fetch_assoc();
            $maximo_entero = intval($maxi['maximo']);
            if (!empty($maximo_entero)){
                   $query=" INSERT INTO detalle_venta(id_detalle,id_venta,id_producto,cantidad,precio,total) VALUES (NULL,$maximo_entero,$idp,$cantidad,(SELECT valor FROM productos WHERE id_producto=$idp),$cantidad*(SELECT valor FROM productos WHERE id_producto=$idp));";
                   $save=$this->db->query($query);
                    if ($save==true) {
                            $updt="UPDATE ventas SET cantidad_total=(SELECT SUM(cantidad) FROM detalle_venta WHERE Id_venta=$maximo_entero),total_general=(SELECT SUM(total) FROM detalle_venta WHERE Id_venta=$maximo_entero) WHERE id_venta=$maximo_entero;";
                            $act=$this->db->query($updt);
                            if ($act==true) {
                            $informacion = array();
                            $informacion['complete']= true;
                        
                            return $informacion;
                            }else{
                            $informacion = array();
                            $informacion['complete']= false;
                            
                            return $informacion;

                            }

                    }else{
                            $informacion = array();
                            $informacion['complete']= false;
                            echo 'la estas cagando en el tercero';
                            return $informacion;
                    }
                }
                else{
                    $informacion = array();
                    $informacion['complete']= false;
                    echo 'la estas cagando en el segundo';
                    return $informacion;
                }   
            }
            else{
                $informacion = array();
                $informacion['complete']= false;
                echo 'la estas cagando en el primero';
                return $informacion;
            }
        }
     
    

       
    public function select_Report()
    {
     
        $query="SELECT v.id_venta,v.factura,c.nombre,v.cantidad_total,v.total_general FROM clientes as c RIGHT JOIN ventas as v on c.id_cliente=v.id_cliente LEFT join detalle_venta as dv on v.id_venta=dv.Id_venta LEFT join productos as p on p.id_producto=dv.id_producto GROUP BY v.id_venta,v.factura,c.nombre;";
        $pedido = $this->db->query($query);
        $ListRegistros=$pedido->fetch_all(MYSQLI_ASSOC);
        return $ListRegistros;
    }

    public function ListCliente()
    {
     
        $query="SELECT id_cliente, nombre FROM clientes";
        $pedido = $this->db->query($query);
       
        return $pedido;
    }


    public function ListProducto()
    {
     
        $query="SELECT id_producto, descripcion FROM productos";
        $product = $this->db->query($query);
       
        return $product;
    }

    public function ListUsuario()
    {
     
        $query="SELECT id, usuario FROM usuarios";
        $usuarios = $this->db->query($query);
       
        return $usuarios;
    }


        public function select()
        {
         
            $query="SELECT*FROM ventas";
            $pedido = $this->db->query($query);
            $ListRegistros=$pedido->fetch_all(MYSQLI_ASSOC);
            return $ListRegistros;
        }



        public function save(){
            $query="INSERT INTO ventas (factura,id_cliente,id_producto,cantidad,total) VALUES('$this->factura','$this->id_cliente','$this->id_producto','$this->cantidad',$this->total);";
            $save=$this->db->query($query);
            if ($save==true) {
                $informacion = array();
                $informacion['complete']= true;
                
                return $informacion;
            }else {
                $informacion = array();
                $informacion['complete']= false;
                
                return $informacion;
            }   
        } 
        


        public function delete($id)
        {
        $query="DELETE FROM ventas WHERE id_venta ='$id';"; 
        $delete=$this->db->query($query);
        if ($delete == true) {
            return true;
        }else{
            return false;
        }

        }

        public function update($id){
            $query="UPDATE ventas SET factura='$this->factura',id_cliente='$this->id_cliente',id_producto='$this->id_producto',cantidad='$this->cantidad',total=$this->total WHERE id_venta ='$id'";
            $save=$this->db->query($query);
            if ($save==true) {
                $informacion = array();
                $informacion['complete']= true;
                return $informacion;
            }else {
                $informacion = array();
                $informacion['complete']= false;
                
                return $informacion;
            }   
        } 


    }
?>