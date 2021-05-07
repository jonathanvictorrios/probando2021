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
$name = $_POST['nombre'];
// $sql = "SELECT DISTINCT nombre FROM imagen";
$sql = "SELECT * FROM imagen WHERE  nivel>0";
//utilizo el distint para traer imagenes sin repetir el campo nombre
$consulta = $mysqli->query($sql);
if (!$consulta) {
  die('Consulta no válida: ');
}
else {

$titulos="";
$i=0;
$array = array();
while ($row = $consulta->fetch_assoc()) {
  $array[$i]=$row;
  $i++;
}

$temp = array();
$new = array();

foreach($array as $value){
    if(!in_array($value["nombre"],$temp)){
      $temp[] = $value["nombre"];
      $new[] = $value;
    }
}

for($i=0;$i<12;$i++){
  $value2=$new[$i];
  $titulos.='
  <li class="d-grid gap-2">
      <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#c'.$value2['idimagen'].'">'
          .$value2['nombre'].
      '</button>
  </li></ul>
  ';
  
}


for($i=0;$i<12;$i++){
  $value2=$new[$i];
  $titulos.='
  <div class="modal fade" id="c'.$value2["idimagen"].'" tabindex="-1" aria-labelledby="runLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content bg-dark">
          <div class="modal-header c1">
              <h5 class="modal-title" id="runLabel">'.$value2["nombre"].'</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body c1">
              <img src="./galeria/'.$value2["img"].'" class="w-100" alt="salto parkour">
          </div>
      </div>
  </div>
</div>
    ';
    
  
  }
echo $titulos;
}

$mysqli->close();
?>