<?php
include_once('../autoload.php');
if (isset($_POST['usuario'])) {
    echo (count(Suscriptor::listar("nombre_suscriptor='" . $_POST['usuario'] . "'"))) ? '1' : '0';
}
if (isset($_POST["email"])) {
    echo (count(Suscriptor::listar("email_suscriptor='" . $_POST['email'] . "'"))) ? '1' : '0';
}
if (isset($_POST["pais"])) {
    $colPais = Pais::listar("nombre_pais='".$_POST['pais']."'");
    $res = [];
    if (count($colPais) > 0) {
        $res[] = [
            "id_pais" => $colPais[0]->getIdPais()
        ];
    }
    print_r(json_encode($res));
}
if (isset($_POST["provincia"])&& isset($_POST["idPais"])) {
    $colPais = Provincia::listar("id_pais='".$_POST['idPais']."' AND nombre_provincia='".$_POST['provincia']."'");
    $res = [];
    if (count($colPais) > 0) {
        $res[] = [
            "id_provincia" => $colPais[0]->getIdProvincia()
        ];
    }
    print_r(json_encode($res));
}