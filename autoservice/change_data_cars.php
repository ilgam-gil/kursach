<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$pos = "SELECT num_car FROM cars";
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
				<form action='change_cars.php' method='post'>
					<fieldset>
						<legend>Выбор записи</legend>
							<label for='car'>Машины: </label><br><select name='car' id='car'>
								<?php
									for($i = 0;$i < count($all); $i = $i+1)
									{
										$pos = "SELECT * FROM cars";
										$result = mysqli_query($conn, $pos);
										if ($result)
										{
											$val = mysqli_fetch_all($result);
											$p = "SELECT fio_owner FROM car_owners WHERE driver_license ='".$val[$i][2]."'";
											$res = mysqli_query($conn, $p);
											if ($result)
											{
												$f = mysqli_fetch_all($res);
											}
											echo "<option value='".$all[$i][0]."'>Номер машины: ".$val[$i][0].", Машина: ".$val[$i][1].", Владелец: ".$f[0][0]."</option>";
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