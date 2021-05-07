<?php
include_once('../autoload.php');
$char = $_POST['caracter'];
$coleccionGrupos = Equipo::listar("id_equipo>1 && nombre_equipo like '".$char."%'");
$resultado = [];
foreach($coleccionGrupos as $objGrupo){
  $resultado[]=[
    "id_equipo"=>$objGrupo->getIdEquipo(),
    "nombre_equipo"=>$objGrupo->getNombre()
  ];
}
print_r(json_encode($resultado));