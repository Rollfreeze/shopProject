<?php
    session_start();
    require_once "../php/general_page.php";
    require_once "../php/edit_helper.php";
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


            if (isset($_GET['comment-area']) && !empty($_GET['comment-area'])) {
                $connection = new SQLConnection();

                $user = $_SESSION['current_user'];

                $comment_result = $connection->add_comment(
                    $good_id,
                    $user['user_id'],
                    $user['user_name'],
                    $_GET['comment-area'],
                );

                // var_dump($comment_result);
            }
        }
    ?>

    <!-- bread bar -->
    <div class="container">
        <main class="main">
           <div class="bread-bar">
                <a class="bread-bar-item" href="index.php" style="margin-left: 0px">Главная</a>
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
                        // $country = good_country_name($good_country_id);
                        $connection = new SQLConnection();
                        $country = $connection->get_country_name($good_country_id);

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

    <div class="container" style="margin-top: 20px;">
        <form method="get">
            <?php
                $hidden_elements = <<< HIDDEN
                    <input type="hidden" name="good_id" value="$good_id"></input>
                    <input type="hidden" name="good_title" value="$good_title"></input>
                    <input type="hidden" name="good_subtitle" value="$good_subtitle"></input>
                    <input type="hidden" name="good_image_path_1" value="$good_image_path_1"></input>
                    <input type="hidden" name="good_image_path_2" value="$good_image_path_2"></input>
                    <input type="hidden" name="good_category_id" value="$good_category_id"></input>
                    <input type="hidden" name="good_is_new" value="$good_is_new"></input>
                    <input type="hidden" name="good_is_leader" value="$good_is_leader"></input>
                    <input type="hidden" name="good_price" value="$good_price"></input>
                    <input type="hidden" name="good_country_id" value="$good_country_id"></input>
                    <input type="hidden" name="good_popularity" value="$good_popularity"></input>

HIDDEN;
                echo $hidden_elements;
            ?>


            <div class="flex-row-end">
                <div style="margin-right: 20px;">
                    <button class="filter-button" style="width: 258px; margin: 0; margin-bottom: 15px;">Добавить комментарий</button>
                </div>
            </div>

            <div class="flex-row-end">
                <textarea maxlength="50" name="comment-area" id="comment-area" cols="40" rows="4"></textarea>
            </div>
        </form>

        <div class="user-coment">
            <div class="user-line">
                <div class="flex-row-2">
                    <div class="auth-box"></div>
                    <div class="user-coment-name">Julia</div>
                    <div class="user-coment-time">23.04.2016 14:59:01</div>
                </div>
            </div>
            
            <div class="user-coment-box">
                Комментарий: привет мир!
            </div>
        </div>
        
        <div class="user-coment">
            <div class="user-line">
                <div class="flex-row-2">
                    <div class="auth-box"></div>
                    <div class="user-coment-name">Egor</div>
                    <div class="user-coment-time">23.04.2016 14:59:01</div>
                </div>
            </div>
            
            <div class="user-coment-box">
                Комментарий: привет мир! ^^
            </div>
        </div>
    </div>

    <?php
        echo getFooter();
    ?>
</body>
</html>