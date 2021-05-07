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
