<?php
    session_start();
    require_once "../php/general_page.php";
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
    <title>Добавить рекламу</title>
</head>
<body>
    <?php
        echo getHeader();

        if ($_POST) {
            $connection = new SQLConnection();
            $result = $connection->add_advert(
                $_POST['advert_title'],
                $_POST['advert_subtitle'],
                $_POST['advert_image']
            );
        }

    ?>

    <!-- bread bar -->
    <div class="container">
        <main class="main">
           <div class="bread-bar">
                <a class="bread-bar-item" href="index.php" style="margin-left: 0px">Главная</a>
                <span class="bread-slesh">/</span>
                <a class="bread-bar-item" href="add_advert.php">Новая реклама</a>
           </div>
        </main>
    </div>

    <div class="container">
        <div class="personal-data-law-box">
            <?php
                if ($_POST && $result) echo '<h2 class="green_alert">Реклама успешно добавлена!</h2>';
                else if ($_POST && $result == false) echo '<h2 class="red_alert">Ой, что-то пошло не так... Попробуйте еще раз</h2>';
            ?>    

            <h1 class="h1" style="text-align: center; margin-top: 0px;">Добавить новую рекламу на сайт</h1>
            
            <form class="authorization-form-2" method="post">
                <!-- title -->
                <p class="radio-text" style="font-size: 18px;">Название рекламы:</p>
                <input class="auth_form_input" type="text" name="advert_title" minlength="1" id="advert_title" placeholder="Название" required>
                
                <!-- subtitle -->
                <p class="radio-text" style="font-size: 18px;">Описание рекламы:</p>
                <input class="auth_form_input" type="text" name="advert_subtitle" minlength="1" id="advert_subtitle" placeholder="Описание" required>
                
                <!-- img -->
                <hr>
                <p class="radio-text" style="font-size: 18px; margin-top: 35px;">Выберите фотографию для рекламы:</p>
                <input class="img_upload_input" type="file" name="advert_image" id="advert_image" required>
                
                <button class="auth_form_button-2" style="margin-top: 20px; margin-bottom: 0px;" type="submit">Добавить рекламу на сайт</button>
            </form>
        </div>
    </div>

    <?php
        echo getFooter();
    ?>
</body>
</html>