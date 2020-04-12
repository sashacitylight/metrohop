jQuery(window).load(function(){ //jQuery(window).load() must be used instead of jQuery(document).ready() because of Webkit compatibility
    // Photo gallery > Standard
    jQuery(".photosgallery-std").sliderkit({
        mousewheel:true,
        shownavitems:5,
        //navfx:"none",
        panelbtnshover:true
    });

    // Photo gallery > With captions
    jQuery(".photosgallery-captions").sliderkit({
        circular:true,
        mousewheel:true,
        keyboard:true,
        shownavitems:4,
        panelbtnshover:false,
        auto:false,
        fastchange:false
    });

    // Photo gallery > Vertical
    jQuery(".photosgallery-vertical").sliderkit({
        circular:true,
        mousewheel:true,
        shownavitems:4,
        verticalnav:true,
        navclipcenter:true,
        auto:false
    });

    // Photo gallery > Minimalistic
    jQuery(".photosgallery-minimalistic").sliderkit({
        shownavitems:6,
        circular:true,
        navitemshover:true,
        panelfxspeed: 1000
    });
});

jQuery(function(){
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
});