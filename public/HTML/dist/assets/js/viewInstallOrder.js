$(document).ready(function() {
    function populateSelectedProductsTable(selectedProducts) {
        // Obtén una referencia a la tabla de productos seleccionados
        var selectedProductTable = $('#selectedProductTable tbody');

        // Limpia la tabla
        selectedProductTable.empty();

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
                '</tr>';

            // Inserta la nueva fila en la tabla de productos seleccionados
            selectedProductTable.append(newRow);
        });
    }
    // Llama a la función para llenar la tabla con los productos seleccionados
    populateSelectedProductsTable(selectedProducts);

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
});