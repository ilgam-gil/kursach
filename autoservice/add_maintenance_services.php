<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result =$conn->prepare("INSERT INTO maintenance_services VALUES (NULL, ?, ?, ?, ?, ?)");
	$result->bind_param("sssss", $_POST['id_maintenance_service'], $_POST['type_service'], $_POST['serviced_car'], $_POST['availability_date'], $_POST['worker']);
	if ($result->execute() === TRUE)
	{
		echo "<script type='text/javascript'>alert('Record created!');</script>";
	}
	else
	{
		echo "<script type='text/javascript'>alert('Error: ".$conn->error."');</script>";
	}
	echo "<script>document.location.href = 'interface.php'; </script>";
?>