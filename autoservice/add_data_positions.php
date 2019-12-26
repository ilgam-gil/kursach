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
				<form action="add_positions.php" method="post">
					<fieldset>
						<legend>Новая запись</legend>
							<label for="name_position">Название должности: </label><br><input type="text" id="name_position" name="name_position" placeholder="name_position"><br>
							<label for="classification_lvl">Классификация по должности: </label><br><input type="text" id="classification_lvl" name="classification_lvl" placeholder="classification_lvl"><br>
							<input type="submit" name="submit" value="Добавить">
					</fieldset>	
				</form>
            </div>
        </div>
    </body>
</html>