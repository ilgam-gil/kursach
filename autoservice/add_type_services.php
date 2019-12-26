<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result =$conn->prepare("INSERT INTO type_services VALUES (NULL, ?, ?, ?)");
	$result->bind_param("sss", $_POST['name_type_service'], $_POST['price_type_service'], $_POST['type_service_description']);
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