<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$_SESSION['services'] = $_POST['services'];
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
				<form action="ch_services.php" method="post">
					<fieldset>
						<legend>Изменение записи</legend>
							<label for="id_services">ID сервиса: </label><br><input type="text" id="id_services" name="id_services" placeholder="id_services"><br>
							<label for="service_adress">Адресс сервиса: </label><br><input type="text" id="service_adress" name="service_adress" placeholder="service_adress"><br>
							<label for="phone_number_service">Телефон сервиса: </label><br><input type="text" id="phone_number_service" name="phone_number_service" placeholder="phone_number_service"><br>
							<input type="submit" name="submit" value="Изменить">
					</fieldset>	
				</form>
            </div>
        </div>
    </body>
</html>