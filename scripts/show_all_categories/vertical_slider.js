<!-- вертикальный слайдер-->
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