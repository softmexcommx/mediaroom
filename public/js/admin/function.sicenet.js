function SweetAlertSuccess(title, text, url) {
    swal(
        {
            title: title,
            text: text,
            type: "success",
            showConfirmButton: true
        },
        function(isConfirm) {
            window.location.href = url;
        }
    );

    $(".trSelect").click(function() {
        $(this)
            .addClass("selected")
            .siblings()
            .removeClass("selected");
    });
}
