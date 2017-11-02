<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

define('DB_SERVER', 'team21log.mysql.database.azure.com');
define('DB_USERNAME', 'Charaka@team21log');
define('DB_PASSWORD', '2017Team21');
define('DB_NAME', 'logbook');

/* Attempt to connect to MySQL database */
// $link=mysqli_init(); 
// mysqli_ssl_set($link, NULL, NULL, {ca-cert filename}, NULL, NULL);
// mysqli_real_connect($link, DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, 3306);
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
