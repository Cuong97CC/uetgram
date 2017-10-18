$("div.alert").delay(3000).slideUp();

$("input.btn-danger").mouseover(function(){
    $(this).val("Are you sure?")
})

$("input.btn-danger").mouseout(function(){
    $(this).val("Delete")
}) 

$("#img-form").change(function(){
    $("#image").empty();
    var typeValid = true;
    var sizeValid = true;
    var amountValid = true;
    var amountError = '<p style="color: red"> You can only upload up to 10 images! </p>';
    var typeError = '<p style="color: red"> Unsupported type! </p>';
    var sizeError = '<p style="color: red"> Your files are too big to upload! </p>';
    if($('#img-form')[0].files.length > 10) {
        amountValid = false;
    }
    else {
        for(var i=0;i<$('#img-form')[0].files.length;i++){
            if (this.files && this.files[i]) {
                var img = $('#img-form')[0].files[i];
                var fsize = img.size;
                if (!img.name.match(/.(jpg|png|jpeg|jpe|bmp)$/i)) {
                    typeValid = false;
                }
                if(fsize>2097152) {
                    sizeValid = false;
                }
            }
        }
    }
    if(amountValid && typeValid && sizeValid){
        document.getElementById('img-form').style.border = "1px solid #09F";
        document.getElementById('add-img-bt').disabled = false;
        readURL(this);
    }
    else {
        if(!amountValid) {
            $("#image").append(amountError);
        }
        else {
            if(!typeValid) {
                $("#image").append(typeError);
            }
            if(!sizeValid) {
                $("#image").append(sizeError);
            }
        }
        document.getElementById('img-form').style.border = "3px solid #F00";
        document.getElementById('add-img-bt').disabled = true;
    }
});  

function readURL(input) {
    if (input.files) {
        var l = $('#img-form')[0].files.length;
        if(l <= 5){
            var width = 100/l;
            var reader = new Array();
            for(var i=0;i<l;i++){
                reader[i] = new FileReader();
                reader[i].onload = function (e) {
                    var html = '<img src="' + e.target.result + '" width="' + width + '%" style="padding:2px;"/>'
                    $("#image").append(html);
                }
                reader[i].readAsDataURL(input.files[i]);
            }
        }
        else if(l>5 && l<=10) {
            var width = 20;
            var reader = new Array();
            for(var i=0;i<l;i++){
                reader[i] = new FileReader();
                reader[i].onload = function (e) {
                    var html = '<img src="' + e.target.result + '" width="' + width + '%" style="padding:2px;"/>'
                    $("#image").append(html);
                }
                if(i==4) {
                    $("#image").append("</br>");
                }
                reader[i].readAsDataURL(input.files[i]);
            }
        }
    }
}

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    })

    $("button#delete-album").on('click', function(){
        var idAlbum = $(this).parent().attr('idAlbum');
        var _token = $("form[name='form-del-album]").find("input[name='_token']").val();
        $.ajax({
            url: "/albums/delete/" + idAlbum,
            type: "GET",
            cache: false,
            data: {"_token": _token, "idAlbum": idAlbum},
            success: function (data)
            {
                if(data == 'OK'){
                    $("#deleteAlbumModal" + idAlbum).modal("hide");
                    $("#album"+idAlbum).remove();
                }
                else {
                    alert("It failed");
                }
            }
        });
    });  
  
});