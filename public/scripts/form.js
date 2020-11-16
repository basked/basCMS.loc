$(document).ready(function () {
    $('form').submit(function (event) {
        var json;
        event.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (result) {
                json = jQuery.parseJSON(result);
                if (json.url) {
                    showAlert(json.msg);
                    setTimeout(hideAlert, 1500);
                    setTimeout(goto, 1500, json.url);
                } else {
                    showAlert(json.message, json.status);
                }
            },
        });
    });
});


function showAlert(msg, type = '') {
    let div = document.getElementById('alert_msg');
    div.innerHTML = msg;
    if (type === '') {
        $('.alert').removeClass('alert-danger');
        $('.alert').addClass('alert-info');
    } else {
        $('.alert').removeClass('alert-info');
        $('.alert').addClass('alert-danger');
    };
    $('.alert').addClass('show');
}

function hideAlert() {
    $('div.alert').removeClass('show');
}

function goto(url) {
    window.location.href = url;
}