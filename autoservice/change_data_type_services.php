<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$pos = "SELECT id_type_service FROM type_services";
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
				<form action="change_type_services.php" method="post">
					<fieldset>
						<legend>Выбор записи</legend>
							<label for='type_services'>Заказы: </label><br><select name='type_services' id='type_services'>
								<?php
									for($i = 0;$i < count($all); $i = $i+1)
									{
										$pos = "SELECT * FROM type_services";
										$result = mysqli_query($conn, $pos);
										if ($result)
										{
											$val = mysqli_fetch_all($result);
											echo "<option value='".$all[$i][0]."'>ID услуги: ".$val[$i][0].", Название услуги: ".$val[$i][1].", Цена услуги: ".$val[$i][2]." руб., Описание услуги: ".$val[$i][3]."</option>";
										}
									}
								?>
								</select><br>
							<input type='submit' name='submit' value='Выбрать'>
					</fieldset>	
				</form>
            </div>
        </div>
    </body>
</html>