$(document).ready(function(){
    ///навигация - описание товара
    $('#description').click(function(){
        $('#deliveryID').hide();
        $('#modalProductInfo').show();
        $('#commentsTableDelivery').hide();
        $('#commentsID').hide();
        $('.divTitle').text('Описание товара');
    });

    ///навигация - отзывы
    $('#toComments').click(function(){
        $('#deliveryID').hide();
        $('#modalProductInfo').hide();
        $('#commentsTableDelivery').hide();
        $('#commentsID').show();
        $('.divTitle').text('Отзывы покупателей');
    });

    ///навигация - доставка
    $('#delivery').click(function(){
        $('#deliveryID').show();
        $('#modalProductInfo').hide();
        $('#commentsTableDelivery').hide();
        $('#commentsID').hide();
        $('.divTitle').text('Условия доставки');
    });

    ///навигация - обязательства
    $('#liabilities').click(function(){
        $('#deliveryID').hide();
        $('#modalProductInfo').hide();
        $('#commentsTableDelivery').show();
        $('#commentsID').hide();
        $('.divTitle').text('Обязательство поставщиков товара');
    });
});