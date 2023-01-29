<?php session_start();
    require_once "../php/advertisment_card.php";
    require_once "../php/general_page.php";
    require_once "../php/draw_cards.php";
    require_once "../php/draw_adverts.php";
    require_once "../php/sql_connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="../js/counter.js"></script>
    <title>Каталог</title>
</head>
<body>
    <?php
        echo getHeader();

        if (isset($_POST['good_id_delete'])) {
            $connection = new SQLConnection();
            $res = $connection->delete_good($_POST['good_id_delete']);
        } elseif (isset($_POST['advert_id_delete'])) {
            $connection = new SQLConnection();
            $res = $connection->delete_advert($_POST['advert_id_delete']);
        }
    ?>

    <!-- <hr> -->
    <!-- bread bar -->
    <div class="container">
        <main class="main">
           <div class="bread-bar">
                <a class="bread-bar-item" href="index.php" style="margin-left: 0px">Главная</a>
                <span class="bread-slesh">/</span>
                <a class="bread-bar-item" href="catalog.php">Каталог</a>
           </div>
        </main>
    </div>

    <div class="container bg-box-c border-round">
        <form class="categories-form">
            <div class="categories-box categories-row bg-box-c">
                <div class="filter-col">
                    <div>
                        <input type="checkbox" name="ekzotic" id="ekzotic">
                        <label class='unselectable' for='ekzotic'>Экзотика</д>
                    </div>

                    <button class="filter-item-active">Все</button>
                </div>

                <div class="filter-col">
                    <div>
                        <input type="checkbox" name="gribs" id="gribs">
                        <label class='unselectable' for='gribs'>Грибы</label>
                    </div>

                    <button class="filter-item">Вы смотрели</button>
                </div>

                <div class="filter-col">
                    <div>
                        <input type="checkbox" name="yagods" id="yagods">
                        <label class='unselectable' for='yagods'>Ягоды</label>
                    </div>

                    <button class="filter-item">Избранное</button>
                </div>

                <div class="filter-col">
                    <div>
                        <input type="checkbox" name="fruits" id="fruits">
                        <label class='unselectable' for='fruits'>Фрукты</label>
                    </div>

                    <button class="filter-item">Лидеры продаж</button>
                </div>

                <div class="filter-col">
                    <div>
                        <input type="checkbox" name="vegetables" id="vegetables">
                        <label class='unselectable' for='vegetables'>Овощи</label>
                    </div>

                    <button class="filter-item">Новинки</button>
                </div>
            </div>
            
            <button class="filter-button" style="margin-bottom: 15px; margin-top: 15px;" type="submit">Применить</button>;
        </form>
    </div>

    <div class="container flex-row">
        <main class="main">
            <!-- <div class="filter-row">
                <button class="filter-item-active">Все</button>
                <button class="filter-item">Вы смотрели</button>
                <button class="filter-item">Избранное</button>
                <button class="filter-item">Лидеры продаж</button>
                <button class="filter-item">Новинки</button>
            </div> -->
            
          <?php
            if (isset($_POST['good_id_delete']) && $res) echo '<h2 class="green_alert">Объявление успешно снято с публикации!</h2>';
            else if (isset($_POST['good_id_delete']) && !$res) echo '<h2 class="red_alert">Не удалось снять объявление с публикации!</h2>';

            if (isset($_POST['advert_id_delete']) && $res) echo '<h2 class="green_alert">Реклама успешно снято с публикации!</h2>';
            else if (isset($_POST['advert_id_delete']) && !$res) echo '<h2 class="red_alert">Не удалось снять рекламу с публикации!</h2>';
            draw_goods(); 
          ?>
        </main>
    
        <aside class="aside">
            <?php
                draw_adverts();
            ?>
        </aside>
    </div>

    <?php
        echo getFooter();
    ?>
</body>
</html>