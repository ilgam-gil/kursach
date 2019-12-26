<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$pos = "SELECT id_position FROM positions";
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
				<form action="change_positions.php" method="post">
					<fieldset>
						<legend>Выбор записи</legend>
							<label for='positions'>Должности: </label><br><select name='positions' id='positions'>
								<?php
									for($i = 0;$i < count($all); $i = $i+1)
									{
										$pos = "SELECT * FROM positions";
										$result = mysqli_query($conn, $pos);
										if ($result)
										{
											$val = mysqli_fetch_all($result);
											echo "<option value='".$all[$i][0]."'>ID должности: ".$val[$i][0].", Название должности: ".$val[$i][1].", Классификация по должности: ".$val[$i][2]."</option>";
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