<?php
session_start();
include 'db_handler.php';

$corp = $_POST['radio'];
$mobno = $_POST['mobno'];
$name = $_POST['name'];
$address = $_POST['address'];
$field = $_POST['field'];
$request = $_POST['request'];
$date = $_POST['date'];
$age = $_POST['age'];

$sqlCheck = "SELECT * FROM mrkg_entry WHERE name='$name' AND mobno='$mobno' AND date='$date'";
$resultCheck = mysqli_query($conn,$sqlCheck);
$row=mysqli_fetch_assoc($resultCheck);

if ($corp === 'Select') {
	echo "<script type='text/javascript'>alert('**Please select corporate!**');
	window.location.href='mrkg_inside_add.php';
	</script>";
	
	exit();
}

if ($name === $row['name'] && $mobno === $row['mobno'] && $date === $row['date']) {
	echo "<script type='text/javascript'>alert('**User Already exist!**');
	window.location.href='mrkg_inside_add.php';
	</script>";
	exit();
}

$sql = "INSERT INTO mrkg_entry (corp,mobno,name,address,field,request,date) VALUES ('$corp','$mobno','$name','$address','$field','$request','$date','$age')";
$result = mysqli_query($conn,$sql);

echo "<script type='text/javascript'>alert('Data entered!');
window.location.href='mrkg_inside_add.php';
</script>";
?>