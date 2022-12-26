<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleBase.css">
    <link rel="stylesheet" href="style.css">
    <title>Доставка</title>
</head>
<body>
    <?php
        require_once "php/general_page.php";
        echo getHeader();
    ?>

    <div class="container">
        <main class="main">
           <div class="bread-bar">
                <a class="bread-bar-item" href="index.html" style="margin-left: 0px">Главная</a>
                <span class="bread-slesh">/</span>
                <a class="bread-bar-item" href="delivery.html">Доставка</a>
           </div>


        </main>
    </div>

    <div class="container">
        <h1 class="h1" style="text-align: left; margin-top: 0px;">Доставка</h1>

        <table class="table">
            <tbody>
            <tr>
                <th colspan="4">
                    Москва: - минимальная сумма заказа 3000 рублей.
                </th>
            </tr>
            <tr>
                <td>
                    <div class="p-delivery__freeprice">
                        <span style="font-size: 12pt;">При заказе от 4000 рублей</span>
                    </div>
                </td>
                <td>
                    <span style="font-size: 12pt;"> </span>
                    <div class="p-delivery__freeprice">
                    <span style="font-size: 12pt;">
                        Бесплатно
                    </span>
                    <br>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <span style="font-size: 12pt;">При заказе от 2500 рублей</span>
                </td>
                <td>
                    <span style="font-size: 12pt;">500 рублей</span>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        <span style="font-size: 12pt;">При заказе от 2000 рублей</span>
                    </div>
                    <span style="font-size: 12pt;"> </span>
                </td>
                <td>
                    <div>
                        <span style="font-size: 12pt;">450 руб. </span>
                    </div>
                </td>
            </tr>
            <tr>
                <th colspan="4">
                     Московская область: до 10км от МКАД - минимальная сумма заказа 3500 рублей.<br>
                </th>
            </tr>
            <tr>
                <td>
                    <span style="font-size: 12pt;">При заказе от 3000 руб. </span><br>
                    <span style="font-size: 12pt;"> </span>
                </td>
                <td colspan="3">
                    <span style="font-size: 12pt;">500 рублей</span>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="p-delivery__freeprice">
                        <span style="font-size: 12pt;">При заказе от 5000 рублей</span>
                    </div>
                </td>
                <td>
                    <span style="font-size: 12pt;"> </span>
                    <div class="p-delivery__freeprice">
                    <span style="font-size: 12pt;">
                        Бесплатно</span><br>
                    </div>
                </td>
            </tr>
            <tr>
                <th colspan="4">
                     Московская область:&nbsp; от 10 до 20км от МКАД - минимальная сумма заказа 10000 рублей.<br>
                </th>
            </tr>
            <tr>
                <td>
                    <span style="font-size: 12pt;">При заказе от 10000 рублей</span>
                </td>
                <td>
                    <span style="font-size: 12pt;">600 рублей</span>
                    <br>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="p-delivery__freeprice">
                        <span style="font-size: 12pt;">При заказе от 20000 рублей</span>
                    </div>
                </td>
                <td>
                    <div class="p-delivery__freeprice">
                    <span style="font-size: 12pt;">
                        Бесплатно</span><br>
                    </div>
                </td>
            </tr>
            <tr>
                <th colspan="4">
                     Московская область:&nbsp; от 20 до 30км от МКАД - минимальная сумма заказа 20000 рублей.<br>
                </th>
            </tr>
            <tr>
                <td>
                    <span style="font-size: 12pt;">При заказе от 20000 рублей</span>
                </td>
                <td>
                    <span style="font-size: 12pt;"> 1500 рублей</span><br>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="p-delivery__freeprice">
                        <span style="font-size: 12pt;">При заказе от 30000 рублей</span>
                    </div>
                </td>
                <td>
                    <div class="p-delivery__freeprice">
                        <span span style="font-size: 12pt;">Бесплатно</span><br>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <p class="normal-text">Доставка заказов осуществляется на автотранспорте, по прежнему актуальна доставка в день заказа, если он оформлен до 12:00. На охраняемых территориях необходимо обеспечить подъезд к подъезду (выписать пропуск, предупредить охрану и т.п.)</p>
        <p class="normal-text" style="margin-top: 10px; margin-bottom: 40px;">За подъем заказа в квартиру или офис, суммарный вес которого превышает 50кг, взымается дополнительная плата в размере 500руб.</p>
    </div>

    <?php
        require_once "php/general_page.php";
        echo getFooter();
    ?>
</body>
</html>