<?php
require 'config.php';
$rowID = $_POST['id'];
echo $rowID;
function delete($id,$database){
    $sql = "DELETE FROM entries WHERE id=$id";
    if ($database->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("location: welcome.php");
    } else {
        echo "Error deleting record: " . $database->error;
    }
}
delete($rowID,$link);

$link->close();


 ?>