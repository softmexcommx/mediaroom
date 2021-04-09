$(function() {
    $("#typeUser").select2({
        placeholder: "Seleccione...",
        dropdownCssClass: "bigdrop",
        width: "element"
    });

    $("#companies").select2({
        placeholder: "Seleccione...",
        dropdownCssClass: "bigdrop",
        width: "element"
    });

    $("#accounts").select2({
        placeholder: "Seleccione...",
        dropdownCssClass: "bigdrop",
        width: "element"
    });

    loadPerfiles();

    $("#typeUser").change(function() {
        if ($("#typeUser").val() == "DT") {
            $("#rowCompany").show();
            $("#rowCustomer").hide();
        } else {
            $("#rowCustomer").show();
            $("#rowCompany").hide();
            loadCustomers();
        }
    });

    /*
	$("#idCustomer").change(function () {
		loadCustomerCompanies($('#idCustomer').val());
	});*/

    $("#frm-users").validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true
            }
        },
        submitHandler: function(form) {
            var l = $(".ladda-button").ladda();
            $.ajax({
                beforeSend: function() {
                    l.ladda("start");
                },
                type: $(form).attr("method"),
                url: $(form).attr("action"),
                data: $(form).serialize(),
                dataType: "json"
            }).done(function(r) {
                l.ladda("stop");
                if (r.codigo == "200") {
                    SweetAlertSuccess("¡Buen trabajo!", r.descripcion, r.url);
                } else {
                    toastr.error(r.error, "¡Notificación!");
                }
            });
            return false;
        }
    });
});

function loadPerfiles() {
    $("#role_id").empty();
    let object = {
        url:
            laraveljs.path +
            "/select/company/" +
            laraveljs.idCompany +
            "/perfiles/0",
        type: "GET",
        dataType: "json"
    };

    return $.ajax(object)
        .done(function(States) {
            $("#role_id").append('<option value=""></option>');
            $.each(States.data, function(i, State) {
                if (laraveljs.rol == State.id) {
                    $("#role_id").append(
                        '<option selected value="' +
                            State.id +
                            '">' +
                            State.name +
                            "</option>"
                    );
                } else {
                    $("#role_id").append(
                        '<option value="' +
                            State.id +
                            '">' +
                            State.name +
                            "</option>"
                    );
                }
            });
            $("#role_id").select2({ placeholder: "Seleccione..." });
        })
        .done(function() {
            //loadCustomerCompanies(0);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr.error(jqXHR.status + " - " + jqXHR.responseText, "Error", {
                closeButton: true
            });
        });
}

function loadCustomers() {
    $("#idCustomer").empty();
    let object = {
        url: "/data/customers",
        type: "GET",
        dataType: "json"
    };
    return $.ajax(object)
        .done(function(States) {
            $("#idCustomer").append('<option value=""></option>');

            $.each(States.data, function(i, State) {
                if (laraveljs.idCustomer == State.id) {
                    $("#idCustomer").append(
                        '<option selected value="' +
                            State.idCustomer +
                            '">' +
                            State.tradeName +
                            "</option>"
                    );
                } else {
                    $("#idCustomer").append(
                        '<option value="' +
                            State.idCustomer +
                            '">' +
                            State.tradeName +
                            "</option>"
                    );
                }
            });

            $("#idCustomer").select2({ placeholder: "Seleccione..." });
        })
        .done(function() {})
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr.error(jqXHR.status + " - " + jqXHR.responseText, "Error", {
                closeButton: true
            });
        });
}
