var table;
$(document).ready(function() {
    //Inicializa la tabla con data table
    table = $('#productTable').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
    });

    // Filtro por Nombre
    $('#filter_product').on('keyup', function() {
        var user = $(this).val().trim();
        table.column(1).search(user).draw();
    });

    //Filtro por departamento
    $('#filter_brand').on('change', function() {
        var selectedBrand = $(this).val();
        // Verificar si se seleccionó "Todos"
        if (selectedBrand === 'Todos') {
            // Limpiar el filtro
            table.column(2).search('').draw();
        } else {
            // Filtra la tabla basándose en el departamento seleccionado
            // El número '2' representa la columna del departamento
            table.column(2).search(selectedBrand).draw();
        }
    });

    //Filtro por departamento
    $('#filter_category').on('change', function() {
        var selectedCategory = $(this).val();
        // Verificar si se seleccionó "Todos"
        if (selectedCategory === 'Todos') {
            // Limpiar el filtro
            table.column(5).search('').draw();
        } else {
            // Filtra la tabla basándose en el departamento seleccionado
            // El número '2' representa la columna del departamento
            table.column(5).search(selectedCategory).draw();
        }
    });

    document.getElementById('refreshButton').addEventListener('click', function() {
        window.location.reload(); // Esto recargará toda la página
    });

    $("a[data-id]").click(function(e) {
        e.preventDefault();
        var productId = $(this).data('id');
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
                    toastr.success('El producto ha sido eliminado existosamente.');
                    location.reload(); // Recargar la página 
                },
                error: function(xhr, status, error) {
                    // Manejar errores si es necesario
                    toastr.warning('Ocurrió un error al intentar eliminar el producto: ' + error);
                }
            });
        });
    });
});