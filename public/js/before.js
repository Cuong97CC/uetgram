$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

$(function () {
    $('[data-toggle="popover"]').popover()
})

$('.popover-dismiss').popover({
    trigger: 'focus'
})

function albumMouseOver(id) {
    $("#album-ctrl" + id).fadeIn();
}

function albumMouseOut(id) {
    $("#album-ctrl" + id).slideUp();
}

function getSrc(id, img) {
    fetch('/storage/upload/' + img)
        .then(res => res.blob())
        .then(blob => {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img' + id).attr('src', e.target.result);
            }
            reader.readAsDataURL(blob);
        });
}

function imgMouseOver(id) {
    $("#box" + id).fadeIn();
}

function imgMouseOut(id) {
    if (!document.getElementById(id).checked) {
        $("#box" + id).fadeOut();
    }
}

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $("button.del-album").on('click', function () {
        var idAlbum = $(this).attr('idAlbum');
        var _token = $("#form-del" + idAlbum).find("input[name='_token']").val();
        $.ajax({
            url: "/albums/delete/" + idAlbum,
            type: "POST",
            cache: false,
            data: {
                "_token": _token,
                "idAlbum": idAlbum
            },
            success: function (data) {
                if (data == 'OK') {
                    $("#deleteAlbumModal" + idAlbum).modal("hide");
                    $("#album" + idAlbum).remove();
                } else {
                    alert("It failed");
                }
            }
        });
    });

});

