/*
 Template Name: Lexa - Responsive Bootstrap 4 Admin Dashboard
 Author: Themesbrand
 File: Datatable js
 */

$(document).ready(function() {
    var table = $('#datatable');
    table.DataTable({
        "language": {
            "emptyTable": "Pre tabuľku zatiaľ neexistujú žiadne dáta",
            "search": "Hľadať:",
            "lengthMenu": "Zobraziť _MENU_ záznamov",
            "info": "Zobrazené od _START_ do _END_ z _TOTAL_ záznamov",
            "infoEmpty": "Zobrazené od 0 do 0 z 0 záznamov",
            "paginate": {
                "first":      "Prvá",
                "last":       "Posledná",
                "next":       "Nasledujúca",
                "previous":   "Predchádzajúca"
            }
        }
    });

    table.each(function(){
        $(this).find('tr td:last, th td:last').css('width', '15%');
    });
    //Buttons examples
    var table = $('#datatable-buttons').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
} );