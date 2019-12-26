<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$pos = "SELECT id_services FROM services";
	$result = mysqli_query($conn, $pos);
	if ($result)
	{
		$all_id_services = mysqli_fetch_all($result);
	}
	$pos = "SELECT name_type_service FROM type_services";
	$result = mysqli_query($conn, $pos);
	if ($result)
	{
		$all_name_type_service = mysqli_fetch_all($result);
	}
	$pos = "SELECT num_car FROM cars";
	$result = mysqli_query($conn, $pos);
	if ($result)
	{
		$all_num_car = mysqli_fetch_all($result);
	}
	$pos = "SELECT fio_worker FROM workers";
	$result = mysqli_query($conn, $pos);
	if ($result)
	{
		$all_fio_worker = mysqli_fetch_all($result);
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
				<form action='add_maintenance_services.php' method='post'>
					<fieldset>
						<legend>Новая запись</legend>
							<label for='id_maintenance_service'>Сервис: </label><br><select name='id_maintenance_service' id='id_maintenance_service'>
								<?php
									for($i = 0;$i < count($all_id_services); $i = $i+1)
									{
										$result = mysqli_query($conn, $pos);
										if ($result)
										{
											$val = mysqli_fetch_all($result);
											echo "<option value='".$all_id_services[$i][0]."'>".$all_id_services[$i][0]."</option>";
										}
									}
								?>
								</select><br>
							<label for='type_service'>Тип услуги: </label><br><select name='type_service' id='type_service'>
								<?php
									for($i = 0;$i < count($all_name_type_service); $i = $i+1)
									{
										$pos = "SELECT id_type_service FROM type_services WHERE name_type_service = '".$all_name_type_service[$i][0]."'";
										$result = mysqli_query($conn, $pos);
										if ($result)
										{
											$val = mysqli_fetch_all($result);
											echo "<option value='".$val[0][0]."'>".$all_name_type_service[$i][0]."</option>";
										}
									}
								?>
								</select><br>
							<label for='serviced_car'>Обслуживаемая машина: </label><br><select name='serviced_car' id='serviced_car'>
								<?php
									for($i = 0;$i < count($all_num_car); $i = $i+1)
									{
										$pos = "SELECT car FROM cars WHERE num_car = '".$all_num_car[$i][0]."'";
										$result = mysqli_query($conn, $pos);
										if ($result)
										{
											$val = mysqli_fetch_all($result);
											echo "<option value='".$all_num_car[$i][0]."'>".$all_num_car[$i][0].", ".$val[0][0]."</option>";
										}
									}
								?>
								</select><br>
							<label for='availability_date'>Дата готовности: </label><br><input type='text' id='availability_date' name='availability_date' placeholder='availability_date'><br>
							<label for='worker'>Работник: </label><br><select name='worker' id='worker'>
								<?php
									for($i = 0;$i < count($all_fio_worker); $i = $i+1)
									{
										$pos = "SELECT id_worker FROM workers WHERE fio_worker = '".$all_fio_worker[$i][0]."'";
										$result = mysqli_query($conn, $pos);
										if ($result)
										{
											$val = mysqli_fetch_all($result);
											echo "<option value='".$val[0][0]."'>".$all_fio_worker[$i][0]."</option>";
										}
									}
								?>
								</select><br>
							<input type='submit' name='submit' value='Добавить'>
					</fieldset>	
				</form>
            </div>
        </div>
    </body>
</html>