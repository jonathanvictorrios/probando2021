<?php
include_once('../autoload.php');
$coleccionGrupos = Equipo::listar('id_equipo>1');
$resultado = [];
foreach($coleccionGrupos as $objGrupo){
  $resultado[]=[
    "id_equipo"=>$objGrupo->getIdEquipo(),
    "nombre_equipo"=>$objGrupo->getNombre()
  ];
}
print_r(json_encode($resultado));