$(document).ready(function () {

    $('#file-upload-form').on("submit", function(e){
        e.preventDefault();

        var formData = new FormData(this);
        var imageInput = $('#image-input').val().trim();

        if (imageInput) {
            $('.loader').show();
            $('button, input').prop('disabled', true);
            setTimeout(function () {
                $.ajax({
                    url: 'upload.php',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (imageId) {
                        getImage(imageId);
                    },
                    complete: function (imageId) {
                        $('.loader').hide();
                        $('button, input').prop('disabled', false);
                    }
                })
            }, 1000);

        }
    });

    $('#reset').click(function (){
        $.ajax({
            url: 'reset.php',
            method: 'GET',
            success: function () {
                window.location.reload();
            }
        })
    })
});

$(document).on('mouseenter', '.uploaded-image', function (e) {
    e.preventDefault();
    var imageId = $(this).data('id');
    $(this).attr('src', '/src/uploads/bw_' + imageId + '.jpg');
})

$(document).on('mouseleave', '.uploaded-image', function (e) {
    e.preventDefault();
    var imageId = $(this).data('id');
    $(this).attr('src', '/src/uploads/' + imageId + '.jpg');
})
function getImage(id, bw = false){
    var url = bw ? "/img/" + id + "/bw" : "/img/" + id;

    var image = $(".uploaded-image[data-id='" + id + "']");

    $.ajax({
        url: url,
        method: 'GET',
        success: function (response) {
            if (!image.length) {
                $('#image-container').append("<div class='col-md-4 p-2'>" + response + "</div>");

            }
        }
    })
}

