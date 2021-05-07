//para ejercicio 3
$(function(){
    $.get("./control/buscarTitulosImagenes.php", function(data) {
        for (let i = 0; i < 12; i++) {
            idImagen=data[i].id_imagen;
            nombreImagen=data[i].nombre_imagen;

            //armo el modal

            var modalFade=$('<div></div>');
            modalFade.attr('class','modal fade');
            modalFade.attr('id','c'+idImagen);
            modalFade.attr('tabindex','-1');
            modalFade.attr('aria-labelledby','banderaLabel');
            modalFade.attr('aria-hidden','true');


            modalDialog=$('<div></div>');
            modalDialog.attr('class','modal-dialog');
            
            modalContent=$('<div></div>');
            modalContent.attr('class','modal-content');

            
            //armo los titulos de las imagenes con su boton

            var li=$('<li></li>');
            li.attr('class','d-grid gap-2');
            var button=$('<button></button>');
            button.attr('type','button');
            button.attr('class','btn btn-outline-light');
            button.attr('data-bs-toggle','modal');
            
            button.attr('data-bs-target','#c'+idImagen);
            button.text(nombreImagen);
            li.append(button);

            //agrego los titulos como primer hijo del modalImagenes
            $('#modalImagenes').children().first().append(li);
            
            //aca armo el contenido que invoca cada titulo

            divTitulo=$('<div></div>');
            divTitulo.attr('class','modal-header c1');
            divCuerpo=$('<div></div>');
            divCuerpo.attr('class','modal-body c1');
            titulo=$('<h5></h5>');
            titulo.attr('class','modal-title');
            titulo.text(nombreImagen);

            botonCerrar=$('<button></button>');
            botonCerrar.attr('type','button');
            botonCerrar.attr('class','btn-close');
            botonCerrar.attr('data-bs-dismiss','modal');
            botonCerrar.attr('aria-label','Close');
            imagen=$('<img></img>');
            rutaImagen=data[i].ruta_imagen;
            imagen.attr('src',rutaImagen);
            imagen.attr('class','w-100');
            imagen.attr('alt',nombreImagen);

            //armo la estructura completa , desde los el los hijos hasta el padre
            divTitulo.append(titulo);
            divTitulo.append(botonCerrar);
            divCuerpo.append(imagen);

            modalContent.append(divTitulo);
            modalContent.append(divCuerpo);
            modalDialog.append(modalContent);
            modalFade.append(modalDialog);
            $('#modalImagenes').append(modalFade);

        }
    },"json");
})
//para ejercicio 6
$('#campoEstado').keyup(function(){ 
    $.post("./control/buscarProvincias.php", { caracter: this.value }, function(data) {
        $('#campoSugerencias').empty();
        var sugerencias="";
        for (let i = 0; i < data.length; i++) {
            var item= $('<li></li>');
            item.attr('class' , 'list-group-item');
            var objEstado=data[i];
            sugerencias=objEstado.nombreEstado; 
            item.text(sugerencias);
            $("#campoSugerencias").append(item);
        }
    },"json");
})

//LET utilizado para las variables que solo trabajan en un bloque, VAR el global
$(function() {
    //apenas carga la pagina, realizamos...
    $.get("./control/buscarGrupos.php", function(data) {
        console.log(data);
        //get por el llamado simple, sin parametro, buscamos los grupos de pk
        for (let i = 0; i < data.length; i++) {
            var objGrupo = data[i]; //de la coleccion de grupo pk vamos de i hasta n
            var agregar = $('<option></option>'); //creamos el elemento option de select
            agregar.attr('value', objGrupo.id_equipo); //agregamos el atributo de valor
            agregar.text(objGrupo.nombre_equipo); //agregamos texto al option
            $('#grupo').append(agregar); //llevamos al html donde se encuentra el id
        }
    }, "json");
    cargarTablaTraceur(0);
});

$('#grupo').on("change", function() {
    //al detectar cambio de valor realizamos llamado a la funcion de ajax con metodo post
    $.post("./control/buscarIntegrantes.php", { idgrupo: this.value }, function(data) {
        //enviamos idgrupo y nos devuelve data
        var opcIntegrantes = $('#integrantes');
        opcIntegrantes.empty(); //vaciamos para no renovar contenido, no agregar al que existe
        opcIntegrantes.append("<option>Integrantes</option>"); //agregamos al final
        for (let i = 0; i < data.length; i++) { //coleccion de traceurs en un grupo
            let objTraceur = data[i];
            let agregar = $('<option></option>');
            agregar.attr('value', objTraceur.id_traceur); //llamamos al id_traceur con '.', recordemos que es JSON
            agregar.text(objTraceur.nombre_traceur);
            opcIntegrantes.append(agregar);
        }
    }, "json");
});
$('#integrantes').on("change", function() {
    $.post("./control/buscarBiografia.php", { idtraceur: this.value }, function(data) {
        //$("#contenidotraceur").html(data);
        $('#contenidotraceur').empty(); //vaciamos el contenido renovar y no concatenar con el anterior
        var objTraceur = data[0];
        var agregarTitulo = $('<h1></h1>'); //creamos, damos valor y agregamos al html
        agregarTitulo.text('Biografía');
        $('#contenidotraceur').append(agregarTitulo);
        var agregarBiografia = $('<p></p>');
        agregarBiografia.text(objTraceur.biografia_traceur);
        $('#contenidotraceur').append(agregarBiografia);
        if (data['imagenes']) { //preguntamos si existen fotos
            var imagenes = data['imagenes'];
            for (let i = 0; i < imagenes.length; i++) {
                let agregaImg = $('<img>');
                agregaImg.attr('src', imagenes[i].ruta_imagen);
                agregaImg.attr('class', 'col-3 p-3');
                $('#contenidotraceur').append(agregaImg);
            }
        } //AL IDCONTENIDOTRACEUR no fue variable solo para recordar la alternativa
    }, "json");
});
$('.conTabs').on('click', function() {
    //usamos una clase para no realizar una funcion para cada boton
    let espera = 1000; //pausa de ejecucion
    $.ajax({
        url: ('./control/' + this.value + '.html'),
        beforeSend: function() {
            $('#nav-tabContent').html("<h1> C A R G A N D O . . . <h1>");
        },
        success: function(data) {
            setTimeout(function() {
                //cuando finalice el tiempo, ejecutamos
                $('#nav-tabContent').html(data);
            }, espera);
        }
    });
});

function cargarTablaTraceur(indiceUsuario) {
    var numTraceur = (indiceUsuario * 5) + 1;
    $.post("./control/archivo.php", { indice: numTraceur }, function(data) {
        var cargarTabla = $('#tablaTraceurs');
        cargarTabla.children().last().empty();
        var cantTraceurs = data.length;
        var contador = 0;
        var procesar = (cantTraceurs > 0 && cantTraceurs <= 5);
        var hoy = new Date();
        while ((contador < cantTraceurs) && procesar) {
            let objTraceur = data[(contador)];
            let fila = document.createElement('tr'); //igual que $('<tr></tr>')
            let colum1 = document.createElement('td'); //igual que $('<td></td>')
            let colum2 = document.createElement('td');
            let colum3 = document.createElement('td');
            let colum4 = document.createElement('td');
            let colum5 = document.createElement('td');
            colum1.append(numTraceur);
            colum2.append(objTraceur.nombre_traceur + " " + objTraceur.apellido_traceur);
            let nacimiento = new Date(objTraceur.fechanacimiento_traceur);
            let edad = hoy.getFullYear() - nacimiento.getFullYear();
            colum3.append(edad);
            colum4.append(objTraceur.pais_traceur);
            colum5.append(objTraceur.nombre_equipo);
            fila.appendChild(colum1);
            fila.appendChild(colum2);
            fila.appendChild(colum3);
            fila.appendChild(colum4);
            fila.appendChild(colum5);
            cargarTabla.children().last().append(fila);
            contador++;
            numTraceur++;
        }
    }, "json");
}