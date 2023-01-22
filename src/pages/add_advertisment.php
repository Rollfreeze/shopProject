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
                <input class="auth_form_input" type="text" name="username" maxlength="100" minlength="4" pattern="^[a-zA-Z0-9_.-]*$" id="username" placeholder="Название" required>
                <input class="auth_form_input" type="text" name="password" maxlength="100" minlength="4" pattern="^[a-zA-Z0-9_.-]*$" id="password" placeholder="Описание" required>
                <input class="auth_form_input" type="text" name="price" maxlength="100" minlength="4" pattern="^[a-zA-Z0-9_.-]*$" id="price" placeholder="Стоимость" required>
                <select class="form-select" name="category" id="category" required>
                    <option value="Экзотика">Экзотика</option>
                    <option value="Грибы">Грибы</option>
                    <option value="Ягоды">Ягоды</option>
                    <option value="Фрукты">Фрукты</option>
                    <option value="Овощи">Овощи</option>
                </select>

                <button class="auth_form_button" type="submit">Добавить карточку товара на сайт</button>
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