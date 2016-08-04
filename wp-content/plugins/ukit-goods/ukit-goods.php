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

register_activation_hook(__FILE__, 'ukit_goods_activation');
register_deactivation_hook(__FILE__, 'ukit_goods_deactivation');

//check created posts
add_action( 'save_post', 'ukit_check_post' );

//product
function ukit_check_post ($postId) {
    global $wpdb;
    
    $post = get_post($postId);
    $category = get_the_category( $postId );
    if($category[0]->cat_name == "products") {
        $postName = $post->post_title;

        if(!empty($_POST)) {

            $productIdFromDB = $wpdb->get_results( "SELECT product_id  FROM wp_ukit_products WHERE product_id  = '$postId' " );

            if(empty($productIdFromDB)){
                ukit_create_product($postId, $postName);
            }else {
                ukit_update_product($postId, $postName);
            }

        }
        if(!empty($_GET['action'] == 'trash')) {
            ukit_delete_product($postId);
        }
    }
}

function ukit_create_product($productId, $productName ){
    global $wpdb;

    $wpdb->query( $wpdb->prepare("INSERT INTO wp_ukit_products (product_id, product_name) VALUES ( %d, %s)", array($productId, $productName)));

}

function ukit_update_product($productId, $productName){
    global $wpdb;
    $wpdb->update('wp_ukit_products', array('product_name'=>$productName), array('product_id'=>$productId));
}
function ukit_delete_product($productId){
    global $wpdb;
    $wpdb->delete( 'wp_ukit_products', array( 'product_id' => $productId) );
}
//end product

function ukit_goods_activation() {

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

    $wpdb->get_results( "CREATE TABLE wp_ukit_products (
        product_id  INT  NOT NULL,
        product_name VARCHAR(40),
        product_prise  INT,
        PRIMARY KEY ( product_id )
      )" );
}

function ukit_goods_deactivation() {
    global $wpdb;
     $wpdb->get_results( "DROP TABLE wp_ukit_orders;" );
     $wpdb->get_results( "DROP TABLE wp_ukit_costomers;" );
     $wpdb->get_results( "DROP TABLE wp_ukit_products;" );
}


function ukit_get_post_data()
{
    global $wpdb;
    if (isset($_POST['costumerData'])) {

        //saveCostumerData
        $params = array();
        parse_str($_POST['costumerData'], $params);
        $wpdb->query( $wpdb->prepare(
        "INSERT INTO wp_ukit_costomers (customer_name, customers_email, customers_phone) VALUES ( %s, %s, %s)",
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
        echo  json_encode('ok');
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

   /*
    // counting goods
   $newtable = $wpdb->get_results( "SELECT SUM(product_prise) AS product_prise FROM wp_ukit_orders;" );
     print_r($newtable[0]->product_prise);*/

    $newtable = $wpdb->get_results( "SELECT * FROM wp_ukit_costomers;");
    //$product = $wpdb->get_results( "SELECT * FROM wp_ukit_costomers, wp_ukit_orders  WHERE wp_ukit_costomers.customer_id = wp_ukit_orders.customer_id;" );

    echo "
 <div class=\"admin-wraper\">
    <div class=\"container\">

            ";
    foreach($newtable as $value) {

        $products = $wpdb->get_results("SELECT * FROM  wp_ukit_orders  WHERE  " . $value->customer_id . " = wp_ukit_orders.customer_id;");

        echo "
                   <div class=\"row \">
                    <div class=\"col-xs-12 col-sm-12 col-md-4 \">
                        <div class='data-of-costumer'>
                         <h2><span>Імя :</span> <span>$value->customer_name</span></h2>
                         <h2><span>Email :</span> <span>$value->customers_email</span></h2>
                         <h2><span>Телефон :</span><span>$value->customers_phone</span></h2>
                          <h2><span>Дата :</span><span>$value->customers_time_order</span></h2>
                        </div>
                    </div>

                    <div class=\"col-xs-12 col-sm-12 col-md-8 \">
                    <div class='admin-table'>
                    <table class=\"table table-striped\">
                     <thead>
                     <tr>
                     <th>Назва товару</th>
                     <th>Ціна</th>
                     <th>Тара</th>
                     </tr>
                     </thead>
                     <tbody>
                     ";


            foreach($products as $product) {

                echo "

                     <tr>
                     <td>" . $product->product_name . " </td>
                     <td>" .$product->product_prise . "</td>
                     <td>" .$product->product_value . "</td>
                     </tr>
                     ";
                     }

                    echo "
                                     </tbody>
                                     </table>
                                            </div>
                                              </div>
                                              </div> ";


    }
    echo "  </div>
                   </div>  ";
}
