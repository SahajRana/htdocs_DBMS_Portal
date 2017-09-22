<?php
session_start();
include 'db_handler.php';

$iddb=$_POST['iddb'];
$_SESSION['iddb'] = $iddb;

?>