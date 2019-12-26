<?php
	$servername = "localhost";
	$dbname = "autoservice";
	$username = "root";
	$password = "";
	set_time_limit(600);
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if (!$conn)
	{
		die("connection failed: " . mysqli_connect_error());
	}
	echo "Connection successfully!\n";
	
	$sql = "CREATE TABLE tb3 (
	fio text REFERENCES tb1 (fio),
	adress text REFERENCES tb1 (adress),
	card_num char(20) NOT NULL PRIMARY KEY,
	balance integer NOT NULL)";
	
	if (mysqli_query($conn, $sql))
	{
		echo "Table tb3 created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	
	$fp = fopen('table3', 'r');
	if($fp)
	{
		while (!feof($fp))
		{
			$line = fgets($fp,999);
			$tok = explode(",", $line);
			if (count($tok) === 4)
			{
				$sql = "INSERT INTO tb3 (fio, adress, card_num, balance) VALUES ('$tok[0]', '$tok[1]', '$tok[2]', '$tok[3]')";
				if (mysqli_query($conn, $sql))
				{
					echo "Record created<br />";
				}
				else
				{
					echo "Error: " . mysqli_error($conn);
				}
			}
			else
			{
				$sql = "INSERT INTO tb3 (fio, adress, card_num, balance) VALUES ('$tok[0]', '$tok[1], $tok[2]', '$tok[3]', '$tok[4]')";
				if (mysqli_query($conn, $sql))
				{
					echo "Record created<br />";
				}
				else
				{
					echo "Error: " . mysqli_error($conn);
				}
			}
		}
	}
?>