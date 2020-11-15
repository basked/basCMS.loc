$(document).ready(function () {
    $('form').submit(function (event) {
        var json;
        event.preventDefault();
        $.ajax({
            data: new FormData(this),
            dataType:'json', /*add*/
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                    json =JSON.parse(result);
                    if (json.url) {
                        window.location.href = json.url;
                    } else {
                        alert(json.status + ' - ' + json.message);
                    }
            }
        })
    })
});