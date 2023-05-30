<?php

require_once("Estudiantes.php");
$record = new Estudinate();

if(isset ($_GET['id'])&& isset($_GET['req'])){
    if($_GET['req']=="delete"){
        $record -> setId($_GET['id']);
        $record-> delete();
        echo "<script>alert('dato borrado sactifactoriamente');document.location='estudiantes.php'</script>";

    }
}


?>