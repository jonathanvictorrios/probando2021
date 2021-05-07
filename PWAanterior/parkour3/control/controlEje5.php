<?php
$mysqli=conectar();
$valorInicio = $_POST['inicio'];
$obtenerdatos=consultar($mysqli,$valorInicio);
print_r($obtenerdatos);
cerrarconexion($mysqli);


function conectar(){
  $servername = "127.0.0.1";
  $username = "root";
  $password = "";
  $dbname = "parkour";
  $mysqli = new mysqli($servername, $username, $password, $dbname);
  if ($mysqli->connect_errno) {
      echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
  return $mysqli;
}


function consultar($mysqli,$valorInicio){
  //consulta a la base de datos
  // $sql = "SELECT traceur.nombre AS nombreTraceur ,traceur.apellido,traceur.fechanacimiento,traceur.pais,equipo.nombre AS nombreEquipo FROM equipo INNER JOIN traceur ON equipo.idequipo = traceur.idgrupo";
  
  // apartir del 3 me trae 2 registros , no incluye al 3
  $sql = "SELECT * FROM traceur LIMIT ".$valorInicio.",3";
  //mando a la consulta
  $consulta = $mysqli->query($sql);
  //verifico que la consulta es correcta
  if (!$consulta) {
    die('Consulta no válida: ');
  }
  else {
    $arreglo5Resultados=[];
    $arregloResultanteFinal=[];
    $i=0;
      //   while ($row = $consulta->fetch_assoc()) {
          
      //       $edad=calculaedad($row["fechanacimiento"]);
      //       $arregloTemp=[
      //       "nombreCompleto" => $row["nombreTraceur"]." ".$row["apellido"],
      //       "edad" => $edad,
      //       "pais" => $row["pais"],
      //       "equipo" => $row["nombreEquipo"]
      //       ];
      //       if($i==5){
      //         $arregloResultanteFinal[]=$arreglo5Resultados;
      //         $arreglo5Resultados=array();
      //         $i=0;
      //       }
      //       $arreglo5Resultados[]=$arregloTemp;
      //       $i++;
      //       //con []= ubico los elementos al final del arreglo
      // }

      $array = $consulta->fetch_all(MYSQLI_ASSOC);
      $resp = json_encode($array);
      // print_r($resp);
      /*devuelvo un arreglo asociativo con la siguiente forma
      Array
          (
              [0] => Array
                  (
                      [0] => Array
                          (
                              [nombreCompleto] => admin admin
                              [edad] => 2021
                              [pais] => admin
                              [equipo] => Club Andino Villa La Angostura
                          )

                      [1] => Array
                          (
                              [nombreCompleto] => Erik Mukhametshin
                              [edad] => 31
                              [pais] => Uzbekistán
                              [equipo] => Tempest Academy
                          )
                          .....
                    )
                .....)
        donde cada posicion del arreglo contiene 5 arreglos , los cuales contienen la informacion del traceur
        Tal como su nombre completo , edad , pais , y equipo al que pertenece

        Para consultar por ejemplo la informacion de los primeros 5 traceurs seria:
          array[0] 
          para consultar al primer traceur de este grupo de 5 seria: array[0][1] , esto nos devolveria el siguiente arreglo:
          Array
              (
                  [nombreCompleto] => admin admin
                  [edad] => 2021
                  [pais] => admin
                  [equipo] => Club Andino Villa La Angostura
              )
        */
        
      // return $arregloResultanteFinal;
      return $resp;
  } 
}

function calculaedad($fechanacimiento){
  //calculo la edad en base a la fecha de nacimiento obtenida de la base de datos
  list($ano,$mes,$dia) = explode("-",$fechanacimiento);
  $ano_diferencia  = date("Y") - $ano;
  $mes_diferencia = date("m") - $mes;
  $dia_diferencia   = date("d") - $dia;
  if ($dia_diferencia < 0 || $mes_diferencia < 0)
    $ano_diferencia--;
  return $ano_diferencia;
}

function cerrarconexion($mysqli){
  $mysqli->close();
}
?>