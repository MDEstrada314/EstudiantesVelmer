<?php

require_once('../Estudiantes/concetar.php');


class registrar extends Conectar {

    private $id;
    private $idCamper;
    private $email;
    private $username;
    private $password;

    public function __construct($id=0,$idCamper=0,$email="",$username="",$password="",$dbCnx=""){
        $this->id=$id;
        $this->idCamper=$idCamper;
        $this->email=$email;
        $this->username=$username;
        $this->password=$password;
        parent::__construct($dbCnx);
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setidCamper($idCamper){
        $this->idCamper = $idCamper;
    }

    public function getidCamper(){
        return $this->idCamper;
    }

    public function setEmail($email){
        $this->email=$email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function getusername(){
        return $this->username;
    }


    public function setpassword($password){
        $this->password = $password;
    }

    public function getpassword(){
        return $this->password;
    }

    public function checkUser($email){
        try {
            $stm=$this->dbCnx->prepare("SELECT * FROM user WHERE email= '$email'");
            $stm->execute ( );
            if($stm->fetchColumn()){
                return true;
            }else{
                return false;
            }
        } catch (Exception $e) {
            return $e->getMessage();
         }
    }
    public function inserData(){
        try {
            $stm=$this->dbCnx->prepare( "INSERT INTO user (idCamper,email,username,password) values (?,?,?,?)");
            $stm->execute ([$this->idCamper, $this->email, $this->username,md5($this->password)]);
          

        }catch (Exception $e) {
            return $e->getMessage();
         }
    }





};