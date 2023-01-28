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
        try {
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
        } catch (Exception $_) {
            return false;
        }
    }

    // Добавить товар
    function add_good($good_title, $good_subtitle, $good_image_path_1,
        $good_image_path_2, $good_category_id, $good_is_new,
        $good_is_leader, $good_price, $good_country_id, $good_popularity) {
        
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "INSERT INTO `goods`
                (`id`, `title`, `subtitle`, `image_path_1`, `image_path_2`, 
                    `category_id`, `is_new`, `is_leader`, `price`,
                        `country_id`, `popularity`)
                VALUES (NULL, '$good_title', '$good_subtitle', '$good_image_path_1', '$good_image_path_2',
                    '$good_category_id', '$good_is_new', '$good_is_leader', '$good_price', 
                        '$good_country_id', '$good_popularity');";

            $result = mysqli_query($connection, $sql_request);
            $connection->close();
            return $result;
        } catch (Exception $_) {
            return false;
        }

    }

    // Получить все товары
    function get_all_goods() {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "SELECT * FROM `goods`";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
    
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if (empty($rows)) return false;
            return $rows;
        } catch (Exception $_) {
            return false;
        }

    }

    /// Удалить товар
    function delete_good($id) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "DELETE FROM `goods` WHERE `goods`.`id` = $id;";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
    
            return $result;
        } catch (Exception $_) {
            return false;
        }

    }
}