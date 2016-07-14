var productArray = productArray = localStorage.productArray ? JSON.parse(localStorage.productArray) : [];
$("#basketCount").text(productArray.length);

function checkingUser() {

        var login = $("input[name='login']").val();
        var password = $("input[name='password']").val();

    $.ajax({
        url : 'checkingUser',
        type: 'POST',
        dataType: "json",
        async: false,
        data: "login="+login+"&password="+password,

        success: function (msg) {
            var result = '' + msg.text;

            if(result == "goodReqest") {
                location.reload();
            }else {
                alert("Перевірте дані ще раз ")
            }
        }
    });

}

function logOut() {

    $.ajax({
        url : 'logOut',
        type: 'GET',
        dataType: "json",
        async: false,
        data: "logOut=logOut",

        success: function (msg) {
                location.reload();
        }
    });
}
