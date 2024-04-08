<?php 
require_once "conexion.php";
    class Productos extends Conexion
    {
        private $descripcion;
        private $valor;   
        private $categoria; 
                  
    
        public function __construct()
        {
            parent::__construct();//Llamada al constructor de la clase padre
            $this->descripcion = "";
            $this->valor = 0.0;
            $this->categoria ="";
         
        }    
        
        
        public function getDescripcion() {
            return $this->$descripcion;
        }
    
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        } 

        public function getValor() {
            return $this->$valor;
        }
    
        public function setValor($valor) {
            $this->valor = $valor;
        } 

        public function getCategoria() {
            return $this->$categoria;
        }
    
        public function setCategoria($categoria) {
            $this->categoria = $categoria;
        } 
        
    //--------------------------------------------------------------------------//



    //--------------------------------------------------------------------------//
        
       

        public function select()
        {
         
            $query="CALL sp_manto_productos(2, NULL, NULL, NULL, NULL);";
            $peticion = $this->db->query($query);
            $ListRegistros=$peticion->fetch_all(MYSQLI_ASSOC);
            return $ListRegistros;
        }

        public function selectId($id)
        {
         
            $query="SELECT*FROM productos where id_producto='$id'";
            $peticion = $this->db->query($query);
            $ListRegistros=$peticion->fetch_all(MYSQLI_ASSOC);
            return $ListRegistros;
        }

        public function save(){
            $query="CALL sp_manto_productos(1, NULL,'$this->descripcion',$this->valor,'$this->categoria');";
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
        $query="CALL sp_manto_productos(4, '$id', NULL, NULL, NULL);"; 
        $delete=$this->db->query($query);
        if ($delete == true) {
            return true;
        }else{
            return false;
        }

        }

        public function update($id){
            $query="CALL sp_manto_productos(3,'$id','$this->descripcion',$this->valor,'$this->categoria');";
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