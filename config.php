<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */


/* Attempt to connect to MySQL database */
$link=mysqli_init(); mysqli_ssl_set($link, NULL, NULL, {ca-cert filename}, NULL, NULL); mysqli_real_connect($link, "team21log.mysql.database.azure.com", "Charaka@team21log", {"2017Team21"}, {"logbook"}, 3306);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
