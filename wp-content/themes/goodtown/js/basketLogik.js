/**
 * Created by stiven90 on 06.11.15.
 */

var productArray=[];
var totalPrice=0;
productArray = localStorage.productArray ? JSON.parse(localStorage.productArray) : [];

    for(var count=0;count<productArray.length;count++) {
            json = productArray[count];
            var nameProduct = json[Object.keys(json)[0]];
            var priceProduct = json[Object.keys(json)[1]];
            var valueProduct = json[Object.keys(json)[2]];
            totalPrice = totalPrice+priceProduct;

            if (typeof(nameProduct) != "undefined") {

                    var content = '<div class="row-block">'
                                +'<div class="cell-block">' + nameProduct +'</div>'
                                +'<div class="cell-block">' + priceProduct +'</div>'
                                +'<div class="cell-block">' + valueProduct +'</div>'
                                +'<div class="cell-block">'+'<button ' + 'id="' + count
                                + '"' + ' type="button" ' + 'onclick="removeProduct(this) ">'
                                +'Очистити</button>' +'</div>' + '</div>';
                $("div.basket-content").append(content);

            }
        }

$("#totalPrice").text(totalPrice);

function removeProduct(obg) {

    var key = obg.id;
    delete productArray[key];
    var newArray = [];
    var count = 0;
    for(var z = 0;z<productArray.length;z++) {
        if(productArray[z]!=null){
            newArray[count]=productArray[z];
            count++;
        }
    }
    localStorage.productArray = JSON.stringify(newArray);
    location.reload();
    return false;
}


function saveProductInDB() {
        var ordersArray = ''+ JSON.stringify(productArray);
        //var data = JSON.stringify(productArray[0]);
        var costumerData = $("#sendForm").serialize();
        var data = { 'costumerData': costumerData , 'ordersArray' : ordersArray};
       
    $.ajax({
        url : 'http://myprogect/basket/',
        type: 'POST',
        dataType: "json",
        async: false,
        /*data: "name="+array, "form="+form,*/
       /* data: "name="+array,*/
        data: data,


        success: function (msg) {
                var result = '' + msg.text;

                alert(msg);
              /*  if(result == "goodReqest") {
                    localStorage.clear();
                    alert("Ваше замовлення прийняте");
                    location.reload();
                }if(result == "BaskedIsEmpty") {
                    alert("Заповніть Корзину");
                }else {
                    alert("Афториризуйтесь")
                }*/
            }
        });
   // location.href='/save.php'

}

