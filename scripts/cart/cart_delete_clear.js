var summ;
// считает сумму товаров, работает при изменении количества товаров в корзине
function summProducts(jsonStringProductsCart){

    var string = JSON.stringify(jsonStringProductsCart);
    var jsonDataObject = eval("(" + string + ")");

    ///считает сумму общую когда вводиш количество
    setInterval(function() {
       ///если корзина пуста, то очищаем сумму до 0
        var cartStringText=$(".cartName").text();
        if (cartStringText.indexOf("(0)")!=-1){
            createCookie('mysumm_cart',0,-1);
            $(".cartPrice").hide();
        }
        else
        {
            var summ = 0;
            for (var index = 0; index < jsonDataObject.length; ++index) {
                var stringID = jsonDataObject[index].toString();

                var number = $(".numberOneProductNumberCart#NumberID"+stringID).val();
                var price = $(".spanOneProductPriceCart#PriceID"+stringID).attr("name");

                var result = parseFloat((price*number).toFixed(2));
                summ += result;
                var resultValue = result.toString()+'$';

                //в ячейку результирующую записываем цену количество * цену
                $(".resultPriceTextField#resultPriceID"+stringID).attr("value",resultValue);
            }
            //запись в общую сумму после просчёта суммы в цикле всего
            summ = parseFloat(summ.toFixed(2));
            summ = summ.toString();
            summ = summ + '$';
            $(".buttonTotalSumCart").attr("value",summ);

            createCookie('mysumm_cart', summ, 10);
            getCookie();
        }
    }, 500);
}


//запись в куки
function createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        var expires = "; expires=" + date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}


//удалить с куки
function deleteCookie(name) {
    createCookie(name, "0", 0);
}

//получить общую цену в корзине с куки
function getCookie(){
    var cookieString = document.cookie;
    var cookieArray = cookieString.split(";");

    for(var i=0; i <= cookieArray.length-1; i++)
    {
        if (cookieArray[i].indexOf("mysumm_cart") != -1)
        {
            var arraySumm = cookieArray[i].split('=');
            ///да нашли куку
            $(".cartPrice").find(".cartSumm").hide();
            var str = "<li class='cartSumm'>" + arraySumm[1] + "</li>";
            $(".cartPrice").append(str);
            return arraySumm[1];
        }
    }
}


$(document).ready(function(){

    ///  удаление продукта с корзины
    $(".cartButtonDeleteProduct").click(function(){

        var divNumber = $(this).attr("myid");
        $('.cartOneProductNumberDiv' + divNumber.toString()).hide();

        var link = siteBaseUrl + '/index.php/Cart/DeleteProductCart';
        $.get(
            link,
            {
                number: divNumber
            },
            onAjaxSuccess
        );
        function onAjaxSuccess(data)
        {
            if(data=='empty'){
                //прячем главные дивы
                $(".cartSummPanel").hide();
                $(".mainDivCart").hide();

                //сменяем картинку корзинки на emptycart
                $(".smallImageCartIconLink").attr("src",siteBaseUrl+'/images/cart/basket-empty.png');

                ///Надпись меняем
                // 1.очищаем надпись корзина(количество)
                $(".cartName").hide();
                //2. надпись в корзине корзина (0)
                var string = "<li class='cartName'><a class='cartName' href='store/index'>" + "Корзина(" + 0 +")" + "</a></li>";
                $("#yw2").append(string);

                ///сообщение корзина пуста
                $(".mainWrapperCart").append("<img class='imgInCartEmpty' alt='image'/><div  class='isEmptyCart'>" +
                    "Ваша корзина пуста <a class='sLink'>Начните покупать сейчас!</a><p> Пожалуйста, войдите, чтобы просмотреть продукты,  </p><p> которые ранее были приобретены.</p></div>");

//                //добавляем адрес картинки в сообщении пустая корзина
               $('.imgInCartEmpty').attr('src',siteBaseUrl+'/images/logo/is_in_cart.png');

                ///добавляем атрибут для ссылки
                $('.sLink').attr('href',siteBaseUrl+'/site/ShowAllCategories');
            }
        }
    });

    //полная очистка корзины
    $(".buttonClearCart").click(function(){

        var menuId = $( "input.iButtonCssGreen" ).attr( "value");
        var link = siteBaseUrl +'/index.php/cart/clearCart';

        $.get(
            link,
            {},
            onAjaxSuccess
        );
        function onAjaxSuccess(data)
        {
            //прячем главные дивы
            $(".cartSummPanel").hide();
            $(".mainDivCart").hide();

            //сменяем картинку корзинки
            $(".smallImageCartIconLink").attr("src",siteBaseUrl+'/images/cart/basket-empty.png');

            ///очищаем надпись корзина(количество)
            $(".cartName").hide();

            //надпись в корзине корзина (0)
            var string = "<li class='cartName'><a class='cartName' href='store/index'>" + "Корзина(" + 0 +")" + "</a></li>";
            $("#yw2").append(string);

           ///сообщение корзина пуста
            $(".mainWrapperCart").append("<img class='imgInCartEmpty' alt='image'/><div  class='isEmptyCart'>" +
                "Ваша корзина пуста <a class='sLink'>Начните покупать сейчас!</a><p> Пожалуйста, войдите, чтобы просмотреть продукты,  </p><p> которые ранее были приобретены.</p></div>");

            //добавляем адрес картинки
            $('.imgInCartEmpty').attr('src',siteBaseUrl+'/images/logo/is_in_cart.png');

            ///добавляем атрибут для ссылки
            $('.sLink').attr('href',siteBaseUrl+'/site/ShowAllCategories');
        }
    });
});



