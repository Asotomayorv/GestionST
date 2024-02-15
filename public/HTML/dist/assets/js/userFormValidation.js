var table;
$(document).ready(function() {
    //Inicializa la tabla con data table
    table = $('#userTable').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },
    });

    // Manejador de entrada para el campo de cédula
    $("#userID").on("blur", function() {
        validateUserID();
    });

    // Manejador de entrada para el campo de nombre de usuario
    $("#userName").on("blur", function() {
        validateUserName();
    });

    // Manejador de entrada para el campo de primer apellido
    $("#userLastName1").on("blur", function() {
        validateUserLastName1();
    });

    // Manejador de entrada para el campo de segundo apellido
    $("#userLastName2").on("blur", function() {
        validateUserLastName2();
    });

    // Manejador de entrada para el campo de correo electrónico
    $("#userEmail").on("blur", function() {
        validateUserEmail();
    });

    // Manejador de entrada para el campo de usuario
    $("#systemUser").on("blur", function() {
        validateUser();
    });

    // Manejador de entrada para la contraseña
    $("#password").on("blur", function() {
        validatePassword();
    });

    // Manejador de entrada para la nueva contraseña
    $("#newPassword").on("blur", function() {
        validateNewPassword();
    });

    // Manejador de entrada para confirmar contraseña
    $("#newPassword_confirmation").on("blur", function() {
        validateConfirmPassword();
    });


    // Validación de cédula
    function validateUserID() {
        var userID = $("#userID").val();
        var userIDPattern = /^\d{1}-\d{4}-\d{4}$/;
        if (!userIDPattern.test(userID) || userID.trim() === "") {
            $("#userID").addClass("is-invalid");
            $("#userID-error").show();
            return false;
        } else {
            $("#userID").removeClass("is-invalid");
            $("#userID-error").hide();
            return true;
        }
    }

    // Validación de nombre de usuario
    function validateUserName() {
        var userName = $("#userName").val();
        var userNamePattern = /^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+$/;
        if (!userNamePattern.test(userName) || userName.trim() === "") {
            $("#userName").addClass("is-invalid");
            $("#userName-error").show();
            return false;
        } else {
            $("#userName").removeClass("is-invalid");
            $("#userName-error").hide();
            return true;
        }
    }

    // Validación de primer apellido
    function validateUserLastName1() {
        var userLastName1 = $("#userLastName1").val();
        var userLastNamePattern = /^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+$/;
        if (!userLastNamePattern.test(userLastName1) || userLastName1.trim() === "") {
            $("#userLastName1").addClass("is-invalid");
            $("#userLastName1-error").show();
            return false;
        } else {
            $("#userLastName1").removeClass("is-invalid");
            $("#userLastName1-error").hide();
            return true;
        }
    }

    // Validación de segundo apellido
    function validateUserLastName2() {
        var userLastName2 = $("#userLastName2").val();
        var userLastNamePattern = /^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+$/;
        if (!userLastNamePattern.test(userLastName2) || userLastName2.trim() === "") {
            $("#userLastName2").addClass("is-invalid");
            $("#userLastName2-error").show();
            return false;
        } else {
            $("#userLastName2").removeClass("is-invalid");
            $("#userLastName2-error").hide();
            return true;
        }
    }

    // Validación de correo electrónico
    function validateUserEmail() {
        var userEmail = $("#userEmail").val();
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!emailPattern.test(userEmail) || userEmail.trim() === "") {
            $("#userEmail").addClass("is-invalid");
            $("#userEmail-error").show();
            return false;
        } else {
            $("#userEmail").removeClass("is-invalid");
            $("#userEmail-error").hide();
            return true;
        }
    }

    // Validación del usuario
    function validateUser() {
        var systemUser = $("#systemUser").val();
        if (systemUser.trim() === "") {
            $("#systemUser").addClass("is-invalid");
            $("#systemUser-error").show();
            return false;
        } else {
            $("#systemUser").removeClass("is-invalid");
            $("#systemUser-error").hide();
            return true;
        }
    }

    // Validación de la contraseña
    function validatePassword() {
        var password = $("#password").val();
        if (password.trim() === "") {
            $("#password").addClass("is-invalid");
            $("#userPassword-error").show();
            return false;
        } else {
            $("#password").removeClass("is-invalid");
            $("#userPassword-error").hide();
            return true;
        }
    }

    // Validación de la nueva contraseña
    function validateNewPassword() {
        var newPassword = $("#newPassword").val();
        var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;

        if (!regex.test(newPassword) || newPassword.trim() === "") {
            $("#newPassword").addClass("is-invalid");
            $("#newPassword-error").show();
            return false;
        } else {
            $("#newPassword").removeClass("is-invalid");
            $("#newPassword-error").hide();
            return true;
        }
    }

    // Validación de confirmar contraseña
    function validateConfirmPassword() {
        var newPassword = $("#newPassword").val();
        var confirmPassword = $("#newPassword_confirmation").val();

        if (newPassword !== confirmPassword || confirmPassword.trim() === "") {
            $("#newPassword_confirmation").addClass("is-invalid");
            $("#newPassword_confirmation-error").show();
            return false;
        } else {
            $("#newPassword_confirmation").removeClass("is-invalid");
            $("#newPassword_confirmation-error").hide();
            return true;
        }
    }

    // Manejador de envío del formulario
    $("#loginForm").on("submit", function(event) {
        if (!validateUser() || !validatePassword()) {
            event.preventDefault(); // Evita el envío del formulario
        }
    });

    // Manejador de envío del formulario
    $("#resetPassword").on("submit", function(event) {
        if (!validateNewPassword() || !validateConfirmPassword()) {
            event.preventDefault(); // Evita el envío del formulario
        }
    });

    // Manejador de envío del formulario
    $("#changePassword").on("submit", function(event) {
        if (!validatePassword() || !validateNewPassword() || !validateConfirmPassword()) {
            event.preventDefault(); // Evita el envío del formulario
        }
    });

    // Manejador de envío del formulario
    $("#createUser").on("submit", function(event) {
        if (!validateUserID() || !validateUserName() || !validateUserLastName1() || !validateUserLastName2() || !validateUserEmail()) {
            event.preventDefault(); // Evita el envío del formulario
        }
    });

    // Manejador de envío del formulario
    $("#modifyUser").on("submit", function(event) {
        if (!validateUserID() || !validateUserName() || !validateUserLastName1() || !validateUserLastName2() || !validateUserEmail()) {
            event.preventDefault(); // Evita el envío del formulario
        }
    });

    $("a[data-id]").click(function(e) {
        e.preventDefault();
        var userId = $(this).data('id');
        var url = $(this).attr('href'); // Guarda la URL

        // Utiliza una ventana modal para confirmar el cambio de estado
        $('#confirmationModal').modal('show');

        // Desvincula cualquier controlador de eventos existente
        $('#confirmButton').off('click');

        // Maneja el clic en el botón "Confirmar" en la ventana modal
        $('#confirmButton').on('click', function() {
            $('#confirmationModal').modal('hide');

            // Realiza la llamada AJAX para cambiar el estado
            $.ajax({
                url: url, // Usa la URL guardada
                type: 'GET',
                success: function(response) {
                    // Manjejar la respuesta
                    toastr.success('El estado del usuario ha sido cambiado con éxito.');
                    location.reload(); // Recargar la página 
                },
                error: function(xhr, status, error) {
                    // Manejar errores si es necesario
                    toastr.warning('Ocurrió un error al cambiar el estado del usuario: ' + error);
                }
            });
        });
    });

    // Filtro por Nombre
    $('#filter_user').on('keyup', function() {
        var user = $(this).val().trim();
        table.column(1).search(user).draw();
    });

    //Filtro por departamento
    $('#inlineFormRole').on('change', function() {
        var selectedDepartment = $(this).val();
        // Verificar si se seleccionó "Todos"
        if (selectedDepartment === 'Todos') {
            // Limpiar el filtro
            table.column(2).search('').draw();
        } else {
            // Filtra la tabla basándose en el departamento seleccionado
            // El número '2' representa la columna del departamento
            table.column(2).search(selectedDepartment).draw();
        }
    });

    // Filtro por checkbox
    $('#inlineFormStatus').on('change', function() {
        var isChecked = this.checked;
        // Filtra la tabla basándose en el estado del usuario (activo o inactivo)
        // El número '3' representa la columna del estado
        table.column(3).search(isChecked ? 'INACTIVO' : '').draw();
        //Mmensaje indicando el filtro actual
        if (isChecked) {
            toastr.info('Mostrando usuarios inactivos.');
        } else {
            toastr.info('Mostrando usuarios activos.');
        }
    });

    document.getElementById('refreshButton').addEventListener('click', function() {
        window.location.reload(); // Esto recargará toda la página
    });
});

/* Manejar el clic en el botón "Ver usuario"
document.querySelectorAll('.view-user').forEach(function(button) {
    button.addEventListener('click', function() {
        var url = this.getAttribute('data-url');
        window.location.href = url;
    });
});*/

/* Manejar el clic en el botón "Editar usuario"
document.querySelectorAll('.edit-user').forEach(function(button) {
    button.addEventListener('click', function() {
        var url = this.getAttribute('data-url');
        window.location.href = url;
    });
});*/

/* Manejar el clic en el botón "Cambiar estado del usuario"
document.querySelectorAll('.change-status').forEach(function(button) {
    button.addEventListener('click', function() {
        var url = this.getAttribute('data-url');
        window.location.href = url;
    });
});*/

/* Actualizar la tabla cuando se hace clic en el botón de recarga
$('#refreshButton').on('click', function() {
    // Obtener la URL base desde el atributo de datos
    var baseUrl = $(this).data('url');
    // Realiza una solicitud AJAX para actualizar la tabla
    $.ajax({
        url: baseUrl, // Reemplaza esto con la URL correcta para obtener los usuarios
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (Array.isArray(response.users)) {
                // Limpia las filas existentes en lugar de borrar la tabla completa
                table.clear().draw(false);
                var userData = response.users.map(function(user) {
                    return [
                        user.userName + ' ' + user.userLastName1 + ' ' + user.userLastName2,
                        user.systemUser,
                        user.roleName,
                        user.isUserActive ? 'ACTIVO' : 'INACTIVO',
                        user.dateCreation,
                        user.dateLastEdit,
                        `<a href="${user.editUrl}" class="text-muted"><i class="material-icons">edit</i></a>
                        <a href="${user.changeStatusUrl}" data-id="${user.idUser}" class="text-muted"><i class="material-icons">autorenew</i></a>`
                    ];
                });
                // Agrega las nuevas filas
                table.rows.add(userData).draw(false);
                toastr.success('Datos actualizados.');
            } else {
                toastr.error('Ha ocurrido un error al actualizar los datos.');
            }
        },
        error: function(xhr, status, error) {
            toastr.error('Ocurrió un error al actualizar los datos: ' + error);
        }
    });
}); * /

/* Manejar clic en botón de edición fuera del bucle
$("#editSelectedUserButton").click(function(e) {
    e.preventDefault();

    // Obtener las filas seleccionadas
    var selectedRows = table.rows('.selected').nodes();

    // Verificar si al menos una fila está seleccionada
    if (selectedRows.length === 1) {
        // Si se ha seleccionado una sola fila, obtener el ID del usuario
        var userId = $(selectedRows[0]).find('.js-check-selected-row').attr('id').replace('checkbox_', '');

        // Obtener la URL base desde el atributo de datos
        var baseUrl = $(this).data('url');

        // Redirigir al usuario a la página de edición
        window.location.href = baseUrl + "/" + userId;
    } else {
        // Mostrar un mensaje de error si no se selecciona una fila o se seleccionan múltiples filas
        toastr.error('Selecciona al menos un usuario para editar.');
    }
});*/

/* Manejar clic en botón de cambio de estado fuera del bucle
$("#changeStatusButton").click(function(e) {
    e.preventDefault();

    // Obtener las filas seleccionadas
    var selectedRows = table.rows('.selected').nodes();

    // Verificar si al menos una fila está seleccionada
    if (selectedRows.length === 1) {
        // Si se ha seleccionado una sola fila, obtener el ID del usuario
        var userId = $(selectedRows[0]).find('.js-check-selected-row').attr('id').replace('checkbox_', '');

        // Obtener la URL base desde el atributo de datos
        var baseUrl = $(this).data('url');

        // Realizar una solicitud AJAX a la URL
        $.ajax({
            url: baseUrl + "/" + userId,
            type: 'GET',
            success: function(response) {
                // Manejar la respuesta (por ejemplo, actualizar la interfaz de usuario)
                toastr.success('El estado del usuario ha sido cambiado con éxito.');
                location.reload(); // Recargar la página o realizar otras acciones necesarias
            },
            error: function(error) {
                // Manejar errores si es necesario
                toastr.error('Ocurrió un error al cambiar el estado del usuario: ' + error);
            }
        });
    } else {
        // Mostrar un mensaje de error si no se selecciona una fila o se seleccionan múltiples filas
        toastr.error('Selecciona al menos un usuario para inactivar/activar.');
    }
});*/