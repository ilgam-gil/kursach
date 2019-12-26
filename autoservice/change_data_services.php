<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$pos = "SELECT id_services FROM services";
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
				<form action="change_services.php" method="post">
					<fieldset>
						<legend>Изменение записи</legend>
							<label for='services'>Сервисы: </label><br><select name='services' id='services'>
								<?php
									for($i = 0;$i < count($all); $i = $i+1)
									{
										$pos = "SELECT * FROM services";
										$result = mysqli_query($conn, $pos);
										if ($result)
										{
											$val = mysqli_fetch_all($result);
											echo "<option value='".$all[$i][0]."'>ID сервиса: ".$val[$i][0].", Адрес сервиса: ".$val[$i][1].", Номер телефона сервиса: ".$val[$i][2]."</option>";
										}
									}
								?>
								</select><br>
							<input type='submit' name='submit' value='Изменить'>
					</fieldset>	
				</form>
            </div>
        </div>
    </body>
</html>