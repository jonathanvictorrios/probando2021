<?php include_once("./encabezado.php"); 


?>
    <form id="EstadoProvincia" method="POST">
        <text class="text-dark">Estado</text>
        <input class="text-dark" id="campoEstado" type="text">
        <div id="campoSugerenciasEstado">
            <ul class="list-group" >
                
            </ul>
        </div>
        <text class="text-dark">Provincia</text>
        <input class="text-dark" id="campoProvincia" type="text">
        <div id="campoSugerenciasProvincia">
            <ul class="list-group" >
                
            </ul>
        </div>

    </form>
<?php include_once("./footer.php"); ?>