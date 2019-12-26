<?php
	$_SESSION['user_name'] = $_POST['user_name'];
	$_SESSION['password'] = $_POST['password'];
	require_once 'connection.php';
	$conn = mysqli_connect($servername, 'root', '', $dbname);
	session_start();
	$user = $_POST['user_name'];
	$password = $_POST['password'];
	if ($conn)
	{
		$result =$conn->prepare("SELECT privilege FROM tb1 WHERE email_adress = ?");
		$result->bind_param("s", $_POST['user_name']);
		$result->execute();
		$result = $result->get_result();
		if ($result)
		{
			$all = $result->fetch_all();
			$result =$conn->prepare("SELECT password FROM tb1 WHERE email_adress = ?");
			$result->bind_param("s", $_POST['user_name']);
			$result->execute();
			$result = $result->get_result();
			$p = $result->fetch_all();
			if($p[0][0] === $password)
			{
				if ($all[0][0] === 1)
				{
					$_SESSION['privilege'] = 1;
					$_SESSION['conn'] = $conn;
					header('location: interface.php');
				}
				else if ($all[0][0] === 2)
				{
					$_SESSION['privilege'] = 2;
					$_SESSION['conn'] = $conn;
					header('location: interface.php');
				}
				else if ($all[0][0] === 3)
				{
					$_SESSION['privilege'] = 3;
					$_SESSION['conn'] = $conn;
					header('location: interface.php');
				}
				else echo "У вас нет прав!";
			}
			else echo "Неправильный пароль!";
		}
		else echo "Неправильный логин!";
	}
	else die("Ошибка: " . mysqli_connect_error());
?>
 <html>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <body>
	<p><a href="logout.php">Повтор</a></p>
 </body></html>