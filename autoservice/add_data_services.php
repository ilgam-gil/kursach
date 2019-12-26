<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
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
				<form action="add_services.php" method="post">
					<fieldset>
						<legend>Новая запись</legend>
							<label for="service_adress">Адресс сервиса: </label><br><input type="text" id="service_adressd" name="service_adress" placeholder="service_adress"><br>
							<label for="phone_number_service">Телефон сервиса: </label><br><input type="text" id="phone_number_service" name="phone_number_service" placeholder="phone_number_service"><br>
							<input type="submit" name="submit" value="Добавить">
					</fieldset>	
				</form>
            </div>
        </div>
    </body>
</html>