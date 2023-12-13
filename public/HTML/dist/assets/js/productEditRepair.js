$(document).ready(function() {
    // Inicializa DataTables en la tabla
    var productTable = $('#productTable').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
    });

    // Variable global para almacenar los datos del cliente
    var selectedProductData = null;

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
        validaterepairDetailsComments();
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
    });
});