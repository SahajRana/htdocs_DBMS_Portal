<?php
$passcode = $_POST['passcode'];

if ($passcode ==='261Q7TP02' || $passcode ==='4262IX17C') {
	//$url = 'https://rootsapp.in';
	$app = $_SERVER['DOCUMENT_ROOT'].'/app/app.apk';
	$extension = ".apk";
	header('Content-disposition: attachment; filename="Namee'.$extension.'"');
	readfile($app);
	//file_put_contents($app, file_get_contents($url));
}else{
	echo "<script type='text/javascript'>alert('**Passcode is wrong!**');
	window.location.href='index.html';
	</script>";
	exit();
}
?>