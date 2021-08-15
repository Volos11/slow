<?php

	include 'connect.php';

$fio = htmlentities(trim($_POST['fio']));
$id_post = array();
$id_post = htmlentities(trim($_POST['id_post']));
$tel = htmlentities(trim($_POST['tel']));
$date_birt = htmlentities(trim($_POST['date_birt']));
$date_rec = htmlentities(trim($_POST['date_rec']));

if (isset($fio) && isset($id_post) && isset($tel) && isset($date_birt) &&
isset($date_rec))
	{
	$sql = "INSERT INTO state (fio, id_post, tel, date_birt, date_rec)
	VALUES ('$fio', '$id_post', '$tel', '$date_birt',
	'$date_rec')";
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

mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Добавление Данных прошло успешно!</title>
</head>
<body>
	<form action="state.php" method="post">
	<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>