<?php
session_start();
include 'db_handler.php';


$sector = $_POST['radio'];
$corp = $_POST['corp'];
$contname = $_POST['contname'];
$contmobnum = $_POST['contmobnum'];
$contemail = $_POST['contemail'];
$clsifctn = $_POST['clsifctn'];
$corpcatg = $_POST['corpcatg'];
$otherinfo = $_POST['othrinfo'];

$numberA=$_SESSION['number'];



if ($sector === 'Select') {
	echo "<script type='text/javascript'>alert('**Please select Sector!**');
	window.location.href='sales_inside_add_db.php';
	</script>";
	exit();
}

//Check for entry
$sqlCheck = "SELECT * FROM sales_db_entry WHERE sector='$sector' AND corp='$corp' AND contname='$contname' AND contmobnum='$contmobnum' AND contemail='$contemail' AND clsifctn='$clsifctn' AND corpcatg='$corpcatg' AND otherinfo='$otherinfo'";
$resultCheck = mysqli_query($conn,$sqlCheck);
//$row=mysqli_fetch_assoc($resultCheck);


if ($rowCheck=mysqli_fetch_assoc($resultCheck)) {
	echo "<script type='text/javascript'>alert('**Entry Already exist!**');
	window.location.href='sales_inside_add_db.php';
	</script>";
	exit();
}



//new Data Entry
$sql = "INSERT INTO sales_db_entry (sector,corp,contname,contmobnum,contemail,clsifctn,corpcatg,otherinfo) VALUES ('$sector','$corp','$contname','$contmobnum','$contemail','$clsifctn','$corpcatg','$otherinfo')";
$resultfirst = mysqli_query($conn,$sql);
if (!$resultfirst) {
	echo("Error description: " . mysqli_error($conn));
	exit();
}

//data id taking out
$sqlOut =  "SELECT * FROM sales_db_entry WHERE sector='$sector' AND corp='$corp' AND contname='$contname' AND contmobnum='$contmobnum' AND contemail='$contemail' AND clsifctn='$clsifctn' AND corpcatg='$corpcatg' AND otherinfo='$otherinfo'";
$result = mysqli_query($conn,$sqlOut);

if (!$row=mysqli_fetch_assoc($result)) {
	echo "<script type='text/javascript'>alert('Data not saved!');
	window.location.href='sales_inside_add_db.php';
	</script>";
	exit();
}else{
	$idForm=$row['id'];

	for ($i=1; $i < $numberA; $i++) { 

		$datedb=$_SESSION['datedb'.$i];
		$servicesdb=$_SESSION['servicesdb'.$i];
		$feedbackdb=$_SESSION['feedbackdb'.$i];
		//echo "$datedb";
		//exit();

		$sqldb = "INSERT INTO sales_db_entry_table (iddb,datedb,servicesdb,feedbackdb) VALUES ('$idForm','$datedb','$servicesdb','$feedbackdb')";
		$resultdb = mysqli_query($conn,$sqldb);
		if (!$resultdb) {
			echo("Error description db table : " . mysqli_error($conn));
			exit();
		}

	}	
}



echo "<script type='text/javascript'>alert('Data entered!');
window.location.href='sales_inside_add_db.php';
</script>";

?>