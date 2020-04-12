///поиск по категориям Categories
$(function(){
    //выезжает блок поиска
    $('.mysearch').click(function(){
        $('.searchDivWrapper').show(300);
    });

    //выезжает список категорий
    $('.delivery_list').click(function(){
        $(".cities_list").slideToggle('fast');
    });



    $('ul.cities_list li').click(function(){
        var tx = $(this).html();

        $('.delivery_list').text(tx);
        $('.input_for_search').attr("value",tx);
        var tv = $(this).attr('alt');
        $(".cities_list").slideUp('fast');
        $(".delivery_list span").html(tx);
        $(".delivery_text").html(tv);

    });
});