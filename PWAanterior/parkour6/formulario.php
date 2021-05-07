<?php include_once("./encabezado.php"); ?>
<main class="container-fluid c1">
    <div class="container text-center imgfondo">
        <div class="row justify-content-center ">
            <!--<h3 class="mt-5">FORMULARIO DE REGISTRO</h3>-->
            <!--aqui empieza formulario-->
            <div class="card bg-dark mt-3 w-75 h-50">
                <h5 class="card-header ">FORMULARIO DE REGISTRO</h5>
                <div class="card-body">
                <form class=" mb-3 mt-3 w-100 h-50 " action="" method="" id="validarForm" >
                <div class="row">
                    <div class="col col-md-6">
                        <div class="form-group mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese nombre de usuario">
                            <div class="mostrar">
                            </div>
                        </div>
                    </div>    
                    <div class="col col-md-6">
                        <div class="form-group mb-3">
                            <label for="contrasena" class="form-label">Password</label>
                            <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Ingrese contraseña">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-6">
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese email">
                            <div class="mostrar"></div>
                        </div>
                    </div>
                    <div class="col col-sm-6">
                        <div class="form-group mb-3">
                            <label for="empresa" class="form-label"> Empresa</label>
                                <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Ingrese nombre de empresa">
                        </div>
                    </div>
                </div>
                
                    
                <div class="row">
                    <div class="col col-sm-6">
                        <div class="form-group mb-3">
                            <label for="telefono" class="form-label"> Telefono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese numero de telefono">
                        </div>
                    </div>
                    <div class="col col-sm-6">
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-6">
                        <div class="form-group mb-3">
                            <label for="campoEstado" class="form-label">Estado</label>
                            <input class="form-control" id="campoEstado" type="text" placeholder="Ingrese estado">
                            <input type="hidden" id="paisElegido" value="">
                            
                            <div id="campoSugerenciasEstado">
                                <ul class="list-group" >
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col col-sm-6">
                        <div class="form-group mb-3">
                            <label for="campoProvincia" class="form-label">Provincia</label>
                            <input class="form-control" id="campoProvincia" type="text" placeholder="Ingrese provincia">
                            <div id="campoSugerenciasProvincia">
                                <ul class="list-group" >

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col col-sm-2"></div>
                    <div class="col col-sm-8">
                        <div class="form-group mb-3">
                            <label for="comentario">Comentario</label>
                            <textarea class="form-control"   name="comentario" id="comentario" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="col col-sm-3"></div>
                </div>
                
                <div class="form-group mb-2">
                    <input type="submit" class="btn btn-secondary active"  value="enviar">
                </div>
                
            </form>
                </div>
            </div>
            
            <div id="mensaje">
            </div>

        </div>
    </div>

</main>
<?php include_once("./footer.php"); ?>