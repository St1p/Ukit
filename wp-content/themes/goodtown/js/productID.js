
var productSelection = function(name) {

    var dobavki =  $('.dobavki');
    var barvniki = $('.barvniki');

    $('.presentation').css({'visibility':'hidden','display':'none'});
    dobavki.css({'visibility':'hidden','display':'none'});
    barvniki.css({'visibility':'hidden','display':'none'});

    $('.'+name).css({'visibility':'visible','display':'block'});

};

//get More size for text-block
$(document).ready(function(){
    $('.getMoreHight').click(function(){
        var productBlockHeight = $(this).parent().parent().find('.text-block ');

        if(productBlockHeight.css('height') != "314px") {
            //$('.product-block').css({'height':'320px'});
            productBlockHeight.animate({"height": "314px"},1000);
        }else {

            productBlockHeight.animate({"height": "+=900px"},1000);
        }

    });
});
