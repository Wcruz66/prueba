<?php

require_once "conexion.php";
class Usuario extends Conexion
{
 private $id_usuario;
 private $usuario;
 private $pass;
 private $id_tipo_usuario;


 public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id_usuario = "";
        $this->usuario = "";
        $this->pass="";
        $this->id_tipo_usuario="";
     
    }



	public function getId_usuario() {
        return $this->id_usuario;
    }

    public function setId_usuario($id) {
        $this->id_usuario = $id;
    }
    

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getPass() {
        return $this->pass;
    }

    public function setPass($pass) {
        //$password = hash('sha256', $pass);  
        $this->pass = $pass;
    }
   
    public function getId_tipo_usuario() {
        return $this->id_tipo_usuario;
    }

    public function setId_tipo_usuario($id_tipo_usuario) {
        $this->id_tipo_usuario = $id_tipo_usuario;
    }

  //---------------------Funciones----------------------------//

  public function selectALL()
  {
      $query="SELECT *  FROM usuarios ";
      $selectall=$this->db->query($query);
      $ListUsuarios=$selectall->fetch_all(MYSQLI_ASSOC);
      return $ListUsuarios;
  }

  
  public function login(){
      $query1="SELECT * FROM usuarios WHERE usuario='".$this->usuario."' AND password='".$this->pass."'";
      $selectall1=$this->db->query($query1);
      echo $this->db->error;
      $ListUsuario=$selectall1->fetch_all(MYSQLI_ASSOC);

      if ($selectall1->num_rows!=0) {
          foreach ($ListUsuario as $key) {
              session_start();
              $_SESSION['logged-in'] = true;
              $_SESSION['id']= $key['id'];
              $_SESSION['Usuario']= $key['usuario'];
              $_SESSION['tipo']=$key['tipo'];
             
          }
           return true;
      }else{
          session_start();
              $_SESSION['logged-in'] = false;
               
              return false;
          }
          
      }
      /*
      //------------------------------------------------------------------//
      public function selectTipoUsuario()
      {
          $query="SELECT * FROM tipo_usuario";
          $selectall=$this->db->query($query);
          $ListUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
          return $ListUsuario;
      }
      */
  
 }
?>