<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Добавить объявление</title>
</head>
<body>
    <?php
        require_once "../php/general_page.php";
        echo getHeader();
    ?>

    <!-- bread bar -->
    <div class="container">
        <main class="main">
           <div class="bread-bar">
                <a class="bread-bar-item" href="index.php" style="margin-left: 0px">Главная</a>
                <span class="bread-slesh">/</span>
                <a class="bread-bar-item" href="authorization_page.php">Авторизация</a>
           </div>
        </main>
    </div>

    <div class="container">
        <div class="personal-data-law-box">
            <h1 class="h1" style="text-align: center; margin-top: 0px;">Добавить новое объявление на сайт</h1>
            
            <form class="authorization-form-2">
                <!-- title -->
                <input class="auth_form_input" type="text" name="good_title" maxlength="100" minlength="4" pattern="^[a-zA-Z0-9_.-]*$" id="good_title" placeholder="Название" required>
                <!-- subtitle -->
                <input class="auth_form_input" type="text" name="good_subtitle" maxlength="100" minlength="4" pattern="^[a-zA-Z0-9_.-]*$" id="good_subtitle" placeholder="Описание" required>
                <!-- img-1 -->
                <input class="img_upload_input" type="file" name="good_image_path_1" id="good_image_path_1" required>
                <!-- img-2 -->
                <input class="img_upload_input" type="file" name="good_image_path_2" id="good_image_path_2" required>
                <!-- category -->
                <select class="form-select" name="good_category_id" id="good_category_id" required>
                    <option value="1">Экзотика</option>
                    <option value="2">Грибы</option>
                    <option value="3">Ягоды</option>
                    <option value="4">Фрукты</option>
                    <option value="5">Овощи</option>
                </select>
                <!-- isNew? -->
                <div>
                    <p class="radio-text" style="margin-right: 20px;">Товар является новинкой?</p>
                    <input type="checkbox" name="good_is_new" id="good_is_new">
                </div>
                <!-- isLeader? -->
                <div>
                    <p class="radio-text" style="margin-right: 20px;">Товар является лидером продаж?</p>
                    <input type="checkbox" name="good_is_leader" id="good_is_leader">
                </div>
                <!-- price -->
                <input class="auth_form_input" type="text" name="good_price" maxlength="100" minlength="4" pattern="^[a-zA-Z0-9_.-]*$" id="good_price" placeholder="Стоимость" required>

                <!-- country -->
                <select class="form-select" name="good_country_id" id="good_country_id" required>
                    <option value="1">Россия</option>
                    <option value="2">Беларусь</option>
                    <option value="3">Китай</option>
                    <option value="4">Таджикистан</option>
                    <option value="5">Италия</option>
                </select>
                
                <!-- popularity -->
                <select class="form-select" name="good_popularity" id="good_popularity" required>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>

                <button class="auth_form_button-2" type="submit">Добавить карточку товара на сайт</button>
                <!-- <button class="product-button">Купить продукт</button> -->
            </form>
        </div>
    </div>

    <?php
        require_once "../php/general_page.php";
        echo getFooter();
    ?>
</body>
</html>