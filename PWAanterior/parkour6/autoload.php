<?php
spl_autoload_register(function($class){
    $colDirectorios = array(
        'modelo/',
        'modelo/conector/',
        'control/');
    foreach($colDirectorios as $directorio){
        if(file_exists('../'.$directorio.$class . '.php')){//referencia desde archivo clase
            //echo "se incluyo --> ".$directorio.$class . '.php <br>';
            include_once($directorio.$class . '.php');//referencia de este mismo archivo
            return;
        }
    }
});
?>