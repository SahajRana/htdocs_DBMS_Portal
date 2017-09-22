<?php
session_start();
include 'db_handler.php';

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];
$dep = $_POST['radio'];

$sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='$pwd' AND dep='$dep'";
$result = mysqli_query($conn,$sql);

if (!$row=mysqli_fetch_assoc($result)) {
	echo "<script type='text/javascript'>alert('Your username, password or department is incorrect!');
	window.location.href='index.php';
	</script>";
}else{
	if ($dep === 'NewUser') {
		$_SESSION['dep'] = $row['dep'];
		header("Location: new_user.php");
		exit();
	}else
	if ($dep === 'HR') {
		$_SESSION['dep'] = $row['dep'];
		header("Location: hr_inside.php");
		exit();
	}else
	if ($dep === 'Marketing') {
		$_SESSION['dep'] = $row['dep'];
		header("Location: mrkg_inside.php");
		exit();
	}if ($dep === 'Sales') {
		$_SESSION['dep'] = $row['dep'];
		header("Location: sales_inside.php");
		exit();
	}
	else {
		echo "You are logged in!";
	}
}

?>