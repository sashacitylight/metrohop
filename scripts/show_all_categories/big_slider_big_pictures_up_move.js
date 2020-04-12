//большой слайдер больших картинок в самом верху страницы с рекламой
$(document).ready(function(){
    $("#slider").easySlider({
        auto: true,
        continuous: true,
        numeric: false,
        nextId: "slider1next",
        prevId: "slider1prev"
    });
});