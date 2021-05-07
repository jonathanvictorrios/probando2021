<?php
$servername = "127.0.0.1";
$username = "nbaeza";
$password = "1234567";
$dbname = "test";
$port = "3307";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname, $port);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

echo $mysqli->host_info;


$paiss = $_POST['id_p'];

echo 'esta es la variable recuperada ' .$paiss . '!';

$sql = "SELECT idProvincia, nombreProvincia FROM provincia WHERE idPais = $paiss";
$consulta = $mysqli->query($sql);

if (!$consulta) {
  die('Consulta no válida: ');
}
else {
  $opciones="";
  while ($row = $consulta->fetch_assoc()) {                
    $opciones=$opciones.'<option value="'.$row['idProvincia'].'">'.$row['nombreProvincia'].'</option>';
}
  echo $opciones;
  
} 

$mysqli->close();



?>