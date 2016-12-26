/**
 * Created by NTH on 8/30/2016.
 */

$(function () {
    $(".qtyplus").click(function(e) {
        e.preventDefault();
        var r = $(this).parent().find(".qty");
        var i = parseInt(r.val());
        r.val(isNaN(i) ? 0 : i + 1)
    });
    $(".qtyminus").click(function(e) {
        e.preventDefault();
        var r = $(this).parent().find(".qty");
        var i = parseInt(r.val());
        r.val(!isNaN(i) && i > 0 ? i - 1 : 0)
    });
});
