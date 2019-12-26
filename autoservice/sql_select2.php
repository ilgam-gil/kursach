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
	$f = explode(",", $from);
	$w = explode("=", $where);
	$result =$conn->prepare("SELECT ?.?, ?.? FROM ? WHERE ?.? = ?.?");
	$result->bind_param("sssssssss", $f[0], $s[0], $f[1], $s[1], $from, $f[0], $w[0], $f[1], $w[1]);
	$result->execute();
	$result = $result->get_result();
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