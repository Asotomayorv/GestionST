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

    // Variable global para almacenar los datos del cliente
    var selectedCustomerData = null;

    // Escucha el clic en una fila de la tabla de clientes
    $('#routesTable tbody').off('click').on('click', 'tr', function() {
        // Resalta la fila seleccionada
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }

        // Obtén los datos del cliente de la fila seleccionada
        var idroute = $(this).find('.text-center:eq(0)').text();
        var customerFullName = $(this).find('.text-center:eq(1)').text();
        var startDate = $(this).find('.text-center:eq(2)').text();
        var routeType = $(this).find('.text-center:eq(3)').text();
        var routePriority = $(this).find('.text-center:eq(4)').text();
        var routeTechnicianAssigned = $(this).find('.text-center:eq(5)').text();
        var idCustomer = $(this).data('customer-id');
        var customertypeID = $(this).data('customer-typeid');
        var customerId = $(this).data('customer-customerid');
        var customerContact = $(this).data('customer-contact');
        var customerEmail1 = $(this).data('customer-email1');
        var customerEmail2 = $(this).data('customer-email2');
        var customerPhone1 = $(this).data('customer-phone1');
        var customerPhone2 = $(this).data('customer-phone2');
        var routeAddress = $(this).data('route-address');
        var provinceName = $(this).data('route-province');
        var cantonName = $(this).data('route-canton');
        var districtName = $(this).data('route-district');
        var startTime = $(this).data('route-starttime');

        // Almacena los datos del cliente en la variable global
        selectedCustomerData = {
            idroute: idroute,
            customerFullName: customerFullName,
            customerContact: customerContact,
            customerEmail1: customerEmail1,
            customerEmail2: customerEmail2,
            customerPhone1: customerPhone1,
            customerPhone2: customerPhone2,
            routeAddress: routeAddress,
            idCustomer: idCustomer,
            customertypeID: customertypeID,
            customerId: customerId,
            startDate: startDate,
            routeType: routeType,
            routePriority: routePriority,
            routeTechnicianAssigned: routeTechnicianAssigned,
            provinceName: provinceName,
            cantonName: cantonName,
            districtName: districtName,
            startTime: startTime,
        };

        $('#confirmSelectButton').on('click', function() {
            // Limpia la tabla de productos seleccionados antes de agregar nuevos productos
            $('#selectedProductTable tbody').empty();
            // Verifica si se ha seleccionado un cliente
            if (selectedCustomerData) {
                // Obtén la fecha en formato DD/MM/YYYY
                var dateParts = selectedCustomerData.startDate.split("/");
                // Reorganiza la fecha en formato YYYY-MM-DD
                var formattedDate = dateParts[2] + "-" + dateParts[1] + "-" + dateParts[0];

                // Completa los campos del formulario con los datos del cliente
                $('#customertypeID').val(selectedCustomerData.customertypeID);
                $('#customerID').val(selectedCustomerData.customerId);
                $('#customerFullName').val(selectedCustomerData.customerFullName);
                $('#customerContact').val(selectedCustomerData.customerContact);
                $('#customerEmail1').val(selectedCustomerData.customerEmail1);
                $('#customerEmail2').val(selectedCustomerData.customerEmail2);
                $('#customerPhone1').val(selectedCustomerData.customerPhone1);
                $('#customerPhone2').val(selectedCustomerData.customerPhone2);
                $('#customerAddress1').val(selectedCustomerData.customerAddress1);
                $('#idCustomer').val(selectedCustomerData.idCustomer);
                $('#idRoute').val(selectedCustomerData.idroute);
                $('#province').val(selectedCustomerData.provinceName);
                $('#routeAddress').val(selectedCustomerData.routeAddress);
                $('#routeType').val(selectedCustomerData.routeType);
                $('#routePriority').val(selectedCustomerData.routePriority);
                $('#routeTechnicianAssigned').val(selectedCustomerData.routeTechnicianAssigned);
                $('#startDate').val(formattedDate);
                $('#startTime').val(selectedCustomerData.startTime);

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
                        $('#province').val(selectedCustomerData.provinceName);
                        // Llamar a la función para cargar los cantones de la primera provincia al cargar la página
                        loadCantonesOfSelectedProvince(selectedCustomerData.provinceName);
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
                            $('#canton').val(selectedCustomerData.cantonName);
                            loadDistritosOfSelectedCanton(selectedCustomerData.provinceName, selectedCustomerData.cantonName);
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
                            $('#district').val(selectedCustomerData.districtName);
                        }
                    });
                }

                // Cierra el modal después de seleccionar un cliente
                $('#clientSearchModal').modal('hide');
            } else {
                // Muestra un mensaje de error o notificación si no se seleccionó un cliente
                toastr.warning('Por favor, seleccione una ruta.');
            }
        });
    });

    // Evento que se dispara al cambiar las horas de traslado o las horas estimadas de trabajo
    $('#technicalServiceTravelHours, #technicalServiceEstimateHours').on('change', function() {
        // Obtener los valores de las horas de traslado y las horas estimadas de trabajo
        var travelHours = $('#technicalServiceTravelHours').val();
        var estimateHours = $('#technicalServiceEstimateHours').val();

        // Calcular la suma total en minutos
        var totalMinutes = convertToMinutes(travelHours) + convertToMinutes(estimateHours);

        // Convertir la suma total de minutos a formato HH:mm
        var totalHoursFormatted = convertToTimeFormat(totalMinutes);

        // Mostrar la suma total en el campo installationTotalHours
        $('#technicalServiceTotalHours').val(totalHoursFormatted);
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
    $("#technicalServiceTravelHours").on("blur", function() {
        validateTechnicalServiceTravelHours();
    });

    // Horas Estimadas de Trabajo
    $("#technicalServiceEstimateHours").on("blur", function() {
        validateTechnicalServiceEstimateHours();
    });

    // Observaciones de la Instalación
    $("#technicalServiceComments").on("blur", function() {
        validateTechnicalServiceComments();
    });

    // Función que se encarga de validar "Horas de Traslado"
    function validateTechnicalServiceTravelHours() {
        var technicalServiceTravelHours = $("#technicalServiceTravelHours").val();
        return validateTimeField(technicalServiceTravelHours, "technicalServiceTravelHours");
    }

    // Función que se encarga de validar "Horas Estimadas de Trabajo"
    function validateTechnicalServiceEstimateHours() {
        var technicalServiceEstimateHours = $("#technicalServiceEstimateHours").val();
        return validateTimeField(technicalServiceEstimateHours, "technicalServiceEstimateHours");
    }

    // Función que se encarga de validar "Observaciones de la Instalación"
    function validateTechnicalServiceComments() {
        var technicalServiceComments = $("#technicalServiceComments").val();
        return validateTextField(technicalServiceComments, "technicalServiceComments");
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
    $("#registerTechnicalService").on("submit", function(event) {
        if (!validateTechnicalServiceTravelHours() || !validateTechnicalServiceEstimateHours() || !validateTechnicalServiceComments()) {
            event.preventDefault(); // Evita el envío del formulario
        }
        // Validar la selección de un cliente
        var idCustomer = $("#idCustomer").val();
        if (idCustomer.trim() === "") {
            toastr.warning('Por favor, selecciona un cliente.');
            event.preventDefault(); // Evita el envío del formulario
            return;
        }
    });
});