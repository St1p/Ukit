<?php

add_action('wp_ajax_myaction', 'action_handler'); //работает для авторизованных пользователей
add_action('wp_ajax_nopriv_myaction', 'action_handler');

function my_stylesheet1(){
    wp_enqueue_style("style-admin",get_bloginfo('stylesheet_directory')."/css/style-admin.css");
}
add_action('admin_head', 'my_stylesheet1');
?>