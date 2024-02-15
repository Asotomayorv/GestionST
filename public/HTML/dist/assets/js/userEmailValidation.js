$(document).ready(function() {
    //Función que valida que el correo ingresado para recuperar la contraseña sea un correo existente en BD
    $("#recoverUserEmail").on("blur", function() {
        // Deshabilita el botón de Recuperar Cuenta
        $("#recoverAccount").prop("disabled", true);
        // Validación de correo electrónico
        var recoverUserEmail = $(this).val();
        var recoverEmailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!recoverEmailPattern.test(recoverUserEmail) || recoverUserEmail.trim() === "") {
            $(this).addClass("is-invalid");
            $("#recoverUserEmail-error").show();
        } else {
            $(this).removeClass("is-invalid");
            $("#recoverUserEmail-error").hide();
            // Realiza una solicitud AJAX para verificar la existencia y activación del correo electrónico
            $.ajax({
                url: checkUserEmailUrl, // Reemplaza con la ruta correcta
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { userEmail: recoverUserEmail },
                dataType: 'json',
                success: function(response) {
                    if (response.exists && response.isActive) {
                        // El correo existe y está activo, habilita el botón de Recuperar Cuenta
                        $("#recoverAccount").prop("disabled", false);
                        $("#recoverUserEmail-error").hide();
                    } else {
                        // El correo no existe o no está activo, muestra el mensaje de error
                        toastr.warning('El correo ingresado no existe o no está asociado a ningún usuario en el sistema');
                    }
                },
                error: function(xhr, status, error) {}
            });
        }
    });
});