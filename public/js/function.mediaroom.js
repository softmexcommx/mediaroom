function SweetAlertSuccess(title, text, url) {
    swal({
        title: title,
        text: text,
        type: "success",
        showConfirmButton: true
    }).then(confirm => {
        if (confirm) {
            window.location.href = url;
        }
    });
}
