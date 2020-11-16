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

