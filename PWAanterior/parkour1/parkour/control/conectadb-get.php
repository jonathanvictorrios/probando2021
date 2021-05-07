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

echo $mysqli->host_info;

$group = $_GET['grupo'];

$sql = "SELECT * FROM traceur WHERE idgrupo = $group";
$consulta = $mysqli->query($sql);

if (!$consulta) {
  die('Consulta no válida: ');
}
else {
  $th = "<table><tr><th>#</th><th>Grupo</th></tr>";
  $td = "";
  while($row = $consulta->fetch_assoc()) {
    $td = $td."<tr><td>".$row["idtraceur"]."</td><td>".$row["nombre"]."</td></tr>";
  }
  $result = $th.$td."</table>";

  echo $result;
  
} 

$mysqli->close();



?>