<?php
include_once('../autoload.php');
$paisElegido=$_POST['paisElegido'];
$caracterProvincia=$_POST['caracterProvincia'];

// $paisElegido="Argentina";
// $caracterProvincia="s";
//$arr = array("caracter" => $caracterProvincia , "paisElegido" => $paisElegido);
$coleccionPaises = Pais::listar("nombre_pais='".$paisElegido."'");

$idPaisElegido=$coleccionPaises[0]->getIdPais();

//$coleccionProvincias1=Provincia::listar('id_pais='.$idPaisElegido);

$coleccionProvincias2 = Provincia::listar("id_pais=".$idPaisElegido." and nombre_provincia like '".$caracterProvincia."%"."'");
foreach($coleccionProvincias2 as $objProvincia){
    $res[]= ['nombre_provincia'=>$objProvincia->getNombre(),'id_provincia'=>$objProvincia->getIdProvincia()
      ];
}

$resFinal=json_encode($res);
print_r($resFinal);
?>