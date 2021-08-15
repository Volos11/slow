<?php
include 'connect.php';
if(isset($_POST['fio'])) 
{
    if (isset($_GET['red_id'])) 
    {
        $sql_update  =  "UPDATE  state  SET  fio  = '{$_POST['fio']}', id_post   = '{$_POST['id_post']}', tel   =   '{$_POST['tel']}', date_birt = '{$_POST['date_birt']}',  date_rec = '{$_POST['date_rec']}'
   WHERE   id_state  = {$_GET['red_id']}";
        $result_update = mysqli_query($link, $sql_update);
    }
    if ($result_update) 
    {
        echo '<p>Успешно!</p>';
    } 
    else {
        echo  '<p>Произошла  ошибка:  '  .  mysqli_error($link) . '</p>';
         }
     }
if (isset($_GET['red_id'])) 
{$sql_select  =  "SELECT  id_state,  fio, id_post, tel, date_birt, date_rec  FROM  state  WHERE id_state = {$_GET['red_id']}";
$result_select = mysqli_query($link, $sql_select);
$row =mysqli_fetch_array($result_select);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title> Редактирование сотрудника</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>ФИО</td>
                <td><input type="text" name="fio" value="<?= isset($_GET['red_id']) ? $row['fio'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>Код должности</td>
                <td><input type="text" name="id_post" value="<?= isset($_GET['red_id']) ? $row['id_post'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>телефон</td>
                <td><input type="text" name="tel" value="<?= isset($_GET['red_id']) ? $row['tel'] : ''; ?>"></td></tr>
            
            <tr>
                <td>Дата Рождения</td>
                <td>
                    <input type="date" name="date_birt" value="<?= isset($_GET['red_id']) ? $row['date_birt'] : ''; ?>">
                </td>
            </tr>
            <tr>
                <td>Дата принятия на работу</td>
                <td>
                    <input type="date" name="date_rec" value="<?= isset($_GET['red_id']) ? $row['date_rec'] : ''; ?>">
                </td>
            </tr>

            <tr>
                <td colspan="2"><input type="submit" value="Сохранить"></td>
            </tr>
        </table>
    </form>
    <form action="state.php" method="post"><input type="submit" value="Вернуться назад"></form>
</body>

</html>
