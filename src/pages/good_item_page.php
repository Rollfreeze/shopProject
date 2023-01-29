<?php
    session_start();
    require_once "../php/general_page.php";
    require_once "../php/edit_helper.php";
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
    <title>Просмотр товара</title>
</head>
<body>
    <?php
        echo getHeader();

        if (isset($_GET['good_id']) && $_GET['good_id'] != null) {
            // var_dump($_GET);
            $good_id = $_GET['good_id'];
            $good_title = $_GET['good_title'];
            $good_subtitle = $_GET['good_subtitle'];
            $good_image_path_1 = $_GET['good_image_path_1'];
            $good_image_path_2 = $_GET['good_image_path_2'];
            $good_category_id = $_GET['good_category_id'];
            $good_is_new = $_GET['good_is_new'];
            $good_is_leader = $_GET['good_is_leader'];
            $good_price = $_GET['good_price'];
            $good_country_id = $_GET['good_country_id'];
            $good_popularity = $_GET['good_popularity'];

            $titlePlusiks = str_replace(" ", "+", $good_title);
            $subtitlePlusiks = str_replace(" ", "+", $good_subtitle);

            $good_isNew_href = ($_GET['good_is_new'] == '1') ? '1' : '0';
            $good_isLeder_href = ($_GET['good_is_leader'] == '1') ? '1' : '0';
        }
    ?>

    <!-- bread bar -->
    <div class="container">
        <main class="main">
           <div class="bread-bar">
                <a class="bread-bar-item" href="catalog.php" style="margin-left: 0px">Главная</a>
                <span class="bread-slesh">/</span>
                <?php
                    echo "<a class='bread-bar-item' href='good_item_page.php?good_id=$good_id&good_title=$titlePlusiks&good_subtitle=$subtitlePlusiks&good_image_path_1=$good_image_path_1&good_image_path_2=$good_image_path_2&good_category_id=$good_category_id&good_is_new=$good_isNew_href&good_is_leader=$good_isLeder_href&good_price=$good_price&good_country_id=$good_country_id&good_popularity=$good_popularity'>$good_title</a>";
                ?>
           </div>
        </main>
    </div>

    <div class="container">

        <div class="show-up-container">
            <div class="good-item-page-avatar">
                <!-- <div class="good-item-page-avatar-logo"></div> -->
                <?php
                    $productLogo = '<div class="good-item-page-avatar-logo" style="' . 'background-image: url(' . '..' . "/assets/" . $good_image_path_1 . '")' . '"></div>';
                    echo $productLogo;
                ?>
            </div>
            
            <div class="second-col">
                <?php
                echo "<h1 class='h1' style='text-align: left; margin-bottom: 5px; margin-top: 15px; font-size: 34px;'>$good_title</h1>";
                ?>
                <div class="gray-hr"></div>

                <div class="under-hr-description flex-row">
                    <div class="description-good-box">
                        <!-- <p class='good-raiting'>Рейтинг товара: </p> -->
                        <!-- <p class='good-country'>Страна производитель: </p> -->

                        <?php
                        $country = good_country_name($good_country_id);
                        $scoreColor = score_color($good_popularity);
                        echo "<p class='good-raiting'>Рейтинг товара: <span class='span-raiting $scoreColor'>$good_popularity</span></p>";
                        echo "<p class='good-country'>Страна: <span class='span-raiting country-c'>$country</span></p>";
                        echo "<p class='show-up-description'>$good_subtitle</p>";
                        ?>
                    </div>

                    <div class="counter-box">
                        <?php
                        echo "<p class='counter-box-money'>$good_price руб. за кг.</p>";
                        ?>

                        <div class="product-item-kg-counter">
                            <span class="down" onclick="deacreaseCount(event, this)">-</span>
                            <input type="text" value="1"></input>
                            <span class="up" onclick="increaseCount(event, this)">+</span>
                        </div>

                        <p class="normal-little" style="margin: 0 auto;">кг</p>
                        
                        <button class="product-button" style="margin-top: 100px;">Добавить в корзину</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- <div class="personal-data-law-box">
            <h1 class="h1" style="text-align: left; margin-top: 0px;">Контакты</h1>
            <p class="normal-text" style="margin-bottom: 0px;">Интернет-магазин Агро лавка Фрктов</p>
            <p class="normal-text" style="margin-bottom: 0px;">(ООО Алиберция).</p>
            <p class="normal-text" style="margin-bottom: 0px;">Телефон: +7 (495) 720-32-07</p>
            <p class="normal-text" style="margin-bottom: 0px; display: inline;">Электронная почта: </p>
            <a href="mailto:info@fruktov.pro" class="link" style="display: inline; font-size: 16px;">info@fruktov.pro</a>
            <p class="normal-text" style="margin-bottom: 110px;">ИНН 9703001558.</p>
        </div> -->
    </div>

    <?php
        echo getFooter();
    ?>
</body>
</html>