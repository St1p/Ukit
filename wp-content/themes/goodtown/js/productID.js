
//var getMore = function () {
//   //
//   // if($(".content").text() == "") {
//   //$(".content").text(bigText);
//   //     }
//   // else{ $(".content").text(""); }
//
//    var el = document.getElementById("viz");
//    el.style.cssText="visibility: hidden; display: none;";
//
//
//};

//var getPlastificator = function () {
//    var plastificator = document.getElementById("plastificator");
//
//    plastificator.style.cssText="visibility: visible; display:block;";
//
//    var presentation = document.getElementById("presentation");
//    presentation.style.cssText="visibility: hidden; display:none;";
//};



var productSelection = function(name) {

    var dobavki =  $('.dobavki');
    var barvniki = $('.barvniki');

    $('.presentation').css({'visibility':'hidden','display':'none'});
    dobavki.css({'visibility':'hidden','display':'none'});
    barvniki.css({'visibility':'hidden','display':'none'});

    $('.'+name).css({'visibility':'visible','display':'block'});

};

//save nameOfProduct;
$(document).ready(function(){
    $('.getProductName').click(function(){
        var nameOfProduct = $(this).parents().find('.img-block > span').text();
   /*     localStorage.setItem('nameProduct',nameOfProduct);
        localStorage.setItem('productPrice',25);*/

        $.ajax({
            url : 'getPriseFromInternet',
            type: 'POST',
            async: false,
            data: 'exchangeRate',

            success: function (sellRate) {
                localStorage.setItem('nameProduct',nameOfProduct);
                localStorage.setItem('productPrice',sellRate);

            }
        });
    });
});

/*var getProductName = function(name) {
    var result;

    localStorage.setItem('nameProduct',name);
    localStorage.setItem('productPrice',25);

 /!*   $.ajax({
        url : 'getPriseFromInternet',
        type: 'GET',
        async: false,


        success: function (msg) {
            result = '' + msg.text;
            localStorage.setItem('nameProduct',name);
            localStorage.setItem('productPrice',result);

        }
    });*!/

/!*    return location.href="/orderProduct";*!/
};*/

//get More size for text-block
$(document).ready(function(){
    $('.getMoreHight').click(function(){
        var productBlockHeight = $(this).parents().find('.text-block ');

        if(productBlockHeight.css('height') != "314px") {
            //$('.product-block').css({'height':'320px'});
            productBlockHeight.animate({"height": "314px"},1000);
        }else {

            productBlockHeight.animate({"height": "+=830px"},1000);
        }

    });
});
