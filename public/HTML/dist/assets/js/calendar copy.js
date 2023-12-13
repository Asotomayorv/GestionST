$(document).ready(function() {
    //ar selectedDate; // Variable para almacenar la fecha seleccionada del calendario
    $('#routeCalendar').fullCalendar({
        // Configuración del calendario
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,list'
        },
        locale: 'es',
        hiddenDays: [0, 6], // 0 representa el domingo y 6 representa el sábado
        selectable: false, // Los días no serán seleccionables
        timeFormat: 'HH:mm', // Formato de tiempo de 24 horas

        // Función que se ejecuta al hacer clic en un día
        dayClick: function(date, jsEvent, view) {
            // Obtener la fecha seleccionada y formatearla para el campo de fecha
            var selectedDate = date.format('YYYY-MM-DD'); // Asignar la fecha seleccionada a la variable
            // Establecer el valor del campo de fecha con la fecha seleccionada
            $('#startDate').val(selectedDate);
            $('#endDate').val(selectedDate); // Actualizar el valor del campo de fecha con la fecha seleccionada
            // Mostrar la ventana modal para ingresar datos de la ruta
            $('#createRouteModal').modal('show');
        },

        events: function(start, end, timezone, callback) {
            var eventUrl = $('#routeCalendar').data('route-url');
            // Realizar una petición AJAX para obtener los eventos de la base de datos
            $.ajax({
                url: eventUrl, // Ruta a tu controlador o endpoint que obtiene los eventos
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log('Respuesta AJAX:', response);
                    // Convertir los datos de la respuesta en eventos para el calendario
                    var events = [];
                    for (var i = 0; i < response.length; i++) {
                        var event = {
                            title: response[i].title,
                            customer: response[i].customer,
                            idCustomer: response[i].idCustomer,
                            start: response[i].start + 'T' + response[i].startTime, // Concatenar fecha y hora de inicio
                            end: response[i].end + 'T' + response[i].endTime, // Concatenar fecha y hora de fin
                            startDate: response[i].start,
                            endDate: response[i].end,
                            startTime: response[i].startTime,
                            endTime: response[i].endTime,
                            idRoute: response[i].idRoute,
                            routeStatus: response[i].routeStatus,
                            routeType: response[i].routeType,
                            technician: response[i].technician,
                            routePriority: response[i].routePriority,
                            routeAddress: response[i].routeAddress,
                            routeProvince: response[i].routeProvince,
                            routeCanton: response[i].routeCanton,
                            routeDistrict: response[i].routeDistrict,
                            routeComments: response[i].routeComments,
                        };

                        events.push(event);
                    }
                    //Pasar los eventos al callback para que sean mostrados en el calendario
                    callback(events);
                }
            });
        },

        // Evento que se ejecuta al hacer clic en un evento existente
        eventClick: function(event, jsEvent, view) {
            // Guardar el evento seleccionado en la variable
            selectedEvent = event;

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
                    $('#modifyProvince').html(html);

                    // Establecer el valor de la provincia seleccionada en el formulario
                    $('#modifyProvince').val(selectedEvent.routeProvince);

                    // Llamar a la función para cargar los cantones de la primera provincia al cargar la página
                    loadCantonesOfSelectedProvince();
                }
            });

            $('#modifyProvince').on('change', function() {
                loadCantonesOfSelectedProvince(); // Llamar a la función para cargar los cantones de la provincia seleccionada
            });

            function loadCantonesOfSelectedProvince() {
                var selectedProvince = $('#modifyProvince').val(); // Obtener el valor de la provincia seleccionada
                var url = "https://ubicaciones.paginasweb.cr/provincia/" + selectedProvince + "/cantones.json"; // Construir la URL para obtener los cantones

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
                        $('#modifyCanton').html(html); // Actualizar el campo de selección de cantones con los datos obtenidos
                        // Establecer el valor de la provincia seleccionada en el formulario
                        $('#modifyCanton').val(selectedEvent.routeCanton);

                        loadDistritosOfSelectedCanton();
                    }
                });
            }

            $('#modifyCanton').on('change', function() {
                loadDistritosOfSelectedCanton(); // Llamar a la función para cargar los cantones de la provincia seleccionada
            });

            function loadDistritosOfSelectedCanton() {
                var selectedProvince = $('#modifyProvince').val(); // Obtener el valor de la provincia seleccionada
                var selectedCanton = $('#modifyCanton').val(); // Obtener el valor del cantón seleccionado
                var url = "https://ubicaciones.paginasweb.cr/provincia/" + selectedProvince + "/canton/" + selectedCanton + "/distritos.json"; // Construir la URL para obtener los distritos

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
                        $('#modifyDistric').html(html); // Actualizar el campo de selección de distritos con los datos obtenidos
                        // Establecer el valor del distrito seleccionado en el formulario
                        $('#modifyDistric').val(selectedEvent.routeDistrict);
                    }
                });
            }

            $('#modifyCanton').on('change', function() {
                var selectedProvince = $('#modifyProvince').val(); // Obtener el valor de la provincia seleccionada
                var selectedCanton = $(this).val(); // Obtener el valor del cantón seleccionado
                var url = "https://ubicaciones.paginasweb.cr/provincia/" + selectedProvince + "/canton/" + selectedCanton + "/distritos.json"; // Construir la URL para obtener los distritos

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
                        $('#modifyDistric').html(html); // Actualizar el campo de selección de distritos con los datos obtenidos
                        // Establecer el valor de la provincia seleccionada en el formulario
                        $('#modifyDistric').val(selectedEvent.routeDistrict);
                    }
                });
            });

            // Abrir el modal para editar los datos del evento
            $('#modifyRouteModal').modal('show');
            $('#modifyRouteForm #idRoute').val(selectedEvent.idRoute);
            $('#modifyRouteForm #idCustomer').val(selectedEvent.idCustomer);
            $('#modifyRouteForm #createCustomerFullName').val(selectedEvent.title);
            $('#modifyRouteForm #createCustomerContact').val(selectedEvent.customer);
            $('#modifyRouteForm #routeAddress').val(selectedEvent.routeAddress);
            $('#modifyRouteForm #routeStatus').val(selectedEvent.routeStatus);
            $('#modifyRouteForm #routeType').val(selectedEvent.routeType);
            $('#modifyRouteForm #routePriority').val(selectedEvent.routePriority);
            $('#modifyRouteForm #routeTechnicianAssigned').val(selectedEvent.technician);
            $('#modifyRouteForm #routeComments').val(selectedEvent.routeComments);
            $('#modifyRouteForm #startDate').val(selectedEvent.startDate);
            $('#modifyRouteForm #endDate').val(selectedEvent.endDate);
            $('#modifyRouteForm #startTime').val(selectedEvent.startTime);
            $('#modifyRouteForm #endTime').val(selectedEvent.endTime);
            $('#modifyRouteForm #routeTechnicianAssigned').val(selectedEvent.technician);

            // Obtener la URL base del formulario
            var formAction = $('#modifyRouteForm').attr('action');

            // Combinar la URL base con el idRoute seleccionado
            var fullFormAction = formAction.replace('id', selectedEvent.idRoute);

            // Actualizar el atributo 'action' del formulario con la nueva URL
            $('#modifyRouteForm').attr('action', fullFormAction);
        },

        // Callback que se llama cada vez que un evento es renderizado
        eventRender: function(event, element, view) {
            // Definir colores según la prioridad
            var color = '';
            switch (event.routeStatus) {
                case 'Pendiente':
                    color = 'orange';
                    break;
                case 'En Proceso':
                    color = 'blue';
                    break;
                case 'Finalizado':
                    color = 'green';
                    break;
                default:
                    color = 'red';
            }

            // Agregar colores al evento
            element.css('background-color', color);

            // Agregar más detalles al contenido emergente del evento
            var eventDetails = '<strong>' + event.title + '</strong><br>';
            eventDetails += 'Número de Ruta: ' + event.idRoute + '<br>';
            eventDetails += 'Estado: ' + event.routeStatus + '<br>';
            eventDetails += 'Prioridad: ' + event.routePriority + '<br>';
            eventDetails += 'Tipo de ruta: ' + event.routeType + '<br>';
            eventDetails += 'Comentarios: ' + event.routeComments + '<br>';
            eventDetails += 'Técnico: ' + event.technician + '<br>';
            eventDetails += 'Dirección: ' + event.routeAddress + '<br>';
            eventDetails += 'Provincia: ' + event.routeProvince + '<br>';
            eventDetails += 'Cantón: ' + event.routeCanton + '<br>';
            eventDetails += 'Distrito: ' + event.routeDistrict + '<br>';
            eventDetails += 'Inicio: ' + event.start + '<br>';
            eventDetails += 'Fin: ' + event.end + '<br>';
            // Puedes agregar más detalles según tus necesidades

            // Agregar el contenido emergente al elemento del evento
            element.popover({
                title: event.title,
                content: eventDetails,
                trigger: 'hover',
                placement: 'top',
                container: 'body'
            });
        }
    });

    // Obtener la fecha y hora actual
    var today = new Date();
    var currentTime = today.toTimeString().substr(0, 5);

    // Establecer los valores predeterminados de los campos de fecha y hora
    $('#startTime').val(currentTime);
    $('#endTime').val(currentTime);

    $('#searchButton').on('click', function() {
        var cedula = $('#searchCustomer').val();
        var baseUrl = $('#searchButton').data('url');
        var newAction = baseUrl.replace('id', cedula);

        $.ajax({
            url: newAction,
            type: 'GET',
            success: function(response) {
                if (response.customer.length > 0) {
                    var customer = response.customer[0];
                    $('#createCustomerFullName').val(customer.customerFullName);
                    $('#createCustomerContact').val(customer.customerContact);
                    $('#idCustomer').val(customer.idCustomer);
                } else {
                    // Respuesta si el cliente no se encuentra
                    $('#createCustomerFullName').val('');
                    $('#createCustomerContact').val('');
                    // Muestra un mensaje de éxito o realiza otras acciones necesarias
                    toastr.warning('Cliente no encontrado');
                }
            },
            error: function() {
                toastr.warning('Hubo un problema al buscar al cliente');
            }
        });
    });

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

            // Llamar a la función para cargar los cantones de la primera provincia al cargar la página
            loadCantonesOfSelectedProvince();
        }
    });

    $('#province').on('change', function() {
        loadCantonesOfSelectedProvince(); // Llamar a la función para cargar los cantones de la provincia seleccionada
    });

    $('#canton').on('change', function() {
        var selectedProvince = $('#province').val(); // Obtener el valor de la provincia seleccionada
        var selectedCanton = $(this).val(); // Obtener el valor del cantón seleccionado
        var url = "https://ubicaciones.paginasweb.cr/provincia/" + selectedProvince + "/canton/" + selectedCanton + "/distritos.json"; // Construir la URL para obtener los distritos

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
                $('#distric').html(html); // Actualizar el campo de selección de distritos con los datos obtenidos
            }
        });
    });

    function loadCantonesOfSelectedProvince() {
        var selectedProvince = $('#province').val(); // Obtener el valor de la provincia seleccionada
        var url = "https://ubicaciones.paginasweb.cr/provincia/" + selectedProvince + "/cantones.json"; // Construir la URL para obtener los cantones

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
            }
        });
    }

    // Manejador de cambio para el campo "Tipo de Cédula"
    $("#createCustomertypeID").on("change", function() {
        validateCreateCustomerID();
    });

    // Manejador de entrada para el campo de cédula
    $("#searchCustomer").on("blur", function() {
        validateCreateCustomerID();
    });

    // Manejador de cambio para el campo de selección de la marca
    $("#distric").on("change", function() {
        validateDistric();
    });

    // Manejador de entrada para la dirección
    $("#routeAddress").on("blur", function() {
        validateRouteAddress();
    });

    // Manejador de entrada para la dirección
    $("#routeComments").on("blur", function() {
        validateRouteComments();
    });

    //Función que se encarga de validar la cédula según el tipo de cédula
    function validateCreateCustomerID() {
        var createCustomertypeID = $("#createCustomertypeID").val();
        var searchCustomer = $("#searchCustomer").val();

        var searchCustomerPattern;
        if (createCustomertypeID == "1") { // Cédula Jurídica
            searchCustomerPattern = /^\d{1}-\d{3}-\d{6}$/;
        } else if (createCustomertypeID == "2") { // Cédula Física
            searchCustomerPattern = /^\d{1}-\d{4}-\d{4}$/;
        }

        if (!searchCustomerPattern.test(searchCustomer) || searchCustomer.trim() === "") {
            $("#searchCustomer").addClass("is-invalid");
            if (searchCustomerPattern.toString() == /^\d{1}-\d{3}-\d{6}$/.toString()) {
                $("#searchCustomer-error").hide();
                $("#searchCustomerLegalID-error").show();
            } else {
                $("#searchCustomerLegalID-error").hide();
                $("#searchCustomer-error").show();
            }
            return false;
        } else {
            $("#searchCustomer").removeClass("is-invalid");
            $("#searchCustomer-error").hide();
            $("#searchCustomerLegalID-error").hide();
            return true;
        }
    }

    // Validación de la marca del producto
    function validateDistric() {
        var distric = $("#distric").val();
        if (distric === "") {
            $("#distric").addClass("is-invalid");
            $("#distric-error").show();
            return false;
        } else {
            $("#distric").removeClass("is-invalid");
            $("#distric-error").hide();
            return true;
        }
    }

    // Validación de la dirección
    function validateRouteAddress() {
        var routeAddress = $("#routeAddress").val();
        if (routeAddress.trim() === "") {
            $("#routeAddress").addClass("is-invalid");
            $("#routeAddress-error").show();
            return false;
        } else {
            $("#routeAddress").removeClass("is-invalid");
            $("#routeAddress-error").hide();
            return true;
        }
    }

    // Validación de la dirección
    function validateRouteComments() {
        var routeComments = $("#routeComments").val();
        if (routeComments.trim() === "") {
            $("#routeComments").addClass("is-invalid");
            $("#routeComments-error").show();
            return false;
        } else {
            $("#routeComments").removeClass("is-invalid");
            $("#routeComments-error").hide();
            return true;
        }
    }

    // Manejador de envío del formulario
    $("#createRouteForm").on("submit", function(event) {
        if (!validateCreateCustomerID() || !validateDistric() || !validateRouteAddress() || !validateRouteComments()) {
            event.preventDefault(); // Evita el envío del formulario
        }
    });
});