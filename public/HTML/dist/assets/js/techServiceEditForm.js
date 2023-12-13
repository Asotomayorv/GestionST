$(document).ready(function() {
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
    $("#modifyTechnicalService").on("submit", function(event) {
        if (!validateTechnicalServiceTravelHours() || !validateTechnicalServiceEstimateHours() || !validateTechnicalServiceComments()) {
            event.preventDefault(); // Evita el envío del formulario
        }
    });
});