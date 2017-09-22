<?php
session_start();
include 'db_handler.php';

$first = $_POST['first'];
$last = $_POST['last'];
$uid = $_POST['uid'];
$pwd = $_POST['pwd'];
$dep = $_POST['radio'];

$sqlCheck = "SELECT * FROM user WHERE uid='$uid'";
$resultCheck = mysqli_query($conn,$sqlCheck);
$row=mysqli_fetch_assoc($resultCheck);

if ($dep === 'Select') {
	echo "<script type='text/javascript'>alert('**Please select deparment!**');
	window.location.href='new_user.php';
	</script>";
	
	exit();
}

if ($uid === $row['uid']) {
	echo "<script type='text/javascript'>alert('**Username Already exist!**');
	window.location.href='new_user.php';
	</script>";
	exit();
}

$sql = "INSERT INTO user (first,last,uid,pwd,dep) VALUES ('$first','$last','$uid','$pwd','$dep')";
$result = mysqli_query($conn,$sql);

echo "<script type='text/javascript'>alert('Data entered!');
window.location.href='new_user.php';
</script>";
?>