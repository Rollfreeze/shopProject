<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Доставка в офис</title>
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
                <a class="bread-bar-item" href="delivery_to_office.php">Доставка фруктов в офис</a>
           </div>
        </main>
    </div>

    <div class="container">
        <div class="personal-data-law-box">
            <h1 class="h1" style="text-align: left; margin-top: 0px;">Доставка фруктов в офис</h1>
            <p class="normal-text">Современные условия рабочих будней подразумевают наличие обеденного перерыва для сотрудников самых разных сфер. При этом далеко не всем удобно покидать рабочее место, чтобы перекусить в соседнем кафе или ресторане. А брать с собой бутерброды или возить в офис контейнеры с супами немодно уже давно.</p>
            <p class="normal-text">Что можно назвать достойной альтернативой, способной утолить голод и обеспечить перекус в любое время? Для многих организаций идеальным вариантом считается заказ фруктов непосредственно в офис – с возможностью доставки в любом количестве.</p>
            
            <h2 class="h2">Достоинства фруктово-овощных закупок</h2>
            <p class="normal-text">Во избежание заболеваний органов пищеварительной системы сотрудники любой компании должны питаться качественно и регулярно. График работы и финансовое положение не всегда могут предоставить подобные возможности. И если некоторые работники предпочитают наскоро перекусывать пережаренными пирожками и пиццами сомнительного происхождения, то все большая часть сознательных, образованных людей отдает свой выбор в пользу полезного питания.</p>
            <p class="normal-text">Компания «Агро лавка Фруктов» предлагает доставить фрукты в офис, что позволит обеспечить:</p>
            
            <ul class="ul-text">
                <li class="li-text">Полноценное питание сотрудников самых разных отделов.</li>
                <li class="li-text">Наличие угощения для посетителей, клиентов, партнеров.</li>
                <li class="li-text">Возможность получения необходимой дозы минералов и витаминов.</li>
            </ul>

            <p class="normal-text">Таким образом, владельцы и директора компаний заботятся не только о здоровье своих подчиненных. Специалисты разных уровней могут осуществлять рабочую деятельность, не отрываясь на походы в заведения общественного питания. Улучшается и финансовое положение сотрудников фирмы, и непосредственное отношение к начальству. А если руководство не в курсе подобных новшеств, заказы могут осуществлять сами сотрудники.</p>
            
            <h2 class="h2">Почему выбирают нас?</h2>
            <p class="normal-text">В наше время организаций, занимающихся доставкой фруктов по офисам, не так много. Но и среди них жители Москвы выбирают только тех, кто способен дать гарантии высокого качества продукции и должного уровня обслуживания. «Агро лавка Фруктов» создает оптимальные условия для полноценного питания сотрудников разных фирм, взаимовыгодного сотрудничества, удобства на всех этапах работы.</p>
            <p class="normal-text">При желании заказать фруктовые или овощные наборы наши партнеры делают пробные заявки, после чего становятся постоянными клиентами компании. Нашими главными преимуществами можно считать:</p>

            <ul class="ul-text">
                <li class="li-text">Оперативность принятия заказов.</li>
                <li class="li-text">Различные формы оплаты.</li>
                <li class="li-text">Накопительные скидки.</li>
                <li class="li-text">Возможность доставки в разные районы.</li>
                <li class="li-text">Наличие свежей и качественной продукции.</li>
                <li class="li-text">Сотрудничество с постоянными партнерами.</li>
            </ul>

            <p class="normal-text" style="margin-bottom: 40px;">Сотрудничая много лет с проверенными поставщиками из разных стран, мы заказываем фрукты оптом в Москву, налаживаем связи с отечественными фермерскими хозяйствами. Данные факторы обеспечивают наличие качественной, сертифицированной продукции – овощей, фруктов, зелени, а также лояльность ценовой политики. Мы всегда готовы к любым партиям заказов, доставляя товар по Москве и Подмосковью.</p>
        </div>
    </div>

    <?php
        require_once "../php/general_page.php";
        echo getFooter();
    ?>
</body>
</html>