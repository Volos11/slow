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

        <a href=""></a>
    </div>

<div class="box3">
<form action="insert_state.php" method="post" name="action">
        <table>
            <tr>
                <td> Введение ФИО Сотрудника</td>
                <td> <input type="text" name="fio"> </td>
            </tr>
            

            <tr>
                <td> Введите должность сотрудника </td>
                <td> 
                    <select name="id_post">
                        <?php
                        include 'connect.php';
                        $sql_select = "SELECT id_post, post FROM post";
                        $result_select = mysqli_query($link, $sql_select);

                        

                        while ($row = mysqli_fetch_array($result_select))
                        {

                        

                            echo "<option value = ' ".$row['id_post']." '>".$row['post']."</option>";

                        }

                        ?>

                    </select>
                </td>
            </tr>

            <tr>
                <td>Введите телефон номер сотрудника</td>
                <td><input type="text" name="tel"></td>
            </tr>
            <tr>
                <td>Укажите дату рождения сотрудника</td>
                <td><input type="date" name="date_birt"></td>
            </tr>
            <tr>
                <td> укажите дату принятия сотрудника на работу</td>
                <td><input type="date" name="date_rec"></td>
            </tr>
        
                <td>
                    <input type="submit" value="Добавить данные">
                    <input type="reset" value="очистить форму">
                </td>
            </tr>
        </table>
        

</form>
</div>

<div class="box2">
    <h2> Таблица "Сотрудники" </h2>
    <table>
        <tr>
            <td>Код сотрудника</td>
            <td>ФИО сотрудника</td>
            <td>Код должности сотрудника</td>
            <td>Телефон сотрудника</td>
            <td>Дата рождения сотрудника</td>
            <td>Дата принятия на работу</td>
            <td>Редактирование</td>
    
            
        
        </tr>
<?php
        include('connect.php');
        if (isset($_GET['del_id']))
{
    $sql_delete  =  "DELETE  FROM  state  WHERE id_state = {$_GET['del_id']}";
    $result_delete = mysqli_query ($link, $sql_delete);
    
}
         $sql_state="SELECT state.id_state, state.fio, post.post, state.tel, state.date_birt, state.date_rec \n". 
         "FROM state INNER JOIN post ON state.id_post = post.id_post";

    $result_state = mysqli_query($link, $sql_state);    
    

        while ($row = mysqli_fetch_array($result_state)) 
        {


            echo '<tr>' .
            "<td> {$row['id_state']}</td>" .
            "<td> {$row['fio']}</td>" .
            "<td> {$row['post']}</td>" .
            "<td> {$row['tel']}</td>" .
            "<td> {$row['date_birt']}</td>" .
            "<td> {$row['date_rec']}</td>" .
            "<td> <a href='?del_id={$row['id_state']}'>Удалить</a>
            <a href='update_state.php?red_id={$row['id_state']}'>Изменить</a></td>" .'</tr>';

            '</tr>';
        }
?>
</table>
</div>
 </div>
    




</body>
</html>