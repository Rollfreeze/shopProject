<?php session_start();?>
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

    <?php
        // if (isset($_POST['submit'])) {
        //     $image_name = $_FILES['advert_picture_upload']['name'];
        //     $tmp_image_name = $_FILES['advert_picture_upload']['tmp_name'];
        //     // $folder = '../uploaded_images/';
        //     move_uploaded_file($tmp_image_name, $image_name);
        // }
    ?>

    <!-- <script type="text/javascript" src="../js/input-file.js"></script> -->

    <div class="container">
        <div class="personal-data-law-box">
            <h1 class="h1" style="text-align: center; margin-top: 0px;">Добавить новую рекламу на сайт</h1>
            
            <form class="authorization-form-2" enctype="multipart/form-data">
                <input class="auth_form_input" type="text" name="advert_title" maxlength="100" minlength="1" pattern="^[a-zA-Z0-9_.-]*$" id="advert_title" placeholder="Заголовок рекламы" required>
                <input class="auth_form_input" type="text" name="advert_description" maxlength="100" minlength="1" pattern="^[a-zA-Z0-9_.-]*$" id="advert_description" placeholder="Описание" required>
                <input class="img_upload_input" type="file" name="advert_picture_upload" id="advert_picture_upload" required>

                <!-- <input type="submit" name="advert_picture_submit" id="advert_picture_submit"> -->
                <button class="auth_form_button-2" type="submit">Добавить рекламу на сайт</button>
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