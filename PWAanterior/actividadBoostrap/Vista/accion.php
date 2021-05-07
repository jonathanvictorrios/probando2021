<?php
include_once("Estructura/cabecera.php");
?>
<?php 
$datos = data_submitted();
// print_r($datos);
?>
<div class="container ">
<div class="row justify-content-center">
    <div class="col-md-6 ">
        <div class="alert alert-success text-center" role="alert">
            Nombre: <?php echo $datos["nombre"];?>
            <br>
            Apellido: <?php echo $datos["apellido"];?>
            <br>
            Edad: <?php echo $datos["edad"];?>
            <br>
            <?php if($datos["estudianteRegular"]=="si"){ ?>
                <h5>Es estudiante regular!</h5>
             <?php 
            }else{
            ?>
            
            <h5 class="text-danger">NO es estudiante regular!</h5>
            <?php }?>
        </div>
    </div>
</div>

</div>

<?php
include_once("Estructura/pie.php");
?>