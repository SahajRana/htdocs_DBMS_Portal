<?php
session_start();
include 'db_handler.php';

$datedb = $_POST['datedb'];
$uniqid = $_POST['uniqid'];
$servicesdb = $_POST['servicesdb'];
$feedbackdb = $_POST['feedbackdb'];

echo "called" .$uniqid .$datedb;

$sql = "UPDATE sales_db_entry_table SET datedb='$datedb' WHERE id='$uniqid' ";

if (mysqli_query($conn, $sql)) {
	echo "<script type='text/javascript'>alert('Record updated successfully! Date');
	window.location.href='mrkg_inside_add.php';
	</script>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}


if($servicesdb !== ''){
	$sql = "UPDATE sales_db_entry_table SET servicesdb='$servicesdb' WHERE id='$uniqid' ";

	if (mysqli_query($conn, $sql)) {
		echo "<script type='text/javascript'>alert('Record updated successfully! Services');
		window.location.href='sales_inside_view_db.php';
		</script>";
	} else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
}

if($feedbackdb !== ''){
	$sql = "UPDATE sales_db_entry_table SET feedbackdb='$feedbackdb' WHERE id='$uniqid' ";

	if (mysqli_query($conn, $sql)) {
		echo "<script type='text/javascript'>alert('Record updated successfully! Feedback');
		window.location.href='sales_inside_view_db.php';
		</script>";
	} else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
}

//mysqli_close($conn);

echo "<script type='text/javascript'>alert('Data entered!');
window.location.href='sales_inside_view_db.php';
</script>";
?>