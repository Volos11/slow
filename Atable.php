<?php
    $exit = $_POST['exit'];
    if (!empty($exit)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['pass']);
        exit("<html><head><title>Загрузка..</title><meta  http-equiv='Refresh'content='0; URL=index.php'></head></html>");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<style>
		body{
			background-color: black;
			color: white;
		}
	</style>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="class1">

	<class class="exit">
        <form method="post">
                <input class="button" type="submit" class="exit" name="exit" value="Выйти">
            </form> 
   
    
        <a href="state.php">STATE</a>
        <a href="itog.php">Tovars</a>
        <a href="client.php">Client</a>
        
     </class>
</div>
</body>
</html>