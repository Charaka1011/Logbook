<?php
// Include config file
require_once 'config.php';
session_start();
// Processing form data when form is submitted
$username= $_SESSION['username'];
$date= date("Y-m-d");
$text=$_POST["text"];
//Validate Text 
if(empty(trim($text))){
    header("location: addlog.php");
    $text_err = "Please enter text.";
 }else{
     // Prepare a select statement
     $sql = "INSERT INTO entries (username,date,text) VALUES ('$username','$date','$text')";

      mysqli_query($link,$sql);
      $tex_err="";
    if(mysqli_affected_rows($link) > 0){
       header("location: welcome.php");
    } else {
      echo "<p>ERROR</p>";
       echo mysqli_error ($link);
    }
  }
   // Close connection
   mysqli_close($link);
?>
