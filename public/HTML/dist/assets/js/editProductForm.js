function calculateValues() {
    // Obtener los valores de los campos de entrada
    var exchangeRateCost = document.getElementById('productExchangeRateCost').value;
    var costDollars = document.getElementById('productCostDollars').value;
    var exchangeRateSale = document.getElementById('productExchangeRateSale').value;
    var saleDollars = document.getElementById('productSaleDollars').value;

    // Realizar los cálculos
    var costColones = exchangeRateCost * costDollars;
    var saleColones = exchangeRateSale * saleDollars;
    var profitPercentage = ((saleColones - costColones) / costColones) * 100;

    // Actualizar los campos de la interfaz de usuario
    document.getElementById('productCostColones').value = costColones.toFixed(2);
    document.getElementById('productSaleColones').value = saleColones.toFixed(2);
    document.getElementById('productProfitPercentage').value = profitPercentage.toFixed(2);
}

$(document).ready(function() {
    $('#productBrand').change(function() {
        var baseUrl = $('#productBrand').data('url');
        var idBrand = $(this).val();
        var newAction = baseUrl.replace('id', idBrand);
        if (idBrand) {
            $.ajax({
                url: newAction,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#productModel').empty();
                    $.each(data, function(key, value) {
                        $('#productModel').append('<option value="' + value.idModel + '">' + value.modelName + '</option>');
                    });
                }
            });
        } else {
            $('#productModel').empty();
        }
    });

    var baseUrl = $('#modifyProductBrand').data('url');
    var idModel = $('#modifyProductBrand').data('id');
    var idBrand = $('#modifyProductBrand').val();
    var newAction = baseUrl.replace('id', idBrand);
    if (idBrand) {
        $.ajax({
            url: newAction,
            type: "GET",
            dataType: "json",
            success: function(data) {
                $('#productModel').empty();
                $.each(data, function(key, value) {
                    var selected = (value.idModel == idModel) ? 'selected' : '';
                    $('#productModel').append('<option value="' + value.idModel + '" ' + selected + '>' + value.modelName + '</option>');
                });
            }
        });
    } else {
        $('#productModel').empty();
    }

    // Manejador de entrada para el campo de nombre del cliente
    $("#productCode").on("blur", function() {
        validateProductCode();
    });

    // Manejador de entrada para el campo de segundo apellido
    $("#productName").on("blur", function() {
        validateProductName();
    });

    // Manejador de entrada para la dirección
    $("#productDescription").on("blur", function() {
        validateProductDescription();
    });

    // Manejador de cambio para el campo de selección de la marca
    $("#productBrand").on("change", function() {
        validateProductBrand();
    });

    // Manejador de cambio para el checkbox de producto con seriales
    $("#productSerie").on("change", function() {
        // Habilita o deshabilita el campo de serie del producto dependiendo del estado del checkbox
        $("#productSeries").prop("disabled", !$(this).prop("checked"));
        validateProductSeries();
    });

    // Manejador de entrada para el campo de serie del producto
    $("#productSeries").on("blur", function() {
        validateProductSeries();
    });

    // Manejador de entrada para el campo de segundo apellido
    $("#productLocation1").on("blur", function() {
        validateProductLocation1();
    });

    // Manejador de entrada para el campo de tipo de cambio de costo
    $("#productExchangeRateCost").on("blur", function() {
        validateProductExchangeRateCost();
    });

    // Manejador de entrada para el campo de costo en dólares
    $("#productCostDollars").on("blur", function() {
        validateProductCostDollars();
    });

    // Manejador de entrada para el campo de tipo de cambio de venta
    $("#productExchangeRateSale").on("blur", function() {
        validateProductExchangeRateSale();
    });

    // Manejador de entrada para el campo de venta en dólares
    $("#productSaleDollars").on("blur", function() {
        validateProductSaleDollars();
    });

    // Manejador de entrada para el campo de cantidad
    $("#productQuantity").on("blur", function() {
        validateProductQuantity();
    });

    // Manejador de entrada para el campo mínimo
    $("#minimumProduct").on("blur", function() {
        validateMinimumProduct();
    });

    // Manejador de entrada para el campo máximo
    $("#maximumProduct").on("blur", function() {
        validateMaximumProduct();
    });


    // Validación del código de producto
    function validateProductCode() {
        var productCode = $("#productCode").val();
        if (productCode.trim() === "") {
            $("#productCode").addClass("is-invalid");
            $("#productCode-error").show();
            return false;
        } else {
            $("#productCode").removeClass("is-invalid");
            $("#productCode-error").hide();
            return true;
        }
    }

    // Validación de segundo apellido
    function validateProductName() {
        var productName = $("#productName").val();
        var productNamePattern = /^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+$/;
        if (!productNamePattern.test(productName) || productName.trim() === "") {
            $("#productName").addClass("is-invalid");
            $("#productName-error").show();
            return false;
        } else {
            $("#productName").removeClass("is-invalid");
            $("#productName-error").hide();
            return true;
        }
    }

    // Validación de la dirección
    function validateProductDescription() {
        var productDescription = $("#productDescription").val();
        if (productDescription.trim() === "") {
            $("#productDescription").addClass("is-invalid");
            $("#productDescription-error").show();
            return false;
        } else {
            $("#productDescription").removeClass("is-invalid");
            $("#productDescription-error").hide();
            return true;
        }
    }

    // Validación de la marca del producto
    function validateProductBrand() {
        var productBrand = $("#productBrand").val();
        if (productBrand === "") {
            $("#productBrand").addClass("is-invalid");
            $("#productBrand-error").show();
            return false;
        } else {
            $("#productBrand").removeClass("is-invalid");
            $("#productBrand-error").hide();
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

    // Validación del código de producto
    function validateProductLocation1() {
        var productLocation1 = $("#productLocation1").val();
        if (productLocation1.trim() === "") {
            $("#productLocation1").addClass("is-invalid");
            $("#productLocation1-error").show();
            return false;
        } else {
            $("#productLocation1").removeClass("is-invalid");
            $("#productLocation1-error").hide();
            return true;
        }
    }

    // Validación del tipo de cambio de costo
    function validateProductExchangeRateCost() {
        var productExchangeRateCost = $("#productExchangeRateCost").val();
        if (productExchangeRateCost.trim() === "" || isNaN(productExchangeRateCost)) {
            $("#productExchangeRateCost").addClass("is-invalid");
            $("#productExchangeRateCost-error").show();
            return false;
        } else {
            $("#productExchangeRateCost").removeClass("is-invalid");
            $("#productExchangeRateCost-error").hide();
            return true;
        }
    }

    // Validación del costo en dólares
    function validateProductCostDollars() {
        var productCostDollars = $("#productCostDollars").val();
        if (productCostDollars.trim() === "" || isNaN(productCostDollars)) {
            $("#productCostDollars").addClass("is-invalid");
            $("#productCostDollars-error").show();
            return false;
        } else {
            $("#productCostDollars").removeClass("is-invalid");
            $("#productCostDollars-error").hide();
            return true;
        }
    }

    // Validación del tipo de cambio de venta
    function validateProductExchangeRateSale() {
        var productExchangeRateSale = $("#productExchangeRateSale").val();
        var productExchangeRateCost = $("#productExchangeRateCost").val();

        if (productExchangeRateSale.trim() === "" || isNaN(productExchangeRateSale)) {
            $("#productExchangeRateSale").addClass("is-invalid");
            $("#productExchangeRateSale-error").show();
            return false;
        } else {
            $("#productExchangeRateSale").removeClass("is-invalid");
            $("#productExchangeRateSale-error").hide();

            // Validar que el tipo de cambio de venta sea mayor que el tipo de cambio de costo
            if (parseFloat(productExchangeRateSale) <= parseFloat(productExchangeRateCost)) {
                $("#productExchangeRateSale").addClass("is-invalid");
                $("#exchangeRateSaleError").show(); // Agrega un mensaje de error específico
                return false;
            } else {
                $("#productExchangeRateSale").removeClass("is-invalid");
                $("#exchangeRateSaleError").hide();
                return true;
            }
        }
    }

    // Validación de la venta en dólares
    function validateProductSaleDollars() {
        var productSaleDollars = $("#productSaleDollars").val();
        if (productSaleDollars.trim() === "" || isNaN(productSaleDollars)) {
            $("#productSaleDollars").addClass("is-invalid");
            $("#productSaleDollars-error").show();
            return false;
        } else {
            $("#productSaleDollars").removeClass("is-invalid");
            $("#productSaleDollars-error").hide();
            return true;
        }
    }

    // Validación de la cantidad
    function validateProductQuantity() {
        var productQuantity = $("#productQuantity").val();
        var minimumProduct = $("#minimumProduct").val();
        var maximumProduct = $("#maximumProduct").val();

        if (productQuantity.trim() === "" || isNaN(productQuantity)) {
            $("#productQuantity").addClass("is-invalid");
            $("#productQuantity-error").show();
            return false;
        } else {
            $("#productQuantity").removeClass("is-invalid");
            $("#productQuantity-error").hide();

            // Validar que la cantidad esté entre el mínimo y el máximo
            if (parseInt(productQuantity) < parseInt(minimumProduct) || parseInt(productQuantity) > parseInt(maximumProduct)) {
                $("#productQuantity").addClass("is-invalid");
                $("#quantityError").show();
                return false;
            } else {
                $("#productQuantity").removeClass("is-invalid");
                $("#quantityError").hide();
                return true;
            }
        }
    }

    // Validación del mínimo
    function validateMinimumProduct() {
        var minimumProduct = $("#minimumProduct").val();
        if (minimumProduct.trim() === "" || isNaN(minimumProduct)) {
            $("#minimumProduct").addClass("is-invalid");
            $("#minimumProduct-error").show();
            return false;
        } else {
            $("#minimumProduct").removeClass("is-invalid");
            $("#minimumProduct-error").hide();
            return true;
        }
    }

    // Validación del máximo
    function validateMaximumProduct() {
        var maximumProduct = $("#maximumProduct").val();
        if (maximumProduct.trim() === "" || isNaN(maximumProduct)) {
            $("#maximumProduct").addClass("is-invalid");
            $("#maximumProduct-error").show();
            return false;
        } else {
            $("#maximumProduct").removeClass("is-invalid");
            $("#maximumProduct-error").hide();
            return true;
        }
    }

    // Validación de la localización 1
    function validateProductLocation1() {
        var productLocation1 = $("#productLocation1").val();
        if (productLocation1.trim() === "") {
            $("#productLocation1").addClass("is-invalid");
            $("#productLocation1-error").show();
            return false;
        } else {
            $("#productLocation1").removeClass("is-invalid");
            $("#productLocation1-error").hide();
            return true;
        }
    }

    var hasSeries = $('#productSerie').data('id');
    if (hasSeries) {
        $('#productSerie').prop('checked', true);
        $('#productSeries').prop('disabled', false);
    }

    $('#productSerie').change(function() {
        if ($(this).is(':checked')) {
            $('#productSeries').prop('disabled', false);
        } else {
            $('#productSeries').prop('disabled', true);
        }
    });

    // Manejador de envío del formulario
    $("#modifyProduct").on("submit", function(event) {
        if (!validateProductCode() || !validateProductName() || !validateProductDescription() || !validateProductBrand() ||
            !validateProductSeries() || !validateProductExchangeRateCost() || !validateProductCostDollars() ||
            !validateProductExchangeRateSale() || !validateProductSaleDollars() || !validateMinimumProduct() ||
            !validateMaximumProduct() || !validateProductQuantity() || !validateProductLocation1()) {
            event.preventDefault(); // Evita el envío del formulario
        }
    });
});