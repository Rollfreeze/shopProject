<?php

    function getHeader() {
        $HEADER = <<<HEADER
        <header class="header">
            <!-- Gray-Nav-Row -->
            <div class="gray-box">
                <div class="container">
                    <div class="nav">
                        <div class="nav-left">
                            <a href="about_us.php">О компании</a>
                            <a href="delivery.php">Условия доставки</a>
                            <a href="payment.php">Оплата</a>
                            <a href="delivery_to_office.php">Фрукты в офис</a>
                            <a href="contacts.php">Контакты</a>
                        </div>
                        
                        <div class="nav-right">
                            <div class="auth-box"></div>
                            <a href="">Авторизироваться</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Logo-Row -->
            <div class="container">
                <div class="logo-row">
                    <a href="index.php" class="logo"></a>

                    <div class="call-numbers-box">
                        <div class="call-number">
                            <p>Городской:</p>
                            <a href="tel:+79037203207">+7(903) 720-32-07</a>
                        </div>

                        <div class="call-number">
                            <p>По России:</p>
                            <a href="tel:+74957203207">+7(495) 720-32-07</a>
                        </div>
                    </div>
                    
                    <div class="shop-basket-box">
                        <div class="shop-baket"></div>
                        <div class="shop-basket-note">
                            <a href="">Ваша корзина</a>
                            <p>Товаров нет</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Logo-Row -->
            <div class="container">
                <div class="categories-row">
                    <a href="">Экзотика</a>
                    <a href="">Грибы</a>
                    <a href="">Ягоды</a>
                    <a href="">Фрукты</a>
                    <a href="">Овощи</a>
                </div>
            </div>
        </header>
HEADER;

        return $HEADER;
    }


    function getFooter() {
        $FOOTER = <<<FOOTER
        <footer class="footer">
            <div class="gray-box">
                <div class="container flex-row padding-vertical-35">
                    <div class="first-footer">
                        <div class="call-number">
                            <p class="dark">Городской:</p>
                            <a class="dark" href="tel:+79037203207">+7(903) 720-32-07</a>
                        </div>

                        <div class="call-number top20">
                            <p class="dark">Служба поддержки:</p>
                            <a class="dark" href="tel:+79187205457">+7(918) 720-54-57</a>
                        </div>
                    </div>

                    <div class="fourth-footer">
                        <div class="call-number">
                            <p class="dark">По России:</p>
                            <a class="dark" href="tel:+74957203207">+7(495) 720-32-07</a>
                        </div>
                    </div>

                    <div class="third-footer">
                        <a href="personal.php" class="link bottom20">Обработка персональных данных</a>
                    </div>

                    <div class="second-footer">
                        <p class="chapter">Каталог</p>
                        <a href="">Экзотика</a>
                        <a href="">Грибы</a>
                        <a href="">Ягоды</a>
                        <a href="">Фрукты</a>
                        <a href="">Овощи</a>
                    </div>
                </div>

                <div class="footer-hr"></div>

                <div class="container flex-row padding-vertical-35">
                    <p class="gray-footer">© Компания Алиберция - Доставка продуктов на дом по Москве и МО.</p>
                    <p class="gray-footer">Powered by ALFA Systems</p>
                </div>
            </div>
        </footer>
FOOTER;

        return $FOOTER;
    }
