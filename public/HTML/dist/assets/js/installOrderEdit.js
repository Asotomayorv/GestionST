$(document).ready(function() {
    // Inicializa DataTables en la tabla
    var table = $('#routesTable').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },
        // Formatea las fechas en el DataTable
        "columnDefs": [{
            "targets": 2, // Indica la columna donde están las fechas
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
    var provinceName = $('#province').data('id');
    var cantonName = $('#canton').data('id');
    var districtName = $('#district').data('id');

    $.ajax({
        dataType: "json",
        url: "https://ubicaciones.paginasweb.cr/provincias.json",
        data: {},
        success: function(data) {
            var html = "<select>";
            for (key in data) {
                html += "<option value='" + key + "'>" + data[key] + "</option>";
            }
            html += "</select>";
            $('#province').html(html);
            // Establecer el valor de la provincia seleccionada en el formulario
            $('#province').val(provinceName);
            // Llamar a la función para cargar los cantones de la primera provincia al cargar la página
            loadCantonesOfSelectedProvince(provinceName);
        }
    });

    function loadCantonesOfSelectedProvince(province) {
        var url = "https://ubicaciones.paginasweb.cr/provincia/" + province + "/cantones.json"; // Construir la URL para obtener los cantones

        // Realizar la petición Ajax para obtener los cantones
        $.ajax({
            dataType: "json",
            url: url,
            data: {},
            success: function(data) {
                var html = "";
                for (key in data) {
                    html += "<option value='" + key + "'>" + data[key] + "</option>";
                }
                $('#canton').html(html); // Actualizar el campo de selección de cantones con los datos obtenidos
                // Establecer el valor de la provincia seleccionada en el formulario
                $('#canton').val(cantonName);
                loadDistritosOfSelectedCanton(provinceName, cantonName);
            }
        });
    }

    function loadDistritosOfSelectedCanton(province, canton) {
        var url = "https://ubicaciones.paginasweb.cr/provincia/" + province + "/canton/" + canton + "/distritos.json"; // Construir la URL para obtener los distritos

        // Realizar la petición Ajax para obtener los distritos
        $.ajax({
            dataType: "json",
            url: url,
            data: {},
            success: function(data) {
                var html = "";
                for (key in data) {
                    html += "<option value='" + key + "'>" + data[key] + "</option>";
                }
                $('#district').html(html); // Actualizar el campo de selección de distritos con los datos obtenidos
                // Establecer el valor del distrito seleccionado en el formulario
                $('#district').val(districtName);
            }
        });
    }

    $('#searchProductButton').on('click', function() {
        var baseUrl = $('#searchProductButton').data('url');
        var installOrderId = $(this).data('id');
        var newAction = baseUrl.replace('id', installOrderId);
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
        var productCode = $(this).find('.text-center:eq(1)').text();
        var productName = $(this).find('.text-center:eq(2)').text();
        var productBrand = $(this).find('.text-center:eq(3)').text();
        var productModel = $(this).find('.text-center:eq(4)').text();
        var productSerie = $(this).find('.text-center:eq(5)').text();
        var productCategory = $(this).find('.text-center:eq(6)').text();
        var productQuantity = $(this).find('.text-center:eq(7)').text();
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
                        '<td class="text-center product-quantity-cell">' + selectedProductData.productQuantity + '</td>' +
                        '<input type="hidden" name="idProduct" value="' + selectedProductData.idProduct + '">' +
                        '<td class="text-center"><button type="button" class="btn btn-danger btn-sm delete-row" title="Eliminar Producto"><i class="material-icons">delete</i></button></td>' +
                        '</tr>';

                    // Inserta la nueva fila en la tabla de productos seleccionados
                    selectedProductTable.append(newRow);
                    updateProductData();

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
            var productDetails = product.products;
            var productSeries = productDetails.productSeries || 'N/A';
            var newRow = '<tr>' +
                '<td class="text-center">' + productDetails.productCode + '</td>' +
                '<td class="text-center">' + productDetails.productName + '</td>' +
                '<td class="text-center">' + productDetails.brands.brandName + '</td>' +
                '<td class="text-center">' + productDetails.models.modelName + '</td>' +
                '<td class="text-center">' + productSeries + '</td>' +
                '<td class="text-center">' + productDetails.productCategory + '</td>' +
                '<td class="text-center product-quantity-cell">' + product.productQuantity + '</td>' +
                '<input type="hidden" name="idProduct" value="' + product.idproduct + '">' +
                '<td class="text-center"><button type="button" class="btn btn-danger btn-sm delete-row" title="Eliminar Producto"><i class="material-icons">delete</i></button></td>' +
                '</tr>';

            // Inserta la nueva fila en la tabla de productos seleccionados
            selectedProductTable.append(newRow);
            updateSelectedProductData();

            // Agrega los datos del producto al array
            productDataArray.push({
                idProduct: product.idproduct,
                productQuantitySelected: product.productQuantity,
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

    // Función para actualizar los datos en el campo oculto
    function updateProductData() {
        var productData = [];
        $('#selectedProductTable tbody').find('tr').each(function() {
            var rowData = {
                idProduct: $(this).find('input[name="idProduct"]').val(),
                productQuantitySelected: $(this).find('.product-quantity-cell').text(), // Selecciona la celda por su clase
            };
            productData.push(rowData);
            console.log(productData);
        });
        $('#productData').val(JSON.stringify(productData));
    }

    // Función para actualizar el campo oculto con los datos de los productos seleccionados
    function updateSelectedProductData() {
        var productDataArray = [];
        // Recorre las filas de la tabla y actualiza el array de datos
        $('#selectedProductTable tbody tr').each(function() {
            var rowData = {
                idProduct: $(this).find('input[name="idProduct"]').val(),
                productQuantitySelected: $(this).find('.product-quantity-cell').text(), // Selecciona la celda por su clase
            };
            productDataArray.push(rowData);
            console.log(productDataArray);
        });
        // Actualiza el campo oculto con los datos de los productos seleccionados
        $('#productData').val(JSON.stringify(productDataArray));
    }

    // Evento que se dispara al cambiar las horas de traslado o las horas estimadas de trabajo
    $('#installationTravelHours, #installationEstimateHours').on('change', function() {
        // Obtener los valores de las horas de traslado y las horas estimadas de trabajo
        var travelHours = $('#installationTravelHours').val();
        var estimateHours = $('#installationEstimateHours').val();

        // Calcular la suma total en minutos
        var totalMinutes = convertToMinutes(travelHours) + convertToMinutes(estimateHours);

        // Convertir la suma total de minutos a formato HH:mm
        var totalHoursFormatted = convertToTimeFormat(totalMinutes);

        // Mostrar la suma total en el campo installationTotalHours
        $('#installationTotalHours').val(totalHoursFormatted);
    });

    // Función para convertir horas en formato HH:mm a minutos
    function convertToMinutes(timeString) {
        var parts = timeString.split(':');
        return parseInt(parts[0]) * 60 + parseInt(parts[1]);
    }

    // Función para convertir minutos a formato HH:mm
    function convertToTimeFormat(totalMinutes) {
        var hours = Math.floor(totalMinutes / 60);
        var minutes = totalMinutes % 60;

        // Formatear las horas y minutos a dos dígitos
        var formattedHours = hours.toString().padStart(2, '0');
        var formattedMinutes = minutes.toString().padStart(2, '0');

        return formattedHours + ':' + formattedMinutes;
    }

    // Horas de Traslado
    $("#installationTravelHours").on("blur", function() {
        validateInstallationTravelHours();
    });

    // Horas Estimadas de Trabajo
    $("#installationEstimateHours").on("blur", function() {
        validateInstallationEstimateHours();
    });

    // Observaciones de la Instalación
    $("#installationComments").on("blur", function() {
        validateInstallationComments();
    });

    // Detalles de Instalación
    $("input[name='installationDetails[]']").on("change", function() {
        validateInstallationDetails();
    });

    // Función que se encarga de validar "Horas de Traslado"
    function validateInstallationTravelHours() {
        var installationTravelHours = $("#installationTravelHours").val();
        return validateTimeField(installationTravelHours, "installationTravelHours");
    }

    // Función que se encarga de validar "Horas Estimadas de Trabajo"
    function validateInstallationEstimateHours() {
        var installationEstimateHours = $("#installationEstimateHours").val();
        return validateTimeField(installationEstimateHours, "installationEstimateHours");
    }

    // Función que se encarga de validar "Observaciones de la Instalación"
    function validateInstallationComments() {
        var installationComments = $("#installationComments").val();
        return validateTextField(installationComments, "installationComments");
    }

    // Función que se encarga de validar "Detalles de Instalación"
    function validateInstallationDetails() {
        var selectedDetails = $("input[name='installationDetails[]']:checked").length;
        if (selectedDetails === 0) {
            $("#installationDetails-error").show();
            return false;
        } else {
            $("#installationDetails-error").hide();
            return true;
        }
    }

    // Función común para validar campos de texto
    function validateTextField(value, fieldId) {
        if (value.trim() === "") {
            $("#" + fieldId).addClass("is-invalid");
            $("#" + fieldId + "-error").show();
            return false;
        } else {
            $("#" + fieldId).removeClass("is-invalid");
            $("#" + fieldId + "-error").hide();
            return true;
        }
    }

    // Función común para validar campos de tiempo
    function validateTimeField(value, fieldId) {
        if (value.trim() === "") {
            $("#" + fieldId).addClass("is-invalid");
            $("#" + fieldId + "-error").show();
            return false;
        } else {
            $("#" + fieldId).removeClass("is-invalid");
            $("#" + fieldId + "-error").hide();
            return true;
        }
    }

    // Manejador de envío del formulario
    $("#modifyInstallOrder").on("submit", function(event) {
        if (!validateInstallationTravelHours() || !validateInstallationEstimateHours() || !validateInstallationComments() ||
            !validateInstallationDetails()) {
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
            toastr.warning('Asegúrate de selecccionar los equipos a instalar antes de continuar.');
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