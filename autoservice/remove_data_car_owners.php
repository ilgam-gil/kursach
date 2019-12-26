<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$pos = "SELECT driver_license FROM car_owners";
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
				<form action="remove_car_owners.php" method="post">
					<fieldset>
						<legend>Удаление записи</legend>
							<label for='car_owners'>Владельцы машин: </label><br><select name='car_owners' id='car_owners'>
								<?php
									for($i = 0;$i < count($all); $i = $i+1)
									{
										$pos = "SELECT * FROM car_owners";
										$result = mysqli_query($conn, $pos);
										if ($result)
										{
											$val = mysqli_fetch_all($result);
											echo "<option value='".$all[$i][0]."'>Номер водительского удостоверения: ".$val[$i][0].", ФИО владельца: ".$val[$i][1].", Номер телефона владельца: ".$val[$i][2]."</option>";
										}
									}
								?>
								</select><br>
							<input type='submit' name='submit' value='Удалить'>
					</fieldset>	
				</form>
            </div>
        </div>
    </body>
</html>