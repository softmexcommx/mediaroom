$(function() {
    $("body").toggleClass("mini-navbar");
    var swiper = new Swiper(".swiper-container", {
        slidesPerView: 1,
        spaceBetween: 10,
        // init: false,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 40
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 10
            }
        }
    });
});

function showAccion(id) {
    $("#myModalContent").load(
        laraveljs.path + "/sicenet_enlinea/mis_cursos/show/" + id + "/modal",
        function() {
            $("#modalCurso").modal({ keyboard: true }, "show");
        }
    );
}

function registrarme(id) {
    var currentToken = $('meta[name="csrf-token"]').attr("content");

    return $.ajax({
        beforeSend: function() {
            $("#modal").show();
        },
        type: "POST",
        url: laraveljs.path + "/sicenet_enlinea/mis_cursos/registrarme",
        dataType: "json",
        data: {
            acc_cve: id,
            tra_cve: laraveljs.tra_cve,
            _token: currentToken
        },
        success: function(r) {
            $("#modalCurso").modal("hide");
            $("#modal").hide();
            if (r.codigo == 200) {
                swal({
                    title: "Registro exitoso",
                    text: r.mensaje,
                    icon: "success"
                }).then(confirm => {
                    if (confirm) {
                        window.location.href = r.url;
                    }
                });
            }
        },
        error: function(ex) {
            $("#modal").hide();
            toastr.error(ex.responseText, "¡Notificación!", {
                closeButton: true
            });
        }
    });
}
