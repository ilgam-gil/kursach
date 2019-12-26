<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$pos = "SELECT id_order FROM maintenance_services";
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
				<form action='change_maintenance_services.php' method='post'>
					<fieldset>
						<legend>Выбор записи</legend>
							<label for='orders'>Заказы: </label><br><select name='orders' id='orders'>
								<?php
									for($i = 0;$i < count($all); $i = $i+1)
									{
										$pos = "SELECT * FROM maintenance_services";
										$result = mysqli_query($conn, $pos);
										if ($result)
										{
											$val = mysqli_fetch_all($result);
											$p = "SELECT name_type_service FROM type_services WHERE id_type_service ='".$val[$i][2]."'";
											$res = mysqli_query($conn, $p);
											if ($result)
											{
												$f = mysqli_fetch_all($res);
											}
											$p = "SELECT car FROM cars WHERE num_car ='".$val[$i][3]."'";
											$res = mysqli_query($conn, $p);
											if ($result)
											{
												$d = mysqli_fetch_all($res);
											}
											$p = "SELECT fio_worker FROM workers WHERE id_worker ='".$val[$i][5]."'";
											$res = mysqli_query($conn, $p);
											if ($result)
											{
												$w = mysqli_fetch_all($res);
											}
											echo "<option value='".$all[$i][0]."'>ID заказа: ".$val[$i][0].", Номер сервиса: ".$val[$i][1].", Тип услуги: ".$f[0][0].", Обслуживаемая машина: ".$val[$i][3].", ".$d[0][0].", Дата готовности: ".$val[$i][4].", Работник: ".$w[0][0]."</option>";
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