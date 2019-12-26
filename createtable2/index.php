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
	
	$sql = "CREATE TABLE tb2 (
	fio text REFERENCES tb1 (fio),
	adress text REFERENCES tb1 (adress),
	dtime_tb2 text NOT NULL,
	branch_name text NOT NULL,
	coordinates text NOT NULL,
	founder text,
	company text NOT NULL)";
	
	if (mysqli_query($conn, $sql))
	{
		echo "Table tb2 created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	
	$fp = fopen('table2', 'r');
	if($fp)
	{
		while (!feof($fp))
		{
			$line = fgets($fp,999);
			$tok = explode(",", $line);
			if (count($tok) === 6)
			{
				$ttime = explode(" ", $tok[2]);
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
				$sql = "INSERT INTO tb2 (fio, adress, dtime_tb2, branch_name, coordinates, company) VALUES ('$tok[0]', '$tok[1]', '$ttime[3]-$ttime[1]-$ttime[2] $ttime[4]', '$tok[3]', '$tok[4]', '$tok[5]')";
				if (mysqli_query($conn, $sql))
				{
					echo "Record created<br />";
				}
				else
				{
					echo "Error: " . mysqli_error($conn);
				}
			}
			else if (count($tok) === 7)
			{
				$ttime = explode(" ", $tok[2]);
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
				$sql = "INSERT INTO tb2 (fio, adress, dtime_tb2, branch_name, coordinates, founder, company) VALUES ('$tok[0]', '$tok[1]', '$ttime[3]-$ttime[1]-$ttime[2] $ttime[4]', '$tok[3]', '$tok[4]', '$tok[5]', '$tok[6]')";
				if (mysqli_query($conn, $sql))
				{
					echo "Record created<br />";
				}
				else
				{
					$ttime = explode(" ", $tok[3]);
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
					$sql = "INSERT INTO tb2 (fio, adress, dtime_tb2, branch_name, coordinates, company) VALUES ('$tok[0]', '$tok[1], $tok[2]', '$ttime[3]-$ttime[1]-$ttime[2] $ttime[4]', '$tok[4]', '$tok[5]', '$tok[6]')";
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
			else
			{
				$ttime = explode(" ", $tok[2]);
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
				$sql = "INSERT INTO tb2 (fio, adress, dtime_tb2, branch_name, coordinates, founder, company) VALUES ('$tok[0]', '$tok[1], $tok[2]', '$ttime[3]-$ttime[1]-$ttime[2] $ttime[4]', '$tok[4]', '$tok[5]', '$tok[6]', '$tok[7]')";
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