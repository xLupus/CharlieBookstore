$(document).ready(function() {
    let val1 = 0;
    let val2 = 0;

    $("#slider").slider({
        range: true,
        min: 0,
        max: Math.ceil($("#numMax").text()),
        slide: function(e, ui) {
            $("#val1").text(ui.values[0]);
            $("#val2").text(ui.values[1]);
        }
    });

    val1 = ($("#val1").text() * 100) / Math.ceil($("#numMax").text());
    val2 = ($("#val2").text() * 100) / Math.ceil($("#numMax").text());
    
    $("#slider span:last-child").css('left', `${val2}%`);
    $("#slider div:first-child").css({
        'width': `${val2 - val1}%`,
        'left' : `${val1}%`
    });
    $("#slider span:nth-child(2)").css('left', `${val1}%`); //(129 / 100) * 130

    if ($("#val2").text() == 0)
        $("#val2").text(Math.ceil($("#numMax").text()));

    $("form").submit(function() {
        $("#range1").val($("#val1").text());
        $("#range2").val($("#val2").text());
    })
});
