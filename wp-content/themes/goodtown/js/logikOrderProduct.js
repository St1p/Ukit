    var priceForLetters = document.getElementById("priceForLetters");
    var priceForCanister = document.getElementById("priceForCanister");
    var priceForBarrel = document.getElementById("priceForBarrel");
    var priceForContainer = document.getElementById("priceForContainer");
    var productPrice ;
    var nameProduct;
    var valueProduct;
    var productArray=[];

    //Math.round() - привычное округление,
    //Math.floor() - округление строго в сторону меньшего числа
    //Math.ceil() - округление строго в сторону большего числа

       $("select").change(function () {
           var lableError = document.getElementById("error-block");
           lableError.style.cssText = "visibility: hidden; display:none;";

           valueProduct = $("select#chooseProductValue").val();
       });

    //save nameOfProduct;
    $(document).ready(function(){
        $('.getProductName').click(function(){
            var nameOfProduct = $(this).parent().parent().find('.img-block > span').text();

            $.ajax({
                url : 'getPriseFromInternet',
                type: 'POST',
                async: false,
                data: {'getProductPrise' : nameOfProduct},

                success: function (resultArray) {
                    var data = JSON.parse(resultArray);
                    if(!data.status) {
                        alert("На даний товар ціна не встановленна");
                    }
                    nameProduct = nameOfProduct;
                    productPrice = data.prise;
                    saveDataInLocalStorage();
                    outputSelectPrise();
                }
            });
        });
    });

    function outputSelectPrise(){
        productPrice =  Math.round(parseFloat(productPrice));
        priceForLetters.innerHTML = productPrice + " грн";
        priceForCanister.innerHTML = (productPrice *10) +" грн";
        priceForBarrel.innerHTML = (productPrice *200) +" грн";
        priceForContainer.innerHTML =(productPrice *1000) +" грн"
    }
    function saveDataInLocalStorage() {
        localStorage.setItem('nameProduct',nameProduct);
        localStorage.setItem('productPrice',productPrice);
    }

    function SaveDataInLocalStage() {

            if(typeof(valueProduct)!="undefined") {

                    if(typeof(localStorage.productArray) !="undefined") {
                        productArray = localStorage.productArray ? JSON.parse(localStorage.productArray) : [];
                    }
                    productArray.push({
                        nameP:nameProduct,
                        priceP: productPrice * valueProduct ,
                        valueP: valueProduct
                    });
                    localStorage.productArray = JSON.stringify(productArray);
                    alert("Ваше замовлення: Продукт:"+nameProduct+" в корзині!" );
                    $("#basketCount").text(productArray.length);
             }else {

                var lableError = document.getElementById("error-block");
                lableError.style.cssText = "visibility: visible;  display: table-row;";

            }
    }
