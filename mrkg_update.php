<?php
session_start();
include 'db_handler.php';


$date = $_POST['date'];
$uniqid = $_POST['uniqid'];
$corp = $_POST['corp'];
$mobno = $_POST['mobno'];
$age = $_POST['age'];
$name = $_POST['name'];
$address = $_POST['address'];
$field = $_POST['field'];
$request = $_POST['request'];


echo "called" .$uniqid .$date;


$sql = "UPDATE mrkg_entry SET date='$date' WHERE id='$uniqid' ";

if (mysqli_query($conn, $sql)) {
	echo "<script type='text/javascript'>alert('Record updated successfully! Date');
	window.location.href='mrkg_inside_add.php';
	</script>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

if($corp !== ''){
	$sql = "UPDATE mrkg_entry SET corp='$corp' WHERE id='$uniqid' ";

	if (mysqli_query($conn, $sql)) {
		echo "<script type='text/javascript'>alert('Record updated successfully! CORP');
		window.location.href='mrkg_inside_add.php';
		</script>";
	} else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
}

if($age !== ''){
	$sql = "UPDATE mrkg_entry SET age='$age' WHERE id='$uniqid' ";

	if (mysqli_query($conn, $sql)) {
		echo "<script type='text/javascript'>alert('Record updated successfully! Age');
		window.location.href='mrkg_inside_add.php';
		</script>";
	} else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
}

if($mobno !== ''){
	$sql = "UPDATE mrkg_entry SET mobno='$mobno' WHERE id='$uniqid' ";

	if (mysqli_query($conn, $sql)) {
		echo "<script type='text/javascript'>alert('Record updated successfully! MOB');
		window.location.href='mrkg_inside_add.php';
		</script>";
	} else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
}

if($name !== ''){
	$sql = "UPDATE mrkg_entry SET name='$name' WHERE id='$uniqid' ";

	if (mysqli_query($conn, $sql)) {
		echo "<script type='text/javascript'>alert('Record updated successfully! NAme');
		window.location.href='mrkg_inside_add.php';
		</script>";
	} else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
}

if($address !== ''){
	$sql = "UPDATE mrkg_entry SET address='$address' WHERE id='$uniqid' ";

	if (mysqli_query($conn, $sql)) {
		echo "<script type='text/javascript'>alert('Record updated successfully! address');
		window.location.href='mrkg_inside_add.php';
		</script>";
	} else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
}

if($field !== ''){
	$sql = "UPDATE mrkg_entry SET field='$field' WHERE id='$uniqid' ";

	if (mysqli_query($conn, $sql)) {
		echo "<script type='text/javascript'>alert('Record updated successfully! field');
		window.location.href='mrkg_inside_add.php';
		</script>";
	} else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
}

if($request !== ''){
	$sql = "UPDATE mrkg_entry SET request='$request' WHERE id='$uniqid' ";

	if (mysqli_query($conn, $sql)) {
		echo "<script type='text/javascript'>alert('Record updated successfully! request');
		window.location.href='mrkg_inside_add.php';
		</script>";
	} else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
}


//mysqli_close($conn);

echo "<script type='text/javascript'>alert('Data entered!');
window.location.href='mrkg_inside_add.php';
</script>";
?>