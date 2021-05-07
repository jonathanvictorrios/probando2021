$(function() {
    $.post("./control/buscarTitulosImagenes.php", {nombre:""}, function(data, status) {
        $("#titulosImagenes").html(data);
    });
    $('#grupo').on("change", function() {
        $.post("./control/buscarIntegrantes.php", { idgrupo: this.value }, function(data, status) {
            $("#integrantes").html(data);
        });
    });
    $('#integrantes').on("change", function() {
        $.post("./control/buscarBiografia.php", { idtraceur: this.value }, function(data, status) {
            $("#contenidotraceur").html(data);
        });
    });
});