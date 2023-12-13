var table;
$(document).ready(function() {
    //Inicializa la tabla con data table
    table = $('#productWarrantyTable').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },
        // Formatea las fechas en el DataTable
        "columnDefs": [{
            "targets": 4, // Indica la columna donde están las fechas
            "render": function(data) {
                return moment(data, "YYYY-MM-DD HH:mm:ss").format("DD/MM/YYYY");
            }
        }]
    });

    document.getElementById('refreshButton').addEventListener('click', function() {
        window.location.reload(); // Esto recargará toda la página
    });

    $("a[data-id]").click(function(e) {
        e.preventDefault();
        var productWarrantyId = $(this).data('id');
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
                    toastr.success('La boleta de garantía ha sido eliminada exitosamente.');
                    location.reload(); // Recargar la página 
                },
                error: function(xhr, status, error) {
                    // Manejar errores si es necesario
                    toastr.warning('Ocurrió un error al intentar eliminar la boleta de garantía: ' + error);
                }
            });
        });
    });

    // Filtro por Nombre
    $('#filter_name').on('keyup', function() {
        var customerName = $(this).val().trim();
        table.column(2).search(customerName).draw();
    });

    // Filtro por Nombre
    $('#filter_id').on('keyup', function() {
        var billingOrder = $(this).val().trim();
        table.column(1).search(billingOrder).draw();
    });

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
        table.column(4).search(dateRange, true, false).draw();
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
        table.column(4).search("").draw();
    }
});