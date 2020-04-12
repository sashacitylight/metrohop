$(document).ready(function(){
    ///открыть биографию автора
    $(".biographyClick").click(function(){
        var linkID = $(this).attr("biographyProductID");
        var closedDivID = "#biographyID" + linkID.toString();
        $(closedDivID).show();
    });

    //закрыть модальное окно биографии автора
    $(".closeBiography").click(function(){
        $(".biographyDiv").hide();
    });

});