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
        </tr>
        </div>

 


<?php


      
          
                
         $sql_t="SELECT itog.id_tehnika,  marka.marka,
          itog.id_client, itog.name, garant.garant,
           itog.model, itog.price,  state.fio \n".
        "FROM itog LEFT JOIN marka ON itog.id_marka =  marka.id_marka LEFT JOIN garant ON itog.id_garant = garant.id_garant  LEFT JOIN state     ON itog.id_state = state.id_state";
          

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
            '</tr>';
        }
        
    ?>
    </table>
</div>
</div>
</body>
</html>