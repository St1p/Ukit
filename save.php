
<?php
ini_set('display_errors', 1);
require_once "localPDO.php";
$dbConnections =  new LocalPdo();
//save CostumerData
$params = array();
parse_str($_GET['costumerData'], $params);

$stmt = $dbConnections->prepare("INSERT INTO customers (customer_name, customers_email, customers_phone )
 VALUES ( ?, ?, ?) ");
$stmt->execute(array($params ['name'] , $params ['email'] , $params ['phone']));
$costumerId = $dbConnections->lastInsertId();

//save CostumerOrder
$formData =  json_decode($_GET['ordersArray'],true);
$maxCout = count($formData);
for ($count = 0 ; $count < 2; $count ++ ) {
    $stmt = $dbConnections->prepare("INSERT INTO orders (product_name, product_prise, product_value, customer_id)
 VALUES ( ?, ?, ?, ?) ");
    $stmt->execute(array( $formData [$count] ['nameP'],
        $formData [$count] ['priceP'],
        $formData [$count] ['valueP'],
        $costumerId ));
}
?>