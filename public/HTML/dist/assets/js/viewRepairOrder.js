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
            '</tr>';

        // Inserta la nueva fila en la tabla de productos seleccionados
        selectedProductTable.append(newRow);
    });
    // Actualiza el campo oculto con los datos de los productos seleccionados
    $('#productData').val(JSON.stringify(productDataArray));
}

// Llama a la función para llenar la tabla con los productos seleccionados
populateSelectedProductsTable(selectedProducts);