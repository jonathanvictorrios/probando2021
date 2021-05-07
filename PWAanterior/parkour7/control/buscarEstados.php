<?php
include_once('../autoload.php');
$caracter=$_POST['caracter'];
$coleccionPaises = Pais::listar("nombre_pais like '".$caracter."%"."'");

foreach($coleccionPaises as $objPais){
    $res[]= ['nombre_pais'=>$objPais->getNombre(),'id_pais'=>$objPais->getIdPais()
      ];
}
print_r(json_encode($res));
?>