<?php
include_once('../autoload.php');
$idPaisElegido=$_POST['idPaisElegido'];
$caracterProvincia=$_POST['caracterProvincia'];

$coleccionProvincias = Provincia::listar("id_pais=".$idPaisElegido." and nombre_provincia like '".$caracterProvincia."%"."'");
foreach($coleccionProvincias as $objProvincia){
    $res[]= ['nombre_provincia'=>$objProvincia->getNombre(),'id_provincia'=>$objProvincia->getIdProvincia()
      ];
}
print_r(json_encode($res));
?>