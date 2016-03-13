function login () {
    var params    = {};
    params.action = "login";
    params.usuario = $("#usuario").val();
    params.password = $("#password").val();

    $.post("peticiones/login.php", params, function (respuesta) {
        alert(respuesta);
        respuesta = JSON.parse(respuesta);

        if (respuesta.respuesta == "correcto") {

        } else {
            alert("Hubo un error al iniciar sesión");
        }
    });
}