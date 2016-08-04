<?php
class LocalPdo   extends  PDO
{

    //Get DB connection
    public function __construct() {
        parent::__construct("mysql:host=localhost;dbname=uk_orders;", 'root', '');
    }
}