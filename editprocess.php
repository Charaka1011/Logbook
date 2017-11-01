<?php 
require 'config.php';

$username= $_POST["username"];
$date=$_POST["date"];
$text=$_POST["text"];
$id = $_POST["id"];

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
} 

$sql = "UPDATE entries SET text='$text' WHERE id=$id";

if ($link->query($sql) === TRUE) {
    header("location: welcome.php");
} else {
    echo "Error updating record: " . $link->error;
}

$link->close();

?>