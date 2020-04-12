$(document).ready(function() {
    /// Картинка увеличивается при наведении и уменьшается при отведении
    // навели указатель мыши на товар в списке товаров
    var divClosedID = ''; ///ID дива который открывается
    var mainDivID = '';   ///ID основного обёрточного дива на который наводим

    ////раскрываем подробную информацию о товаре при наведении
    // и скрываем при отведении
    $(".allDivInfo").hover(function(){
            //увеличиваем кол-во инфы для товара
            var divID = $(this).attr('id');
            var numberDiv = parseInt(divID.replace(/\D+/g,""));
            divClosedID = "#invDivNumber"+numberDiv;
            $(divClosedID).show();
            mainDivID = "#divNumberWrapper"+numberDiv;
            $(mainDivID).css("position","relative");
            $(mainDivID).css("z-index","10000");
            $(mainDivID).css("height","310px");
            $(mainDivID).css("border-left","1px solid #c7c7c7");
            $(mainDivID).css("border-right","1px solid #c7c7c7");
            $(mainDivID).css("border-bottom","1px solid #c7c7c7");

            ///див который появляется
        },function(){
            $(mainDivID).css("position","static");
            $(mainDivID).css("z-index","1");
            $(mainDivID).css("height","125px");
            $(mainDivID).css("border","none");
            //убираем
            $(divClosedID).hide();
            mainDivID = '';
            divClosedID = '';
        }
    );
});
