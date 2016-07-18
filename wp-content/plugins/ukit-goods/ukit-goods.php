<?php
/*
Plugin Name: Ukit-goods
Description: It is the best plugin
Version: 1.0
Author: St1p1andr
Author URI: http://easy-code.ru/
Plugin URI: http://easy-code.ru/lesson/building-wordpress-plugin-part-one
*/
add_action( 'pre_get_posts', 'ukit_get_post_data' );
add_action('admin_menu', 'ukit_add_admin_huk');

register_activation_hook(__FILE__, 'msp_helloworld_activation');
register_deactivation_hook(__FILE__, 'msp_helloworld_deactivation');

function msp_helloworld_activation() {

    global $wpdb;

    $wpdb->get_results( "CREATE TABLE wp_ukit_costomers (
    customer_id  INT AUTO_INCREMENT NOT NULL,
        customer_name VARCHAR(40),
        customers_email VARCHAR(40),
        customers_phone VARCHAR(15),
        customers_time_order  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY(customer_id)
      ) ENGINE=InnoDB CHARACTER SET=UTF8;" );

    $wpdb->get_results( "CREATE TABLE wp_ukit_orders (
    order_id  INT AUTO_INCREMENT NOT NULL,
        product_name VARCHAR(40),
        product_prise  INT NOT NULL,
        product_value INT NOT NULL,
        customer_id  INT NOT NULL,
        PRIMARY KEY(order_id),
        FOREIGN KEY ( customer_id) REFERENCES wp_ukit_costomers(customer_id)
          ON UPDATE CASCADE
          ON DELETE CASCADE
      ) ENGINE=InnoDB CHARACTER SET=UTF8;" );
}

function msp_helloworld_deactivation() {
    global $wpdb;
     $wpdb->get_results( "DROP TABLE wp_ukit_orders;" );
     $wpdb->get_results( "DROP TABLE wp_ukit_costomers;" );
}


function ukit_get_post_data()
{
    global $wpdb;
    if (isset($_POST['costumerData'])) {

        $params = array();
        parse_str($_POST['costumerData'], $params);

        //saveCostumerData
       $wpdb->query( $wpdb->prepare(
        "INSERT INTO wp_ukit_costomers (customer_name, customers_email, customers_phone) VALUES ( %s, %s, %d)",
        array( $params ['name'] , $params ['email'] , $params ['phone'])));
        $costumerId = $wpdb->insert_id;

        //saveCostumerOrder
        //charset UTF-8
        $param = stripslashes($_POST['ordersArray']);
        $formData =  json_decode($param,true);
        $maxCout = count($formData);
        for ($count = 0 ; $count < $maxCout; $count ++ ) {
            $wpdb->query( $wpdb->prepare(
            "INSERT INTO wp_ukit_orders (product_name, product_prise, product_value, customer_id) VALUES ( %s, %s, %s, %d)",
           array( $formData [$count] ['nameP'],
                $formData [$count] ['priceP'],
                $formData [$count] ['valueP'],
               $costumerId )));
        }
        var_dump( $maxCout);
        die();
    }
}
function ukit_add_admin_huk ()
{
    add_options_page( 'ukit-admin-page', 'ukit-admin-page', 8, 'ukit-page', 'ukit_create_admin_page' );
}

function ukit_create_admin_page()
{
    global $wpdb;
    $newtable = $wpdb->get_results( "SELECT * FROM wp_ukit_costomers, wp_ukit_orders WHERE wp_ukit_costomers.customer_id = wp_ukit_orders.customer_id" );
  var_dump($newtable);
}
