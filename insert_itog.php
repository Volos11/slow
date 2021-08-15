<?php

	include 'connect.php';

$id_tehnika = htmlentities(trim($_POST['id_tehnika']));
$id_post = array();
$id_marka = htmlentities(trim($_POST['id_marka']));
$id_client = htmlentities(trim($_POST['id_client']));
$id_garant = htmlentities(trim($_POST['id_garant']));
$model = htmlentities(trim($_POST['model']));
$price = htmlentities(trim($_POST['price']));
$name = htmlentities(trim($_POST['name']));
$id_state = htmlentities(trim($_POST['id_state']));

if (isset($id_tehnika) && isset($id_marka)&& isset($id_client)&& isset($id_garant)&& isset($model)&& isset($price)&& isset($name)&& isset($id_state))
	{
	$sql = "INSERT INTO itog (id_tehnika,id_marka, id_client, id_garant, model, price, name, id_state)
	VALUES ('$id_tehnika', '$id_marka', '$id_client', '$id_garant', '$model', '$price', '$name',  '$id_state')";
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
	<form action="itog.php" method="post">
	<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>