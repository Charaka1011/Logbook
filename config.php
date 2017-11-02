<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

// Now we are not dependent on application location
define('ROOT',dirname(__FILE__));

// an abstract SQL class
include ROOT . '/lib/SQL.php';

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'logbook');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
