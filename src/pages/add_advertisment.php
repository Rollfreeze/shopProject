<?php
    session_start();
    require_once "../php/general_page.php";
    require_once "../php/sql_connection.php";
    require_once "../php/category_helper.php";
    require_once "../php/country_helper.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Добавить товар</title>
</head>
<body>
    <?php
        echo getHeader();

        if (isset($_POST['good_title'])) {
            $isNew = (isset($_POST['good_is_new'])) ? 1 : 0;
            $isLeder = (isset($_POST['good_is_leader'])) ? 1 : 0;

            $connection = new SQLConnection();
            $result = $connection->add_good(
                $_POST['good_title'], $_POST['good_subtitle'],
                $_POST['good_image_path_1'], $_POST['good_image_path_2'],
                $_POST['good_category_id'], $isNew, $isLeder,
                $_POST['good_price'], $_POST['good_country_id'], $_POST['good_popularity']
            );
        }

    ?>

    <!-- bread bar -->
    <div class="container">
        <main class="main">
           <div class="bread-bar">
                <a class="bread-bar-item" href="index.php" style="margin-left: 0px">Главная</a>
                <span class="bread-slesh">/</span>
                <a class="bread-bar-item" href="add_advertisment.php">Новый товар</a>
           </div>
        </main>
    </div>

    <div class="container">
        <div class="personal-data-law-box">
            <?php
                if ($_POST && $result) echo '<h2 class="green_alert">Объявление успешно добавлено!</h2>';
                else if ($_POST && $result == false) echo '<h2 class="red_alert">Ой, что-то пошло не так... Попробуйте еще раз</h2>';
            ?>    

            <h1 class="h1" style="text-align: center; margin-top: 0px;">Добавить новый товар на сайт</h1>
            
            <form class="authorization-form-2" method="post">
                <!-- title -->
                <p class="radio-text" style="font-size: 18px;">Название товара:</p>
                <input class="auth_form_input" type="text" name="good_title" minlength="1" id="good_title" placeholder="Название" required>
                
                <!-- subtitle -->
                <p class="radio-text" style="font-size: 18px;">Описание товара:</p>
                <input class="auth_form_input" type="text" name="good_subtitle" minlength="1" id="good_subtitle" placeholder="Описание" required>
                
                <!-- img-1 -->
                <hr>
                <p class="radio-text" style="font-size: 18px; margin-top: 35px;">Выберите фотографию товара №1:</p>
                <input class="img_upload_input" type="file" name="good_image_path_1" id="good_image_path_1" required>
                
                <!-- img-2 -->
                <!-- <p class="radio-text" style="font-size: 18px; margin-top: 15px;">Выберите фотографию товара №2:</p>
                <input class="img_upload_input" style="margin-bottom: 40px;" type="file" name="good_image_path_2" id="good_image_path_2" required>
                <hr> -->
                
                <!-- category -->
                <p class="radio-text" style="font-size: 18px; margin-top: 20px;">Категория товара:</p>
                <select class="form-select" name="good_category_id" id="good_category_id" required>
                    <?php
                        draw_categories_options();
                    ?>
                </select>

                <!-- country -->
                <p class="radio-text" style="font-size: 18px;">Страна производитель:</p>
                <select class="form-select" name="good_country_id" id="good_country_id" required>
                    <!-- <option value="1">Россия</option>
                    <option value="2">Беларусь</option>
                    <option value="3">Китай</option>
                    <option value="4">Таджикистан</option>
                    <option value="5">Италия</option> -->
                    <?php
                        draw_countries_options();
                    ?>
                </select>
                
                <!-- popularity -->
                <p class="radio-text" style="font-size: 18px;">Оценка товара:</p>
                <select class="form-select" name="good_popularity" id="good_popularity" required>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>

                <!-- price -->
                <p class="radio-text" style="font-size: 18px;">Стоимость товара:</p>
                <input class="auth_form_input" type="text" name="good_price" minlength="1" id="good_price" placeholder="Стоимость" required>

                <!-- isNew? -->
                <div>
                    <p class="radio-text" style="font-size: 18px; margin-right: 20px;">Товар является новинкой?</p>
                    <input type="checkbox" name="good_is_new" id="good_is_new" style="vertical-align: top; margin-top: 7px;">
                </div>

                <!-- isLeader? -->
                <div style="margin-bottom: 15px;">
                    <p class="radio-text" style="font-size: 18px; margin-right: 20px;">Товар является лидером продаж?</p>
                    <input type="checkbox" name="good_is_leader" id="good_is_leader" style="vertical-align: top; margin-top: 7px;">
                </div>

                <button class="auth_form_button-2" style="margin-top: 20px; margin-bottom: 0px;" type="submit">Добавить карточку товара на сайт</button>
            </form>
        </div>
    </div>

    <?php
        echo getFooter();
    ?>
</body>
</html>