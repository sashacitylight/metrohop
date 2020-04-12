$(document).ready(function(){
    ///биография модал
    $("#clearHistoryProductsViewed").click(function(){
        var baseUrl = div.textContent;
        var link = baseUrl+'/index.php/ProductDescription/clearProductsViewedCookie';
        $.get(
            link,
            {
                param1: "clear"
            },
        onAjaxSuccess
        );
        function onAjaxSuccess(data)
        {
           $('.d-carousel').hide();
        }
    });
});

////виджет просмотренных товаров
$(function() {
    $(".Vwidget  .VjCarouselLite").jCarouselLite({
        btnNext: ".Vwidget .down",
        btnPrev: ".Vwidget .up",
        vertical: true,
        visible: 3,
        auto: 5000,
        speed: 500,
        circular: true
    });
});
