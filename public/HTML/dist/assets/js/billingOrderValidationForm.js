$(document).ready(function() {
    // Inicializa DataTables en la tabla
    var table = $('#customerTable').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
    });

    // Inicializa DataTables en la tabla
    var productTable = $('#productTable').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
    });

    // Variable global para almacenar los datos del cliente
    var selectedCustomerData = null;

    // Variable global para almacenar los datos del cliente
    var selectedProductData = null;

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

    // Escucha el clic en una fila de la tabla de clientes
    $('#productTable tbody').off('click').on('click', 'tr', function() {
        // Resalta la fila seleccionada
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            productTable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }

        // Obtén los datos del cliente de la fila seleccionada
        var productCode = $(this).find('.text-center:eq(0)').text();
        var productName = $(this).find('.text-center:eq(1)').text();
        var productBrand = $(this).find('.text-center:eq(2)').text();
        var productModel = $(this).find('.text-center:eq(3)').text();
        var productSerie = $(this).find('.text-center:eq(4)').text();
        var productCategory = $(this).find('.text-center:eq(5)').text();
        var productQuantity = $(this).find('.text-center:eq(6)').text();
        var idProduct = $(this).data('product-id');

        // Almacena los datos del cliente en la variable global
        selectedProductData = {
            productCode: productCode,
            productName: productName,
            productBrand: productBrand,
            productModel: productModel,
            productSerie: productSerie,
            productCategory: productCategory,
            idProduct: idProduct,
            productQuantity: productQuantity,
        };

        $('#confirmProductSelectedButton').off('click').on('click', function() {
            // Verifica si se ha seleccionado un cliente
            if (selectedProductData) {
                // Obtén la referencia de la tabla de productos seleccionados
                var selectedProductTable = $('#selectedProductTable tbody');

                // Verifica si el producto ya está presente en la tabla
                var existingProductRow = selectedProductTable.find('input[name="idProduct"][value="' + selectedProductData.idProduct + '"]').closest('tr');
                if (existingProductRow.length > 0) {
                    // Si el producto ya está en la tabla, muestra un mensaje o realiza alguna acción
                    toastr.warning('Este producto ya está en la lista.');
                } else {
                    // Crea una nueva fila con celdas para cada propiedad del producto
                    var newRow = '<tr>' +
                        '<td class="text-center">' + selectedProductData.productCode + '</td>' +
                        '<td class="text-center">' + selectedProductData.productName + '</td>' +
                        '<td class="text-center">' + selectedProductData.productBrand + '</td>' +
                        '<td class="text-center">' + selectedProductData.productModel + '</td>' +
                        '<td class="text-center">' + selectedProductData.productSerie + '</td>' +
                        '<td class="text-center">' + selectedProductData.productCategory + '</td>' +
                        '<td class="text-center">' + selectedProductData.productQuantity + '</td>' +
                        '<td class="text-center" style="width: 100px;"><input type="number" name="productQuantitySelected" class="form-control" value="1" min="1"></td>' +
                        '<td class="text-center">' +
                        '<div class="custom-control custom-checkbox">' +
                        '<input type="checkbox" class="custom-control-input" id="checkbox' + selectedProductData.idProduct + '" name="installationRequired" value="1" checked>' +
                        '<label class="custom-control-label" for="checkbox' + selectedProductData.idProduct + '">Sí</label>' +
                        '</div>' +
                        '</td>' +
                        '<input type="hidden" name="idProduct" value="' + selectedProductData.idProduct + '">' +
                        '<td class="text-center"><button type="button" class="btn btn-danger btn-sm delete-row" title="Eliminar Producto"><i class="material-icons">delete</i></button></td>' +
                        '</tr>';

                    // Inserta la nueva fila en la tabla de productos seleccionados
                    selectedProductTable.append(newRow);
                    updateProductData();

                    // Agrega el evento blur para capturar el valor después de que el usuario sale del campo
                    selectedProductTable.off('blur').on('blur', 'input[name="productQuantitySelected"]', function() {
                        var productQuantityValue = $(this).val();
                        console.log("productQuantity value:", productQuantityValue);
                        if (productQuantityValue < 1) {
                            toastr.warning('La cantidad del producto no puede ser 0');
                        }
                        // Verifica si la cantidad seleccionada es mayor a la cantidad de productos disponibles
                        if (productQuantityValue > parseInt(selectedProductData.productQuantity)) {
                            toastr.warning('La cantidad seleccionada no puede ser mayor a la cantidad de productos disponibles.');
                        }
                        // Actualiza los datos en el campo oculto
                        updateProductData();
                    });

                    // Agrega el evento change para capturar el cambio en el checkbox
                    selectedProductTable.off('change').on('change', 'input[name="installationRequired"]', function() {
                        // Actualiza los datos en el campo oculto
                        updateProductData();
                    });

                    // Agrega el evento clic para el botón de eliminación
                    selectedProductTable.off('click').on('click', '.delete-row', function() {
                        $(this).closest('tr').remove();
                        updateProductData();
                    });
                }
                /* Agrega el producto a la lista de productos seleccionados
                selectedProductsArray.push(selectedProductData);

                // Almacena los datos de los productos en el campo oculto
                var selectedProductsInput = $('#selectedProductsInput');
                var selectedProductsData = JSON.stringify(selectedProductsArray);
                selectedProductsInput.val(selectedProductsData);*/

                // Cierra el modal después de seleccionar un cliente
                $('#productSearchModal').modal('hide');
            } else {
                // Muestra un mensaje de error o notificación si no se seleccionó un cliente
                toastr.warning('Por favor, seleccione un producto.');
            }
        });
    });

    // Función para actualizar los datos en el campo oculto
    function updateProductData() {
        var productData = [];
        $('#selectedProductTable tbody').find('tr').each(function() {
            var rowData = {
                idProduct: $(this).find('input[name="idProduct"]').val(),
                productQuantitySelected: $(this).find('input[name="productQuantitySelected"]').val(),
                installationRequired: $(this).find('input[name="installationRequired"]').prop('checked') ? 1 : 0,
            };
            productData.push(rowData);
            console.log(productData);
        });
        $('#productData').val(JSON.stringify(productData));
    }

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

    // Botón de Modificación
    $('#modifyClientButton').off('click').on('click', function() {
        // Verifica si hay un cliente seleccionado
        if (!selectedCustomerData) {
            toastr.error('Por favor, seleccione un cliente.');
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

    $('#totalBilling').on('input', function() {
        var totalBilling = parseFloat($(this).val());
        var totalPrice = totalBilling * 0.87; // Asume que el precio total es el 87% del total a facturar
        var taxes = totalBilling * 0.13; // Los impuestos son el 13% del total a facturar

        $('#totalPrice').val(totalPrice.toFixed(2)); // Formatea el precio total a 2 decimales
        $('#taxes').val(taxes.toFixed(2)); // Formatea los impuestos a 2 decimales
    });

    window.onload = function() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;

        document.getElementById('deliveryDate').value = today;
    }

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

    // No. Orden de Compra
    $("#invoiceNumber").on("blur", function() {
        validateInvoiceNumber();
    });

    // Fecha de Entrega
    $("#deliveryDate").on("blur", function() {
        validateDeliveryDate();
    });

    // Total a Facturar
    $("#totalBilling").on("blur", function() {
        validateTotalBilling();
    });

    // Comentarios
    $("#saleComments").on("blur", function() {
        validateSaleComments();
    });

    // Manejador de cambio para el campo "Cantidad de Producto Seleccionada"
    $("#productQuantitySelected").on("blur", function() {
        validateProductQuantitySelected();
    });

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

    // Función que se encarga de validar el No. Orden de Compra
    function validateInvoiceNumber() {
        var invoiceNumber = $("#invoiceNumber").val();
        if (invoiceNumber.trim() === "") {
            $("#invoiceNumber").addClass("is-invalid");
            $("#invoiceNumber-error").show();
            return false;
        } else {
            $("#invoiceNumber").removeClass("is-invalid");
            $("#invoiceNumber-error").hide();
            return true;
        }
    }

    // Función que se encarga de validar el campo "Fecha de Entrega"
    function validateDeliveryDate() {
        var deliveryDate = $("#deliveryDate").val();

        if (deliveryDate.trim() === "") {
            $("#deliveryDate").addClass("is-invalid");
            $("#deliveryDate-error").show();
            return false;
        } else {
            $("#deliveryDate").removeClass("is-invalid");
            $("#deliveryDate-error").hide();
            return true;
        }
    }

    // Función que se encarga de validar el campo "Total a Facturar"
    function validateTotalBilling() {
        var totalBilling = $("#totalBilling").val();
        if (totalBilling.trim() === "" || isNaN(totalBilling)) {
            $("#totalBilling").addClass("is-invalid");
            $("#totalBilling-error").show();
            return false;
        } else {
            $("#totalBilling").removeClass("is-invalid");
            $("#totalBilling-error").hide();
            return true;
        }
    }

    // Función que se encarga de validar el campo "Comentarios"
    function validateSaleComments() {
        var saleComments = $("#saleComments").val();
        if (saleComments.trim() === "") {
            $("#saleComments").addClass("is-invalid");
            $("#saleComments-error").show();
            return false;
        } else {
            $("#saleComments").removeClass("is-invalid");
            $("#saleComments-error").hide();
            return true;
        }
    }

    // Función que se encarga de validar el campo "Cantidad de Producto Seleccionada"
    function validateProductQuantitySelected() {
        var productQuantitySelected = $("#productQuantitySelected").val();
        var maxProductQuantity = parseInt(selectedProductData.productQuantity);
        // Verifica si el campo está vacío o es menor a 1
        if (!productQuantitySelected || parseInt(productQuantitySelected) < 1) {
            toastr.warning('La cantidad del producto no puede ser 0');
            return false;
        }
        // Verifica si la cantidad seleccionada es mayor a la cantidad de productos disponibles
        if (parseInt(productQuantitySelected) > maxProductQuantity) {
            toastr.warning('La cantidad seleccionada no puede ser mayor a la cantidad de productos disponibles.');
            return false;
        }
        return true;
    }

    /* Función que se encarga de validar el campo "Cantidad de Producto Seleccionada"
    function validateProductQuantitySelected() {
        var productQuantitySelected = $(this).val();
        var maxProductQuantity = parseInt(selectedProductData.productQuantity);
        // Verifica si el campo está vacío o es menor a 1
        if (!productQuantitySelected || parseInt(productQuantitySelected) < 1) {
            toastr.warning('La cantidad del producto no puede ser 0');
            return false;
        }
        // Verifica si la cantidad seleccionada es mayor a la cantidad de productos disponibles
        if (parseInt(productQuantitySelected) > maxProductQuantity) {
            toastr.warning('La cantidad seleccionada no puede ser mayor a la cantidad de productos disponibles.');
            return false;
        }
        return true;
    } */

    // Manejador de envío del formulario
    $("#registerBillingOrder").on("submit", function(event) {
        if (!validateInvoiceNumber() || !validateDeliveryDate() || !validateTotalBilling() || !validateSaleComments()) {
            event.preventDefault(); // Evita el envío del formulario
        }
        // Validar la selección de un cliente
        var idCustomer = $("#idCustomer").val();
        if (idCustomer.trim() === "") {
            toastr.warning('Por favor, selecciona un cliente.');
            event.preventDefault(); // Evita el envío del formulario
            return;
        }
        // Validar el array de productos
        var productData = $("#productData").val();
        if (productData.trim() === "") {
            toastr.warning('Por favor, selecciona al menos un producto.');
            event.preventDefault(); // Evita el envío del formulario
            return;
        }
    });
});