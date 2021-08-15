<?php
	session_start();
	
	$host = 'localhost';
	$user = 'user';
	$password = '782354179177';
	$db = 'vr';
	$link = mysqli_connect($host, $user, $password, $db);
	if (!$link) exit('ошибка');



$login = stripslashes( htmlspecialchars(trim($_POST['login'])));
$pass = trim($_POST['pass']);

if (!empty($login) && !empty($pass)){

	$sql = "SELECT `id_access`, `login`, `password`, `access` FROM
	`access` where `login`='$login' and `password` = '$pass'";
	$result = mysqli_query($link, $sql);
	$row = mysqli_num_rows ($result);
	if ($row == 0) {
	exit("Неверный логин или пароль!");
} 
else
	{
		$row1 = mysqli_fetch_array($result);
		if ($row1['access'] == 'admin') {
		header('Location: Atable.php');
		}
		if ($row1['access'] == 'guest') {
		header('Location: Gtable.php');
		}

	}
}

mysqli_close($link);
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,700&display=swap" rel="stylesheet">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="CSS/style.css">
	<title>Авторизация</title>
</head>
<body>
	<div class="class">
		<form class="flex-box" method="post" name="Access">
		
				<h1>Авторизация</h1>
			
			
			
			<input type="text" name="login" placeholder="логин">
		
			<input type="password" name="pass" placeholder="пароль">	
	
			<br>	<br>
				<div class="input1">
					<input type="reset" value="Очистить">	
					<input type="submit" name="enter" value="Отправить">
				</div>
		</form>
	</div>
	
</body>
</html>