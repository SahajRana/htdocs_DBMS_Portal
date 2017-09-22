<?php
session_start();
include 'db_handler.php';

$date = $_POST['date'];
$cliname = $_POST['cliname'];
$saleres = $_POST['saleres'];
$mobno = $_POST['mobno'];
$email = $_POST['email'];
$meetpnt = $_POST['meetpnt'];
$meettime = $_POST['meettime'];
$retntime = $_POST['retntime'];
$event = $_POST['radio'];
$othrinfo = $_POST['othrinfo'];
$trpname = $_POST['trpname'];
$trpdate = $_POST['trpdate'];
$trpday = $_POST['trpday'];
$addinfo = $_POST['addinfo'];
$datepay = $_POST['datepay'];
$paymeth = $_POST['paymeth'];
$orgrec = $_POST['orgrec'];



if ($event === 'Select') {
	echo "<script type='text/javascript'>alert('**Please select Event!**');
	window.location.href='sales_inside_add.php';
	</script>";
	exit();
}


$sql = "INSERT INTO sales_job_entry (date,cliname,saleres,mobno,email,meetpnt,meettime,retntime,event,othrinfo,trpname,trpdate,trpday,addinfo,datepay,paymeth,orgrec) VALUES ('$date','$cliname','$saleres','$mobno','$email','$meetpnt','$meettime','$retntime','$event','$othrinfo','$trpname','$trpdate','$trpday','$addinfo','$datepay','$paymeth','$orgrec')";
$result = mysqli_query($conn,$sql);

echo "<script type='text/javascript'>alert('Data entered!');
window.location.href='sales_inside_add.php';
</script>";
?>
