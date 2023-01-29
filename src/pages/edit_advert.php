<?php
    session_start();
    require_once "../php/general_page.php";
    require_once "../php/sql_connection.php";
    require_once "../php/edit_helper.php";
    require_once "../php/general_page.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Редактировать рекламу</title>
</head>
<body>
    <?php
        echo getHeader();

        if ($_POST) {

            $img = $_POST['img_defalut'];
            if (isset($_POST['advert_image']) && $_POST['advert_image'] != null) {
                $img = $_POST['advert_image'];
            }

            $connection = new SQLConnection();
            $result = $connection->edit_advert(
                $_POST['advert_id'],
                $_POST['advert_title'],
                $_POST['advert_subtitle'],
                $img
            );
        } else if ($_GET) {
            var_dump($_GET);
            $advert_id = $_GET['advert_id'];
            $advert_title = $_GET['advert_title'];
            $advert_subtitle = $_GET['advert_subtitle'];
            $advert_image = $_GET['advert_image'];
        }


        $titlePlusiks = str_replace(" ", "+", $advert_title);
        $subtitlePlusiks = str_replace(" ", "+", $advert_subtitle);
        
        $pageHref = "edit_advert.php?advert_id=$advert_id&advert_title=$titlePlusiks&advert_subtitle=$advert_subtitle&advert_image=$advert_image"
    ?>

    <!-- bread bar -->
    <div class="container">
        <main class="main">
           <div class="bread-bar">
                <a class="bread-bar-item" href="index.php" style="margin-left: 0px">Главная</a>
                <span class="bread-slesh">/</span>
                <?php
                    echo "<a class='bread-bar-item' href='$pageHref'>Модерация рекламы</a>";
                ?>
           </div>
        </main>
    </div>

    <div class="container">
        <div class="personal-data-law-box">
            <?php
                if ($_POST && $result) echo '<h2 class="green_alert">Реклама успешно отредактирована!</h2>';
                else if ($_POST && $result == false) echo '<h2 class="red_alert">Ой, что-то пошло не так... Попробуйте еще раз</h2>';
            ?>


            <?php
            echo '<h1 class="h1" style="text-align: center; margin-top: 0px;">Редактирование</h1>';

            echo '<form class="authorization-form-2" method="post">';
                // id
                echo "<input value='$advert_id' type='hidden' name='advert_id' id='advert_id'></input>";
                
                // hidden images for default
                echo "<input value='$advert_image' type='hidden' name='img_defalut' id='img_defalut'></input>";

                // title
                echo '<p class="radio-text" style="font-size: 18px;">Название рекламы:</p>';
                echo "<input value='$advert_title' class='auth_form_input' type='text' name='advert_title' maxlength='100' minlength='4' id='advert_title' placeholder='Название' required>";
                
                // subtitle
                echo '<p class="radio-text" style="font-size: 18px;">Описание рекламы:</p>';
                echo "<input value='$advert_subtitle' class='auth_form_input' type='text' name='advert_subtitle' maxlength='100' minlength='4' id='advert_subtitle' placeholder='Описание' required>";
                
                // img
                echo '<hr>';
                $nowImg1 = <<< NOW_IMG_1
                <div class="flex-row" style="margin-top: 10px;">
                    <div class="half-box">
                        <p class="radio-text" style="font-size: 18px; margin-top: 35px;">Текущая фотография рекламы:</p>
                    </div>
                    <div class="half-box">
                        <img class='form-now-image' src='../assets/$advert_image' alt='no_img'>
                    </div>
                </div>
NOW_IMG_1;
                echo $nowImg1;
                echo '<p class="radio-text" style="font-size: 18px; margin-top: 35px; margin-right: 50px;">Выберите фотографию рекламы:</p>';
                echo "<input class='img_upload_input' type='file' name='advert_image' id='advert_image'>";
                

                echo '<button class="auth_form_button-2" type="submit">Редактировать карточку товара на сайт</button>';
            echo '</form>';
            ?>
        </div>
    </div>

    <?php
        echo getFooter();
    ?>
</body>
</html>