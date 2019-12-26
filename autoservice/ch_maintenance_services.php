<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result =$conn->prepare("UPDATE maintenance_services SET id_order = ?, id_maintenance_service = ?, type_service = ?, serviced_car = ?, availability_date = ?, worker = ? WHERE id_order = ?");
	$result->bind_param("sssssss", $_POST['id_order'], $_POST['id_maintenance_service'], $_POST['type_service'], $_POST['serviced_car'], $_POST['availability_date'], $_POST['worker'], $_SESSION['orders']);
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