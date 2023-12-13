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

    $('#searchProductButton').on('click', function() {
        var baseUrl = $('#searchProductButton').data('url');
        var repairOrderId = $(this).data('id');
        var newAction = baseUrl.replace('id', repairOrderId);
        // Realiza la petición AJAX
        $.ajax({
            url: newAction, // Reemplaza con la ruta al controlador
            method: 'GET',
            dataType: 'json', // Cambia según el tipo de respuesta esperada
            success: function(response) {
                // Muestra la respuesta en la consola
                console.log(response);
                // Abre el modal
                $('#productSearchModal').modal('show');
                // Llena la tabla con los datos del producto
                var tableHtml = '';
                $.each(response, function(index, billingOrder) {
                    $.each(billingOrder.product_sale, function(index, productSale) {
                        var product = productSale.products;
                        var productSeries = product.productSeries || 'N/A';
                        tableHtml += '<tr data-product-id="' + productSale.idproduct + '">';
                        tableHtml += '<td class="text-center">' + billingOrder.idbillingOrder + '</td>';
                        tableHtml += '<td class="text-center">' + product.productCode + '</td>';
                        tableHtml += '<td class="text-center">' + product.productName + '</td>';
                        tableHtml += '<td class="text-center">' + product.brands.brandName + '</td>';
                        tableHtml += '<td class="text-center">' + product.models.modelName + '</td>';
                        tableHtml += '<td class="text-center">' + productSeries + '</td>';
                        tableHtml += '<td class="text-center">' + product.productCategory + '</td>';
                        tableHtml += '<td class="text-center">' + productSale.productQuantity + '</td>';
                        // Accede a productCode
                        // Agrega las demás columnas de la tabla
                        tableHtml += '</tr>';
                    });
                });
                $('#productTable tbody').html(tableHtml);
            },
            error: function(response) {
                toastr.warning('Error al obtener los productos.');
            }
        });
    });

    /// Escucha el clic en una fila de la tabla de clientes
    $('#productTable tbody').off('click').on('click', 'tr', function() {
        // Resalta la fila seleccionada
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            productTable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }

        // Obtén los datos del cliente de la fila seleccionada
        var productCode = $(this).find('.text-center:eq(1)').text();
        var productName = $(this).find('.text-center:eq(2)').text();
        var productBrand = $(this).find('.text-center:eq(3)').text();
        var productModel = $(this).find('.text-center:eq(4)').text();
        var productSerie = $(this).find('.text-center:eq(5)').text();
        var productQuantity = $(this).find('.text-center:eq(7)').text();
        var idProduct = $(this).data('product-id');

        // Almacena los datos del cliente en la variable global
        selectedProductData = {
            productName: productName,
            productBrand: productBrand,
            productModel: productModel,
            productSerie: productSerie,
            idProduct: idProduct,
            productQuantity: productQuantity,
        };

        $('#confirmProductSelectedButton').on('click', function() {
            // Verifica si se ha seleccionado un cliente
            if (selectedProductData) {
                // Llena los campos del formulario con los datos del producto seleccionado
                $('#product').val(selectedProductData.productName);
                $('#brand').val(selectedProductData.productBrand);
                $('#model').val(selectedProductData.productModel);
                $('#productQuantity').val(selectedProductData.productQuantity);

                // Verifica si el producto tiene serie
                if (selectedProductData.productSerie && selectedProductData.productSerie !== 'N/A') {
                    // Marca automáticamente el checkbox y deshabilita el campo de serie
                    $('#productSerie').prop('checked', true);
                    $('#productSeries').removeAttr('readonly');
                } else {
                    // Desmarca el checkbox y habilita el campo de serie
                    $('#productSerie').prop('checked', false);
                    $('#productSeries').attr('readonly', true);
                }

                // Llena el campo de serie con el valor del producto
                $('#productSeries').val(selectedProductData.productSerie);

                // Agrega el evento blur para validar la cantidad a reparar
                $('#productRepairQuantity').on('blur', function() {
                    var productRepairQuantity = parseInt($('#productRepairQuantity').val());
                    var availableQuantity = parseInt(selectedProductData.productQuantity);
                    if (isNaN(productRepairQuantity) || productRepairQuantity < 1) {
                        toastr.warning('La cantidad a reparar debe ser al menos 1.');
                    }
                    if (productRepairQuantity > availableQuantity) {
                        toastr.warning('La cantidad a reparar no puede ser mayor a la cantidad disponible del cliente.');
                    }
                });

                // Cierra el modal después de seleccionar un producto
                $('#productSearchModal').modal('hide');
            } else {
                // Muestra un mensaje de error o notificación si no se seleccionó un producto
                toastr.warning('Por favor, seleccione un producto.');
            }
        });
    });

    $('#addProduct').on('click', function() {
        // Obtén los valores del formulario
        var productName = $('#product').val();
        var productBrand = $('#brand').val();
        var productModel = $('#model').val();
        var productSerie = $('#productSeries').val();
        var productRepairQuantity = $('#productRepairQuantity').val();
        var damageProductReport = $('#damageProductReport').val();

        // Valida que los campos obligatorios no estén vacíos
        if (productName && productBrand && productModel && productQuantity && damageProductReport) {
            // Crea una nueva fila con los datos del producto
            var newRow = '<tr>' +
                '<td class="text-center">' + productName + '</td>' +
                '<td class="text-center">' + productBrand + '</td>' +
                '<td class="text-center">' + productModel + '</td>' +
                '<td class="text-center">' + productSerie + '</td>' +
                '<td class="text-center">' + productRepairQuantity + '</td>' +
                '<td class="text-center">' + damageProductReport + '</td>' +
                '<td class="text-center"><button type="button" class="btn btn-danger btn-sm delete-row" title="Eliminar Producto"><i class="material-icons">delete</i></button></td>' +
                '</tr>';

            // Inserta la nueva fila en la tabla de productos seleccionados
            $('#selectedProductTable tbody').append(newRow);
            // Actualiza los datos en el campo oculto (si es necesario)
            updateSelectedProductData();

            // Limpia los campos del formulario después de agregar el producto
            $('#product').val('');
            $('#brand').val('');
            $('#model').val('');
            $('#productSeries').val('');
            $('#productQuantity').val('1');
            $('#damageProductReport').val('');

        } else {
            // Muestra un mensaje de error si los campos obligatorios están vacíos
            toastr.warning('Por favor, completa todos los campos obligatorios.');
        }
    });

    // Agrega el evento clic para el botón de eliminación en la tabla de productos seleccionados
    $('#selectedProductTable').on('click', '.delete-row', function() {
        $(this).closest('tr').remove();
        // Actualiza los datos en el campo oculto (si es necesario)
        updateSelectedProductData();
    });

    /* Función para actualizar los datos en el campo oculto
    function updateProductData() {
        var productData = [];
        $('#selectedProductTable tbody').find('tr').each(function() {
            var rowData = {
                productName: $(this).find('.text-center:eq(0)').text(),
                productBrand: $(this).find('.text-center:eq(1)').text(),
                productModel: $(this).find('.text-center:eq(2)').text(),
                productSerie: $(this).find('.text-center:eq(3)').text(),
                productQuantity: $(this).find('.text-center:eq(4)').text(),
                damageProductReport: $(this).find('.text-center:eq(5)').text(),
            };
            productData.push(rowData);
            console.log(productData);
        });
        $('#productData').val(JSON.stringify(productData));
    }*/

    // Función para actualizar los datos en el campo oculto
    function updateSelectedProductData() {
        var productData = [];
        $('#selectedProductTable tbody').find('tr').each(function() {
            var rowData = {
                productName: $(this).find('.text-center:eq(0)').text(),
                productBrand: $(this).find('.text-center:eq(1)').text(),
                productModel: $(this).find('.text-center:eq(2)').text(),
                productSerie: $(this).find('.text-center:eq(3)').text(),
                productQuantity: $(this).find('.text-center:eq(4)').text(),
                damageProductReport: $(this).find('.text-center:eq(5)').text(),
                idProductRepair: $(this).find('input[name="idProduct"]').val(),
            };
            productData.push(rowData);
            console.log(productData);
        });
        $('#productData').val(JSON.stringify(productData));
    }

    function populateSelectedProductsTable(selectedProducts) {
        // Obtén una referencia a la tabla de productos seleccionados
        var selectedProductTable = $('#selectedProductTable tbody');

        // Limpia la tabla
        selectedProductTable.empty();

        // Array para almacenar los datos de los productos seleccionados
        var productDataArray = [];

        // Para cada producto seleccionado, crea una nueva fila en la tabla
        selectedProducts.forEach(function(product) {
            // Accede a los detalles del producto a través de la relación cargada
            //var productDetails = product.products;
            //var productSeries = productDetails.productSeries || 'N/A';
            var newRow = '<tr>' +
                '<td class="text-center">' + product.productName + '</td>' +
                '<td class="text-center">' + product.productBrand + '</td>' +
                '<td class="text-center">' + product.productModel + '</td>' +
                '<td class="text-center">' + product.productSeries + '</td>' +
                '<td class="text-center">' + product.productQuantity + '</td>' +
                '<td class="text-center">' + product.productDamageComments + '</td>' +
                '<input type="hidden" name="idProduct" value="' + product.idProductRepair + '">' +
                '<td class="text-center"><button type="button" class="btn btn-danger btn-sm delete-row" title="Eliminar Producto"><i class="material-icons">delete</i></button></td>' +
                '</tr>';

            // Inserta la nueva fila en la tabla de productos seleccionados
            selectedProductTable.append(newRow);
            updateSelectedProductData();

            // Agrega los datos del producto al array
            productDataArray.push({
                productName: product.productName,
                productBrand: product.productBrand,
                productModel: product.productModel,
                productSerie: product.productSeries,
                productQuantity: product.productName,
                productDamageComments: product.productDamageComments,
                idProductRepair: product.idProductRepair,
            });

            // Agrega el evento clic para el botón de eliminación
            selectedProductTable.off('click').on('click', '.delete-row', function() {
                $(this).closest('tr').remove();
                updateSelectedProductData();
            });
        });
        // Actualiza el campo oculto con los datos de los productos seleccionados
        $('#productData').val(JSON.stringify(productDataArray));
    }

    // Llama a la función para llenar la tabla con los productos seleccionados
    populateSelectedProductsTable(selectedProducts);

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

    // Fecha de Entrega
    $("#receivingDate").on("blur", function() {
        validateReceivingDate();
    });

    // Comentarios
    $("#damageProductReport").on("blur", function() {
        validateDamageProductReport();
    });

    // Comentarios
    $("#repairComments").on("blur", function() {
        validateRepairComments();
    });

    // Manejador de entrada para el campo de segundo apellido
    $("#product").on("blur", function() {
        validateProduct();
    });

    // Manejador de cambio para el campo de selección de la marca
    $("#brand").on("blur", function() {
        validateBrand();
    });

    $("#model").on("blur", function() {
        validateModel();
    });

    // Manejador de cambio para el checkbox de producto con seriales
    $("#productSerie").on("change", function() {
        // Habilita o deshabilita el campo de serie del producto dependiendo del estado del checkbox
        $("#productSeries").prop("readonly", !$(this).prop("checked"));
        // Limpia el campo de productSeries si el checkbox está desmarcado
        if (!$(this).prop("checked")) {
            $("#productSeries").val("");
        }
        // Realiza la validación después de limpiar el campo
        validateProductSeries();
    });

    // Manejador de entrada para el campo de serie del producto
    $("#productSeries").on("blur", function() {
        validateProductSeries();
    });

    $("input[name='repairOrigin']").on("change", function() {
        validateRepairOrigin();
    });

    $("input[name='repairType']").on("change", function() {
        validateRepairType();
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

    // Función que se encarga de validar el campo "Fecha de Entrega"
    function validateReceivingDate() {
        var receivingDate = $("#receivingDate").val();
        if (receivingDate.trim() === "") {
            $("#receivingDate").addClass("is-invalid");
            $("#receivingDate-error").show();
            return false;
        } else {
            $("#receivingDate").removeClass("is-invalid");
            $("#receivingDate-error").hide();
            return true;
        }
    }

    // Función que se encarga de validar el campo "Comentarios"
    function validateDamageProductReport() {
        var damageProductReport = $("#damageProductReport").val();
        if (damageProductReport.trim() === "") {
            $("#damageProductReport").addClass("is-invalid");
            $("#damageProductReport-error").show();
            return false;
        } else {
            $("#damageProductReport").removeClass("is-invalid");
            $("#damageProductReport-error").hide();
            return true;
        }
    }

    // Función que se encarga de validar el campo "Comentarios"
    function validateRepairComments() {
        var repairComments = $("#repairComments").val();
        if (repairComments.trim() === "") {
            $("#repairComments").addClass("is-invalid");
            $("#repairComments-error").show();
            return false;
        } else {
            $("#repairComments").removeClass("is-invalid");
            $("#repairComments-error").hide();
            return true;
        }
    }

    // Validación de segundo apellido
    function validateProduct() {
        var product = $("#product").val();
        var productPattern = /^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+$/;
        if (!productPattern.test(product) || product.trim() === "") {
            $("#product").addClass("is-invalid");
            $("#product-error").show();
            return false;
        } else {
            $("#product").removeClass("is-invalid");
            $("#product-error").hide();
            return true;
        }
    }

    // Validación de la marca del producto
    function validateBrand() {
        var brand = $("#brand").val();
        if (brand === "") {
            $("#brand").addClass("is-invalid");
            $("#brand-error").show();
            return false;
        } else {
            $("#brand").removeClass("is-invalid");
            $("#brand-error").hide();
            return true;
        }
    }

    //Validación del modelo del producto
    function validateModel() {
        var model = $("#model").val();
        if (model === "") {
            $("#model").addClass("is-invalid");
            $("#model-error").show();
            return false;
        } else {
            $("#model").removeClass("is-invalid");
            $("#model-error").hide();
            return true;
        }
    }

    // Validación de la serie del producto
    function validateProductSeries() {
        var productSerie = $("#productSerie").prop("checked");
        var productSeries = $("#productSeries").val();
        if (productSerie && (productSeries.trim() === "")) {
            $("#productSeries").addClass("is-invalid");
            $("#productSeries-error").show();
            return false;
        } else {
            $("#productSeries").removeClass("is-invalid");
            $("#productSeries-error").hide();
            return true;
        }
    }

    // Función que se encarga de validar el campo "Asunto"
    function validateRepairOrigin() {
        var selectedRepairOrigin = $("input[name='repairOrigin']:checked").val();

        if (!selectedRepairOrigin) {
            $("input[name='repairOrigin']").addClass("is-invalid");
            $("#repairOrigin-error").show();
            return false;
        } else {
            $("input[name='repairOrigin']").removeClass("is-invalid");
            $("#repairOrigin-error").hide();
            return true;
        }
    }

    // Función que se encarga de validar el campo "Asunto"
    function validateRepairType() {
        var selectedRepairType = $("input[name='repairType']:checked").val();

        if (!selectedRepairType) {
            $("input[name='repairType']").addClass("is-invalid");
            $("#repairType-error").show();
            return false;
        } else {
            $("input[name='repairType']").removeClass("is-invalid");
            $("#repairType-error").hide();
            return true;
        }
    }

    // Manejador de envío del formulario
    $("#modifyRepairOrder").on("submit", function(event) {
        if (!validateReceivingDate() || !validateRepairComments() || !validateRepairOrigin() || !validateRepairType()) {
            event.preventDefault(); // Evita el envío del formulario
        }
        // Validar la selección de un cliente
        var idCustomer = $("#idCustomer").val();
        if (idCustomer.trim() === "") {
            toastr.warning('Por favor, selecciona un cliente.');
            event.preventDefault(); // Evita el envío del formulario
            return;
        }

        // Validar si la tabla de productos seleccionados tiene al menos una fila
        var rowCount = $("#selectedProductTable tbody tr").length;
        if (rowCount === 0) {
            toastr.warning('Asegúrate de selecccionar los equipos a reparar antes de continuar.');
            event.preventDefault(); // Evita el envío del formulario
            return;
        }
        // Validar el array de productos
        var productData = $("#productData").val();
        if (productData.trim() === "") {
            toastr.warning('Por favor, selecciona al menos un equipo a reparar.');
            event.preventDefault(); // Evita el envío del formulario
            return;
        }
    });
});