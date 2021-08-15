<?php

include 'connect.php';
$id_client = htmlentities(trim($_POST['id_client']));
$fio = htmlentities(trim($_POST['fio']));
$date_birt = htmlentities(trim($_POST['date_birt']));


if (isset($id_client) && isset($fio) && isset($date_birt))
	{
	$sql = "INSERT INTO client (id_client, fio, date_birt)
	VALUES ('$id_client', '$fio', '$date_birt')";
	$result = mysqli_query($link, $sql);

	if($result) 
		{
			echo "Данные успешно добвлены";
		}
	else
		{
			echo "Произошла ошибка: " . mysqli_error($link);
		}
}
else
		{
			echo "Произошла ошибка: " . mysqli_error($link);
		}

mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Добавление Данных прошло успешно!</title>
</head>
<body>
	<form action="client.php" method="post">
	<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>