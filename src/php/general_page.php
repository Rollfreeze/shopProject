<?php

    function getHeader() {
        $isAuth = isset($_SESSION['current_user']) && $_SESSION['current_user'] != null;
        // $user = $_SESSION['current_user'];
        
        $isRoot = false;
        $basketMessage = "Товаров нет";
        if ($isAuth) {
            $user = $_SESSION['current_user'];
            $isRoot = $user['is_root'];

            if (isset($_SESSION['current_basket']) && !empty($_SESSION['current_basket']['goods_id'])) {
                $positions = count($_SESSION['current_basket']['goods_id']);
                $commonSum = $_SESSION['current_basket']['common_sum'];
                $basketMessage = "Позиций: <span class='orange-selected'>$positions</span>, на сумму: <span class='orange-selected'>$commonSum</span>";
            }
            
        }

        if ($isAuth && $isRoot) {
            $user_name = $_SESSION['current_user']['user_name'];
            $RIGHT_NAV = <<< RIGHT_NAV
            <div class="nav-right">
                <div class="globus-control-box"></div>
                <a class="admin-hover" href="control_countries.php">Менеджер стран</a>
                <div class="categories-control-box"></div>
                <a class="admin-hover" href="control_categories.php">Контроль категорий</a>
                <div class="advert-box"></div>
                <a class="admin-hover" href="add_advert.php">Добавить рекламу</a>
                <div class="edit-box"></div>
                <a class="admin-hover" href="add_advertisment.php">Добавить товар</a>
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
                            <a href="index.php">Главная</a>
                            <a href="catalog.php">Каталог</a>
                            <!-- <a href="about_us.php">О компании</a> -->
                            <a href="payment.php">Оплата</a>
                            <!-- <a href="delivery_to_office.php">Фрукты в офис</a> -->
                            <a href="contacts.php">Контакты</a>
                            <a href="delivery.php">Заказы</a>
                        </div>
                        
                        $RIGHT_NAV
                    </div>

                </div>
            </div>

            <!-- Logo-Row -->
            <div class="container">
                <div class="logo-row">
                    <a href="catalog.php" class="logo"></a>

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
                            <p id="basket_p">$basketMessage</p>
                        </div>
                    </div>
                </div>
            </div>
        <hr>            
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

                    
                    
                </div>

                <div class="footer-hr"></div>

                <div class="container flex-row padding-vertical-35" style="margin-top: 80px;">
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
