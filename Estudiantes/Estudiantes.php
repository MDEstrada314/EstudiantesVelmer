<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);






require_once("db.php");
require_once("concetar.php");

class Estudinate extends Conectar {

    private $id;
    private $nombres;
    private $direccion;
    private $logros;
    private $ingles;
    private $ser;
    private $review;
    private $skils;
    private $especialidad;

   

    public function __construct($id=0,$nombres="",$direccion="",$logros="",$ingles=0,$ser=0,$review=0,$skils=0,$especialidad=0, $dbCnx=""){
       $this->id=$id;
       $this->nombres=$nombres;
       $this->direccion=$direccion; 
       $this->logros=$logros;
       $this->ingles=$ingles;
       $this->skils=$skils;
       $this->review=$review;
       $this->skils=$skils;
       $this->especialidad=$especialidad;
       parent::__construct($dbCnx);
      /*  $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]); */
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setNombres($nombres){
        $this->nombres = $nombres;
    }

    public function getNombres(){
        return $this->nombres;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function getDirecion(){
        return $this->direccion;
    }

    public function setLogros($logros){
        $this->logros = $logros;
    }

    public function getLogros(){
        return $this->logros;
    }

    public function setIngles($ingles){
        $this->ingles = $ingles;
    }

    public function getIngles(){
        return $this->ingles;
    }

    public function setSer($ser){
        $this->ser = $ser;
    }

    public function getSer(){
        return $this->ser;
    }

    public function setReview($review){
        $this->review = $review;
    }

    public function getReview(){
        return $this->review;
    }
    public function setSkils($skils){
        $this->skils = $skils;
    }

    public function getSkils(){
        return $this->skils;
    }
    public function setEspecialidad($especialidad){
        $this->especialidad = $especialidad;
    }

    public function getEspecialidad(){
        return $this->especialidad;
    }



    public function insertData(){
        try {
            $stm = $this -> dbCnx -> prepare("INSERT INTO campers(nombres, direccion, logros,ingles,ser,review,skils,especialidad) values(?,?,?,?,?,?,?,?)");
            $stm -> execute ([$this->nombres, $this->direccion, $this->logros,$this->ingles,$this->ser,$this->review,$this->skils,$this->especialidad,]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
        
    }

    public function obtenerAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM campers ");
            $stm->execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
           return $e->getMessage();
        }

    }

    public function delete(){
        try {
            $stm = $this->dbCnx->prepare("DELETE FROM campers WHERE id = ? ");
            $stm->execute([$this->id]);
            echo "<script>alert(registro Eliminado);docuement.location=''estudiantes.php'</script>";
            return $stm-> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectOne(){
        try {
            $stm = $this-> dbCnx->prepare("SELECT * FROM campers WHERE id = ? ");
            $stm-> execute([$this->id]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
    }

    public function  update(){
        try {
            $stm = $this -> dbCnx -> prepare("UPDATE campers SET nombres  = ? , direccion = ?, logros = ? , ingles=?, ser=?,review=?,skils=? WHERE id = ? ");
            $stm -> execute ([$this->nombres, $this->direccion, $this->logros, $this->ingles, $this->ser, $this->review,$this->skils, $this->id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
}
}
?>