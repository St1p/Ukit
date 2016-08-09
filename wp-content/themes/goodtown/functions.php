<?php

add_action('wp_ajax_myaction', 'action_handler'); //работает для авторизованных пользователей
add_action('wp_ajax_nopriv_myaction', 'action_handler');


function my_stylesheet1(){
    wp_enqueue_style("style-admin",get_bloginfo('stylesheet_directory')."/css/style-admin.css");
}
add_action('admin_head', 'my_stylesheet1');

add_action( 'pre_get_posts', 'get_data_from_internet' );

function get_data_from_internet()
{
    if(isset($_POST['exchangeRate'])) {
        $content = file_get_contents('http://goverla.ua/');

// Определяем позицию строки, до которой нужно все отрезать
        $pos = strpos($content, '<div class="gvrl-table-row" id="pln">');

//Отрезаем все, что идет до нужной нам позиции
        $content = substr($content, $pos);

// Точно таким же образом находим позицию конечной строки
        $pos = strpos($content, '<div class="gvrl-table-row" id="huf">');

// Отрезаем нужное количество символов от нулевого
        $content = substr($content, 0, $pos);

// Get number
        $numbers = preg_replace("/[^0-9]/", '', $content);

        $arrayExchangeRate = str_split($numbers, 3);

        $sellRate = (float)$arrayExchangeRate[0];
        $buyRate = $arrayExchangeRate[1];

        echo  $sellRate / 100 ;
        die();
    }
}
?>