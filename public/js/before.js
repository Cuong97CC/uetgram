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
