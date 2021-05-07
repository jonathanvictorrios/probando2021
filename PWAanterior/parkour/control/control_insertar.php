<?php
include_once('../autoload.php');

if (isset($_POST["contrasena"]) && isset($_POST["empresa"]) && isset($_POST["telefono"]) && isset($_POST["usuario"]) && isset($_POST["email"]) && $_POST['idPais'] && $_POST['idProvincia'] && $_POST['comentario']) {
    $objPro = new Provincia();
    $objPais = new Pais();
    $objPais->setIdPais($_POST['idPais']);
    $objPais->cargar();
    $objPro->setIdProvincia($_POST['idProvincia']);
    $objPro->cargar();
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $nombre = "nombre_suscriptor='" . $usuario . "'";
    $suscriptor = new Suscriptor();
    $col = Suscriptor::listar($nombre);
    if ($col != null) {
        echo "error, ya existe";
    } else {
        $suscriptor->setear($usuario, $_POST["empresa"], $email, $_POST["contrasena"], $_POST["telefono"], $objPro);
        if ($suscriptor->insertar()) {
            $objComentario = new Comentario();
            $objComentario->setear(1,$_POST['comentario'],$suscriptor);
            if($objComentario->insertar()){
                header("Location:../formulario.php");    
            }else{
                echo"ERROR ingresar comentario";
            }
        } else {
            echo "EROORROROEOROEROEOROEOROEOROEROE ingresar suscriptor";
        }
    }
}
