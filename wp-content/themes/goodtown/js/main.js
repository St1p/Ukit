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