$(document).ready(function() {
    $("#slider").slider({
        range: true,
        min: 0,
        max: $("#numMax").text(),
        slide: function(e, ui) {
            $("#val1").text(ui.values[0]);
            $("#val2").text(ui.values[1]);
        }
    });

    $("form").submit(function() {
        $("#range1").val($("#val1").text());
        $("#range2").val($("#val2").text());
    })
});
