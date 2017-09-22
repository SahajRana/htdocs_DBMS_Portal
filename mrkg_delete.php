<?php
session_start();
include 'db_handler.php';


$uniqid = $_POST['uniqid'];

$sql = "DELETE FROM mrkg_entry WHERE id='$uniqid'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

?>

