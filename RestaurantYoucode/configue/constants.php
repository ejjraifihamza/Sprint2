<?php

session_start();

define('HOMEURL', 'http://localhost/RestaurantYoucode/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Ejjhamza-23');
define('DB_NAME', 'restaurant-youcode');

$connect = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); 
$db_select = mysqli_select_db($connect, DB_NAME) or die(mysqli_error()); 


?>