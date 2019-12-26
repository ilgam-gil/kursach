<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$pos = "SELECT id_worker FROM workers";
	$result = mysqli_query($conn, $pos);
	if ($result)
	{
		$all = mysqli_fetch_all($result);
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=windows-1251 ' />
        <link rel='stylesheet' type='text/css' href='style.css'>
    </head>
    <body>
        <div class='wrapper'>
            <div id='article'>
				<form action='change_workers.php' method='post'>
					<fieldset>
						<legend>Выбор записи</legend>
							<label for='workers'>Работники: </label><br><select name='workers' id='worders'>
								<?php
									for($i = 0;$i < count($all); $i = $i+1)
									{
										$pos = "SELECT * FROM workers";
										$result = mysqli_query($conn, $pos);
										if ($result)
										{
											$val = mysqli_fetch_all($result);
											$p = "SELECT name_position FROM positions WHERE id_position ='".$val[$i][2]."'";
											$res = mysqli_query($conn, $p);
											if ($result)
											{
												$f = mysqli_fetch_all($res);
											}
											echo "<option value='".$all[$i][0]."'>ID работника: ".$val[$i][0].", ФИО работника: ".$val[$i][1].", Должность: ".$f[0][0].", Номер телефона: ".$val[$i][3].", Адрес работника: ".$val[$i][4]."</option>";
										}
									}
								?>
								</select><br>
							<input type='submit' name='submit' value='Выбрать'>
					</fieldset>	
				</form>
            </div>
        </div>
    </body>
</html>