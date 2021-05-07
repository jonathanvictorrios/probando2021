<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "parkour";
$port = "3306";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname, $port);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$traceur = $_POST['idtraceur'];
$sql = "SELECT * FROM traceur INNER JOIN imagen ON imagen.idtraceur=traceur.idtraceur WHERE traceur.idtraceur = ".$traceur;
$consulta = $mysqli->query($sql);
if (!$consulta) {
  die('Consulta no válida: ');
}
else {
  $opciones="";
  $imagenes=[];
  while ($row = $consulta->fetch_assoc()) {
    $opciones="<h1>Biografía:</h1><p>".$row['biografia']."</p>";
    $imagenes[]=$row['img'];
}
if($opciones!==""){
  foreach($imagenes as $imagen){
    $opciones.="<img class='col-4 p-3' src='./galeria/".$imagen."' style='height:13rem; width:13rem'/>";
  }
}
  echo $opciones;
}
$mysqli->close();
?>
