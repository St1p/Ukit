<?php

add_action('wp_ajax_myaction', 'action_handler'); //работает для авторизованных пользователей
add_action('wp_ajax_nopriv_myaction', 'action_handler');

?>