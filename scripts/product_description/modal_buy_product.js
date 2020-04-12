$(document).ready(function(){
//закрыть модальное окно Покупка товара
    $('.crossCloseModalProductToCart').click(function(){
        $('#overlay').hide();
        $('.modalBuyProductToCartWrapper').hide();
        $(".smallImageCartIconLink").attr("src",siteBaseUrl+'/images/cart/basket-full.png');
    });

    //регулируем количество товара в модальном окне и меняем количество цену вверху
    $('#modalNumber').click(function(){
        var number = $('#modalNumber').val();
        var price = $('#modalPrice').val();
        var summ = number * price;
        summ = parseFloat(summ.toFixed(2));
        $('.textNumberPriceTotalPrice').text(number+' шт  - '+ summ +'$');
    });

    // регулируем коливество товара в модальном окне и меняем количество цену внизу
    $(".modalNumberClick").click(function(){
        var id = $(this).attr("id");
        var number = $(this).attr("value");
        var num = parseInt(id.replace(/\D+/g,""));
        var price = number*$('#modalPrice'+num).val();
        price = parseFloat(price.toFixed(2));
        $('.number' + num.toString()).text( number+' (шт) - '+price+' $');
    });

});