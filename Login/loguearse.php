<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);


if(isset ($_POST['Registrase'])){
    require_once('registrarse.php');
    $registrase = new registrar();
    $registrase->setidCamper(6);
    $registrase-> setEmail($_POST['email']);
    $registrase-> setUsername($_POST['username']);
    $registrase-> setpassword($_POST['password']);

    $registrase-> inserData();
    echo "<script> alert('registro hecho'); document.location='loginRegister.php'</script>";








};

session_start();

if (isset($_POST['loguearse'])) {
    require_once("loginUser.php");
    $credenciales = new loginUser();

    $credenciales ->setEmail($_POST['email']);
    $credenciales ->setpassword($_POST['password']);

    $login= $credenciales -> login();
    if ($login) {
        header('location:../Home/home.php');
    }else{
        echo "<script>alert('datos Incorrectos');document.location='loginRegister.php'</script>";
    }
   
}