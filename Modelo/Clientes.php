<?php 
require_once "conexion.php";
    class Clientes extends Conexion
    {
        private $nombre;
        private $telefono;   
        private $correo; 
                  
    
        public function __construct()
        {
            parent::__construct();
            $this->nombre = "";
            $this->telefono = 0;
            $this->correo =0;
         
        }    
        
        
        public function getNombre() {
            return $this->$nombre;
        }
    
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        } 

        public function getTelefono() {
            return $this->$telefono;
        }
    
        public function setTelefono($telefono) {
            $this->telefono = $telefono;
        } 

        public function getCorreo() {
            return $this->$correo;
        }
    
        public function setCorreo($correo) {
            $this->correo = $correo;
        } 
        
    //--------------------------------------------------------------------------//



    //--------------------------------------------------------------------------//
        
       

        public function select()
        {
         
            $query="SELECT*FROM clientes";
            $pedido = $this->db->query($query);
            $ListRegistros=$pedido->fetch_all(MYSQLI_ASSOC);
            return $ListRegistros;
        }



        public function save(){
            $query="INSERT INTO clientes (nombre,telefono,correo) VALUES('$this->nombre','$this->telefono',$this->correo);";
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
        $query="DELETE FROM clientes WHERE id_cliente ='$id';"; 
        $delete=$this->db->query($query);
        if ($delete == true) {
            return true;
        }else{
            return false;
        }

        }

        public function update($id){
            $query="UPDATE clientes SET nombre='$this->nombre',telefono='$this->telefono',correo='$this->correo' WHERE id_cliente ='$id'";
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