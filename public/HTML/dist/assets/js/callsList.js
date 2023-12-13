var table;
$(document).ready(function() {
    //Inicializa la tabla con data table
    table = $('#callsTable').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },
        // Formatea las fechas en el DataTable
        "columnDefs": [{
            "targets": 1, // Indica la columna donde están las fechas
            "render": function(data) {
                return moment(data, "YYYY-MM-DD HH:mm:ss").format("DD/MM/YYYY");
            }
        }]
    });

    document.getElementById('refreshButton').addEventListener('click', function() {
        window.location.reload(); // Esto recargará toda la página
    });

    // Filtro por Nombre
    $('#filter_name').on('keyup', function() {
        var nombre = $(this).val().trim();
        table.column(0).search(nombre).draw();
    });

    //Filtro por Asunto
    $('#filter_subject').on('change', function() {
        var selectedSubject = $(this).val();
        // Verificar si se seleccionó "Todos"
        if (selectedSubject === 'Todos') {
            // Limpiar el filtro
            table.column(5).search('').draw();
        } else {
            // Filtra la tabla basándose en el asunto seleccionado
            // El número '5' representa la columna del asunto
            table.column(5).search(selectedSubject).draw();
        }
    });

    //Filtro por Asunto
    $('#filter_seller').on('change', function() {
        var selectedSubject = $(this).val();
        // Verificar si se seleccionó "Todos"
        if (selectedSubject === 'Todos') {
            // Limpiar el filtro
            table.column(3).search('').draw();
        } else {
            // Filtra la tabla basándose en el estado seleccionado
            // El número '6' representa la columna del estado
            table.column(3).search(selectedSubject).draw();
        }
    });

    /*$('#dateFilter').on('change', function() {
        var selectedValue = $(this).val();
        table.column(1).search('').draw(); // Limpia cualquier filtro actual

        if (selectedValue !== 'all') {
            var dateFilter = '';

            var today = moment().startOf('day').format('DD/MM/YYYY');
            var yesterday = moment().subtract(1, 'days').startOf('day').format('DD/MM/YYYY');
            var startOfWeek = moment().startOf('week').format('DD/MM/YYYY');
            var endOfWeek = moment().endOf('week').format('DD/MM/YYYY');
            var startOfMonth = moment().startOf('month').format('DD/MM/YYYY');
            var endOfMonth = moment().endOf('month').format('DD/MM/YYYY');

            switch (selectedValue) {
                case 'today':
                    dateFilter = today;
                    break;
                case 'yesterday':
                    dateFilter = yesterday;
                    break;
                case 'thisWeek':
                    dateFilter = startOfWeek + ' - ' + endOfWeek;
                    break;
                case 'thisMonth':
                    dateFilter = startOfMonth + ' - ' + endOfMonth;
                    break;
                default:
                    break;
            }

            table.column(1).search(dateFilter).draw();
        }
    });*/

    // Configura el evento onChange del select
    document.getElementById("dateFilter").addEventListener("change", function() {
        var selectedFilter = this.value;

        // Lógica para aplicar los filtros según la opción seleccionada
        if (selectedFilter === "today") {
            // Filtro para "Hoy"
            applyDateFilter(getTodayDate());
        } else if (selectedFilter === "yesterday") {
            // Filtro para "Ayer"
            applyDateFilter(getYesterdayDate());
        } else if (selectedFilter === "thisWeek") {
            // Filtro para "Esta Semana"
            applyDateFilter(getThisWeekDates());
        } else if (selectedFilter === "thisMonth") {
            // Filtro para "Este Mes"
            applyDateFilter(getThisMonthDates());
        } else if (selectedFilter === "all") {
            // Filtro para "Todas"
            clearDateFilter();
        }
    });

    // Función para aplicar el filtro de fecha
    function applyDateFilter(dateRange) {
        table.column(1).search(dateRange, true, false).draw();
    }

    // Función para obtener la fecha de hoy en formato "DD/MM/YYYY"
    function getTodayDate() {
        var today = moment();
        return today.format("DD/MM/YYYY");
    }

    // Función para obtener la fecha de ayer en formato "DD/MM/YYYY"
    function getYesterdayDate() {
        var yesterday = moment().subtract(1, "days");
        return yesterday.format("DD/MM/YYYY");
    }

    // Función para obtener el rango de fechas de la semana actual en formato "DD/MM/YYYY|DD/MM/YYYY"
    function getThisWeekDates() {
        var firstDay = moment().startOf("week");
        var lastDay = moment().endOf("week");

        // Crear un arreglo con todas las fechas de la semana
        var dates = [];
        var currentDate = moment(firstDay);
        while (currentDate <= lastDay) {
            dates.push(currentDate.format("DD/MM/YYYY"));
            currentDate.add(1, 'days');
        }

        // Devolver un filtro que incluye todas las fechas
        return dates.join('|');
    }

    // Función para obtener el rango de fechas del mes actual en formato "DD/MM/YYYY|DD/MM/YYYY"
    function getThisMonthDates() {
        var firstDay = moment().startOf("month");
        var lastDay = moment().endOf("month");

        // Crear un arreglo con todas las fechas del mes
        var dates = [];
        var currentDate = moment(firstDay);
        while (currentDate <= lastDay) {
            dates.push(currentDate.format("DD/MM/YYYY"));
            currentDate.add(1, 'days');
        }

        // Devolver un filtro que incluye todas las fechas
        return dates.join('|');
    }

    // Función para limpiar el filtro
    function clearDateFilter() {
        table.column(1).search("").draw();
    }

    $("a[data-id]").click(function(e) {
        e.preventDefault();
        var callId = $(this).data('id');
        var url = $(this).attr('href'); // Guarda la URL

        // Utiliza una ventana modal para confirmar el cambio de estado
        $('#confirmationDeleteModal').modal('show');

        // Desvincula cualquier controlador de eventos existente
        $('#confirmDeleteButton').off('click');

        // Maneja el clic en el botón "Confirmar" en la ventana modal
        $('#confirmDeleteButton').on('click', function() {
            $('#confirmationDeleteModal').modal('hide');

            // Realiza la llamada AJAX para cambiar el estado
            $.ajax({
                url: url, // Usa la URL guardada
                type: 'GET',
                success: function(response) {
                    // Manjejar la respuesta
                    toastr.success('El registro de la llamada se eliminó existosamente.');
                    location.reload(); // Recargar la página 
                },
                error: function(xhr, status, error) {
                    // Manejar errores si es necesario
                    toastr.warning('Ocurrió un error al intentar eliminar el registro de llamada: ' + error);
                }
            });
        });
    });

    /* Filtro por fecha
    $('#filter_date').on('change', function() {
        var dateRange = $(this).val().split(' to '); // Esto dividirá la cadena de texto en dos fechas
        var startDate = moment(dateRange[0], 'DD/MM/YYYY'); // Convierte la fecha de inicio al formato de Moment.js
        var endDate = moment(dateRange[1], 'DD/MM/YYYY'); // Convierte la fecha final al formato de Moment.js

        // Filtra la tabla basándose en el rango de fechas
        table.draw();
    });

    // Extiende el método de búsqueda de DataTables para incluir el filtrado por rango de fechas
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var cellData = moment(data[6], 'DD/MM/YYYY'); // Cambia el '6' al índice de la columna de la fecha
            if (startDate <= cellData && cellData <= endDate) {
                return true;
            }
            return false;
        }
    ); */


    /*Configura flatpickr para el filtro de fecha
    flatpickr("#filter_date", {
        mode: "range",
        altInput: true,
        altFormat: "d/m/Y",
        dateFormat: "d/m/Y",
        onClose: function(selectedDates, dateStr) {
            // Aplica el filtro de fecha cuando se selecciona un rango
            if (dateStr) {
                var dateRange = dateStr.split(" to ");
                var startDate = dateRange[0].trim();
                var endDate = dateRange[1].trim();

                // Filtra las fechas dentro del rango
                customerTable.column(1).search(startDate + "|" + endDate, true, false).draw();
            } else {
                // Si no se selecciona una fecha, limpiar el filtro y mostrar todos los registros
                customerTable.column(1).search('').draw();
            }
        }
    }); * /

    /* Inicializa el selector de fecha con rango
    $("#filter_date").flatpickr({
        mode: "range",
        altFormat: "Y-m-d H:i:s",
        dateFormat: "Y-m-d H:i:s",
        onChange: function(selectedDates, dateStr, instance) {
            if (selectedDates.length === 2) {
                // Obtén las fechas seleccionadas
                var selectedStartDate = selectedDates[0];
                var selectedEndDate = selectedDates[1];

                // Convierte las fechas al formato deseado "YYYY-MM-DD HH:mm:ss"
                var formattedStartDate = formatDate(selectedStartDate);
                var formattedEndDate = formatDate(selectedEndDate);

                // Combina las fechas en un solo filtro utilizando el operador |
                var dateFilter = formattedStartDate + "|" + formattedEndDate;

                // Aplica el filtro a la columna correspondiente
                customerTable.column(1).search(dateFilter, true, false).draw();
            } else {
                // Si no se seleccionaron dos fechas, borra el filtro
                customerTable.column(1).search("").draw();
            }
        }
    });

    // Función para convertir el formato de fecha
    function formatDate(date) {
        if (date) {
            var year = date.getFullYear();
            var month = (date.getMonth() + 1).toString().padStart(2, "0");
            var day = date.getDate().toString().padStart(2, "0");
            var hours = date.getHours().toString().padStart(2, "0");
            var minutes = date.getMinutes().toString().padStart(2, "0");
            var seconds = date.getSeconds().toString().padStart(2, "0");
            return year + "-" + month + "-" + day + " " + hours + ":" + minutes + ":" + seconds;
        }
        return "";
    }*/

});