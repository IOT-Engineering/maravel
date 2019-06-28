$(document).ready(function() {
    $('#DataTable').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
            var column = this;
                if(column.index() == 2 || column.index() == 5 || column.index() == 6) {
                    var select = $('<select><option value=""></option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        });
                    column.data().unique().sort().each( function ( d, j ) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                }
            });
        }
    });
});