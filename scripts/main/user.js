$(document).ready(function(){
    ///userShowInfo - панель пользователя когда он !Guest
    ///Y имя пользователя если !Guest когда не раскрыта панель пользователя
    $(".userName").click(function(){
        $(".userShowInfo").show(100);
    });

    ///открывает панель пользователя когда он Guest
    $(".UsernameUnreg").hover(function(){
        $(".userShowInfo").show(100);
    });

    /// раскрывает  панель пользователя
    $(".userName").hover(function(){
        $(".userShowInfo").show(100);
    });

    /// крестик закрытие модального окна enter_user
    $(".closeUserLogin").click(function(){
        $("#content").css("opacity","1");
        $(".user_enter").hide();
        $("#overlay").hide(800);
        $("#overlayDark").hide(800);
    });

    //// крестик панели пользователя формы закрытия
    $(".userCloseLoginModal").click(function(){
        $(".userShowInfo").hide(100);
    });

    // открыть панель пользователя
    $(".imgUser").click(function(){
        $(".userShowInfo").show(100);
    });

    //Y закрыть панель пользователя
    $(".userCloseLoginModal").click(function(){
        $(".userShowInfo").hide(100);
    });

    // открываем закрываем модальное юзер
    $(".imgUser").hover(function(){
        $(".userShowInfo").show(100);
    });


    // клик по пользователю когда !Guest открыта панель пользователя
    $(".userNameP").click(function() {
        var div = document.getElementById("baseUrlToJS");
        var dataUrl = div.textContent;
        var realWay = dataUrl+'/index.php/User/PersonalAccount';
        window.location.href = realWay;
    });

    $('#imgCloseSmallSearchDiv').click(function(){
        $('.searchDivWrapper').hide();
        $('.mysearch').toggle();

    });

    /// закрыть модальное окно
    $(".closeModalUserCabinet").click(function(){
        $(".user_enter").hide();
        $("#overlay").hide();
        $("#overlayDark").hide(100);
        $(".modalUserCabinet").hide(400);
    });


});

