<?php
session_start();
include 'db_handler.php';

$numberA = $_POST['numberA'];
$datedb = $_POST['datedb'];
$servicesdb = $_POST['servicesdb'];
$feedbackdb = $_POST['feedbackdb'];
$id=$_POST['id'];
$_SESSION['number'] = $numberA;
$_SESSION['datedb'.$id] = $datedb;
$_SESSION['servicesdb'.$id] = $servicesdb;
$_SESSION['feedbackdb'.$id] = $feedbackdb;



?>