<?php
include './config.php';

if (mysqli_query($link,"DESCRIBE `entries`"))
{
    print '<h1>Installed Entries Database!</h1> ';
}
else
{
    $entries = "CREATE TABLE `entries` (`id` INT(11) AUTO_INCREMENT PRIMARY KEY,`username` VARCHAR(50),`date` DATE,`text` TEXT)";
    mysqli_query($link,$entries);

    header('location: ./install.php');
}


if (mysqli_query($link,"DESCRIBE `users`"))
{
    print '<h1>Installed User Database! </h1>';
    print '<h1>You should delete this file now.</h1> <a href="./register.php">Go to Register Page to create an acount</a>';
}
else
{
    $users = "CREATE TABLE `users` (`id` INT(11) AUTO_INCREMENT PRIMARY KEY,`username` VARCHAR(50),`password` VARCHAR(255),`created_at` DATETIME CURRENT_TIMESTAMP)";
    mysqli_query($link,$users);

    header('location: ./install.php');
}

?>