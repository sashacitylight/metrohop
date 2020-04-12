var arrSubCategories;

//убирает меню Категорий-Субкатегорий
function subCategoryCategoryMenuHide(){
    var BaseUrl = div.textContent;
    var imgHrefArrowUP = BaseUrl + '/images/logo/strelka_down.png';
    $('.arrowUpIcon').attr("src",imgHrefArrowUP);
    $(".Categories").hide();
}

//передать массив SubКатегорий
function setSubCategories(Arr){
    arrSubCategories = Arr;
}
//получить массив SubКатегорий
function getSubCategories(){
    return arrSubCategories;
}

////метод открывает див субкатегорий для нужной категории
function openSubCategoriesMENU(param, subCatArray, BaseUrl) {
    var listSubCategories = subCatArray;
    var subCategoriesString = JSON.stringify(listSubCategories);
    subCategoriesString = subCategoriesString.substr(1,subCategoriesString.length-2);
    var stringSubCategory = subCategoriesString.split('],');
    for(var i = 0; i <= stringSubCategory.length; ++i)
    {
        var oneStringSubCategory = stringSubCategory[i].split('"');
        for(var j = 0; j <= oneStringSubCategory.length; ++j)
        {
            if(j==3){
                var element = oneStringSubCategory[j];
                ///param это id категории
                if(param==element)
                {
                    var categoryID = element;
                    var subCategoryID = oneStringSubCategory[7];
                    var subCategoryName = oneStringSubCategory[11];
                    var link = BaseUrl+'/index.php/site/ShowProductsSortingBySubCategories?id='+subCategoryID;
                    var string = "<li class='mya'><a class='myaa' href="+link+">" + subCategoryName + "</a></li>";

                    $("#"+categoryID).show();
                    $("#"+categoryID).append(string);
                }
            }
        }
    }
}

$(document).ready(function(){
    /// список категорий клик скрывать раскрывать
    $('.someList').click(function(){
        $(".Categories").slideToggle(500);
        $(".arrowUpIcon").toggle();
        $(".arrowDownIcon").toggle();
    });

/// это меню с SubCategories при наведении на подпункт
    $(".categoryElement").hover(
        function(){
        var catID = $(this).attr("mid");
        //получить массив SubCategories
        var subCategoriesList = getSubCategories();
            //получить baseURL
        var baseUrl = div.textContent;
        //по номеру показывает список SubCategories в Категориях
        openSubCategoriesMENU(catID, subCategoriesList, baseUrl);
    },
        function(){
            //сворачивается
        $(this).find(".mya").hide();
        }
    );

});