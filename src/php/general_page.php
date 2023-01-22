<?php

    function getHeader() {
        $isAuth = isset($_SESSION['current_user']) && $_SESSION['current_user'] != null;
        $user = $_SESSION['current_user'];
        
        $isRoot = false;
        if ($isAuth) {
            $isRoot = $isRoot = $user['is_root'];
        }

        if ($isAuth && $isRoot) {
            $user_name = $_SESSION['current_user']['user_name'];
            $RIGHT_NAV = <<< RIGHT_NAV
            <div class="nav-right">
                <div class="picture-box"></div>
                <a href="">Изменить логотип</a>
                <div class="advert-box"></div>
                <a href="add_advert.php">Добавить рекламу</a>
                <div class="edit-box"></div>
                <a href="add_advertisment.php">Добавить объявление</a>
                <div class="auth-box"></div>
                <a href="authorization_page.php">$user_name</a>
            </div>
RIGHT_NAV;
        } elseif ($isAuth) {
            $user_name = $_SESSION['current_user']['user_name'];
            $RIGHT_NAV = <<< RIGHT_NAV
            <div class="nav-right">
                <div class="auth-box"></div>
                <a href="authorization_page.php">$user_name</a>
            </div>
RIGHT_NAV; 
        } else {
            $RIGHT_NAV = <<< RIGHT_NAV
            <div class="nav-right">
                <div class="auth-box"></div>
                <a href="authorization_page.php">Авторизироваться</a>
            </div>
RIGHT_NAV;
        }

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
                        
                        $RIGHT_NAV
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
                            <a href="basket.php">Ваша корзина</a>
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

    function get_log_out_button() {
        $LOGOUT = <<< LOGOUT
        <form action="authorization_page.php" class="authorization-form" method="post">
            <input type="hidden" name="go_logout" id="go_logout" value="true">
            <button class="auth_form_button logout" type="submit">Выйти из учетной записи</button>
        </form>
LOGOUT;

        return $LOGOUT;
    }