<?php
/*
Plugin Name: Ukit-goods
Description: It is the best plugin
Version: 1.0
Author: St1p1andr
Author URI: http://easy-code.ru/
Plugin URI: http://easy-code.ru/lesson/building-wordpress-plugin-part-one
*/


add_action('admin_menu', 'ukit_add_admin_huk');

register_activation_hook(__FILE__, 'ukit_goods_activation');
register_deactivation_hook(__FILE__, 'ukit_goods_deactivation');

//save costumer order
add_action( 'pre_get_posts', 'ukit_get_post_data' );
//check created posts
add_action( 'save_post', 'ukit_check_post' );
//save product prise
add_action( 'pre_get_posts', 'ukit_save_product_prise' );
//delete product post in admun panel
add_action( 'pre_get_posts', 'ukit_delete_costumer_order' );

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

function ukit_add_admin_huk ()
{
    add_options_page( 'ukit-admin-page', 'ukit-admin-page', 8, 'ukit-page', 'ukit_create_admin_page' );
}

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

function ukit_delete_costumer_order() {

    if(isset($_POST['productId'])) {
        global $wpdb;
        $wpdb->delete( 'wp_ukit_orders', array( 'order_id' => $_POST['productId']) );
        echo  json_encode('ok');
        die();
    }
}
//end product


function ukit_get_post_data()
{
    global $wpdb;

    if (isset($_POST['costumerData'])) {


            //saveCostumerData
            $params = array();
            parse_str($_POST['costumerData'], $params);
            $param = stripslashes($_POST['ordersArray']);
            $formData = json_decode($param, true);
            $maxCout = count($formData);

        if (!empty($formData)) {
            $wpdb->query($wpdb->prepare(
                "INSERT INTO wp_ukit_costomers (customer_name, customers_email, customers_phone) VALUES ( %s, %s, %s)",
                array($params ['name'], $params ['email'], $params ['phone'])));
            $costumerId = $wpdb->insert_id;

            //saveCostumerOrder
            //charset UTF-8
            for ($count = 0; $count < $maxCout; $count++) {
                $wpdb->query($wpdb->prepare(
                    "INSERT INTO wp_ukit_orders (product_name, product_prise, product_value, customer_id) VALUES ( %s, %s, %s, %d)",
                    array($formData [$count] ['nameP'],
                        $formData [$count] ['priceP'],
                        $formData [$count] ['valueP'],
                        $costumerId)));
            }

            echo json_encode('ok');
            die();
        } else {
            echo json_encode('notOrderData');
            die();
        }
    }
}


//create admin page
function ukit_create_admin_page()
{
    global $wpdb;
    $newtable = $wpdb->get_results( "SELECT * FROM wp_ukit_costomers;");
    //$product = $wpdb->get_results( "SELECT * FROM wp_ukit_costomers, wp_ukit_orders  WHERE wp_ukit_costomers.customer_id = wp_ukit_orders.customer_id;" );
    ukit_create_costumer_table($wpdb,$newtable );
    ukit_admin_page_js();

}

//components admin page
function ukit_create_costumer_table($wpdb,$newtable ) {

    echo "
 <div class=\"admin-wraper\">
    <div class=\"container\"> ";

    ukit_form_of_product($wpdb);
    foreach($newtable as $value) {
        $finalPrise = 0;
        $products = $wpdb->get_results("SELECT * FROM  wp_ukit_orders  WHERE  " . $value->customer_id . " = wp_ukit_orders.customer_id;");

        if (!empty($products)) {
            //create table
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

            //select products
            foreach ($products as $product) {

                $finalPrise = $finalPrise + $product->product_prise;
                echo "
             
                     <tr>
                   
                     <td >" . $product->product_name . " </td>
                     <td>" . $product->product_prise . "</td>
                     <td>" . $product->product_value . "</td>
                     <td>
                      <span class='hidden'  >$product->order_id</span>
                     <i class=\"fa fa-trash-o\" aria-hidden=\"true\"></td>
                     </tr>
                     ";
            }
            echo "
                                     </tbody>
                                     </table>
                                            </div>
                                              </div>
                                              </div> 
                                              <div>Загальна ціна : $finalPrise </div>";
        }
    }
    echo "  
                </div>
                   </div>  ";
}

function ukit_form_of_product($wpdb){

    $postOfProduct = $wpdb->get_results( "SELECT * FROM wp_ukit_products;");
    //вивести ціну на  тавар
    echo "
    <div class='form-wraper'>
         <form   id=\"setProductPrise\"  >
        <select name='productId'>";
        foreach($postOfProduct as $post) {
        echo "<option value=\"$post->product_id\">$post->product_name</option>";
          }
        echo  "</select>
         <input type=\"text\"    name=\"prise\" class=\"form-control\"  placeholder=\"Вкажіть ціну товару\">
         <input type=\"button\"  id='button' class=\"form-submit\" value=\"записати\">
        </form> 
    </div>
    ";

}

function ukit_save_product_prise(){
    global $wpdb;

    if(isset($_POST['productId']) && isset($_POST['prise'])) {
        //check digit
        $digit = is_numeric($_POST['prise']);
        if ($digit) {
            $wpdb->update('wp_ukit_products', array('product_prise'=>$_POST['prise']), array('product_id'=>$_POST['productId']));
        }
        echo  json_encode($digit);
        die();
    }
}

function ukit_admin_page_js(){
    echo "
     <script >
   jQuery('#button').click(function(){
       var productPrise = jQuery(\"#setProductPrise\").serialize();
   
       jQuery.ajax({
				url: '/',
				type: 'POST',
				dataType: \"json\",
				async: false,
				data: productPrise,
				
				success: function (result) {
				    (result)?alert('Ціна змінена'):alert('Введіть число');
				}
			});
    });
    
    
      jQuery('.fa-trash-o').click(function(){
      //var nameOfProduct = $(this).parents().find('.hidden').text();
      var productId = jQuery(this).parent().find('span').text();
   
       jQuery.ajax({
				url: '/',
				type: 'POST',
				dataType: \"json\",
				async: false,
				data: {'productId' : productId},
				
				success: function (result) {
				    alert(result);
				    location.reload();
				}
			});
    });
    
    
    </script>
    ";
}
//end components admin page


//get prouct prise
add_action( 'pre_get_posts', 'ukit_get_product_prise' );

function ukit_get_product_prise() {
    global $wpdb;
    if(isset($_POST['getProductPrise'])) {
        $nameOfProduct =  str_replace(" ","",$_POST['getProductPrise']);

        $productPrise =  $wpdb->get_results("SELECT product_prise FROM  wp_ukit_products  WHERE '$nameOfProduct' = wp_ukit_products.product_name;");
        $response["status"] = !empty($productPrise) && !is_null($productPrise[0]->product_prise);
        if ($response["status"] ) {
            $exengeRate = get_data_from_internet();
            $result = $exengeRate * $productPrise[0]->product_prise;
            $response['prise'] = $result;
        }else {
            $response['prise'] = 0;
        }
        echo json_encode($response);
        die();
    }
}

function get_data_from_internet()
{
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

        return  $sellRate / 100 ;

}

