<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if(isset($_POST['guardar'])){
    require_once("Estudiantes.php");

    $config = new Estudinate();

    $config-> setNombres($_POST['nombres']);
    $config-> setDireccion($_POST['direccion']);
    $config->setLogros($_POST['logros']);
    $config->setIngles($_POST['ingles']);
    $config->setSer($_POST['ser']);
    $config->setReview($_POST['review']);
    $config->setSkils($_POST['skils']);
    $config->setEspecialidad($_POST['especialidad']);

    $config-> insertData();

    echo "<script> alert('Los datos fueron guardados satisfactoriamente'); document.location='estudiantes.php'</script>";

}


?>