$flag_main=0;
///sidebar
$(function() {
    var offset = $("#sidebar").offset();
    var topPadding = 15;
    $(window).scroll(function() {
    if ($(window).scrollTop() > offset.top) {
    $("#sidebar").stop().animate({
    marginTop: $(window).scrollTop() - offset.top + topPadding
    });
} else {
    $("#sidebar").stop().animate({
        marginTop: 0
    });
};
});
});



///Закидываем src в zoom и включаем его
function setZoom(){
     var pictSrc = $('.smallImg').attr("src");

    $('.imgBigInleftCommonProductsThisCategoryPanel').attr("src",pictSrc);
    $('.zoom').attr("href",pictSrc);
    $('a.zoom').easyZoom();

    $(".imgBigInleftCommonProductsThisCategoryPanel").attr("src",pictSrc);
    $(".imgBigInleftCommonProductsThisCategoryPanel").attr("data-zoom-image",pictSrc);
}


$(document).ready(function(){
///включаем зум картинки
    setZoom();
    var fontSize = $('.left_div').css('height');
    $('.right_div').css('height',fontSize);

    ///маленькие картинки под большое hover меняется большая картинка
    $(".smallImg").hover(function(){
        var pictSrc = $(this).attr("src");
        $('.imgBigInleftCommonProductsThisCategoryPanel').attr("src",pictSrc);
        $('.zoom').attr("href",pictSrc);
        $('a.zoom').easyZoom();

        $(".imgBigInleftCommonProductsThisCategoryPanel").attr("src",pictSrc);
        $(".imgBigInleftCommonProductsThisCategoryPanel").attr("data-zoom-image",pictSrc);
    });

});