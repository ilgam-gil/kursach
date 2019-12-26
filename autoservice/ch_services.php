<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result =$conn->prepare("UPDATE services SET id_services = ?, service_adress = ?, phone_number_service = ? WHERE id_services = ?");
	$result->bind_param("ssss", $_POST['id_services'], $_POST['service_adress'], $_POST['phone_number_service'], $_SESSION['services']);
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