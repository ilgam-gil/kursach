<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251 " />
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
	<style type="text/css">
		table {
			border-collapse: collapse;
		}
		table th,
		table td {
			padding: 0 3px;
		}
		table.brd th,
		table.brd td {
			border: 1px solid #000;
		}
	</style>
        <div class="wrapper">
            <div id="article">
				<fieldset>
					<legend>Выборка по таблице tb2.</legend>
							<form action = 'select_tb2.php' method = 'post'>
								<label for='num'>Выберите: </label><select name='num' id='num'>
									<?php
										$sql = "SELECT count(*) FROM tb2";
										$res = mysqli_query($conn, $sql);
										if ($res)
										{
											$all = mysqli_fetch_assoc($res);
											$count = $all['count(*)'];
											$int = intval($count/50);
											$drob = ($count/50)-intval($count/50);
											if($drob === 0)
											{
												$f = $int;
											}
											else
											{
												$f = $int+1;
											}
											for($k = 0;$k < $f; $k++)
											{
												$s = $k+1;
												echo "<option value=". $s .">". $s ."</option>";
											}
										}
									?>
									<input type='submit' name='submit' value='Показать'>
								</select><br>
							</form >
							<table class="brd">
							<?php
								$os = array("fio", "adress", "dtime_tb2", "branch_name", "coordinates", "founder", "company");
								if(!in_array($_POST['column'], $os))
								{
									$_POST['column'] = "fio";
								}
								$column = $_POST['column'];
								if($_POST['column']!== NULL)
								{
									if($_SESSION['column'] !== $_POST['column'])
									{
										if($_POST['num'] === NULL)
										{
											$pos =$conn->prepare("SELECT * FROM tb2 ORDER BY $column ASC LIMIT 50");
										}
										else 
										{
											$pos =$conn->prepare("SELECT * FROM tb2 ORDER BY $column ASC LIMIT 50 OFFSET ?");
											$pos->bind_param("s", $_POST['num']);
										}
									}
									else
									{
										if($_POST['num'] === NULL)
										{
											$pos =$conn->prepare("SELECT * FROM tb2 ORDER BY $column DESC LIMIT 50");
										}
										else 
										{
											$pos =$conn->prepare("SELECT * FROM tb2 ORDER BY $column DESC LIMIT 50 OFFSET ?");
											$pos->bind_param("s", $_POST['num']);
										}
									}
									$_SESSION['column'] = $_POST['column'];
								}
								else
								{
									if($_POST['num'] === NULL)
									{
										$pos =$conn->prepare("SELECT * FROM tb2 LIMIT 50");
									}
									else 
									{
										$pos =$conn->prepare("SELECT * FROM tb2 LIMIT 50 OFFSET ?");
										$pos->bind_param("s", $_POST['num']);
									}
								}
								$q = mysqli_query($conn,'DESCRIBE tb2');
								$arr = mysqli_fetch_all($q);
								$pos->execute();
								$result = $pos->get_result();
								if ($result)
								{
									$val = mysqli_fetch_all($result);
									echo "<tr>";
									for($i = 0;$i < count($arr); $i = $i+1)
									{
										echo "<th><form action = 'select_tb2.php' method = 'post'><input type = 'hidden' name = 'column' value = ".$arr[$i][0]."> <input type='submit' name='submit' value=".$arr[$i][0]."></form></th>";
									}
									echo "</tr>";
									for($i = 0;$i < count($val); $i = $i+1)
									{
										echo "<tr>";
										for($j = 0;$j < count($val[$i]); $j = $j+1)
										{
											echo "<td>";
											print_r($val[$i][$j]);
											echo "</td>";
										}
										echo "</tr>";
									}
								}
							?>
							</table>
							<form action = 'select_tb2.php' method = 'post'>
								<label for='num'>Выберите: </label><select name='num' id='num'>
									<?php
										$sql = "SELECT count(*) FROM tb2";
										$res = mysqli_query($conn, $sql);
										if ($res)
										{
											$all = mysqli_fetch_all($res);
											$count = $all['count(*)'];
											$int = intval($count/50);
											$drob = ($count/50)-intval($count/50);
											if($drob === 0)
											{
												$f = $int;
											}
											else
											{
												$f = $int+1;
											}
											for($k = 0;$k < $f; $k++)
											{
												$s = $k+1;
												echo "<option value=". $s .">". $s ."</option>";
											}
										}
									?>
									<input type='submit' name='submit' value='Показать'>
								</select><br>
							</form >
							<form action = 'interface.php' method = 'post'><input type='submit' name='submit' value='Назад'>
							</form >
				</fieldset>
            </div>
        </div>
    </body>
</html>