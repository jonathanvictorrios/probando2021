<?php
include_once('../autoload.php');
$idTraceur =$_POST['idtraceur'];
$objTraceur = new Traceur();
$objTraceur->setIdTraceur($idTraceur);
if($objTraceur->cargar()){ //preguntamos si existe y si cargo correctamente
  $resultado= ["biografia"=>$objTraceur->getBiografia()];//guardamos la biografia
  $objTraceur->cargarImagenes();
  if($objTraceur->getImagenes() != []){ //preguntamos si hay alguna imagen
    foreach($objTraceur->getImagenes() as $objImagen){//recorremos las imagenes
      $resultado['imagenes'][]=["ruta_imagen"=>$objImagen->getRuta()];
      //por ultimo agregamos las imagenes en $biografia['imagenes'] 
    }
  }
}
print_r(json_encode($resultado));