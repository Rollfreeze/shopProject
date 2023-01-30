<?php session_start();
    require_once "../php/advertisment_card.php";
    require_once "../php/edit_helper.php";
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

        // Удаление объявления
        if (isset($_POST['good_id_delete'])) {
            $connection = new SQLConnection();
            $res = $connection->delete_good($_POST['good_id_delete']);
        } 

        // Удаление рекламы
        if (isset($_POST['advert_id_delete'])) {
            $connection = new SQLConnection();
            $res = $connection->delete_advert($_POST['advert_id_delete']);
        }

        // Сброс фильтров сессии
        if (isset($_GET['drop']) && isset($_SESSION['current_filters'])) {
            unset($_SESSION['current_filters']);
        }

        // Установка фильтров в сессию
        if (isset($_GET['filter'])) {
            $_SESSION['current_filters'] = [
                'ekzotic' => isset($_GET['ekzotic']) ? true : false,
                'gribs' => isset($_GET['gribs']) ? true : false,
                'yagods' => isset($_GET['yagods']) ? true : false,
                'fruits' => isset($_GET['fruits']) ? true : false,
                'vegetables' => isset($_GET['vegetables']) ? true : false,
                'price_from' => (isset($_GET['price_from']) && $_GET['price_from'] != '') ? $_GET['price_from'] : '0',
                'price_to' => (isset($_GET['price_to']) && $_GET['price_to'] != '') ? $_GET['price_to'] : '1000000000',
                'select_good_country_id' => isset($_GET['select_good_country_id']) ? $_GET['select_good_country_id'] : 'all',
                'select_good_filter_id' => isset($_GET['select_good_filter_id']) ? $_GET['select_good_filter_id'] : 'all'
            ];
        }

        // Если фильтры установлены => получим подстановки
        if (isset($_SESSION['current_filters'])) {
            $filters = $_SESSION['current_filters'];

            $isEkzotic = $filters['ekzotic'] ? 'checked' : '';
            $isGribs = $filters['gribs'] ? 'checked' : '';
            $isYagods = $filters['yagods'] ? 'checked' : '';
            $isFruits = $filters['fruits'] ? 'checked' : '';
            $isVegetables = $filters['vegetables'] ? 'checked' : '';

            $defaultMin = $filters['price_from'] == '0' ? '' : $filters['price_from'];
            $defaultMax = $filters['price_to'] == '1000000000' ? '' : $filters['price_to'];

            $defaultCountryId = $filters['select_good_country_id'] == 'all' ? '0' : $filters['select_good_country_id'];
            $defaultFilterId = $filters['select_good_filter_id'] == 'all' ? '0' : $filters['select_good_filter_id'];
        }
    ?>

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
    
    <!-- form -->
    <div class="container bg-box-c border-round">
        <form class="categories-form" method="get">
            <div class="categories-box categories-row bg-box-c">
                <div class="filter-col">
                    <?php
                        echo "<input type='checkbox' $isEkzotic name='ekzotic' id='ekzotic'>";
                    ?>
                    <label class='unselectable' for='ekzotic'>Экзотика</label>
                </div>

                <div class="filter-col">
                    <?php
                        echo "<input type='checkbox' $isGribs name='gribs' id='gribs'>";
                    ?>
                    <label class='unselectable' for='gribs'>Грибы</label>
                </div>

                <div class="filter-col">
                    <?php
                        echo "<input type='checkbox' $isYagods name='yagods' id='yagods'>";
                    ?>
                    <label class='unselectable' for='yagods'>Ягоды</label>
                </div>

                <div class="filter-col">
                    <?php
                        echo "<input type='checkbox' $isFruits name='fruits' id='fruits'>";
                    ?>
                    <label class='unselectable' for='fruits'>Фрукты</label>
                </div>

                <div class="filter-col">
                    <?php
                        echo "<input type='checkbox' $isVegetables name='vegetables' id='vegetables'>";
                    ?>
                    <label class='unselectable' for='vegetables'>Овощи</label>
                </div>
            </div>

            <p class="price-title-input">Ценовой диапазон</з>

            <div class="price-filter-row flex-row">
                <?php
                    $defaultMin = $defaultMin ?? '';
                    echo "<input placeholder='Начальная цена' class='price-input' type='text' name='price_from' id='price_from' value='$defaultMin'>";
                ?>
                    <span class="price-span"> - </span>
                <?php
                    $defaultMax = $defaultMax ?? '';
                    echo "<input placeholder='Конечная цена' class='price-input' type='text' name='price_to' id='price_to' value='$defaultMax'>";
                ?>
            </div>

            <div class="flex-row box1000">
                <!-- country -->
                <div class="country-box">
                    <p class="price-title-input" style="margin-bottom: 10px;">Страна производитель:</p>
                    <select class="form-select" name="select_good_country_id" id="select_good_country_id" required>
                        <?php
                            $defaultCountryId = $defaultCountryId ?? 0;
                            filter_country_selected($defaultCountryId);
                        ?>
                    </select>
                </div>

                <!-- фильтры -->
                <div class="country-box">
                    <p class="price-title-input" style="margin-bottom: 10px;">Фильтрация товаров:</p>
                    <select class="form-select" name="select_good_filter_id" id="select_good_filter_id" required>
                        <?php
                            $defaultFilterId = $defaultFilterId ?? 0;
                            filter_sort_selected($defaultFilterId);
                        ?>
                    </select>
                </div>
            </div>

            <div class="flex-row box1000">
                <button class="filter-button" style="width: 30%; margin-bottom: 15px; margin-top: 15px;" type="submit" name="filter" id="filter" value="filter">Применить</button>;
                <button class="filter-button-2" style="width: 30%; margin-bottom: 15px; margin-top: 15px;" type="submit" name="drop" id="drop" value="drop">Сбросить</button>;
            </div>
        </form>
    </div>

    <div class="container flex-row">
        <main class="main">
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