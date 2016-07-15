<?php
/*
Plugin Name: Ukit-goods
Description: It is the best plugin
Version: 1.0
Author: St1p1andr
Author URI: http://easy-code.ru/
Plugin URI: http://easy-code.ru/lesson/building-wordpress-plugin-part-one
*/

add_action( 'pre_get_posts', 'action_function_name_11' );
function action_function_name_11(  )
{

    if (isset($_POST['costumerData'])) {

        echo json_encode("ok");
        die();
    }
}