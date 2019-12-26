<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result =$conn->prepare("UPDATE type_services SET id_type_service = ?, name_type_service = ?, price_type_service = ?, type_service_description = ? WHERE id_type_service = ?");
	$result->bind_param("sssss", $_POST['id_type_service'], $_POST['name_type_service'], $_POST['price_type_service'], $_POST['type_service_description'], $_SESSION['type_services']);
	if ($result->execute() === TRUE)
	{
		echo "<script type='text/javascript'>alert('Record changed!');</script>";
	}
	else
	{
		echo "<script type='text/javascript'>alert('Error: ".$conn->error."');</script>";
	}
	echo "<script>document.location.href = 'interface.php'; </script>";
?>