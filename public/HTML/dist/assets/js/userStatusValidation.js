var table;
$(document).ready(function() {
    //Inicializa la tabla con data table
    table = $('#userTable').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
    });

    $("a[data-id]").click(function(e) {
        e.preventDefault();
        var userId = $(this).data('id');

        //Utiliza una ventana modal para confirmar el cambio de estado
        $('#confirmationModal').modal('show');

        //Manejar el clic en el botón "Confirmar" en la ventana modal
        $('#confirmButton').on('click', function() {
            $('#confirmationModal').modal('hide');

            // Realiza la llamada AJAX para cambiar el estado
            $.ajax({
                url: $(this).attr('href'),
                type: 'GET',
                success: function(response) {
                    // Manejar la respuesta (por ejemplo, actualizar la interfaz de usuario)
                    toastr.success('El estado del usuario ha sido cambiado con éxito.');
                    location.reload(); // Recargar la página o realizar otras acciones necesarias
                },
                error: function(xhr, status, error) {
                    // Manejar errores si es necesario
                    toastr.error('Ocurrió un error al cambiar el estado del usuario: ' + error);
                }
            });
        });
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

        // Opcionalmente, puedes mostrar un mensaje indicando el filtro actual
        if (isChecked) {
            toastr.info('Mostrando usuarios inactivos.');
        } else {
            toastr.info('Mostrando usuarios activos.');
        }
    });
});

document.getElementById('refreshButton').addEventListener('click', function() {
    window.location.reload(); // Esto recargará toda la página
});

// Manejar el clic en el botón "Ver usuario"
document.querySelectorAll('.view-user').forEach(function(button) {
    button.addEventListener('click', function() {
        var url = this.getAttribute('data-url');
        window.location.href = url;
    });
});

// Manejar el clic en el botón "Editar usuario"
document.querySelectorAll('.edit-user').forEach(function(button) {
    button.addEventListener('click', function() {
        var url = this.getAttribute('data-url');
        window.location.href = url;
    });
});

// Manejar el clic en el botón "Cambiar estado del usuario"
document.querySelectorAll('.change-status').forEach(function(button) {
    button.addEventListener('click', function() {
        var url = this.getAttribute('data-url');
        window.location.href = url;
    });
});

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



/*$(document).ready(function() {
    $("a[data-id]").click(function(e) {
        e.preventDefault();
        var userId = $(this).data('id');

        if (confirm("¿Estás seguro de cambiar el estado de este usuario?")) {
            // Si el usuario confirma, realizar la llamada AJAX para cambiar el estado
            $.ajax({
                url: $(this).attr('href'),
                type: 'GET',
                success: function(response) {
                    // Manejar la respuesta (por ejemplo, actualizar la interfaz de usuario)
                    alert('El estado del usuario ha sido cambiado con éxito.');
                    location.reload(); // Recargar la página o realizar otras acciones necesarias
                },
                error: function(xhr, status, error) {
                    // Manejar errores si es necesario
                    alert('Ocurrió un error al cambiar el estado del usuario: ' + error);
                }
            });
        }
    });
});*/