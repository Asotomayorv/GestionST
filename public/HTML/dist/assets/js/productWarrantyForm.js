$(document).ready(function() {
    // Inicializa DataTables en la tabla
    var table = $('#customerTable').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },
        // Formatea las fechas en el DataTable
        "columnDefs": [{
            "targets": 5, // Indica la columna donde están las fechas
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
        var billingOrder = $(this).find('.text-center:eq(0)').text();
        var invoiceNumber = $(this).find('.text-center:eq(1)').text();
        var customerId = $(this).find('.text-center:eq(2)').text();
        var customerFullName = $(this).find('.text-center:eq(3)').text();
        var seller = $(this).find('.text-center:eq(4)').text();
        var deliveryDate = $(this).find('.text-center:eq(5)').text();
        var customerContact = $(this).data('customer-contact');
        var customerEmail = $(this).data('customer-email1');
        var customerPhone = $(this).data('customer-phone1');
        //var customerAddress1 = $(this).find('.text-center:eq(5)').text();
        var idCustomer = $(this).data('customer-id');
        var customerEmail2 = $(this).data('customer-email2');
        var customerPhone2 = $(this).data('customer-phone2');
        var customertypeID = $(this).data('customer-typeid');
        var customertypeID = $(this).data('customer-typeid');
        var creationDate = $(this).data('billingorder-date');

        // Almacena los datos del cliente en la variable global
        selectedCustomerData = {
            customerId: customerId,
            customerFullName: customerFullName,
            customerContact: customerContact,
            customerEmail: customerEmail,
            customerPhone: customerPhone,
            billingOrder: billingOrder,
            idCustomer: idCustomer,
            customerEmail2: customerEmail2,
            customerPhone2: customerPhone2,
            customertypeID: customertypeID,
            invoiceNumber: invoiceNumber,
            seller: seller,
            deliveryDate: deliveryDate,
            creationDate: creationDate,
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
                $('#billingOrder').val(selectedCustomerData.billingOrder);
                $('#idCustomer').val(selectedCustomerData.idCustomer);
                $('#customertypeID').val(selectedCustomerData.customertypeID);
                $('#invoiceNumber').val(selectedCustomerData.invoiceNumber);
                $('#seller').val(selectedCustomerData.seller);
                $('#deliveryDate').val(selectedCustomerData.deliveryDate);
                // Obtén la fecha de creación en formato de cadena
                var creationDateString = selectedCustomerData.creationDate;

                // Crea un objeto Date a partir de la cadena
                var creationDate = new Date(creationDateString);

                // Formatea la fecha en el formato "yyyy-MM-dd"
                var formattedDate = creationDate.getFullYear() + '-' +
                    ('0' + (creationDate.getMonth() + 1)).slice(-2) + '-' +
                    ('0' + creationDate.getDate()).slice(-2);

                // Asigna la fecha formateada al campo de fecha
                $('#dateCreation').val(formattedDate);

                // Cierra el modal después de seleccionar un cliente
                $('#clientSearchModal').modal('hide');
            } else {
                // Muestra un mensaje de error o notificación si no se seleccionó un cliente
                toastr.warning('Por favor, seleccione un cliente.');
            }
        });
    });

    $('#searchProductButton').on('click', function() {
        // Verifica si se ha seleccionado un cliente
        if (!selectedCustomerData || !selectedCustomerData.billingOrder) {
            toastr.warning('Por favor, seleccione un cliente primero.');
            return; // Detiene la ejecución si no hay cliente seleccionado
        }

        var baseUrl = $('#searchProductButton').data('url');
        var newAction = baseUrl.replace('id', selectedCustomerData.billingOrder);
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
                $.each(response, function(index, productSale) {
                    var product = productSale.products;
                    var productSeries = product.productSeries || 'N/A';
                    tableHtml += '<tr data-product-id="' + productSale.idProductSale + '">';
                    tableHtml += '<td class="text-center">' + productSale.idbillingOrder + '</td>';
                    tableHtml += '<td class="text-center">' + product.productCode + '</td>';
                    tableHtml += '<td class="text-center">' + product.productName + '</td>';
                    tableHtml += '<td class="text-center">' + product.brands.brandName + '</td>';
                    tableHtml += '<td class="text-center">' + product.models.modelName + '</td>';
                    tableHtml += '<td class="text-center">' + productSeries + '</td>';
                    tableHtml += '<td class="text-center">' + product.productCategory + '</td>';
                    tableHtml += '<td class="text-center">' + productSale.productQuantity + '</td>';
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
        var productCode = $(this).find('.text-center:eq(1)').text();
        var productName = $(this).find('.text-center:eq(2)').text();
        var productBrand = $(this).find('.text-center:eq(3)').text();
        var productModel = $(this).find('.text-center:eq(4)').text();
        var productSerie = $(this).find('.text-center:eq(5)').text();
        var productQuantity = $(this).find('.text-center:eq(7)').text();
        var idProductSale = $(this).data('product-id');

        // Almacena los datos del cliente en la variable global
        selectedProductData = {
            productCode: productCode,
            productName: productName,
            productBrand: productBrand,
            productModel: productModel,
            productSerie: productSerie,
            idProductSale: idProductSale,
            productQuantity: productQuantity,
        };

        $('#confirmProductSelectedButton').on('click', function() {
            // Verifica si se ha seleccionado un cliente
            if (selectedProductData) {
                // Llena los campos del formulario con los datos del producto seleccionado
                $('#idProductSale').val(selectedProductData.idProductSale);
                $('#productCode').val(selectedProductData.productCode);
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
                $('#productSearchModal').modal('hide');
            } else {
                // Muestra un mensaje de error o notificación si no se seleccionó un producto
                toastr.warning('Por favor, seleccione un producto.');
            }
        });
    });

    // Comentarios
    $("#technicianComments").on("blur", function() {
        validateTechnicianComments();
    });

    // Comentarios
    $("#totalWarranty").on("blur", function() {
        validateTotalWarranty();
    });

    // Validación de la dirección
    function validateProduct() {
        var productCode = $("#productCode").val();
        var product = $("#product").val();
        var brand = $("#brand").val();
        var model = $("#model").val();
        var productQuantity = $("#productQuantity").val();
        var productSeries = $("#productSeries").val();
        if (productCode.trim() === "" && product.trim() === "" && brand.trim() === "" && model.trim() === "" &&
            productQuantity.trim() === "" && productSeries.trim() === "") {
            return false;
        } else {
            return true;
        }
    }

    // Función que se encarga de validar el campo "Comentarios"
    function validateTechnicianComments() {
        var technicianComments = $("#technicianComments").val();
        if (technicianComments.trim() === "") {
            $("#technicianComments").addClass("is-invalid");
            $("#technicianComments-error").show();
            return false;
        } else {
            $("#technicianComments").removeClass("is-invalid");
            $("#technicianComments-error").hide();
            return true;
        }
    }

    // Función que se encarga de validar el campo "Comentarios"
    function validateTotalWarranty() {
        var totalWarranty = $("#totalWarranty").val();
        if (totalWarranty.trim() === "") {
            $("#totalWarranty").addClass("is-invalid");
            $("#totalWarranty-error").show();
            return false;
        } else {
            $("#totalWarranty").removeClass("is-invalid");
            $("#totalWarranty-error").hide();
            return true;
        }
    }

    // Manejador de envío del formulario
    $("#registerProductWarranty").on("submit", function(event) {
        if (!validateProduct() || !validateTotalWarranty() || !validateTechnicianComments()) {
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
        var idProductSale = $("#idProductSale").val();
        if (idProductSale.trim() === "") {
            toastr.warning('Por favor, selecciona al menos un producto.');
            event.preventDefault(); // Evita el envío del formulario
            return;
        }
    });

    $(document).ready(function() {
        // Verificar si hay datos en el campo de series
        var productSeries = $("#productSeries").val();

        // Si hay datos en el campo de series, marcar el checkbox
        if (productSeries.trim() !== "") {
            $("#productSerie").prop("checked", true);
        }
    });

    // Manejador de envío del formulario
    $("#modifyProductWarranty").on("submit", function(event) {
        if (!validateProduct() || !validateTotalWarranty() || !validateTechnicianComments()) {
            event.preventDefault(); // Evita el envío del formulario
        }
    });
});