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

           nameProduct = localStorage.getItem('nameProduct');
           productPrice = localStorage.getItem('productPrice');
           productPrice =  Math.round(4 * parseFloat(productPrice));
           valueProduct = $("select#chooseProductValue").val();
           priceForLetters.innerHTML = productPrice + " грн";
           priceForCanister.innerHTML = (productPrice *10) +" грн";
           priceForBarrel.innerHTML = (productPrice *200) +" грн";
           priceForContainer.innerHTML =(productPrice *1000) +" грн"

       });

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

        //$(".buttonclass").attr("id",tmp); - заміна Id;
        //localStorage.name = "name";
    }


    //$( "select" ).change(function () {
    //   var nameProduct = $("select#chooseProduct").val();
    //    $("#productName").val(nameProduct);
    //    productName.innerHTML=nameProduct;
    //        if(nameProduct=='betomix'){
    //            productPrice =26;
    //            $("#productPrice").val(productPrice);
    //            priceForLetters.innerHTML = productPrice ;
    //            priceForCanister.innerHTML = productPrice *10;
    //            priceForBarrel.innerHTML = productPrice *200;
    //            priceForContainer.innerHTML = productPrice *1000;
    //        }
    //    if(nameProduct=='purkolor'){
    //        productPrice = 32;
    //        $("#productPrice").val(productPrice);
    //        priceForLetters.innerHTML = productPrice ;
    //        priceForCanister.innerHTML = productPrice *10;
    //        priceForBarrel.innerHTML = productPrice *200;
    //        priceForContainer.innerHTML = productPrice *1000
    //    }
    //
    //    product = {
    //        name:nameProduct,
    //        prise:productPrice
    //    };
    //
    //    localStorage.setItem('1',JSON.stringify(product));
    //});


