//$(document).ready(function(){
//  	$(".main-slider").owlCarousel({
//
//	  	navigation : true,
//	  	slideSpeed : 300,
//	  	pagination : true,
//	  	paginationSpeed : 400,
//	  	navigation: true,
//	  	singleItem:true
//  	});
//});


//
//var className;
//function slayd(name){
//	className=name;
//	$('.'+name).slick('slickNext');
//}
//
//$('.button-slider').slick({
//	slickNext: true,
//	slidesToShow: 5,
//	slidesToScroll: 1,
//	vertical: true,
//	arrows: false
//});

//slider
var className;
function slickNext(name){
	className=name;
	$('.'+name).slick('slickNext');
	//$('.'+name).slick('slickPrev');
}
function slickPrev(name){
	className=name;
	$('.'+name).slick('slickPrev');
}

$('.best-sales-slider').slick({
	slickNext: true,
	slidesToShow: 3,
	slidesToScroll: 1,
	autoplay: true,
	autoplaySpeed: 2000,
	vertical: true,
	arrows: false
});

$('.brands-slider').slick({
	slickNext: true,
	slidesToShow: 3,
	slidesToScroll: 1,
	arrows: false
});

/*Form validation*/
$(document).on('click', 'input:submit', function (e) {
	e.preventDefault();
	var obj = $(this).closest('form'),
		url = obj.attr("action"),
		button = obj.children(".form-submit"),
		buttonText = button.val(),
		err = 0;

	obj.find(".form-control").each(function () {
		var re = new RegExp($(this).attr('pattern'));

		if ($(this).val() == "") {
			$(this).addClass("error-input");
		} else if (!re.test($(this).val())) {
			$(this).addClass("error-input");
		} else {
			$(this).removeClass("error-input");
		}
	});

	//Send form  id="orderForm"
	err = $(".error-input").length;
	if (err == 0) {
			var ordersArray = '' + JSON.stringify(productArray);
			var costumerData = $("#sendForm").serialize();
			var data = {'costumerData': costumerData, 'ordersArray': ordersArray};

			$.ajax({
				url: 'http://myprogect/basket/',
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
		} else  {
			alert('false');
		}
});