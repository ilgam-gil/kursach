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
				<form action="add_car_owners.php" method="post">
					<fieldset>
						<legend>Новая запись</legend>
							<label for="driver_license">Водительское удостоверение: </label><br><input type="text" id="driver_license" name="driver_license" placeholder="driver_license"><br>
							<label for="fio_owner">ФИО владельца: </label><br><input type="text" id="fio_owner" name="fio_owner" placeholder="fio_owner"><br>
							<label for="phone_number_car_owner">Номер телефона владельца: </label><br><input type="text" id="phone_number_car_owner" name="phone_number_car_owner" placeholder="phone_number_car_owner"><br>
							<input type="submit" name="submit" value="Добавить">
					</fieldset>	
				</form>
            </div>
        </div>
    </body>
</html>