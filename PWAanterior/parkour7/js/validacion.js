(function() {
    Array.prototype.slice.call($("#validarForm"))
        .forEach(function(form) {
            (form).addEventListener('submit', function(event) {
                if (!form.checkValidity()) { //chequeamos que este bien sino entramos al if
                    event.preventDefault(); //no recargamos la pagina
                    event.stopPropagation(); //detenemos el envio de formulario
                }
                form.classList.add('was-validated');
            }, false)
        })
})()
$("#usuario").on("change", function() {
    $.post("./control/control_formulario.php", { usuario: this.value }, function(data) {
        if (data == "1") {
            $('#usuario').removeClass('is-valid');
            $('#usuario').addClass('is-invalid');
        } else {
            $('#usuario').removeClass('is-invalid');
            $('#usuario').addClass('is-valid');
        }
    });
});

$("#contrasena").on("change", function() {
    var expRegContrasena = /^[a-zA-z0-9]{8,}$/;
    if (expRegContrasena.test(this.value)) {
        $("#contrasena").removeClass("is-invalid");
        $("#contrasena").addClass("is-valid");
    } else {
        $("#contrasena").removeClass("is-valid");
        $("#contrasena").addClass("is-invalid");
    }
});

$("#email").on("change", function() {
    var expRegEmail = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    if (expRegEmail.test(this.value)) {
        $.post("./control/control_formulario.php", { email: this.value }, function(data) {
            if (data == "1") {
                $("#validarEmail").empty();
                $("#email").removeClass("is-valid");
                $("#email").addClass("is-invalid");
                $("#validarEmail").text('Esta email ya esta registrado');
            } else {
                $("#validarEmail").empty();
                $("#validarEmail").text('Email no valido'); //damos valor por defecto a is-invalid
                $("#email").removeClass("is-invalid");
                $("#email").addClass("is-valid");
            }
        });
    } else {
        $("#validarEmail").empty();
        $("#validarEmail").text('Email no valido');
        $("#email").removeClass("is-valid");
        $("#email").addClass("is-invalid");
    }
});

$("#telefono").on("change", function() {
    var expRegTelefono = /^[0-9]{10,}$/;
    if (expRegTelefono.test(this.value)) {
        $("#telefono").removeClass("is-invalid");
        $("#telefono").addClass("is-valid");
    } else {
        $("#telefono").removeClass("is-valid");
        $("#telefono").addClass("is-invalid");
    }
});