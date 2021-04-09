$(function() {});

function openPassword() {
    $("#updatePassword").modal("show");
    // Example 1
    var options1 = {};
    options1.ui = {
        container: "#pwd-container",
        showVerdictsInsideProgressBar: true,
        viewports: {
            progress: ".pwstrength_viewport_progress"
        }
    };
    options1.common = {
        debug: false
    };
    $(".example1").pwstrength(options1);

    $("#frm-pwd").validate({
        rules: {
            password: {
                required: true
            }
        },
        submitHandler: function(form) {
            $.ajax({
                type: $(form).attr("method"),
                url: $(form).attr("action"),
                data: $(form).serialize(),
                dataType: "json"
            }).done(function(r) {
                if (r.codigo == 200) {
                    $("#updatePassword").modal("hide");
                    toastr.success(r.mensaje, "¡Notificación!");
                } else {
                    toastr.error(r.error, "¡Notificación!");
                }
            });
            return false;
        }
    });
}
