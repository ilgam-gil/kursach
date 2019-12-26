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
						<form action="sql_select2.php" method="post">Запрос: SELECT <input type='text' id='select' name='select' placeholder='поле'> FROM <input type='text' id='from' name='from' placeholder='таблица'> WHERE <input type='text' id='where' name='where' placeholder='условие'><input type='submit' name='submit' value='Выполнить'><br></form>
						<form action='interface.php' method='post'><input type='submit' name='submit' value='Назад'><br></form>
				</fieldset>	
            </div>
        </div>
    </body>
</html>