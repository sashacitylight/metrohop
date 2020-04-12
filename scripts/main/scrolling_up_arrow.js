$(document).ready(function(){
//для прокрутки в начало страницы оранжевая стрелка
    $("#up").click(function(){
        $("body").animate({"scrollTop":0},"slow");
    });

//закрыть - крестик стрелки прокрутки
    $(".imgUpClose").click(function(){
        $('#up').hide();
    });
});

