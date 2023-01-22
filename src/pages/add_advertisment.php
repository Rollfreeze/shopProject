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
                <input class="auth_form_input" type="text" name="advertisment_name" maxlength="100" minlength="4" pattern="^[a-zA-Z0-9_.-]*$" id="advertisment_name" placeholder="Название" required>
                <input class="auth_form_input" type="text" name="advertisment_description" maxlength="100" minlength="4" pattern="^[a-zA-Z0-9_.-]*$" id="advertisment_description" placeholder="Описание" required>
                <input class="auth_form_input" type="text" name="price" maxlength="100" minlength="4" pattern="^[a-zA-Z0-9_.-]*$" id="price" placeholder="Стоимость" required>
                <select class="form-select" name="category" id="category" required>
                    <option value="Экзотика">Экзотика</option>
                    <option value="Грибы">Грибы</option>
                    <option value="Ягоды">Ягоды</option>
                    <option value="Фрукты">Фрукты</option>
                    <option value="Овощи">Овощи</option>
                </select>
                <div class="radio-box">
                    <p class="radio-text" style="margin-right: 20px;">Товар уже кончается?</p>
                    <input type="radio" value="true" name="is_running_out_soon" id="running_out_soon_ture">
                    <label for="running_out_soon_ture" class="radio-text">Да</label>
                    <input type="radio" value="false" name="is_running_out_soon" id="running_out_soon_false">
                    <label for="running_out_soon_false" class="radio-text">Нет</label>
                </div>

                <div class="radio-box">
                    <p class="radio-text" style="margin-right: 20px;">Товар является новинкой?</p>
                    <input type="radio" value="true" name="is_new" id="new_true">
                    <label for="new_true" class="radio-text">Да</label>
                    <input type="radio" value="false" name="is_new" id="new_false">
                    <label for="new_false" class="radio-text">Нет</label>
                </div>

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