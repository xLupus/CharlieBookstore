$(document).ready(function() {
    let val1 = 0;
    let val2 = 0;

    $("#slider").slider({
        range: true,
        min: 0,
        max: Math.ceil($("#preco-max").val()),
        slide: function(e, ui) {
            $("#val1").val(ui.values[0]);
            $("#val2").val(ui.values[1]);
        }
    });

    val1 = ($("#val1").val() * 100) / Math.ceil($("#preco-max").val());
    val2 = ($("#val2").val() * 100) / Math.ceil($("#preco-max").val());

    $("#slider span:last-child").css('left', `${val2}%`);
    $("#slider div:first-child").css({
        'width': `${val2 - val1}%`,
        'left' : `${val1}%`
    });
    $("#slider span:nth-child(2)").css('left', `${val1}%`); //(129 / 100) * 130
});
