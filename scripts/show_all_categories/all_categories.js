//   преобразуем  меню корректировки размеров, сужаем его на границе со слайдером
function changeMenu(){
    $('.Categories').css("width","104px");
    $('.openDiv').css("margin-left","-10px");
    $('.someList').css("width","125px");
    $('.someList p').css("margin-left","-15px");
    $('.someList p').css("font-size","15px");
    $('#a_smaller').css("font-size","14px !important");
}
$(document).ready(function(){
//   преобразуем  меню корректировки размеров, сужаем его на границе со слайдером
changeMenu();
});