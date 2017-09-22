<?php

include 'db_handler.php';

$first = $_POST['first'];
$last = $_POST['last'];
$uid = $_POST['uid'];
$pwd = $_POST['pwd'];
$dep = $_POST['radio'];

if ($dep === 'Select') {
	echo "Please select deparment";
}

$sql = "INSERT INTO user (first,last,uid,pwd,dep) VALUES ('$first','$last','$uid','$pwd','$dep')";
$result = mysqli_query($conn,$sql);

echo "Data entered";

?>