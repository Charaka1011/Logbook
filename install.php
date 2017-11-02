<?php
include './config.php';

SQL::connect();
$result = SQL::query('SHOW TABLES LIKE "entries"');

if (count($result))
{
    print '<h1>Installed! You should delete this file now.</h1> <a href="./register.php">Go to Register Page to create an acount</a>';
}
else
{
    $entries = "CREATE TABLE `entries` (`id` INT(11) AUTO_INCREMENT PRIMARY KEY,`date` DATE,`text` TEXT)";
    $users = "CREATE TABLE `users` (`id` INT(11) AUTO_INCREMENT PRIMARY KEY,`username` VARCHAR(50),`password` VARCHAR(255),`created_at` DATETIME CURRENT_TIMESTAMP)";
    SQL::query($entries);
    SQL::query($users);
    header('location: ./install.php');
}

?>