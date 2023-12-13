var table;
$(document).ready(function() {
    //Inicializa la tabla con data table
    table = $('#supplierTable').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
    });

    // Manejador de entrada para el campo de cédula
    $("#supplierID").on("blur", function() {
        validateSupplierID();
    });

    // Manejador de entrada para el campo de nombre del cliente
    $("#supplierName").on("blur", function() {
        validateSupplierName();
    });

    // Manejador de entrada para el campo de segundo apellido
    $("#supplierContact").on("blur", function() {
        validateSupplierContact();
    });

    // Manejador de entrada para el campo de correo electrónico
    $("#supplierEmail1").on("blur", function() {
        validateSupplierEmail1();
    });

    // Manejador de entrada para el campo de correo electrónico
    $("#supplierEmail2").on("blur", function() {
        validateSupplierEmail2();
    });

    // Manejador de entrada para el campo de teléfono
    $("#supplierPhone1").on("blur", function() {
        validateSupplierPhone1();
    });

    // Manejador de entrada para el campo de teléfono
    $("#supplierPhone2").on("blur", function() {
        validateSupplierPhone2();
    });

    // Manejador de entrada para la dirección
    $("#supplierAddress").on("blur", function() {
        validateSupplierAddress();
    });

    //Función que se encarga de validar la cédula según el tipo de cédula
    function validateSupplierID() {
        var supplierID = $("#supplierID").val();
        var supplierIDPattern = /^\d{1}-\d{3}-\d{6}$/;
        if (!supplierIDPattern.test(supplierID) || supplierID.trim() === "") {
            $("#supplierID").addClass("is-invalid");
            $("#supplierID-error").show();
            return false;
        } else {
            $("#supplierID").removeClass("is-invalid");
            $("#supplierID-error").hide();
            return true;
        }
    }

    // Validación de nombre de usuario
    function validateSupplierName() {
        var supplierName = $("#supplierName").val();
        var supplierNamePattern = /^[A-Za-zÁáÉéÍíÓóÚúÑñ\s.]+$/;
        if (!supplierNamePattern.test(supplierName) || supplierName.trim() === "") {
            $("#supplierName").addClass("is-invalid");
            $("#supplierName-error").show();
            return false;
        } else {
            $("#supplierName").removeClass("is-invalid");
            $("#supplierName-error").hide();
            return true;
        }
    }

    // Validación de segundo apellido
    function validateSupplierContact() {
        var supplierContact = $("#supplierContact").val();
        var supplierContactPattern = /^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+$/;
        if (!supplierContactPattern.test(supplierContact) || supplierContact.trim() === "") {
            $("#supplierContact").addClass("is-invalid");
            $("#supplierContact-error").show();
            return false;
        } else {
            $("#supplierContact").removeClass("is-invalid");
            $("#supplierContact-error").hide();
            return true;
        }
    }

    // Validación de correo electrónico
    function validateSupplierEmail1() {
        var supplierEmail1 = $("#supplierEmail1").val();
        var supplierEmail1Pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!supplierEmail1Pattern.test(supplierEmail1) || supplierEmail1.trim() === "") {
            $("#supplierEmail1").addClass("is-invalid");
            $("#supplierEmail1-error").show();
            return false;
        } else {
            $("#supplierEmail1").removeClass("is-invalid");
            $("#supplierEmail1-error").hide();
            return true;
        }
    }

    // Validación de correo electrónico
    function validateSupplierEmail2() {
        var supplierEmail2 = $("#supplierEmail2").val();
        var supplierEmail2Pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!supplierEmail2Pattern.test(supplierEmail2)) {
            $("#supplierEmail2").addClass("is-invalid");
            $("#supplierEmail2-error").show();
            return false;
        } else {
            $("#supplierEmail2").removeClass("is-invalid");
            $("#supplierEmail2-error").hide();
            return true;
        }
    }

    // Validación de número de teléfono en formato costarricense
    function validateSupplierPhone1() {
        var supplierPhone1 = $("#supplierPhone1").val();
        var supplierPhone1Pattern = /^\d{4}-\d{4}$/;
        if (!supplierPhone1Pattern.test(supplierPhone1) || supplierPhone1.trim() === "") {
            $("#supplierPhone1").addClass("is-invalid");
            $("#supplierPhone1-error").show();
            return false;
        } else {
            $("#supplierPhone1").removeClass("is-invalid");
            $("#supplierPhone1-error").hide();
            return true;
        }
    }

    // Validación de número de teléfono en formato costarricense
    function validateSupplierPhone2() {
        var supplierPhone2 = $("#supplierPhone2").val();
        var supplierPhone2Pattern = /^\d{4}-\d{4}$/;
        if (!supplierPhone2Pattern.test(supplierPhone2)) {
            $("#supplierPhone2").addClass("is-invalid");
            $("#supplierPhone2-error").show();
            return false;
        } else {
            $("#supplierPhone2").removeClass("is-invalid");
            $("#supplierPhone2-error").hide();
            return true;
        }
    }

    // Validación de la dirección
    function validateSupplierAddress() {
        var supplierAddress = $("#supplierAddress").val();
        if (supplierAddress.trim() === "") {
            $("#supplierAddress").addClass("is-invalid");
            $("#supplierAddress-error").show();
            return false;
        } else {
            $("#supplierAddress").removeClass("is-invalid");
            $("#supplierAddress-error").hide();
            return true;
        }
    }

    // Manejador de envío del formulario
    $("#registerSupplier").on("submit", function(event) {
        if (!validateSupplierID() || !validateSupplierName() || !validateSupplierContact() || !validateSupplierEmail1() ||
            !validateSupplierPhone1() || !validateSupplierAddress()) {
            event.preventDefault(); // Evita el envío del formulario
        }
    });

    // Manejador de envío del formulario
    $("#modifySupplier").on("submit", function(event) {
        if (!validateSupplierID() || !validateSupplierName() || !validateSupplierContact() || !validateSupplierEmail1() ||
            !validateSupplierPhone1() || !validateSupplierAddress()) {
            event.preventDefault(); // Evita el envío del formulario
        }
    });

    document.getElementById('refreshButton').addEventListener('click', function() {
        window.location.reload(); // Esto recargará toda la página
    });

    $("a[data-id]").click(function(e) {
        e.preventDefault();
        var supplierId = $(this).data('id');
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
                    toastr.success('El estado del proveedor ha sido cambiado con éxito.');
                    location.reload(); // Recargar la página 
                },
                error: function(xhr, status, error) {
                    // Manejar errores si es necesario
                    toastr.warning('Ocurrió un error al cambiar el estado del proveedor: ' + error);
                }
            });
        });
    });

    // Filtro por Nombre
    $('#filter_name').on('keyup', function() {
        var nombre = $(this).val().trim();
        table.column(1).search(nombre).draw();
    });

    // Filtro por checkbox
    $('#inlineFormStatus').on('change', function() {
        var isChecked = this.checked;
        // Filtra la tabla basándose en el estado del usuario (activo o inactivo)
        // El número '3' representa la columna del estado
        table.column(5).search(isChecked ? 'INACTIVO' : '').draw();
        //Mmensaje indicando el filtro actual
        if (isChecked) {
            toastr.info('Mostrando proveedores inactivos.');
        } else {
            toastr.info('Mostrando proveedores activos.');
        }
    });
});