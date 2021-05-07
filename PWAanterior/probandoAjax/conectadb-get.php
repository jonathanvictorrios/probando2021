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


$paiss = $_GET['pais'];

$sql = "SELECT idProvincia, nombreProvincia FROM provincia WHERE idPais = $paiss";
$consulta = $mysqli->query($sql);

if (!$consulta) {
  die('Consulta no válida: ');
}
else {
  $th = "<table><tr><th>#</th><th>Provincia</th></tr>";
  $td = "";
  while($row = $consulta->fetch_assoc()) {
    $td = $td."<tr><td>".$row["idProvincia"]."</td><td>".$row["nombreProvincia"]."</td></tr>";
  }
  $result = $th.$td."</table>";

  echo $result;
  
} 

$mysqli->close();



?>