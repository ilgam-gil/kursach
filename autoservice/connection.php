<?php
$servername = 'localhost';
$dbname = 'autoservice';
if ($_SESSION['privilege'] === 1)
{
	$username = 'admin';
	$password = 'zaO0pU4F2UeejVfO';
}
else if ($_SESSION['privilege'] === 2)
{
	$username = 's_user';
	$password = 'olVESJ9ul54ZUtWd';
}
else if ($_SESSION['privilege'] === 3)
{
	$username = 'user';
	$password = 'rUaJESYaWYoIcj8j';
}
?>