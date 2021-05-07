<?php
include_once('../autoload.php');



if (isset($_POST["contrasena"]) && isset($_POST["empresa"]) && isset($_POST["telefono"]) && isset($_POST["usuario"]) && isset($_POST["email"])) {
    
    $objPro =new Provincia();
    $objPais=new Pais();

    $objPais->setIdPais($_POST['idPais']);
    $objPais->cargar();

    $objPro->setIdProvincia($_POST['idProvincia']);
    $objPro->cargar();

    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $nombre = "nombre_suscriptor='" . $usuario . "'";
    $suscriptor = new Suscriptor();
    $col = $suscriptor->listar($nombre);
    
    if ($col != null) {
       echo "error";
    }else{
        $suscriptor = new Suscriptor();
        $suscriptor->setear($usuario, $_POST["empresa"],$email, $_POST["contrasena"], $_POST["telefono"], $objPro);
        if ($suscriptor->insertar() == true) {
            echo "ok";
        }
    }
}

