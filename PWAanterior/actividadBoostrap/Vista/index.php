<?php
include_once("Estructura/cabecera.php");
?>
<div class="container">

<div class="row justify-content-center">
  <div class="col-md-6">
  
    <div class="card text-dark bg-white mb-3">
      <div class="card-header text-center">Complete el formulario</div>
        <div class="card-body">
          <form id="formPrueba" name="formPrueba" method="POST" action="accion.php" data-toggle="validator" enctype="multipart/form-data" >
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="emailHelp" placeholder="Ingrese nombre">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Apellido</label>
              <input type="text" class="form-control" name="apellido" id="exampleInputPassword1" placeholder="Ingrese apellido">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Edad</label>
              <input type="number" class="form-control" name="edad" id="exampleInputPassword1" placeholder="Ingrese edad">
            </div>

            <div class="form-group form-check">
              <label class="form-check-label" for="exampleCheck1">Es estudiante regular?</label>
              <br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="estudianteRegular" id="inlineRadio1" value="si">
                <label class="form-check-label" for="inlineRadio1">Si</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="estudianteRegular" id="inlineRadio2" value="no">
                <label class="form-check-label" for="inlineRadio2">No</label>
              </div>
              
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
          </form>
        </div>
      </div>
    </div>


  </div>

</div>
</div>

<?php
include_once("Estructura/pie.php");
?>