$(document).ready(function() {
    // Inicializa DataTables en la tabla
    var table = $('#customerTable').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
    });

    // Variable global para almacenar los datos del cliente
    var selectedCustomerData = null;

    // Escucha el clic en una fila de la tabla de clientes
    $('#customerTable tbody').off('click').on('click', 'tr', function() {
        // Resalta la fila seleccionada
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }

        // Obtén los datos del cliente de la fila seleccionada
        var customerId = $(this).find('.text-center:eq(0)').text();
        var customerFullName = $(this).find('.text-center:eq(1)').text();
        var customerContact = $(this).find('.text-center:eq(2)').text();
        var customerEmail = $(this).find('.text-center:eq(3)').text();
        var customerPhone = $(this).find('.text-center:eq(4)').text();
        //var customerAddress1 = $(this).find('.text-center:eq(5)').text();
        var idCustomer = $(this).data('customer-id');
        var customerEmail2 = $(this).data('customer-email2');
        var customerPhone2 = $(this).data('customer-phone2');
        var customertypeID = $(this).data('customer-typeid');
        var customerTaxes = $(this).data('customer-taxes');
        var customerAddress1 = $(this).data('customer-address1');
        var customerAddress2 = $(this).data('customer-address2');

        // Almacena los datos del cliente en la variable global
        selectedCustomerData = {
            customerId: customerId,
            customerFullName: customerFullName,
            customerContact: customerContact,
            customerEmail: customerEmail,
            customerPhone: customerPhone,
            customerAddress1: customerAddress1,
            idCustomer: idCustomer,
            customerEmail2: customerEmail2,
            customerPhone2: customerPhone2,
            customertypeID: customertypeID,
            customerTaxes: customerTaxes,
            customerAddress2: customerAddress2,
        };

        $('#confirmSelectButton').on('click', function() {
            // Verifica si se ha seleccionado un cliente
            if (selectedCustomerData) {
                // Completa los campos del formulario con los datos del cliente
                $('#customerID').val(selectedCustomerData.customerId);
                $('#customerFullName').val(selectedCustomerData.customerFullName);
                $('#customerContact').val(selectedCustomerData.customerContact);
                $('#customerEmail1').val(selectedCustomerData.customerEmail);
                $('#customerEmail2').val(selectedCustomerData.customerEmail2);
                $('#customerPhone1').val(selectedCustomerData.customerPhone);
                $('#customerPhone2').val(selectedCustomerData.customerPhone2);
                $('#customerAddress1').val(selectedCustomerData.customerAddress1);
                $('#idCustomer').val(selectedCustomerData.idCustomer);
                $('#customertypeID').val(selectedCustomerData.customertypeID);

                // Cierra el modal después de seleccionar un cliente
                $('#clientSearchModal').modal('hide');
            } else {
                // Muestra un mensaje de error o notificación si no se seleccionó un cliente
                toastr.warning('Por favor, seleccione un cliente.');
            }
        });
    });

    // Manejador de cambio para el campo "Tipo de Cédula"
    $("#createCustomertypeID").on("change", function() {
        validateCreateCustomerID();
    });

    // Manejador de cambio para el campo "Tipo de Cédula"
    $("#modifyCustomertypeID").on("change", function() {
        validateModifyCustomerID();
    });

    // Manejador de entrada para el campo de cédula
    $("#createCustomerID").on("blur", function() {
        validateCreateCustomerID();
    });

    // Manejador de entrada para el campo de cédula
    $("#modifyCustomerID").on("blur", function() {
        validateModifyCustomerID();
    });

    // Manejador de entrada para el campo de nombre del cliente
    $("#createCustomerFullName").on("blur", function() {
        validateCreateCustomerFullName();
    });

    // Manejador de entrada para el campo de nombre del cliente
    $("#modifyCustomerFullName").on("blur", function() {
        validateModifyCustomerFullName();
    });

    // Manejador de entrada para el campo de segundo apellido
    $("#createCustomerContact").on("blur", function() {
        validateCreateCustomerContact();
    });

    // Manejador de entrada para el campo de segundo apellido
    $("#modifyCustomerContact").on("blur", function() {
        validateModifyCustomerContact();
    });

    // Manejador de entrada para el campo de correo electrónico
    $("#createCustomerEmail1").on("blur", function() {
        validateCreateCustomerEmail1();
    });

    // Manejador de entrada para el campo de correo electrónico
    $("#modifyCustomerEmail1").on("blur", function() {
        validateModifyCustomerEmail1();
    });

    // Manejador de entrada para el campo de correo electrónico
    $("#createCustomerEmail2").on("blur", function() {
        validateCreateCustomerEmail2();
    });

    // Manejador de entrada para el campo de correo electrónico
    $("#modifyCustomerEmail2").on("blur", function() {
        validateModifyCustomerEmail2();
    });

    // Manejador de entrada para el campo de teléfono
    $("#createCustomerPhone1").on("blur", function() {
        validateCreateCustomerPhone1();
    });

    // Manejador de entrada para el campo de teléfono
    $("#modifyCustomerPhone1").on("blur", function() {
        validateModifyCustomerPhone1();
    });

    // Manejador de entrada para el campo de teléfono
    $("#createCustomerPhone2").on("blur", function() {
        validateCreateCustomerPhone2();
    });

    // Manejador de entrada para el campo de teléfono
    $("#modifyCustomerPhone2").on("blur", function() {
        validateModifyCustomerPhone2();
    });

    // Manejador de entrada para la dirección
    $("#createCustomerAddress1").on("blur", function() {
        validateCreateCustomerAddress1();
    });

    // Manejador de entrada para la dirección
    $("#modifyCustomerAddress1").on("blur", function() {
        validateModifyCustomerAddress1();
    });

    $("input[name='callSubject']").on("change", function() {
        validateCallSubject();
    });

    // Manejador de entrada para los comentarios de llamada
    $("#callComments").on("blur", function() {
        validateCallComments();
    });

    // Manejador de entrada para los comentarios de llamada
    $("#commentCall").on("blur", function() {
        validatecommentCall();
    });

    /* Manejador de envío del formulario de llamada
    $("#callForm").on("submit", function(event) {
        // Verificar si al menos una opción está marcada
        if (!$("input[name='callSubject']:checked").length) {
            event.preventDefault(); // Evitar que se envíe el formulario
            $("#callSubject-error").show(); // Mostrar mensaje de error
        } else {
            $("#callSubject-error").hide(); // Ocultar mensaje de error si hay una opción marcada
        }

        // Validar los comentarios de llamada antes de enviar
        if (!validateCallComments()) {
            event.preventDefault(); // Evitar que se envíe el formulario si los comentarios no son válidos
        }
    });*/

    // Validación de los comentarios de llamada
    function validatecommentCall() {
        var commentCall = $("#commentCall").val();
        // Valida que el campo no esté vacío
        if (commentCall.trim() === "") {
            $("#commentCall").addClass("is-invalid");
            $("#commentCall-error").show();
            return false;
        } else {
            $("#commentCall").removeClass("is-invalid");
            $("#commentCall-error").hide();
            return true;
        }
    }

    // Validación de los comentarios de llamada
    function validateCallComments() {
        var callComments = $("#callComments").val();
        // Valida que el campo no esté vacío
        if (callComments.trim() === "") {
            $("#callComments").addClass("is-invalid");
            $("#callComments-error").show();
            return false;
        } else {
            $("#callComments").removeClass("is-invalid");
            $("#callComments-error").hide();
            return true;
        }
    }

    // Función que se encarga de validar el campo "Asunto"
    function validateCallSubject() {
        var selectedCallSubject = $("input[name='callSubject']:checked").val();

        if (!selectedCallSubject) {
            $("input[name='callSubject']").addClass("is-invalid");
            $("#callSubject-error").show();
            return false;
        } else {
            $("input[name='callSubject']").removeClass("is-invalid");
            $("#callSubject-error").hide();
            return true;
        }
    }

    //Función que se encarga de validar la cédula según el tipo de cédula
    function validateCreateCustomerID() {
        var createCustomertypeID = $("#createCustomertypeID").val();
        var createCustomerID = $("#createCustomerID").val();

        var createCustomerIDPattern;
        if (createCustomertypeID == "1") { // Cédula Jurídica
            createCustomerIDPattern = /^\d{1}-\d{3}-\d{6}$/;
        } else if (createCustomertypeID == "2") { // Cédula Física
            createCustomerIDPattern = /^\d{1}-\d{4}-\d{4}$/;
        }

        if (!createCustomerIDPattern.test(createCustomerID) || createCustomerID.trim() === "") {
            $("#createCustomerID").addClass("is-invalid");
            if (createCustomerIDPattern.toString() == /^\d{1}-\d{3}-\d{6}$/.toString()) {
                $("#createCustomerID-error").hide();
                $("#createCustomerLegalID-error").show();
            } else {
                $("#createCustomerLegalID-error").hide();
                $("#createCustomerID-error").show();
            }
            return false;
        } else {
            $("#createCustomerID").removeClass("is-invalid");
            $("#createCustomerID-error").hide();
            $("#createCustomerLegalID-error").hide();
            return true;
        }
    }

    //Función que se encarga de validar la cédula según el tipo de cédula
    function validateModifyCustomerID() {
        var modifyCustomertypeID = $("#modifyCustomertypeID").val();
        var modifyCustomerID = $("#modifyCustomerID").val();

        var modifyCustomerIDPattern;
        if (modifyCustomertypeID == "1") { // Cédula Jurídica
            modifyCustomerIDPattern = /^\d{1}-\d{3}-\d{6}$/;
        } else if (modifyCustomertypeID == "2") { // Cédula Física
            modifyCustomerIDPattern = /^\d{1}-\d{4}-\d{4}$/;
        }

        if (!modifyCustomerIDPattern.test(modifyCustomerID) || modifyCustomerID.trim() === "") {
            $("#modifyCustomerID").addClass("is-invalid");
            if (modifyCustomerIDPattern.toString() == /^\d{1}-\d{3}-\d{6}$/.toString()) {
                $("#modifyCustomerID-error").hide();
                $("#modifyCustomerLegalID-error").show();
            } else {
                $("#modifyCustomerLegalID-error").hide();
                $("#modifyCustomerID-error").show();
            }
            return false;
        } else {
            $("#modifyCustomerID").removeClass("is-invalid");
            $("#modifyCustomerID-error").hide();
            $("#modifyCustomerLegalID-error").hide();
            return true;
        }
    }

    // Validación de nombre de usuario
    function validateModifyCustomerFullName() {
        var modifyCustomerFullName = $("#modifyCustomerFullName").val();
        var modifyCustomerFullNamePattern = /^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+$/;
        if (!modifyCustomerFullNamePattern.test(modifyeCustomerFullName) || modifyCustomerFullName.trim() === "") {
            $("#modifyCustomerFullName").addClass("is-invalid");
            $("#modifyCustomerFullName-error").show();
            return false;
        } else {
            $("#modifyCustomerFullName").removeClass("is-invalid");
            $("#modifyCustomerFullName-error").hide();
            return true;
        }
    }

    // Validación de nombre de usuario
    function validateCreateCustomerFullName() {
        var createCustomerFullName = $("#createCustomerFullName").val();
        var createCustomerFullNamePattern = /^[A-Za-zÁáÉéÍíÓóÚúÑñ\s.]+$/;
        if (!createCustomerFullNamePattern.test(createCustomerFullName) || createCustomerFullName.trim() === "") {
            $("#createCustomerFullName").addClass("is-invalid");
            $("#createCustomerFullName-error").show();
            return false;
        } else {
            $("#createCustomerFullName").removeClass("is-invalid");
            $("#createCustomerFullName-error").hide();
            return true;
        }
    }

    // Validación de nombre de usuario
    function validateModifyCustomerFullName() {
        var modifyCustomerFullName = $("#modifyCustomerFullName").val();
        var modifyCustomerFullNamePattern = /^[A-Za-zÁáÉéÍíÓóÚúÑñ\s.]+$/;
        if (!modifyCustomerFullNamePattern.test(modifyCustomerFullName) || modifyCustomerFullName.trim() === "") {
            $("#modifyCustomerFullName").addClass("is-invalid");
            $("#modifyCustomerFullName-error").show();
            return false;
        } else {
            $("#modifyCustomerFullName").removeClass("is-invalid");
            $("#modifyCustomerFullName-error").hide();
            return true;
        }
    }

    // Validación de segundo apellido
    function validateCreateCustomerContact() {
        var createCustomerContact = $("#createCustomerContact").val();
        var createCustomerContactPattern = /^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+$/;
        if (!createCustomerContactPattern.test(createCustomerContact) || createCustomerContact.trim() === "") {
            $("#createCustomerContact").addClass("is-invalid");
            $("#createCustomerContact-error").show();
            return false;
        } else {
            $("#createCustomerContact").removeClass("is-invalid");
            $("#createCustomerContact-error").hide();
            return true;
        }
    }

    // Validación de segundo apellido
    function validateModifyCustomerContact() {
        var modifyCustomerContact = $("#modifyCustomerContact").val();
        var modifyCustomerContactPattern = /^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+$/;
        if (!modifyCustomerContactPattern.test(modifyCustomerContact) || modifyCustomerContact.trim() === "") {
            $("#modifyCustomerContact").addClass("is-invalid");
            $("#modifyCustomerContact-error").show();
            return false;
        } else {
            $("#modifyCustomerContact").removeClass("is-invalid");
            $("#modifyCustomerContact-error").hide();
            return true;
        }
    }

    // Validación de correo electrónico
    function validateCreateCustomerEmail1() {
        var createCustomerEmail1 = $("#createCustomerEmail1").val();
        var createCustomerEmail1Pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!createCustomerEmail1Pattern.test(createCustomerEmail1) || createCustomerEmail1.trim() === "") {
            $("#createCustomerEmail1").addClass("is-invalid");
            $("#createCustomerEmail1-error").show();
            return false;
        } else {
            $("#createCustomerEmail1").removeClass("is-invalid");
            $("#createCustomerEmail1-error").hide();
            return true;
        }
    }

    // Validación de correo electrónico
    function validateModifyCustomerEmail1() {
        var modifyCustomerEmail1 = $("#modifyCustomerEmail1").val();
        var modifyCustomerEmail1Pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!modifyCustomerEmail1Pattern.test(modifyCustomerEmail1) || modifyCustomerEmail1.trim() === "") {
            $("#modifyCustomerEmail1").addClass("is-invalid");
            $("#modifyCustomerEmail1-error").show();
            return false;
        } else {
            $("#modifyCustomerEmail1").removeClass("is-invalid");
            $("#modifyCustomerEmail1-error").hide();
            return true;
        }
    }

    // Validación de correo electrónico
    function validateCreateCustomerEmail2() {
        var createCustomerEmail2 = $("#createCustomerEmail2").val();
        var createCustomerEmail2Pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!createCustomerEmail2Pattern.test(createCustomerEmail2)) {
            $("#createCustomerEmail2").addClass("is-invalid");
            $("#createCustomerEmail2-error").show();
            return false;
        } else {
            $("#createCustomerEmail2").removeClass("is-invalid");
            $("#createCustomerEmail2-error").hide();
            return true;
        }
    }

    // Validación de correo electrónico
    function validateModifyCustomerEmail2() {
        var modifyCustomerEmail2 = $("#modifyCustomerEmail2").val();
        var modifyCustomerEmail2Pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!modifyCustomerEmail2Pattern.test(modifyCustomerEmail2)) {
            $("#modifyCustomerEmail2").addClass("is-invalid");
            $("#modifyCustomerEmail2-error").show();
            return false;
        } else {
            $("#modifyCustomerEmail2").removeClass("is-invalid");
            $("#modifyCustomerEmail2-error").hide();
            return true;
        }
    }

    // Validación de número de teléfono en formato costarricense
    function validateCreateCustomerPhone1() {
        var createCustomerPhone1 = $("#createCustomerPhone1").val();
        var createCustomerPhone1Pattern = /^\d{4}-\d{4}$/;
        if (!createCustomerPhone1Pattern.test(createCustomerPhone1) || createCustomerPhone1.trim() === "") {
            $("#createCustomerPhone1").addClass("is-invalid");
            $("#createCustomerPhone1-error").show();
            return false;
        } else {
            $("#createCustomerPhone1").removeClass("is-invalid");
            $("#createCustomerPhone1-error").hide();
            return true;
        }
    }

    // Validación de número de teléfono en formato costarricense
    function validateModifyCustomerPhone1() {
        var modifyCustomerPhone1 = $("#modifyCustomerPhone1").val();
        var modifyCustomerPhone1Pattern = /^\d{4}-\d{4}$/;
        if (!modifyCustomerPhone1Pattern.test(modifyCustomerPhone1) || modifyCustomerPhone1.trim() === "") {
            $("#modifyCustomerPhone1").addClass("is-invalid");
            $("#modifyCustomerPhone1-error").show();
            return false;
        } else {
            $("#modifyCustomerPhone1").removeClass("is-invalid");
            $("#modifyCustomerPhone1-error").hide();
            return true;
        }
    }

    // Validación de número de teléfono en formato costarricense
    function validateCreateCustomerPhone2() {
        var createCustomerPhone2 = $("#createCustomerPhone2").val();
        var createCustomerPhone2Pattern = /^\d{4}-\d{4}$/;
        if (!createCustomerPhone2Pattern.test(createCustomerPhone2)) {
            $("#createCustomerPhone2").addClass("is-invalid");
            $("#createCustomerPhone2-error").show();
            return false;
        } else {
            $("#createCustomerPhone2").removeClass("is-invalid");
            $("#createCustomerPhone2-error").hide();
            return true;
        }
    }

    // Validación de número de teléfono en formato costarricense
    function validateModifyCustomerPhone2() {
        var modifyCustomerPhone2 = $("#modifyCustomerPhone2").val();
        var modifyCustomerPhone2Pattern = /^\d{4}-\d{4}$/;
        if (!modifyCustomerPhone2Pattern.test(modifyCustomerPhone2)) {
            $("#modifyCustomerPhone2").addClass("is-invalid");
            $("#modifyCustomerPhone2-error").show();
            return false;
        } else {
            $("#modifyCustomerPhone2").removeClass("is-invalid");
            $("#modifyCustomerPhone2-error").hide();
            return true;
        }
    }

    // Validación de la dirección
    function validateCreateCustomerAddress1() {
        var createCustomerAddress1 = $("#createCustomerAddress1").val();
        if (createCustomerAddress1.trim() === "") {
            $("#createCustomerAddress1").addClass("is-invalid");
            $("#createCustomerAddress1-error").show();
            return false;
        } else {
            $("#createCustomerAddress1").removeClass("is-invalid");
            $("#createCustomerAddress1-error").hide();
            return true;
        }
    }

    // Validación de la dirección
    function validateModifyCustomerAddress1() {
        var modifyCustomerAddress1 = $("#modifyCustomerAddress1").val();
        if (modifyCustomerAddress1.trim() === "") {
            $("#modifyCustomerAddress1").addClass("is-invalid");
            $("#modifyCustomerAddress1-error").show();
            return false;
        } else {
            $("#modifyCustomerAddress1").removeClass("is-invalid");
            $("#modifyCustomerAddress1-error").hide();
            return true;
        }
    }

    /* Manejador de envío del formulario
    $("#createClientForm").on("submit", function(event) {
        if (!validateCreateCustomerID() || !validateCreateCustomerFullName() || !validateCreateCustomerContact() || !validateCreateCustomerEmail1() ||
            !validateCreateCustomerPhone1() || !validateCreateCustomerAddress1()) {
            event.preventDefault(); // Evita el envío del formulario
        }
    }); */

    /* Manejador de envío del formulario
    $("#modifyCustomer").on("submit", function(event) {
        if (!validateModifyCustomerID() || !validateModifyCustomerFullName() || !validateModifyCustomerContact() || !validateModifyCustomerEmail1() ||
            !validateModifyCustomerPhone1() || !validateModifyCustomerAddress1()) {
            event.preventDefault(); // Evita el envío del formulario
        }
    });*/

    // Escucha el clic en el botón de crear cliente para abrir el modal
    $('#createClientButton').on('click', function() {
        // Muestra el modal
        $('#createClientModal').modal('show');
    });

    // Agrega un controlador de eventos al botón "Registrar" en el modal
    $('#registerClientButton').on('click', function(e) {
        e.preventDefault();

        // Validación del formulario
        if (!validateCreateCustomerID() || !validateCreateCustomerFullName() || !validateCreateCustomerContact() || !validateCreateCustomerEmail1() ||
            !validateCreateCustomerPhone1() || !validateCreateCustomerAddress1()) {
            e.preventDefault(); // Si la validación falla, termina la ejecución de la función
        }

        // Obtiene la URL base desde el atributo data-url
        var baseUrl = $('#createClientForm').data('url');

        // Obtener los datos del formulario
        var formData = $('#createClientForm').serialize();

        // Enviar la petición AJAX
        $.ajax({
            url: baseUrl,
            type: 'POST',
            data: formData,
            success: function(response) {
                // Cierra el modal después de enviar el formulario
                $('#createClientModal').modal('hide');

                // Actualiza los campos del formulario con los nuevos datos de la actualización si es necesario
                if (response.data) {
                    // Almacena los datos del cliente en la variable global
                    selectedCustomerData = {
                        customerId: response.data.customerID,
                        customerFullName: response.data.customerFullName,
                        customerContact: response.data.customerContact,
                        customerEmail: response.data.customerEmail1,
                        customerEmail2: response.data.customerEmail2,
                        customerPhone: response.data.customerPhone1,
                        customerPhone2: response.data.customerPhone2,
                        customerAddress1: response.data.customerAddress1,
                        customerAddress2: response.data.customerAddress2,
                        idCustomer: response.data.idCustomer,
                        customertypeID: response.data.customertypeID,
                        customerTaxes: response.data.customerTaxes,
                    };

                    $('#customerID').val(selectedCustomerData.customerId);
                    $('#customerFullName').val(selectedCustomerData.customerFullName);
                    $('#customerContact').val(selectedCustomerData.customerContact);
                    $('#customerEmail1').val(selectedCustomerData.customerEmail);
                    $('#customerEmail2').val(selectedCustomerData.customerEmail2);
                    $('#customerPhone1').val(selectedCustomerData.customerPhone);
                    $('#customerPhone2').val(selectedCustomerData.customerPhone2);
                    $('#customerAddress1').val(selectedCustomerData.customerAddress1);
                    $('#idCustomer').val(selectedCustomerData.idCustomer);
                    $('#customertypeID').val(selectedCustomerData.customertypeID);

                    // Muestra un mensaje de éxito o realiza otras acciones necesarias
                    toastr.success('Cliente registrado con éxito');
                } else {
                    // Muestra un mensaje de error o notificación si no se pudo crear el cliente
                    toastr.warning('Error al registrar el cliente: ' + response.message);
                }

            },
            error: function(xhr, status, error) {
                // Muestra un mensaje de error si ocurre un error en la petición
                toastr.warning('Error al registrar el cliente: ' + response.message);
            }
        });
    });

    // Escucha el clic en el botón de crear cliente para abrir el modal
    $('#createCommentButton').on('click', function() {
        // Muestra el modal
        $('#createCommentModal').modal('show');
    });

    // Agrega un controlador de eventos al botón "Registrar" en el modal
    $('#registerCommentButton').on('click', function(e) {
        e.preventDefault();

        // Llama a la función de validación
        if (!validatecommentCall()) {
            return; // Evita el envío del formulario si la validación no pasa
        }

        // Obtiene la URL base desde el atributo data-url
        var baseUrl = $('#addCommentForm').data('url');

        // Obtener los datos del formulario
        var formData = $('#addCommentForm').serialize();

        // Enviar la petición AJAX
        $.ajax({
            url: baseUrl,
            type: 'POST',
            data: formData,
            success: function(response) {
                // Cierra el modal después de enviar el formulario
                $('#createCommentModal').modal('hide');

                // Muestra un mensaje de éxito o realiza otras acciones necesarias
                toastr.success(response.message);
                // Recarga la página
                location.reload();
            },
            error: function(xhr, status, error) {
                // Muestra un mensaje de error si ocurre un error en la petición
                toastr.warning('Error al registrar el comentario: ' + response.message);
            }
        });
    });

    // Botón de Modificación
    $('#modifyClientButton').off('click').on('click', function() {
        // Verifica si hay un cliente seleccionado
        if (!selectedCustomerData) {
            toastr.warning('Por favor, seleccione un cliente.');
        } else {
            // Completa el formulario del modal con los datos del cliente
            $('#modifyClientModal').modal('show');
            $('#modifyCustomerID').val(selectedCustomerData.customerId);
            $('#modifyCustomerFullName').val(selectedCustomerData.customerFullName);
            $('#modifyCustomerContact').val(selectedCustomerData.customerContact);
            $('#modifyCustomerEmail1').val(selectedCustomerData.customerEmail);
            $('#modifyCustomerEmail2').val(selectedCustomerData.customerEmail2);
            $('#modifyCustomerPhone1').val(selectedCustomerData.customerPhone);
            $('#modifyCustomerPhone2').val(selectedCustomerData.customerPhone2);
            $('#modifyCustomerAddress1').val(selectedCustomerData.customerAddress1);
            $('#modifyCustomerAddress2').val(selectedCustomerData.customerAddress2);
            $('#modifyCustomertypeID').val(selectedCustomerData.customertypeID);
            $('#modifyCustomerTaxes').prop('checked', selectedCustomerData.customerTaxes == 1);

            // Obtiene la URL base desde el atributo data-url
            var baseUrl = $('#modifyClientForm').data('url');
            // Reemplaza el marcador de posición 'id' con el valor real
            var newAction = baseUrl.replace('id', selectedCustomerData.idCustomer);
            // Actualiza la acción del formulario con la URL modificada
            $('#modifyClientForm').attr('action', newAction);
            // Elimina cualquier manejador de eventos existente del botón "Actualizar"
            $('#updateClientButton').off('click');
            // Agrega un controlador de eventos al botón "Actualizar" en el modal
            $('#updateClientButton').on('click', function() {
                var form = $('#modifyClientForm');

                // Serializa los datos del formulario para enviarlos al servidor
                var formData = form.serialize();

                // Realiza una solicitud AJAX para actualizar el cliente
                $.ajax({
                    type: 'POST', // Cambia el método según sea necesario (en tu caso, parece ser POST)
                    url: newAction, // Obtiene la URL del atributo 'action' del formulario
                    data: formData, // Envía los datos serializados
                    dataType: 'json', // Cambia según el tipo de respuesta esperada

                    success: function(response) {
                        // Cierra el modal después de una actualización exitosa
                        $('#modifyClientModal').modal('hide');

                        // Actualiza los campos del formulario con los nuevos datos de la actualización si es necesario
                        if (response.data) {
                            // Almacena los datos del cliente en la variable global
                            selectedCustomerData = {
                                customerId: response.data.customerID,
                                customerFullName: response.data.customerFullName,
                                customerContact: response.data.customerContact,
                                customerEmail: response.data.customerEmail1,
                                customerEmail2: response.data.customerEmail2,
                                customerPhone: response.data.customerPhone1,
                                customerPhone2: response.data.customerPhone2,
                                customerAddress1: response.data.customerAddress1,
                                customerAddress2: response.data.customerAddress2,
                                idCustomer: response.data.idCustomer,
                                customertypeID: response.data.customertypeID,
                                customerTaxes: response.data.customerTaxes,
                            };

                            $('#customerID').val(selectedCustomerData.customerId);
                            $('#customerFullName').val(selectedCustomerData.customerFullName);
                            $('#customerContact').val(selectedCustomerData.customerContact);
                            $('#customerEmail1').val(selectedCustomerData.customerEmail);
                            $('#customerEmail2').val(selectedCustomerData.customerEmail2);
                            $('#customerPhone1').val(selectedCustomerData.customerPhone);
                            $('#customerPhone2').val(selectedCustomerData.customerPhone2);
                            $('#customerAddress1').val(selectedCustomerData.customerAddress1);
                            $('#idCustomer').val(selectedCustomerData.idCustomer);
                            $('#customertypeID').val(selectedCustomerData.customertypeID);
                        }
                        // Muestra un mensaje de éxito o realiza otras acciones necesarias
                        toastr.success('Cliente actualizado con éxito');
                    },
                    error: function(error) {
                        // Procesa errores de la solicitud AJAX y muestra mensajes de error
                        toastr.warning('Error al actualizar el cliente: ' + error.statusText);
                    }
                });
            });
        }
    });

    // Botón de Modificación
    $('#modifyClientButton1').off('click').on('click', function() {

        if (!selectedCustomerData) {
            // Obtén los datos del cliente de la fila seleccionada
            var idCustomer = $('#idCustomer').val();
            var customertypeID = $('#customertypeID').val();
            var customerId = $('#customerID').val();
            var customerFullName = $('#customerFullName').val();
            var customerContact = $('#customerContact').val();
            var customerEmail1 = $('#customerEmail1').val();
            var customerEmail2 = $('#customerEmail2').val();
            var customerPhone1 = $('#customerPhone1').val();
            var customerPhone2 = $('#customerPhone2').val();
            var customerAddress1 = $('#customerAddress1').val();
            var customerAddress2 = $('#customerAddress2').val();
            var customerTaxes = $('#customerTaxes').val();

            // Completa el formulario del modal con los datos del cliente
            $('#modifyClientModal').modal('show');
            $('#modifyCustomerID').val(customerId);
            $('#modifyCustomerFullName').val(customerFullName);
            $('#modifyCustomerContact').val(customerContact);
            $('#modifyCustomerEmail1').val(customerEmail1);
            $('#modifyCustomerEmail2').val(customerEmail2);
            $('#modifyCustomerPhone1').val(customerPhone1);
            $('#modifyCustomerPhone2').val(customerPhone2);
            $('#modifyCustomerAddress1').val(customerAddress1);
            $('#modifyCustomerAddress2').val(customerAddress2);
            $('#modifyCustomertypeID').val(customertypeID);
            $('#modifyCustomerTaxes').prop('checked', customerTaxes == 1);
            // Obtiene la URL base desde el atributo data-url
            var baseUrl = $('#modifyClientForm').data('url');
            // Reemplaza el marcador de posición 'id' con el valor real
            var newAction = baseUrl.replace('id', idCustomer);
        } else {
            // Completa el formulario del modal con los datos del cliente
            $('#modifyClientModal').modal('show');
            $('#modifyCustomerID').val(selectedCustomerData.customerId);
            $('#modifyCustomerFullName').val(selectedCustomerData.customerFullName);
            $('#modifyCustomerContact').val(selectedCustomerData.customerContact);
            $('#modifyCustomerEmail1').val(selectedCustomerData.customerEmail);
            $('#modifyCustomerEmail2').val(selectedCustomerData.customerEmail2);
            $('#modifyCustomerPhone1').val(selectedCustomerData.customerPhone);
            $('#modifyCustomerPhone2').val(selectedCustomerData.customerPhone2);
            $('#modifyCustomerAddress1').val(selectedCustomerData.customerAddress1);
            $('#modifyCustomerAddress2').val(selectedCustomerData.customerAddress2);
            $('#modifyCustomertypeID').val(selectedCustomerData.customertypeID);
            $('#modifyCustomerTaxes').prop('checked', selectedCustomerData.customerTaxes == 1);
            // Obtiene la URL base desde el atributo data-url
            var baseUrl = $('#modifyClientForm').data('url');
            // Reemplaza el marcador de posición 'id' con el valor real
            var newAction = baseUrl.replace('id', selectedCustomerData.idCustomer);
        }
        // Actualiza la acción del formulario con la URL modificada
        $('#modifyClientForm').attr('action', newAction);
        // Elimina cualquier manejador de eventos existente del botón "Actualizar"
        $('#updateClientButton').off('click');
        // Agrega un controlador de eventos al botón "Actualizar" en el modal
        $('#updateClientButton').on('click', function() {

            if (!validateModifyCustomerID() || !validateModifyCustomerFullName() || !validateModifyCustomerContact() || !validateModifyCustomerEmail1() ||
                !validateModifyCustomerPhone1() || !validateModifyCustomerAddress1()) {
                e.preventDefault(); // Evita el envío del formulario
            }

            var form = $('#modifyClientForm');

            // Serializa los datos del formulario para enviarlos al servidor
            var formData = form.serialize();

            // Realiza una solicitud AJAX para actualizar el cliente
            $.ajax({
                type: 'POST', // Cambia el método según sea necesario (en tu caso, parece ser POST)
                url: newAction, // Obtiene la URL del atributo 'action' del formulario
                data: formData, // Envía los datos serializados
                dataType: 'json', // Cambia según el tipo de respuesta esperada

                success: function(response) {
                    // Cierra el modal después de una actualización exitosa
                    $('#modifyClientModal').modal('hide');

                    // Actualiza los campos del formulario con los nuevos datos de la actualización si es necesario
                    if (response.data) {
                        // Almacena los datos del cliente en la variable global
                        selectedCustomerData = {
                            customerId: response.data.customerID,
                            customerFullName: response.data.customerFullName,
                            customerContact: response.data.customerContact,
                            customerEmail: response.data.customerEmail1,
                            customerEmail2: response.data.customerEmail2,
                            customerPhone: response.data.customerPhone1,
                            customerPhone2: response.data.customerPhone2,
                            customerAddress1: response.data.customerAddress1,
                            customerAddress2: response.data.customerAddress2,
                            idCustomer: response.data.idCustomer,
                            customertypeID: response.data.customertypeID,
                            customerTaxes: response.data.customerTaxes,
                        };

                        $('#customerID').val(selectedCustomerData.customerId);
                        $('#customerFullName').val(selectedCustomerData.customerFullName);
                        $('#customerContact').val(selectedCustomerData.customerContact);
                        $('#customerEmail1').val(selectedCustomerData.customerEmail);
                        $('#customerEmail2').val(selectedCustomerData.customerEmail2);
                        $('#customerPhone1').val(selectedCustomerData.customerPhone);
                        $('#customerPhone2').val(selectedCustomerData.customerPhone2);
                        $('#customerAddress1').val(selectedCustomerData.customerAddress1);
                        $('#idCustomer').val(selectedCustomerData.idCustomer);
                        $('#customertypeID').val(selectedCustomerData.customertypeID);
                    }
                    // Muestra un mensaje de éxito o realiza otras acciones necesarias
                    toastr.success('Cliente actualizado con éxito');
                },
                error: function(error) {
                    // Procesa errores de la solicitud AJAX y muestra mensajes de error
                    toastr.warning('Error al actualizar el cliente: ' + error.statusText);
                }
            });
        });
    });

    // Manejador de envío del formulario
    $("#callForm").on("submit", function(event) {
        if (!validateCallSubject() || !validateCallComments()) {
            event.preventDefault(); // Evita el envío del formulario
        }
        // Validar la selección de un cliente
        var idCustomer = $("#idCustomer").val();
        if (idCustomer.trim() === "") {
            toastr.warning('Por favor, selecciona un cliente.');
            event.preventDefault(); // Evita el envío del formulario
            return;
        }
    });
});





/* Manejar la respuesta JSON y actualizar el formulario
function handleCreateCustomerResponse(response) {
    // Obtener los datos del nuevo cliente de la respuesta JSON
    var customerData = response.data;

    // Actualizar los campos del formulario con los datos del nuevo cliente
    document.getElementById('createCustomerID').value = customerData.customerID;
    document.getElementById('createCustomerFullName').value = customerData.customerFullName;
    document.getElementById('createCustomerContact').value = customerData.customerContact;
    document.getElementById('createCustomerEmail1').value = customerData.customerEmail1;
    document.getElementById('createCustomerPhone1').value = customerData.customerPhone1;
    document.getElementById('createCustomerAddress1').value = customerData.customerAddress1;

    // Opcional: mostrar un mensaje de éxito o realizar otras acciones necesarias
    alert('Cliente creado exitosamente');
}*/

// Tu código existente aquí...

/* Agrega el código para enviar la solicitud AJAX al controlador de Customers
document.getElementById('createCustomerForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Obtener los datos del formulario
    var formData = new FormData(this);

    // Enviar una solicitud AJAX al controlador de Customers para crear un nuevo cliente
    fetch(createCustomerUrl, {
            method: 'POST',
            body: formData
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(responseJson) {
            // Manejar la respuesta JSON y actualizar el formulario
            handleCreateCustomerResponse(responseJson);
        })
        .catch(function(error) {
            console.error(error);
        });
});*/

/* Escucha el clic en el botón de crear cliente para abrir el modal
$('#createClientButton').on('click', function() {
    // Muestra el modal
    $('#createClientModal').modal('show');

    // Agrega un controlador de eventos al botón "Registrar" en el modal
    $('#registerClientButton').on('click', function() {
        // Obtén los datos del formulario
        var customertypeID = $('#createCustomertypeID').val();
        var customerID = $('#createCustomerID').val();
        var customerTaxes = $('#createCustomerTaxes').is(':checked') ? 1 : 0;
        var customerFullName = $('#createCustomerFullName').val();
        var customerContact = $('#createCustomerContact').val();
        var customerEmail1 = $('#createCustomerEmail1').val();
        var customerEmail2 = $('#createCustomerEmail2').val();
        var customerPhone1 = $('#createCustomerPhone1').val();
        var customerPhone2 = $('#createCustomerPhone2').val();
        var customerAddress1 = $('#createCustomerAddress1').val();
        var customerAddress2 = $('#createCustomerAddress2').val();

        // Crea un objeto con los datos del cliente
        var newCustomerData = {
            customertypeID: customertypeID,
            customerID: customerID,
            customerTaxes: customerTaxes,
            customerFullName: customerFullName,
            customerContact: customerContact,
            customerEmail1: customerEmail1,
            customerEmail2: customerEmail2,
            customerPhone1: customerPhone1,
            customerPhone2: customerPhone2,
            customerAddress1: customerAddress1,
            customerAddress2: customerAddress2,
        };

        // Obtiene la URL base desde el atributo data-url
        var baseUrl = $('#createClientForm').data('url');

        // Envía la petición al servidor para crear el cliente
        $.ajax({
            url: baseUrl,
            type: 'POST',
            data: JSON.stringify(newCustomerData),
            dataType: 'json',
            success: function(response) {
                // Maneja la respuesta del servidor
                if (response.data) {
                    // Almacena los datos del cliente en la variable global
                    selectedCustomerData = {
                        customerId: response.data.customerID,
                        customerFullName: response.data.customerFullName,
                        customerContact: response.data.customerContact,
                        customerEmail: response.data.customerEmail1,
                        customerEmail2: response.data.customerEmail2,
                        customerPhone: response.data.customerPhone1,
                        customerPhone2: response.data.customerPhone2,
                        customerAddress1: response.data.customerAddress1,
                        customerAddress2: response.data.customerAddress2,
                        idCustomer: response.data.idCustomer,
                        customertypeID: response.data.customertypeID,
                        customerTaxes: response.data.customerTaxes,
                    };

                    // Actualiza la tabla de clientes con los nuevos datos
                    $('#customerID').val(selectedCustomerData.customerId);
                    $('#customerFullName').val(selectedCustomerData.customerFullName);
                    $('#customerContact').val(selectedCustomerData.customerContact);
                    $('#customerEmail1').val(selectedCustomerData.customerEmail);
                    $('#customerEmail2').val(selectedCustomerData.customerEmail2);
                    $('#customerPhone1').val(selectedCustomerData.customerPhone);
                    $('#customerPhone2').val(selectedCustomerData.customerPhone2);
                    $('#customerAddress1').val(selectedCustomerData.customerAddress1);
                    $('#idCustomer').val(selectedCustomerData.idCustomer);
                    $('#customertypeID').val(selectedCustomerData.customertypeID);

                    // Muestra un mensaje de éxito o realiza otras acciones necesarias
                    toastr.success('Cliente registrado con éxito');
                } else {
                    // Muestra un mensaje de error o notificación si no se pudo crear el cliente
                    toastr.error('Error al registrar el cliente: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                // Muestra un mensaje de error si ocurre un error en la petición
                toastr.error('Error al registrar el cliente: ' + status);
            }
        });
        // Cierra el modal después de crear el cliente
        $('#createClientModal').modal('hide');
    });
});

/*Actualizar la tabla cuando se hace clic en el botón de buscar
    $('#searchCustomerButton').on('click', function() {
        // Obtener la URL base desde el atributo de datos
        var baseUrl = $(this).data('url');
        console.log('URL base:', baseUrl); // Verifica que la URL sea correcta
        // Realiza una solicitud AJAX para actualizar la tabla
        $.ajax({
            url: baseUrl, // Reemplaza esto con la URL correcta para obtener los usuarios
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (Array.isArray(response.customers)) {
                    // Limpia las filas existentes en lugar de borrar la tabla completa
                    $('#customerTable tbody').empty();
                    var customerData = response.customers.map(function(customer) {
                        return `
                        <tr data-customer-email2="${customer.customerEmail2}" data-customer-phone2="${customer.customerPhone2}" 
                            data-customer-typeid="${customer.customertypeID}" data-customer-id="${customer.idCustomer}"
                            data-customer-taxes="${customer.customerTaxes}" data-customer-address2="${customer.customerAddress2}"
                            data-customer-address1="${customer.customerAddress1}">
                            <td class="text-center">${customer.customerID}</td>
                            <td class="text-center">${customer.customerFullName}</td>
                            <td class="text-center">${customer.customerContact}</td>
                            <td class="text-center">${customer.customerEmail1}</td>
                            <td class="text-center">${customer.customerPhone1}</td>
                        </tr>
                    `;
                    });
                    // Agrega las nuevas filas a la tabla
                    $('#customerTable tbody').append(customerData);
                    // Abre el modal
                    $('#customerSearchModal').modal('show');
                } else {
                    toastr.error('Ha ocurrido un error al mostrar los datos.');
                }
            },
            error: function(xhr, status, error) {
                toastr.error('Ocurrió un error al mostrar los datos: ' + error);
            }
        });
    });*/