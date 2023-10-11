$(document).ready(function() {
    // Manejador de entrada para el campo de cédula
    $("#userID").on("blur", function() {
        // Validación de cédula
        var userID = $(this).val();
        // La cédula debe ser formato 0-0000-0000
        var userIDPattern = /^\d{1}-\d{4}-\d{4}$/;
        if (!userIDPattern.test(userID) || userID.trim() === "") {
            $(this).addClass("is-invalid");
            $("#userID-error").show();
        } else {
            $(this).removeClass("is-invalid");
            $("#userID-error").hide();
        }
    });

    // Manejador de entrada para el campo de nombre de usuario
    $("#userName").on("blur", function() {
        // Validación de nombre de usuario
        var userName = $(this).val();
        // Acepta solo letras y espacios
        var userNamePattern = /^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+$/;
        if (!userNamePattern.test(userName) || userName.trim() === "") {
            $(this).addClass("is-invalid");
            $("#userName-error").show();
        } else {
            $(this).removeClass("is-invalid");
            $("#userName-error").hide();
        }
    });

    // Manejador de entrada para el campo de primer apellido
    $("#userLastName1").on("blur", function() {
        // Validación de primer apellido
        var userLastName1 = $(this).val();
        // Acepta solo letras y espacios
        var userLastNamePattern = /^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+$/;
        if (!userLastNamePattern.test(userLastName1) || userLastName1.trim() === "") {
            $(this).addClass("is-invalid");
            $("#userLastName1-error").show();
        } else {
            $(this).removeClass("is-invalid");
            $("#userLastName1-error").hide();
        }
    });

    // Manejador de entrada para el campo de segundo apellido
    $("#userLastName2").on("blur", function() {
        // Validación de segundo apellido
        var userLastName2 = $(this).val();
        // Acepta solo letras y espacios
        var userLastNamePattern = /^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+$/;
        if (!userLastNamePattern.test(userLastName2) || userLastName2.trim() === "") {
            $(this).addClass("is-invalid");
            $("#userLastName2-error").show();
        } else {
            $(this).removeClass("is-invalid");
            $("#userLastName2-error").hide();
        }
    });

    // Manejador de entrada para el campo de correo electrónico
    $("#userEmail").on("blur", function() {
        // Validación de correo electrónico
        var userEmail = $(this).val();
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!emailPattern.test(userEmail) || userEmail.trim() === "") {
            $(this).addClass("is-invalid");
            $("#userEmail-error").show();
        } else {
            $(this).removeClass("is-invalid");
            $("#userEmail-error").hide();
        }
    });

    // Manejador de entrada para el campo de usuario
    $("#systemUser").on("blur", function() {
        // Validación del usuario
        var systemUser = $(this).val();
        // Valida que el campo no esté vacio
        if (systemUser.trim() === "") {
            $(this).addClass("is-invalid");
            $("#systemUser-error").show();
        } else {
            $(this).removeClass("is-invalid");
            $("#systemUser-error").hide();
        }
    });

    // Manejador de entrada para la contraseña
    $("#password").on("blur", function() {
        // Validación de la contraseña
        var password = $(this).val();
        // Valida que el campo no esté vacio
        if (password.trim() === "") {
            $(this).addClass("is-invalid");
            $("#userPassword-error").show();
        } else {
            $(this).removeClass("is-invalid");
            $("#userPassword-error").hide();
        }
    });

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
                    }
                },
                error: function(xhr, status, error) {
                    // Maneja errores si es necesario
                }
            });
        }
    });

    // Manejador de entrada para la nueva contraseña
    $("#newPassword").on("blur", function() {
        var newPassword = $(this).val();
        var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;

        if (!regex.test(newPassword) || newPassword.trim() === "") {
            $(this).addClass("is-invalid");
            $("#newPassword-error").show();
        } else {
            $(this).removeClass("is-invalid");
            $("#newPassword-error").hide();
        }
    });

    // Manejador de entrada para confirmar contraseña
    $("#newPassword_confirmation").on("blur", function() {
        var newPassword = $("#newPassword").val();
        var confirmPassword = $(this).val();

        if (newPassword !== confirmPassword) {
            $(this).addClass("is-invalid");
            $("#newPassword_confirmation-error").show();
        } else {
            $(this).removeClass("is-invalid");
            $("#newPassword_confirmation-error").hide();
        }
    });
});