<?php
session_start();
include 'db_handler.php';


$sector = $_POST['sector'];
$uniqid = $_POST['uniqid'];
$corp = $_POST['corp'];
$contname = $_POST['contname'];
$contmobnum = $_POST['contmobnum'];
$contemail = $_POST['contemail'];
$clsifctn = $_POST['clsifctn'];
$corpcatg = $_POST['corpcatg'];
$othrinfo = $_POST['othrinfo'];


echo "called" .$uniqid .$sector;

if($sector !== ''){
	$sql = "UPDATE sales_db_entry SET sector='$sector' WHERE id='$uniqid' ";

	if (mysqli_query($conn, $sql)) {
		echo "<script type='text/javascript'>alert('Record updated successfully! Sector');
		window.location.href='sales_inside_view_db.php';
		</script>";
	} else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
}

if($corp !== ''){
	$sql = "UPDATE sales_db_entry SET corp='$corp' WHERE id='$uniqid' ";

	if (mysqli_query($conn, $sql)) {
		echo "<script type='text/javascript'>alert('Record updated successfully! CORP');
		window.location.href='sales_inside_view_db.php';
		</script>";
	} else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
}

if($contname !== ''){
	$sql = "UPDATE sales_db_entry SET contname='$contname' WHERE id='$uniqid' ";

	if (mysqli_query($conn, $sql)) {
		echo "<script type='text/javascript'>alert('Record updated successfully! Age');
		window.location.href='sales_inside_view_db.php';
		</script>";
	} else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
}

if($contmobnum !== ''){
	$sql = "UPDATE sales_db_entry SET contmobnum='$contmobnum' WHERE id='$uniqid' ";

	if (mysqli_query($conn, $sql)) {
		echo "<script type='text/javascript'>alert('Record updated successfully! MOB');
		window.location.href='sales_inside_view_db.php';
		</script>";
	} else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
}

if($contemail !== ''){
	$sql = "UPDATE sales_db_entry SET contemail='$contemail' WHERE id='$uniqid' ";

	if (mysqli_query($conn, $sql)) {
		echo "<script type='text/javascript'>alert('Record updated successfully! NAme');
		window.location.href='sales_inside_view_db.php';
		</script>";
	} else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
}

if($clsifctn !== ''){
	$sql = "UPDATE sales_db_entry SET clsifctn='$clsifctn' WHERE id='$uniqid' ";

	if (mysqli_query($conn, $sql)) {
		echo "<script type='text/javascript'>alert('Record updated successfully! address');
		window.location.href='sales_inside_view_db.php';
		</script>";
	} else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
}

if($corpcatg !== ''){
	$sql = "UPDATE sales_db_entry SET corpcatg='$corpcatg' WHERE id='$uniqid' ";

	if (mysqli_query($conn, $sql)) {
		echo "<script type='text/javascript'>alert('Record updated successfully! field');
		window.location.href='sales_inside_view_db.php';
		</script>";
	} else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
}

if($othrinfo !== ''){
	$sql = "UPDATE sales_db_entry SET otherinfo='$othrinfo' WHERE id='$uniqid' ";

	if (mysqli_query($conn, $sql)) {
		echo "<script type='text/javascript'>alert('Record updated successfully! request');
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