<?php

require_once('../Estudiantes/concetar.php');


class loginUser extends Conectar {

    private $idCamper;
    private $email;
    private $password;

    public function __construct($idCamper=0,$email="",$password="",$dbCnx=""){

        $this->idCamper=$idCamper;
        $this->email=$email;
        $this->password=$password;
        parent::__construct($dbCnx);
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




    public function setpassword($password){
        $this->password = $password;
    }

    public function getpassword(){
        return $this->password;
    }


   
    public function obtenerAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM user ");
            $stm->execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
           return $e->getMessage();
        }
    }

    public function login(){
        try {
            $stm=$this->dbCnx->prepare("SELECT * FROM user WHERE email=? AND password=?");
            $stm -> execute([$this->email,md5($this->password)]);
            $user = $stm->fetchAll();
            if(count($user)>0){
                session_start();
                $_SESSION['idCamper']= $user[0]['idCamper'];
                $_SESSION['email']= $user[0]['email'];
                $_SESSION['password']= $user[0]['password'];
                return true;
            }else{
                false;
            }

        }catch (Exception $e) {
            return $e->getMessage();
         }
    }
 





};