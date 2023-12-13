var table;
$(document).ready(function() {
    //Inicializa la tabla con data table
    table = $('#customerTable').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
    });

    // Manejador de cambio para el campo "Tipo de Cédula"
    $("#customertypeID").on("change", function() {
        validateCustomerID();
    });

    // Manejador de entrada para el campo de cédula
    $("#customerID").on("blur", function() {
        validateCustomerID();
    });

    // Manejador de entrada para el campo de nombre del cliente
    $("#customerFullName").on("blur", function() {
        validateCustomerFullName();
    });

    // Manejador de entrada para el campo de segundo apellido
    $("#customerContact").on("blur", function() {
        validateCustomerContact();
    });

    // Manejador de entrada para el campo de correo electrónico
    $("#customerEmail1").on("blur", function() {
        validateCustomerEmail1();
    });

    // Manejador de entrada para el campo de correo electrónico
    $("#customerEmail2").on("blur", function() {
        validateCustomerEmail2();
    });

    // Manejador de entrada para el campo de teléfono
    $("#customerPhone1").on("blur", function() {
        validateCustomerPhone1();
    });

    // Manejador de entrada para el campo de teléfono
    $("#customerPhone2").on("blur", function() {
        validateCustomerPhone2();
    });

    // Manejador de entrada para la dirección
    $("#customerAddress1").on("blur", function() {
        validateCustomerAddress1();
    });

    //Función que se encarga de validar la cédula según el tipo de cédula
    function validateCustomerID() {
        var customertypeID = $("#customertypeID").val();
        var customerID = $("#customerID").val();

        var customerIDPattern;
        if (customertypeID == "1") { // Cédula Jurídica
            customerIDPattern = /^\d{1}-\d{3}-\d{6}$/;
        } else if (customertypeID == "2") { // Cédula Física
            customerIDPattern = /^\d{1}-\d{4}-\d{4}$/;
        }

        if (!customerIDPattern.test(customerID) || customerID.trim() === "") {
            $("#customerID").addClass("is-invalid");
            if (customerIDPattern.toString() == /^\d{1}-\d{3}-\d{6}$/.toString()) {
                $("#customerID-error").hide();
                $("#customerLegalID-error").show();
            } else {
                $("#customerLegalID-error").hide();
                $("#customerID-error").show();
            }
            return false;
        } else {
            $("#customerID").removeClass("is-invalid");
            $("#customerID-error").hide();
            $("#customerLegalID-error").hide();
            return true;
        }
    }

    // Validación de nombre de usuario
    function validateCustomerFullName() {
        var customerFullName = $("#customerFullName").val();
        var customerFullNamePattern = /^[A-Za-zÁáÉéÍíÓóÚúÑñ\s.]+$/;
        if (!customerFullNamePattern.test(customerFullName) || customerFullName.trim() === "") {
            $("#customerFullName").addClass("is-invalid");
            $("#customerFullName-error").show();
            return false;
        } else {
            $("#customerFullName").removeClass("is-invalid");
            $("#customerFullName-error").hide();
            return true;
        }
    }

    // Validación de segundo apellido
    function validateCustomerContact() {
        var customerContact = $("#customerContact").val();
        var customerContactPattern = /^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+$/;
        if (!customerContactPattern.test(customerContact) || customerContact.trim() === "") {
            $("#customerContact").addClass("is-invalid");
            $("#customerContact-error").show();
            return false;
        } else {
            $("#customerContact").removeClass("is-invalid");
            $("#customerContact-error").hide();
            return true;
        }
    }

    // Validación de correo electrónico
    function validateCustomerEmail1() {
        var customerEmail1 = $("#customerEmail1").val();
        var customerEmail1Pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!customerEmail1Pattern.test(customerEmail1) || customerEmail1.trim() === "") {
            $("#customerEmail1").addClass("is-invalid");
            $("#customerEmail1-error").show();
            return false;
        } else {
            $("#customerEmail1").removeClass("is-invalid");
            $("#customerEmail1-error").hide();
            return true;
        }
    }

    // Validación de correo electrónico
    function validateCustomerEmail2() {
        var customerEmail2 = $("#customerEmail2").val();
        var customerEmail2Pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!customerEmail2Pattern.test(customerEmail2)) {
            $("#customerEmail2").addClass("is-invalid");
            $("#customerEmail2-error").show();
            return false;
        } else {
            $("#customerEmail2").removeClass("is-invalid");
            $("#customerEmail2-error").hide();
            return true;
        }
    }

    // Validación de número de teléfono en formato costarricense
    function validateCustomerPhone1() {
        var customerPhone1 = $("#customerPhone1").val();
        var customerPhone1Pattern = /^\d{4}-\d{4}$/;
        if (!customerPhone1Pattern.test(customerPhone1) || customerPhone1.trim() === "") {
            $("#customerPhone1").addClass("is-invalid");
            $("#customerPhone1-error").show();
            return false;
        } else {
            $("#customerPhone1").removeClass("is-invalid");
            $("#customerPhone1-error").hide();
            return true;
        }
    }

    // Validación de número de teléfono en formato costarricense
    function validateCustomerPhone2() {
        var customerPhone2 = $("#customerPhone2").val();
        var customerPhone2Pattern = /^\d{4}-\d{4}$/;
        if (!customerPhone2Pattern.test(customerPhone2)) {
            $("#customerPhone2").addClass("is-invalid");
            $("#customerPhone2-error").show();
            return false;
        } else {
            $("#customerPhone2").removeClass("is-invalid");
            $("#customerPhone2-error").hide();
            return true;
        }
    }

    // Validación de la dirección
    function validateCustomerAddress1() {
        var customerAddress1 = $("#customerAddress1").val();
        if (customerAddress1.trim() === "") {
            $("#customerAddress1").addClass("is-invalid");
            $("#customerAddress1-error").show();
            return false;
        } else {
            $("#customerAddress1").removeClass("is-invalid");
            $("#customerAddress1-error").hide();
            return true;
        }
    }

    // Manejador de envío del formulario
    $("#registerCustomer").on("submit", function(event) {
        if (!validateCustomerID() || !validateCustomerFullName() || !validateCustomerContact() || !validateCustomerEmail1() ||
            !validateCustomerPhone1() || !validateCustomerAddress1()) {
            event.preventDefault(); // Evita el envío del formulario
        }
    });

    // Manejador de envío del formulario
    $("#modifyCustomer").on("submit", function(event) {
        if (!validateCustomerID() || !validateCustomerFullName() || !validateCustomerContact() || !validateCustomerEmail1() ||
            !validateCustomerPhone1() || !validateCustomerAddress1()) {
            event.preventDefault(); // Evita el envío del formulario
        }
    });

    document.getElementById('refreshButton').addEventListener('click', function() {
        window.location.reload(); // Esto recargará toda la página
    });

    var customerTable = $('#customerTable').DataTable();

    // Filtro por Cédula
    $('#filter_id').on('keyup', function() {
        var cedula = $(this).val().trim();
        customerTable.column(0).search(cedula).draw();
    });

    // Filtro por Nombre
    $('#filter_name').on('keyup', function() {
        var nombre = $(this).val().trim();
        customerTable.column(1).search(nombre).draw();
    });
});