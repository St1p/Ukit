
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
$(document).ready(function(){
    $('#getProductName').click(function(){
      //  var name =  $(this).parent('.button-block').find('.img-block ');
        var obg =  $(this).parents();
        var name = obg[1].find('.img-block span');

        alert(name.text());
        /*var name =  $('.text-block').attr( "id");
        localStorage.setItem('nameProduct',name);
        localStorage.setItem('productPrice',25);*/

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

function getMoreHeight (name) {

    var productBlockHeight = $('#'+name+'.text-block');

    if(productBlockHeight.css('height') != "314px") {
        //$('.product-block').css({'height':'320px'});
        productBlockHeight.animate({"height": "314px"},1000);
    }else {

        productBlockHeight.animate({"height": "+=830px"},1000);
    }
}