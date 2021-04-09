$(function() {
    var $image = $(".image-crop > img");
    $($image).cropper({
        aspectRatio: 1 / 1,
        minContainerWidth: 250,
        minContainerHeight: 290,
        preview: ".img-preview",
        crop: function(e) {
            var json = [
                '{"x":' + e.x,
                '"y":' + e.y,
                '"height":' + e.height,
                '"width":' + e.width,
                '"rotate":' + e.rotate + "}"
            ].join();

            $("#inputData").val(json);
        }
    });

    var $inputImage = $("#inputImage");
    if (window.FileReader) {
        $inputImage.change(function() {
            var fileReader = new FileReader(),
                files = this.files,
                file;
            if (!files.length) {
                return;
            }

            file = files[0];

            if (/^image\/\w+$/.test(file.type)) {
                fileReader.readAsDataURL(file);
                fileReader.onload = function() {
                    //  $inputImage.val("");
                    $image
                        .cropper("reset", true)
                        .cropper("replace", this.result);
                };
            } else {
                showMessage("Please choose an image file.");
            }
        });
    } else {
        $inputImage.addClass("hide");
    }

    $("#zoomIn").click(function() {
        $image.cropper("zoom", 0.1);
    });

    $("#zoomOut").click(function() {
        $image.cropper("zoom", -0.1);
    });

    $("#btnSubir").click(function() {
        var l = $(".ladda-button").ladda();
        $.ajax({
            type: "POST",
            url: laraveljs.path + "/configuration/users/upload",
            dataType: "json",
            data: {
                inputImage: new FormData($("#inputImage")[0]),
                inputData: $("#inputData")
            },
            success: function(r) {
                l.ladda("stop");
                if (r.codigo == "200") {
                    SweetAlertSuccess("¡Buen trabajo!", r.mensaje, r.url);
                } else if (r.codigo == "501") {
                    toastr.error(r.error, "¡Notificación!");
                } else {
                    toastr.error(r.error, "¡Notificación!");
                }
            },
            beforeSend: function() {
                l.ladda("start");
            },
            //Mensaje de error en caso de fallo
            error: function(ex) {
                toastr.error(ex, "¡Notificación!");
            }
        });

        return false;
    });
});
