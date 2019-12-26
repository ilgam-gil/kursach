<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251 " />
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="wrapper">
            <div id="article">
				<form action="login.php" method="post">
					<fieldset>
						<legend>Авторизоватся</legend>
							<label for="user_name">Логин: </label><br><input type="text" id="user_name" name="user_name" placeholder="login"><br>
							<label for="password">Пароль: </label><br><input type="password" id="password" name="password" placeholder="*******"><br>
							<input type="submit" name="submit" value="Войти">
					</fieldset>	
				</form>
            </div>
        </div>
    </body>
</html>