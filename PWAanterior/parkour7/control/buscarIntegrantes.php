<?php
include_once('../autoload.php');
$idGrup=$_POST['idgrupo'];
$coleccionTraceus = Traceur::listar('id_grupo='.$idGrup);
$resultado=[];
foreach($coleccionTraceus as $objTraceur){
    $resultado[]= ['nombre_traceur'=>$objTraceur->getNombre(),
        'id_traceur'=>$objTraceur->getIdTraceur()];
}
print_r(json_encode($resultado));
?>