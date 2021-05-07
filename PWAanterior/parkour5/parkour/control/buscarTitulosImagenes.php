<?php
include_once('../autoload.php');
$coleccionImagenes = Imagen::listar('nivel_imagen>0');
$res=[];
foreach($coleccionImagenes as $objImagen){
    $res[]= ['id_imagen'=>$objImagen->getIdImagen(),
        'nombre_imagen'=>$objImagen->getNombre(),
        'ruta_imagen'=>$objImagen->getRuta()
      ];
}
$temp = array();
$new = array();
foreach($res as $value){
    if(!in_array($value["nombre_imagen"],$temp)){
      $temp[] = $value["nombre_imagen"];
      $new[] = $value;
    }
}
$resFinal= json_encode($new);
print_r($resFinal);
?>