<?php

$conn = mysqli_connect("localhost","root","","login_form");

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}

?>