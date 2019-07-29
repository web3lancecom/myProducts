
$(document).ready(function() {
    $('#tbl thead tr').clone(true).appendTo( '#tbl thead' );
    $('#tbl thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        if ($(this).hasClass('no-filter')) {
            $(this).html( '<input type="text" style="display:none;" class="form-control"  />' );
        } else if ($(this).hasClass('category')) {
            var select = $('<select id="category" class="form-control"><option value=""></option></select>')
            $(this).html(select);
        } else if ($(this).hasClass('subcategory')) {
            var select = $('<select id="subcategory" class="form-control"><option value=""></option></select>')
            $(this).html(select);
        } else if ($(this).hasClass('status')) {
            $(this).html('<select style="min-with: 50px" class="form-control" id="status">' +
            '<option ></option>' +
            '<option value="true">Disponible</option ><option value="false">Non disponible</option ></select>');
        } else {
            $(this).html( '<input type="text" style="min-width: 100px;margin: auto;" class="form-control" placeholder="Recherche '+ title +'" />' );
        }
        // filter by all input
        $( 'input', this ).on('keyup change', function () {
            var table = $('#tbl').DataTable();
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
                updateFilter();
            }
        });
        // filter by status
        $( 'select#status', this ).on( 'keyup change', function () {
            var table = $('#tbl').DataTable();
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
                updateFilter();
            }
        });
   } );
 
    var table = $('#tbl').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,
        "language": {
            "search":  "Rechercher:",
            "infoEmpty": "Affiche 0 de 0 à 0 éléments",
            "zeroRecords":  "Aucun résultat",
            "lengthMenu":  "Affiche _MENU_ par page",
            "info": "Affiche _START_ to _END_ of _TOTAL_ élements",
            "paginate": {
              "previous": "Précedent",
              "next": 'Suivant'
            }
          },
          initComplete: function () {
                // cat
                var columnCat = this.api().column(2,  { search:'applied' }); // table index 2
                var columnSubCat = this.api().column(3 , { search:'applied' }); // table index 3
                var select = $('#category'), select2 = $('#subcategory');
                select.on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
                       updateFilter();
                 } );
 
                
                // sub cat
                select2.on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
                        
                       updateFilter();
                } );
                columnCat.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' );
                } );
                columnSubCat.data().unique().sort().each( function ( d, j ) {
                    select2.append( '<option value="'+d+'">'+d+'</option>' )
                } );
                // show table
                $('#tbl').show();
        }
    } );
    function updateFilter() {
        var table = $('#tbl').DataTable();
        var columnCat = table.column(2,  { search:'applied' }); // table index 2
        var columnSubCat = table.column(3 , { search:'applied' }); // table index 3
        var select = $('#category'), select2 = $('#subcategory');
        var v = select.val();
        var vs = select2.val();
        var val1 = $.fn.dataTable.util.escapeRegex(vs);
        var val = $.fn.dataTable.util.escapeRegex(v);
       
        columnSubCat
            .search( val1 ? '^'+val1+'$' : '', true, false )
            .draw();
        columnCat
            .search( val ? '^'+val+'$' : '', true, false )
            .draw();
        select2.empty();
        select2.append('<option value=""></option');
        columnSubCat.data({search: 'applied'}).unique().sort().each( function ( d, j ) {
            select2.append( '<option value="'+d+'">'+d+'</option>' )
        });
        select.empty();
        select.append('<option value=""></option');
        columnCat.data({search: 'applied'}).unique().sort().each( function ( d, j ) {
            select.append( '<option value="'+d+'">'+d+'</option>' )
        });
        select.val(v);
        select2.val(vs);
    } 
    
} );