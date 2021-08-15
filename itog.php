<?php
  include 'connect.php';
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
   <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="class1">

        <div class="sh">
            <div class="exit">
                <form method="post">
                        <input class="button" type="submit" class="exit" name="exit" value="Выйти">
                </form> 
            </div>
            <a href="Atable.php">Back to menu</a>
        </div>







<div class="box3">
<form action="insert_itog.php" method="post" name="action">
        <table>
            <tr>
                <td> Код техники</td>
                <td> <input type="text" name="id_tehnika"> </td>
            </tr>
            

            <tr>
                <td> Марка </td>
                <td> 
                    <select name="id_marka">
                        <?php
                        include 'connect.php';
                        $sql_select = "SELECT id_marka, marka FROM marka";
                        $result_select = mysqli_query($link, $sql_select);

                        

                        while ($row = mysqli_fetch_array($result_select))
                        {

                        

                            echo "<option value = ' ".$row['id_marka']." '>".$row['marka']."</option>";

                        }

                        ?>

                    </select>
                </td>
            </tr>

             <tr>
                <td> Клиент </td>
                <td> 
                    <select name="id_client">
                        <?php
                        include 'connect.php';
                        $sql_select = "SELECT id_client, fio FROM client";
                        $result_select = mysqli_query($link, $sql_select);

                        

                        while ($row = mysqli_fetch_array($result_select))
                        {

                        

                            echo "<option value = ' ".$row['id_client']." '>".$row['fio']."</option>";

                        }

                        ?>

                    </select>
                </td>
            </tr>

            <tr>
                <td>название</td>
                <td><input type="text" name="name"></td>
            </tr>
             <tr>
                <td> Гарантия </td>
                <td> 
                    <select name="id_garant">
                        <?php
                        include 'connect.php';
                        $sql_select = "SELECT id_garant, garant FROM garant";
                        $result_select = mysqli_query($link, $sql_select);

                        

                        while ($row = mysqli_fetch_array($result_select))
                        {

                        

                            echo "<option value = ' ".$row['id_garant']." '>".$row['garant']."</option>";

                        }

                        ?>

                    </select>
                </td>
            </tr>
            <tr>
                <td>Модель</td>
                <td><input type="text" name="model"></td>
            </tr>
            <tr>
                <td> Цена</td>
                <td><input type="text" name="price"></td>
            </tr>
          

             <tr>
                <td> Сотрудник </td>
                <td> 
                    <select name="id_state">
                        <?php
                        include 'connect.php';
                        $sql_select = "SELECT id_state, fio FROM state";
                        $result_select = mysqli_query($link, $sql_select);

                        

                        while ($row = mysqli_fetch_array($result_select))
                        {

                        

                            echo "<option value = ' ".$row['id_state']." '>".$row['fio']."</option>";

                        }

                        ?>

                    </select>
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








<div class="box1">
    <table >
    <div class="op">        
        <tr>
            <td>Код техники</td>
            <td>Марка</td>
            <td>Название</td>
            <td>Гарантия</td>
            <td>Модель</td>
            <td>Цена</td>
            <td>Фио продавца</td> 
            <td>Редактирование</td>       
        </tr>
        </div>

 


<?php   
         $sql_t="SELECT itog.id_tehnika,  marka.marka,
          itog.id_client, itog.name, garant.garant,
           itog.model, itog.price, state.fio \n".
        "FROM itog LEFT JOIN marka ON itog.id_marka =  marka.id_marka LEFT JOIN garant ON itog.id_garant = garant.id_garant LEFT JOIN state ON itog.id_state = state.id_state";
          if (isset($_GET['del_id']))
{
    $sql_delete  =  "DELETE  FROM  state  WHERE id_state = {$_GET['del_id']}";
    $result_delete = mysqli_query ($link, $sql_delete);
    
}

    $result_t = mysqli_query($link, $sql_t);    
    
/*    while($row_e = mysql_fetch_assoc($result_t))
            {
                echo "<img src='" . $row_e['img'] . "' alt='' />";
            }
*/
        while ($row_e = mysqli_fetch_array($result_t)) 
        {
            
            echo '<tr>' .
            "<td> {$row_e['id_tehnika']}</td>" .
            "<td> {$row_e['marka']}</td>" .
            "<td> {$row_e['name']}</td>" .
            "<td> {$row_e['garant']}</td>" .
            "<td> {$row_e['model']}</td>" .
            "<td> {$row_e['price']}</td>" .
            
            
            /*"<td> {$show_img=base32_encode($row_e['img']);}</td>". ?>
            <img src="data:image/jpg;base64, <?=$show_img ?>" alt="">  
             <?php /*"<td> {$row_e['img']}</td>" .*/
            "<td> {$row_e['fio']}</td>" .
            "<td> <a href='?del_id={$row['id_state']}'>Удалить</a></td>".
            '</tr>';
        }
        
    ?>
    </table>
</div>
</div>
</body>
</html>