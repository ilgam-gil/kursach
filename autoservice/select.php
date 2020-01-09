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
				<fieldset>
					<legend>Выберите действие</legend>
						<form action="select_tb1.php" method="post"><input type="submit" name="submit" value="Таблица tb1"><br></form>
						<form action="select_tb2.php" method="post"><input type="submit" name="submit" value="Таблица tb2"><br></form>
						<form action="select_tb3.php" method="post"><input type="submit" name="submit" value="Таблица tb3"><br></form>
						<form action="select_cars.php" method="post"><input type="submit" name="submit" value="Таблица cars"><br></form>
						<form action="select_car_owners.php" method="post"><input type="submit" name="submit" value="Таблица car_owners"><br></form>
						<form action="select_maintenance_services.php" method="post"><input type="submit" name="submit" value="Таблица maintenance_services"><br></form>
						<form action="select_positions.php" method="post"><input type="submit" name="submit" value="Таблица positions"><br></form>
						<form action="select_services.php" method="post"><input type="submit" name="submit" value="Таблица services"><br></form>
						<form action="select_type_services.php" method="post"><input type="submit" name="submit" value="Таблица type_services"><br></form>
						<form action="select_workers.php" method="post"><input type="submit" name="submit" value="Таблица workers"><br></form>
						<form action="interface.php" method="post"><input type="submit" name="submit" value="Назад"><br></form>
				</fieldset>
            </div>
        </div>
    </body>
</html>