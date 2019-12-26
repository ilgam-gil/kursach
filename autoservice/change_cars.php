<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$_SESSION['car'] = $_POST['car'];
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$pos = "SELECT fio_owner FROM car_owners";
	$result = mysqli_query($conn, $pos);
	if ($result)
	{
		$all = mysqli_fetch_all($result);
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251 " />
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="wrapper">
            <div id="article">
				<form action='ch_cars.php' method='post'>
					<fieldset>
						<legend>Изменение записи</legend>
							<label for='num_car'>Номер машины: </label><br><input type='text' id='num_car' name='num_car' placeholder='num_car'><br>
							<label for='car'>Машина: </label><br><input type='text' id='car' name='car' placeholder='car'><br>
							<label for='car_owner'>Владелец машины: </label><br><select name='car_owner' id='car_owner'>
								<?php
									for($i = 0;$i < count($all); $i = $i+1)
									{
										$pos = "SELECT driver_license FROM car_owners WHERE fio_owner = '".$all[$i][0]."'";
										$res = mysqli_query($conn, $pos);
										if ($res)
										{
											$val = mysqli_fetch_all($res);
											$j = $i + 1;
											echo "<option value='".$val[0][0]."'>".$all[$i][0]."</option>";
										}
									}
								?>
							</select><br>
							<input type='submit' name='submit' value='Изменить'>
					</fieldset>	
				</form>
            </div>
        </div>
    </body>
</html>