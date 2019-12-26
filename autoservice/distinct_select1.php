<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$select = $_POST['select'];
	$from = $_POST['from'];
	$where = $_POST['where'];
	$s = explode(",", $select);
	$result =$conn->prepare("SELECT DISTINCT ? FROM ? WHERE ?");
	$result->bind_param("sss", $select, $from, $where);
	$result->execute();
	if ($result)
	{
		$row = $result->fetch_all();
		for($k = 0;$k < count($row); $k = $k+1)
		{
			echo $s[$k]." ";
		}
		echo "<br>";
		for($i = 0;$i < count($row); $i = $i+1)
		{
			for($k = 0;$k < count($row[$i]); $k = $k+1)
			{
				echo $row[$i][$k]." ";
			}
			echo "<br>";
		}
	}
	else 
	{
		echo "<script type='text/javascript'>alert('Некорректное название столбца!');</script>";
		echo "<script>document.location.href = 'interface.php'; </script>";
	}
	echo "<form action='interface.php' method='post'><input type='submit' name='submit' value='Назад'><br></form>"
?>