$("input[type=checkbox]").on("change", function () {
    var elem = $(this),
        id = elem.attr("id");
    if (elem.is(":checked")) {

        $.ajax({
            url: `/tasks/completed/${id}`,
            type: "get",
            success: function (data) {
                console.log(data);
            }
        });
    } else {
        $(".alert").alert('close')
    }
});

function openAlert() {
    //show
    $('.alert').addClass('show');
    $('#messageValid').show();

}
function closeAlert() {
    //hide
    $('.alert').removeClass('show');
    $('#messageValid').hide();
}