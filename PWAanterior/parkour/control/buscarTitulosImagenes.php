<?php
include_once('../autoload.php');
$coleccionImagenes = Imagen::listar('nivel_imagen>0 GROUP BY(nombre_imagen) LIMIT 12');
$res=[];
foreach($coleccionImagenes as $objImagen){
    $res[]= ['id_imagen'=>$objImagen->getIdImagen(),
        'nombre_imagen'=>$objImagen->getNombre(),
        'ruta_imagen'=>$objImagen->getRuta(),
        'descripcion_imagen'=>$objImagen->getDescripcion()
      ];
}
print_r(json_encode($res));
?>