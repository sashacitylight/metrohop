function getCookie(){
    var cookie_string = document.cookie;
    var cookie_arr = cookie_string.split(";");
    for(var i=0; i <= cookie_arr.length-1; i++)
    {
        if (cookie_arr[i].indexOf("mysumm_cart") != -1)
        {
            var myarr_summ = cookie_arr[i].split('=');
            ///да нашли Cookie
            $(".cartPrice").find(".cartSumm").hide();
            var str = "<li class='cartSumm'>" + myarr_summ[1] + "</li>";
            $(".cartPrice").append(str);
        }
    }
}

getCookie();
