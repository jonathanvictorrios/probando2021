<?php
include_once('../autoload.php');
$idGrup=$_POST['idgrupo'];
$coleccionTraceus = Traceur::listar('id_grupo='.$idGrup);
$res=[];
foreach($coleccionTraceus as $objTraceur){
    $res[]= ['nombre_traceur'=>$objTraceur->getNombre(),
        'id_traceur'=>$objTraceur->getIdTraceur()];
}
echo json_encode($res);
?>