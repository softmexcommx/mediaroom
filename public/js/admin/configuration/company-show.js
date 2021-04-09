$(function() {
    $("body").toggleClass("mini-navbar");

    $("#tableBranchs").DataTable({
        processing: false,
        serverSide: false,
        pagingType: "simple_numbers",
        pageLength: 25,
        responsive: true,
        dom: "Bfrtip",
        buttons: [
            { extend: "copy" },
            { extend: "excel", title: "Sucursales" },
            {
                extend: "print",
                customize: function(win) {
                    $(win.document.body).addClass("white-bg");
                    $(win.document.body).css("font-size", "10px");
                    $(win.document.body)
                        .find("table")
                        .addClass("compact")
                        .css("font-size", "inherit");
                }
            }
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    });

    $("#tableAccounts").DataTable({
        processing: false,
        serverSide: false,
        pagingType: "simple_numbers",
        pageLength: 25,
        responsive: true,
        dom: "Bfrtip",
        buttons: [
            { extend: "copy" },
            { extend: "excel", title: "Cuentas" },
            {
                extend: "print",
                customize: function(win) {
                    $(win.document.body).addClass("white-bg");
                    $(win.document.body).css("font-size", "10px");
                    $(win.document.body)
                        .find("table")
                        .addClass("compact")
                        .css("font-size", "inherit");
                }
            }
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    });
});
