$(document).ready(function(){
    //позиционирование футера относительно окна монитора под таймер
    function setFooterPosition(){
        var pageWidth = $("html").width();
        var pageHeight = $("html").height();
        pageHeight = pageHeight-18;
        var width = pageWidth.toString()+'px';
        var height = pageHeight.toString()+'px';
        $('#footer').css("width",width);
        $('#productFooter').css("margin-top",height);
    }

    setInterval(function() {
        setFooterPosition();
    }, 100);
});