<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$_SESSION['positions'] = $_POST['positions'];
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
				<form action="ch_positions.php" method="post">
					<fieldset>
						<legend>Изменение записи</legend>
							<label for="id_position">ID должности: </label><br><input type="text" id="id_position" name="id_position" placeholder="id_position"><br>
							<label for="name_position">Название должности: </label><br><input type="text" id="name_position" name="name_position" placeholder="name_position"><br>
							<label for="classification_lvl">Классификация по должности: </label><br><input type="text" id="classification_lvl" name="classification_lvl" placeholder="classification_lvl"><br>
							<input type="submit" name="submit" value="Изменить">
					</fieldset>	
				</form>
            </div>
        </div>
    </body>
</html>