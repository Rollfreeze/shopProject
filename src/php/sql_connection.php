<?php

class SQLConnection {
    // хост, к которому мы подключаемся
    private $host = 'db';
    // имя пользователя
    private $user = 'root';
    // пароль
    private $password = 'root';
    // база данных
    private $db = 'shop';

    // Авторизация
    function authorize($login, $password) {
        $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
        if (!$connection) {
            die("Connection failed: " .mysqli_connect_error());
        }
        $sql_request = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'";
        $result = mysqli_query($connection, $sql_request);
        $connection->close();

        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if (empty($rows)) return false;
        return $rows;
    }

    // Добавить товар
    function add_good($title, $subtitle, $good_image_path_1,
        $good_image_path_2, $good_category_id, $good_is_new,
        $good_is_leader, $good_price, $good_country_id, $good_popularity) {
            
        $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
        if (!$connection) {
            die("Connection failed: " .mysqli_connect_error());
        }
        $sql_request = "INSERT INTO `goods`
            (`id`, `title`, `subtitle`, `image_path_1`, `image_path_2`, 
                `category_id`, `is_new`, `is_leader`, `price`,
                    `country_id`, `popularity`)
            VALUES (NULL, '$title', '$subtitle', '$good_image_path_1', '$good_image_path_2',
                '$good_category_id', '$good_is_new', '$good_is_leader', '$good_price', 
                    '$good_country_id', '$good_popularity');";

        $result = mysqli_query($connection, $sql_request);
        $connection->close();
        return $result;
    }

    // // Авторизация
    // function authorize($login, $password) {
    //     $mysql = new mysqli($this->host, $this->user, $this->password, $this->db);
    //     if ($mysql->connect_errno) exit(mysqli_connect_error());
    //     $mysql->set_charset($this->charset);
    //     // $sql_request = 'SELECT * FROM `users` WHERE `login` = $login AND `password` = $password';
    //     $sql_request = 'SELECT * FROM `users`';
    //     $result = mysqli_query($mysql, $sql_request);
    //     $mysql->close();

    //     return $result;
    // }

    /// Получение всех комментариев
    // public static function getAdvertisments() {
    //     $mysql = new mysqli(self::$host, self::$user, self::$password, self::$db);
    //     if ($mysql->connect_errno) exit(mysqli_connect_error());
    //     $mysql->set_charset(self::$charset);
    //     $sql_request = 'SELECT * FROM `feed_back`';
    //     $result = mysqli_query($mysql, $sql_request);
    //     $mysql->close();

    //     return $result;
    // }
}