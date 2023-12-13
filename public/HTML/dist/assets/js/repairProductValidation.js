$(document).ready(function() {
    // Inicializa DataTables en la tabla
    var table = $('#customerTable').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },
        // Formatea las fechas en el DataTable
        "columnDefs": [{
            "targets": 4, // Indica la columna donde están las fechas
            "render": function(data) {
                return moment(data, "YYYY-MM-DD HH:mm:ss").format("DD/MM/YYYY");
            }
        }]
    });

    // Inicializa DataTables en la tabla
    var productTable = $('#productTable').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
    });

    // Inicializa DataTables en la tabla
    var sparePartsTable = $('#sparePartsTable').DataTable({
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
        var idrepair = $(this).find('.text-center:eq(0)').text();
        var customerId = $(this).find('.text-center:eq(1)').text();
        var customerFullName = $(this).find('.text-center:eq(2)').text();
        var technicianAssigned = $(this).find('.text-center:eq(3)').text();
        var receivingDate = $(this).find('.text-center:eq(4)').text();
        var customerContact = $(this).data('customer-contact');
        var customerEmail = $(this).data('customer-email1');
        var customerPhone = $(this).data('customer-phone1');
        //var customerAddress1 = $(this).find('.text-center:eq(5)').text();
        var idCustomer = $(this).data('customer-id');
        var customerEmail2 = $(this).data('customer-email2');
        var customerPhone2 = $(this).data('customer-phone2');
        var customertypeID = $(this).data('customer-typeid');

        // Almacena los datos del cliente en la variable global
        selectedCustomerData = {
            customerId: customerId,
            customerFullName: customerFullName,
            customerContact: customerContact,
            customerEmail: customerEmail,
            customerPhone: customerPhone,
            receivingDate: receivingDate,
            idCustomer: idCustomer,
            customerEmail2: customerEmail2,
            customerPhone2: customerPhone2,
            customertypeID: customertypeID,
            idrepair: idrepair,
            technicianAssigned: technicianAssigned,
        };

        $('#confirmSelectButton').on('click', function() {
            // Limpia la tabla de productos seleccionados antes de agregar nuevos productos
            $('#idProductSale').val('');
            $('#productCode').val('');
            $('#product').val('');
            $('#brand').val('');
            $('#model').val('');
            $('#productSeries').val('');
            $('#productQuantity').val('');

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
                $('#receivingDate').val(selectedCustomerData.receivingDate);
                $('#idCustomer').val(selectedCustomerData.idCustomer);
                $('#customertypeID').val(selectedCustomerData.customertypeID);
                $('#idrepair').val(selectedCustomerData.idrepair);
                $('#technicianAssigned').val(selectedCustomerData.technicianAssigned);

                // Cierra el modal después de seleccionar un cliente
                $('#clientSearchModal').modal('hide');
            } else {
                // Muestra un mensaje de error o notificación si no se seleccionó un cliente
                toastr.warning('Por favor, seleccione un cliente.');
            }
        });
    });

    $('#searchRepairProductButton').on('click', function() {
        // Verifica si se ha seleccionado un cliente
        if (!selectedCustomerData || !selectedCustomerData.idrepair) {
            toastr.warning('Por favor, seleccione un cliente primero.');
            return; // Detiene la ejecución si no hay cliente seleccionado
        }

        var baseUrl = $('#searchRepairProductButton').data('url');
        var newAction = baseUrl.replace('id', selectedCustomerData.idrepair);
        // Realiza la petición AJAX
        $.ajax({
            url: newAction, // Reemplaza con la ruta al controlador
            method: 'GET',
            dataType: 'json', // Cambia según el tipo de respuesta esperada
            success: function(response) {
                // Muestra la respuesta en la consola
                console.log(response);
                // Abre el modal
                $('#productRepairSearchModal').modal('show');
                // Llena la tabla con los datos del producto
                var tableHtml = '';
                $.each(response, function(index, product) {
                    var productSeries = product.productSeries || 'N/A';
                    tableHtml += '<tr data-product-id="' + product.idProductRepair + '" data-product-damage-report="' + product.productDamageComments + '">';
                    tableHtml += '<td class="text-center">' + product.productName + '</td>';
                    tableHtml += '<td class="text-center">' + product.productBrand + '</td>';
                    tableHtml += '<td class="text-center">' + product.productModel + '</td>';
                    tableHtml += '<td class="text-center">' + productSeries + '</td>';
                    tableHtml += '<td class="text-center">' + product.productQuantity + '</td>';
                    tableHtml += '</tr>';
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
        var productName = $(this).find('.text-center:eq(0)').text();
        var productBrand = $(this).find('.text-center:eq(1)').text();
        var productModel = $(this).find('.text-center:eq(2)').text();
        var productSerie = $(this).find('.text-center:eq(3)').text();
        var productQuantity = $(this).find('.text-center:eq(4)').text();
        var productDamageComments = $(this).data('product-damage-report');
        var idProductRepair = $(this).data('product-id');

        // Almacena los datos del cliente en la variable global
        selectedProductData = {
            idProductRepair: idProductRepair,
            productName: productName,
            productBrand: productBrand,
            productModel: productModel,
            productSerie: productSerie,
            productDamageComments: productDamageComments,
            productQuantity: productQuantity,
        };

        $('#confirmRepairProductSelectedButton').on('click', function() {
            // Verifica si se ha seleccionado un cliente
            if (selectedProductData) {
                // Llena los campos del formulario con los datos del producto seleccionado
                $('#idProductRepair').val(selectedProductData.idProductRepair);
                $('#productDamageComments').val(selectedProductData.productDamageComments);
                $('#product').val(selectedProductData.productName);
                $('#brand').val(selectedProductData.productBrand);
                $('#model').val(selectedProductData.productModel);
                $('#productQuantity').val(selectedProductData.productQuantity);

                // Verifica si el producto tiene serie
                if (selectedProductData.productSerie && selectedProductData.productSerie !== 'N/A') {
                    // Marca automáticamente el checkbox y deshabilita el campo de serie
                    $('#productSerie').prop('checked', true);
                    $('#productSeries').attr('readonly', true);
                } else {
                    // Desmarca el checkbox y habilita el campo de serie
                    $('#productSerie').prop('checked', false);
                    $('#productSeries').attr('readonly', true);
                }

                // Llena el campo de serie con el valor del producto
                $('#productSeries').val(selectedProductData.productSerie);

                // Cierra el modal después de seleccionar un producto
                $('#productRepairSearchModal').modal('hide');
            } else {
                // Muestra un mensaje de error o notificación si no se seleccionó un producto
                toastr.warning('Por favor, seleccione un producto.');
            }
        });
    });

    // Escucha el clic en una fila de la tabla de clientes
    $('#sparePartsTable tbody').off('click').on('click', 'tr', function() {
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
                    var productSeries = selectedProductData.productSerie || 'N/A';
                    var newRow = '<tr>' +
                        '<td class="text-center">' + selectedProductData.productCode + '</td>' +
                        '<td class="text-center">' + selectedProductData.productName + '</td>' +
                        '<td class="text-center">' + selectedProductData.productBrand + '</td>' +
                        '<td class="text-center">' + selectedProductData.productModel + '</td>' +
                        '<td class="text-center">' + productSeries + '</td>' +
                        '<td class="text-center">' + selectedProductData.productCategory + '</td>' +
                        '<td class="text-center">' + selectedProductData.productQuantity + '</td>' +
                        '<td class="text-center" style="width: 100px;"><input type="number" name="productQuantitySelected" class="form-control" value="1" min="1"></td>' +
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

                    // Agrega el evento clic para el botón de eliminación
                    selectedProductTable.off('click').on('click', '.delete-row', function() {
                        $(this).closest('tr').remove();
                        updateProductData();
                    });
                }

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
            };
            productData.push(rowData);
            console.log(productData);
        });
        $('#productData').val(JSON.stringify(productData));
    }

    // Comentarios
    $("#repairDetailsComments").on("blur", function() {
        validateRepairDetailsComments();
    });

    // Función que se encarga de validar el campo "Comentarios"
    function validateRepairDetailsComments() {
        var repairDetailsComments = $("#repairDetailsComments").val();
        if (repairDetailsComments.trim() === "") {
            $("#repairDetailsComments").addClass("is-invalid");
            $("#repairDetailsComments-error").show();
            return false;
        } else {
            $("#repairDetailsComments").removeClass("is-invalid");
            $("#repairDetailsComments-error").hide();
            return true;
        }
    }

    // Manejador de envío del formulario
    $("#createProductRepair").on("submit", function(event) {
        if (!validateRepairDetailsComments()) {
            event.preventDefault(); // Evita el envío del formulario
        }
        // Validar la selección de un cliente
        var idCustomer = $("#idCustomer").val();
        if (idCustomer.trim() === "") {
            toastr.warning('Por favor, selecciona un cliente.');
            event.preventDefault(); // Evita el envío del formulario
            return;
        }
        // Validar la selección de un cliente
        var idProductRepair = $("#idProductRepair").val();
        if (idProductRepair.trim() === "") {
            toastr.warning('Por favor, selecciona el equipo a reparar.');
            event.preventDefault(); // Evita el envío del formulario
            return;
        }
    });
});