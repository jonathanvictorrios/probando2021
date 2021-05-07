$(function() {
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

$('.conTabs').on('click', function() {
    //usamos una clase para no realizar una funcion para cada boton
    let espera = 1000; //pausa de ejecucion
    $.ajax({
        url: ('./control/' + this.value + '.html'),
        beforeSend: function() {
            $('#nav-tabContent').html('<h1>C A R G A N D O . . .</h1>');
        },
        success: function(data) {
            setTimeout(function() {
                //cuando finalice el tiempo, ejecutamos
                $('#nav-tabContent').html(data);
            }, espera);
        }
    });
    switch (this.value) {
        case 'tabYamakasi':
            $('#tabYamakasi').css('background-color', '#555');
            $('#tabMovimientos').css('background-color', 'transparent');
            $('#tabReunionTraceur').css('background-color', 'transparent');
            break;
        case 'tabMovimientos':
            $('#tabMovimientos').css('background-color', '#555');
            $('#tabReunionTraceur').css('background-color', 'transparent');
            $('#tabYamakasi').css('background-color', 'transparent');
            break;
        case 'tabReunionTraceur':
            $('#tabReunionTraceur').css('background-color', '#555');
            $('#tabYamakasi').css('background-color', 'transparent');
            $('#tabMovimientos').css('background-color', 'transparent');
            break;
        default:
            alert('nica');
            break;
    }
});