<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$_SESSION['type_services'] = $_POST['type_services'];
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
				<form action="ch_type_services.php" method="post">
					<fieldset>
						<legend>Изменение записи</legend>
							<label for="id_type_service">ID услуги: </label><br><input type="text" id="id_type_service" name="id_type_service" placeholder="id_type_service"><br>
							<label for="name_type_service">Название услуги: </label><br><input type="text" id="name_type_service" name="name_type_service" placeholder="name_type_service"><br>
							<label for="price_type_service">Цена услуги: </label><br><input type="text" id="price_type_service" name="price_type_service" placeholder="price_type_service"><br>
							<label for="type_service_description">Описание услуги: </label><br><input type="text" id="type_service_description" name="type_service_description" placeholder="type_service_description"><br>
							<input type="submit" name="submit" value="Изменить">
					</fieldset>	
				</form>
            </div>
        </div>
    </body>
</html>