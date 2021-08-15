<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="class1">
    <div class="but">
        <a href="Atable.php">Back to menu</a>

        
    </div>
<div class="box3">

<form action="insert_client.php" method="post" name="action">
        <table>
             <tr>
                <td> Код клиента</td>
                <td> <input type="text" name="id_client"> </td>
            </tr>
            
            <tr>
                <td> Введение ФИО клиента</td>
                <td> <input type="text" name="fio"> </td>
            </tr>
            

            <tr>
                <td> Введите возраст клиенты </td> 
                    <td> <input type="date" name="date_birt"> </td>
                </td>
            </tr>

            
        
                <td>
                    <input type="submit" value="Добавить данные">
                    <input type="reset" value="очистить форму">
                </td>
            </tr>
        </table>
        

    </form>
    </div>

<div class="box4">
    <h2> Таблица "клиенты" </h2>
    <table border=1>
        <tr>
            <td>Код клиента</td>
            <td>ФИО</td>
            <td>Дата рождения</td>
            <td>Редактироование</td>
            
        
        </tr>
<?php
        include('connect.php');
        if (isset($_GET['del_id']))
{
    $sql_delete  =  "DELETE  FROM  client  WHERE id_client = {$_GET['del_id']}";
    $result_delete = mysqli_query ($link, $sql_delete);
    
}
         $sql_state="SELECT id_client, fio, date_birt FROM client";

    $result_state = mysqli_query($link, $sql_state);    
    

        while ($row = mysqli_fetch_array($result_state)) 
        {


            echo '<tr>' .
            "<td> {$row['id_client']}</td>" .
            "<td> {$row['fio']}</td>" .
            "<td> {$row['date_birt']}</td>". 
            "<td> <a href='?del_id={$row['id_client']}'>Удалить</a></td>" .'</tr>';

          
        }
?>


 
    </div>
</div>



</body>
</html>