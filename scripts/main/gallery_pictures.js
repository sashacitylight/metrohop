function zoomPictures(){
    // если отсутсвует zoomsl-3.0.min.js
    if(!$.fn.imagezoomsl){
        $('.msg').show();
        return;
    }
    else $('.msg').hide();
    // инициализаци¤ плагина
    $('.my-foto').imagezoomsl({
        zoomrange: [4, 4]
    });
}
$(document).ready(function(){
    ///zomm для картинок
    zoomPictures();
});

