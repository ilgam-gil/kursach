<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result =$conn->prepare("UPDATE car_owners SET driver_license = ?, fio_owner = ?, phone_number_car_owner = ? WHERE driver_license = ?");
	$result->bind_param("ssss", $_POST['driver_license'], $_POST['fio_owner'], $_POST['phone_number_car_owner'], $_SESSION['car_owners']);
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