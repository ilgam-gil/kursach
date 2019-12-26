<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$pos = "SELECT name_position FROM positions";
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
				<form action='add_workers.php' method='post'>
					<fieldset>
						<legend>Новая запись</legend>
							<label for='fio_worker'>ФИО работника: </label><br><input type='text' id='fio_worker' name='fio_worker' placeholder='fio_worker'><br>
							<label for='position'>Должность: </label><br><select name='position' id='position'>
								<?php
									for($i = 0;$i < count($all); $i = $i+1)
									{
										$pos = "SELECT id_position FROM positions WHERE name_position = '".$all[$i][0]."'";
										$result = mysqli_query($conn, $pos);
										if ($result)
										{
											$val = mysqli_fetch_all($result);
											echo "<option value='".$val[0][0]."'>".$all[$i][0]."</option>";
										}
									}
								?>
								</select><br>
							<label for='phone_number_worker'>Номер телефона работника: </label><br><input type='text' id='phone_number_worker' name='phone_number_worker' placeholder='phone_number_worker'><br>
							<label for='worker_adress'>Адрес работника: </label><br><input type='text' id='worker_adress' name='worker_adress' placeholder='worker_adress'><br>
							<input type='submit' name='submit' value='Добавить'>
					</fieldset>	
				</form>
            </div>
        </div>
    </body>
</html>