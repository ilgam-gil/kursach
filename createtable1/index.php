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
	
	$sql = "CREATE TABLE tb1 (
	fio text NOT NULL,
	adress text NOT NULL,
	email_adress char(50) NOT NULL,
	password text NOT NULL,
	dtime timestamp)";
	
	if (mysqli_query($conn, $sql))
	{
		echo "Table tb1 created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	
	$fp = fopen('table1', 'r');
	if($fp)
	{
		while (!feof($fp))
		{
			$line = fgets($fp,999);
			$tok = explode(",", $line);
			if (count($tok) === 5)
			{
				$ttime = explode(" ", $tok[4]);
				if ($ttime[1] === "Jan")
				{
					$ttime[1] = 1;
				}
				else if ($ttime[1] === "Feb")
				{
					$ttime[1] = 2;
				}
				else if ($ttime[1] === "Mar")
				{
					$ttime[1] = 3;
				}
				else if ($ttime[1] === "Apr")
				{
					$ttime[1] = 4;
				}
				else if ($ttime[1] === "May")
				{
					$ttime[1] = 5;
				}
				else if ($ttime[1] === "Jun")
				{
					$ttime[1] = 6;
				}
				else if ($ttime[1] === "Jul")
				{
					$ttime[1] = 7;
				}
				else if ($ttime[1] === "Aug")
				{
					$ttime[1] = 8;
				}
				else if ($ttime[1] === "Sep")
				{
					$ttime[1] = 9;
				}
				else if ($ttime[1] === "Oct")
				{
					$ttime[1] = 10;
				}
				else if ($ttime[1] === "Nov")
				{
					$ttime[1] = 11;
				}
				else
				{
					$ttime[1] = 12;
				}
				$sql = "INSERT INTO tb1 (fio, adress, email_adress, password, dtime) VALUES ('$tok[0]', '$tok[1]', '$tok[2]', '$tok[3]', '$ttime[3]-$ttime[1]-$ttime[2] $ttime[4]')";
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
				$ttime = explode(" ", $tok[5]);
				if ($ttime[1] === "Jan")
				{
					$ttime[1] = 1;
				}
				else if ($ttime[1] === "Feb")
				{
					$ttime[1] = 2;
				}
				else if ($ttime[1] === "Mar")
				{
					$ttime[1] = 3;
				}
				else if ($ttime[1] === "Apr")
				{
					$ttime[1] = 4;
				}
				else if ($ttime[1] === "May")
				{
					$ttime[1] = 5;
				}
				else if ($ttime[1] === "Jun")
				{
					$ttime[1] = 6;
				}
				else if ($ttime[1] === "Jul")
				{
					$ttime[1] = 7;
				}
				else if ($ttime[1] === "Aug")
				{
					$ttime[1] = 8;
				}
				else if ($ttime[1] === "Sep")
				{
					$ttime[1] = 9;
				}
				else if ($ttime[1] === "Oct")
				{
					$ttime[1] = 10;
				}
				else if ($ttime[1] === "Nov")
				{
					$ttime[1] = 11;
				}
				else
				{
					$ttime[1] = 12;
				}
				$sql = "INSERT INTO tb1 (fio, adress, email_adress, password, dtime) VALUES ('$tok[0]', '$tok[1], $tok[2]', '$tok[3]', '$tok[4]', '$ttime[3]-$ttime[1]-$ttime[2] $ttime[4]')";
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