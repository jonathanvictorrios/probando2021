<?php include_once("./encabezado.php"); ?>
<main class="container-fluid c1">
    <div class="container text-center imgfondo">
        <div class="row p-3">
            <form class="col-6" action="#" method="POST">
                <select id="grupo" class="form-select" aria-label="">
                    <option value="">Grupos</option>
                    <option value="2">Escuela Integral de Parkour</option>
                    <option value="3">Club Andino Villa la Angostura</option>
                    <option value="4">Tempest Academy</option>
                    <option value="5">Redbull</option>
                    <option value="6">JLM Urban Sport</option>
                    <option value="7">Storror</option>
                </select>
            </form>
            <form class="col-6" action="#" method="POST">
                <select id="integrantes" class="form-select" aria-label="">
                    <option value="">Integrantes</option>
                </select>
            </form>
        </div>
        <div class="d-flex align-items-center min-vh-100">
            <div id="contenidotraceur">
            </div>
        </div>
    </div>
</main>
<?php include_once("./footer.php"); ?>