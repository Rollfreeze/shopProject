<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleBase.css">
    <link rel="stylesheet" href="style.css">
    <title>Контантая информация</title>
</head>
<body>
    <?php
        require_once "php/general_page.php";
        echo getHeader();
    ?>

    <!-- bread bar -->
    <div class="container">
        <main class="main">
           <div class="bread-bar">
                <a class="bread-bar-item" href="index.php" style="margin-left: 0px">Главная</a>
                <span class="bread-slesh">/</span>
                <a class="bread-bar-item" href="contacts.php">Контакты</a>
           </div>
        </main>
    </div>

    <div class="container">
        <div class="personal-data-law-box">
            <h1 class="h1" style="text-align: left; margin-top: 0px;">Контакты</h1>
            <p class="normal-text" style="margin-bottom: 0px;">Интернет-магазин Агро лавка Фрктов</p>
            <p class="normal-text" style="margin-bottom: 0px;">(ООО Алиберция).</p>
            <p class="normal-text" style="margin-bottom: 0px;">Телефон: +7 (495) 720-32-07</p>
            <p class="normal-text" style="margin-bottom: 0px; display: inline;">Электронная почта: </p>
            <a href="mailto:info@fruktov.pro" class="link" style="display: inline; font-size: 16px;">info@fruktov.pro</a>
            <p class="normal-text" style="margin-bottom: 110px;">ИНН 9703001558.</p>
        </div>
    </div>

    <?php
        require_once "php/general_page.php";
        echo getFooter();
    ?>
</body>
</html>