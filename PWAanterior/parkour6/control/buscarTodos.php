<?php
include_once('../autoload.php');
$indice = $_POST['indice'];
$cant = $_POST['cantTraceurs'];
$coleccionTraceurs = Traceur::listar('1 LIMIT ' . $indice . ',' . $cant);
$resultado = [];
foreach ($coleccionTraceurs as $objTraceur) {
  $resultado[] = [
    "nombre_traceur" => $objTraceur->getNombre(),
    "apellido_traceur" => $objTraceur->getApellido(),
    "fechanacimiento_traceur" => $objTraceur->getFechaNacimiento(),
    "pais_traceur" => $objTraceur->getObjPais()->getNombre(),
    "nombre_equipo" => $objTraceur->getObjGrupo()->getNombre()
  ];
}
print_r(json_encode($resultado));
