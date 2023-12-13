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
                '<td class="text-center" style="width: 100px;"><input type="number" name="productQuantitySelected" class="form-control product-quantity" value="' + product.productQuantity + '" min="1" readonly></td>' +
                '<td class="text-center">' +
                '<div class="custom-control custom-checkbox">' +
                '<input type="checkbox" class="custom-control-input" id="checkbox' + product.idproduct + '" name="installationRequired" disabled value="' + product.installationRequired + '" ' + (product.installationRequired ? 'checked' : '') + '>' +
                '<label class="custom-control-label" for="checkbox' + product.idproduct + '">Sí</label>' +
                '</div>' +
                '</td>' +
                '<input type="hidden" name="idProduct" value="' + product.idproduct + '">' +
                '</tr>';

            // Inserta la nueva fila en la tabla de productos seleccionados
            selectedProductTable.append(newRow);
        });
    }
    // Llama a la función para llenar la tabla con los productos seleccionados
    populateSelectedProductsTable(selectedProducts);

    // Formatear los campos de entrada en colones
    $("#totalBilling, #totalPrice, #taxes").each(function() {
        // Obtén el valor del campo de entrada
        var inputValue = $(this).val();
        // Formatea el valor como una cadena de moneda en colones
        var formattedValue = parseFloat(inputValue).toLocaleString('es-CR', {
            style: 'currency',
            currency: 'CRC',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        // Muestra el valor formateado en el campo de entrada
        $(this).val(formattedValue);
    });

    /*function printInvoice() {
   var printWindow = window.open('', '_blank');
   printWindow.document.write('<html><head><title>Vista Previa de Impresión</title></head><body>');
   printWindow.document.write(document.getElementById('idDeTuElemento').innerHTML);
   printWindow.document.write('</body></html>');
   printWindow.document.close();
   printWindow.print();
  }*/
});