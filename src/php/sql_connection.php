<?php

class SQLConnection {
    // хост, к которому мы подключаемся
    private $host = 'db';
    // имя пользователя
    private $user = 'root';
    // пароль
    private $password = 'egor';
    // база данных
    private $db = 'shop';

    // Авторизация
    function authorize($login, $password) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $login = htmlspecialchars($login);
            $password = htmlspecialchars($password);
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

    // Получить товар по id
    function get_good($id) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "SELECT * FROM `goods` where `id` = $id";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
    
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if (empty($rows)) return false;
            return $rows[0];
        } catch (Exception $_) {
            return false;
        }
    }

    // Получить товары по фильтрам
    function get_filter_goods($querry) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = $querry;
            // var_dump($sql_request);
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

    // Редактировать товар
    function edit_good($good_id,
        $good_title, $good_subtitle, $good_image_path_1,
        $good_image_path_2, $good_category_id, $good_is_new,
        $good_is_leader, $good_price, $good_country_id, $good_popularity) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "UPDATE `goods` SET 
                `title` = '$good_title',
                `subtitle` = '$good_subtitle',
                `image_path_1` = '$good_image_path_1',
                `image_path_2` = '$good_image_path_2',
                `category_id` = '$good_category_id',
                `is_new` = '$good_is_new',
                `is_leader` = '$good_is_leader',
                `price` = '$good_price',
                `country_id` = '$good_country_id',
                `popularity` = '$good_popularity'
                WHERE `goods`.`id` = $good_id;";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();

            return $result;
        } catch (Exception $_) {
            return false;
        }
    }

    // Добавить рекламу
    function add_advert($advert_title, $advert_subtitle, $advert_image) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "INSERT INTO `advert` (`id`, `title`, `subtitle`, `image`) VALUES
                (NULL, '$advert_title', '$advert_subtitle', '$advert_image');";

            $result = mysqli_query($connection, $sql_request);
            $connection->close();
            return $result;
        } catch (Exception $_) {
            return false;
        }
    }

    // Получить все рекламы
    function get_all_adverts() {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "SELECT * FROM `advert`";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
    
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if (empty($rows)) return false;
            return $rows;
        } catch (Exception $_) {
            return false;
        }
    }

    /// Удалить рекламу
    function delete_advert($id) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "DELETE FROM `advert` WHERE `advert`.`id` = $id;";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
    
            return $result;
        } catch (Exception $_) {
            return false;
        }
    }

    // Редактировать рекламу
    function edit_advert($advert_id, $advert_title, $advert_subtitle, $advert_image) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "UPDATE `advert` SET 
                `title` = '$advert_title',
                `subtitle` = '$advert_subtitle',
                `image` = '$advert_image'
                WHERE `advert`.`id` = $advert_id;";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();

            return $result;
        } catch (Exception $_) {
            return false;
        }
    }

    // Добавить Категорию
    function add_category($category_name) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "INSERT INTO `categories` (`id`, `name`) VALUES (NULL, '$category_name');";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
            return $result;
        } catch (Exception $_) {
            return false;
        }
    }

    // Получить все категории
    function get_all_categories() {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "SELECT * FROM `categories`";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
    
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if (empty($rows)) return false;
            return $rows;
        } catch (Exception $_) {
            return false;
        }
    }

    // Получить имя категории по id
    function get_category_name($id) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "SELECT `name` FROM `categories` WHERE `id` = 3;";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
    
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if (empty($rows)) return false;
            return $rows[0]['name'];
        } catch (Exception $_) {
            return false;
        }
    }

    // Удалить Категорию
    function delete_category($id) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "DELETE FROM `categories` WHERE `categories`.`id` = $id;";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
            return $result;
        } catch (Exception $_) {
            return false;
        }
    }

    // Изменить имя категории
    // UPDATE `categories` SET `name` = 'Изменил имя' WHERE `categories`.`id` = 11;
    function update_category($id, $name) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "UPDATE `categories` SET `name` = '$name' WHERE `categories`.`id` = $id;";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
            return $result;
        } catch (Exception $_) {
            return false;
        }
    }

    // Добавить страну-партнера
    function add_country($country_name) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "INSERT INTO `countries` (`id`, `country_name`) VALUES (NULL, '$country_name');";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
            return $result;
        } catch (Exception $_) {
            return false;
        }
    }

    // Получить все страны-партнеры
    function get_all_countries() {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "SELECT * FROM `countries`";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
    
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if (empty($rows)) return false;
            return $rows;
        } catch (Exception $_) {
            return false;
        }
    }

    // Удалить страну-партнера
    function delete_country($id) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "DELETE FROM `countries` WHERE `countries`.`id` = $id;";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
            return $result;
        } catch (Exception $_) {
            return false;
        }
    }

    // Изменить имя страны-партнера
    function update_country($id, $name) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "UPDATE `countries` SET `country_name` = '$name' WHERE `countries`.`id` = $id;";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
            return $result;
        } catch (Exception $_) {
            return false;
        }
    }

    // Получить имя категории по id
    function get_country_name($id) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "SELECT `country_name` FROM `countries` WHERE `id` = $id;";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
    
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            // var_dump($rows);
            if (empty($rows)) return false;
            return $rows[0]['country_name'];
        } catch (Exception $_) {
            return false;
        }
    }

    // Добавить комментарий к товару
    function add_comment($good_id, $user_id, $user_name, $comment) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $comment = htmlspecialchars($comment);
            $sql_request = "INSERT INTO `comments` (`id`, `good_id`, `user_id`, `user_name`, `comment`, `time`) 
                VALUES (NULL, '$good_id', '$user_id', '$user_name', '$comment', CURRENT_TIMESTAMP);";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
            return $result;
        } catch (Exception $_) {
            return false;
        }
    }

    // Получить комментарии по товару
    function get_good_comments($good_id) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "SELECT * FROM `comments` WHERE `good_id` = $good_id";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
    
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if (empty($rows)) return false;
            return $rows;
        } catch (Exception $_) {
            return false;
        }
    }

    // Удалить комент
    function delete_good_comment($comment_id) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "DELETE FROM `comments` WHERE `id` = $comment_id;";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
            return $result;
        } catch (Exception $_) {
            return false;
        }
    }

    // Поставить лайк товару
    function add_like($good_id, $user_id) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "INSERT INTO `likes` (`id`, `good_id`, `user_id`) 
                VALUES (NULL, '$good_id', '$user_id');";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
            return $result;
        } catch (Exception $_) {
            // return false;
            return $_;
        }
    }

    // Убрать лайк товару
    function remove_like($good_id, $user_id) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "DELETE FROM `likes` WHERE `good_id` = $good_id AND `user_id` = $user_id";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
            return $result;
        } catch (Exception $_) {
            return false;
        }
    }

    // Поставлен ли лайк пользоватея на эту запись
    function did_user_like_it($good_id, $user_id) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "SELECT * FROM `likes`
                WHERE `good_id` = $good_id
                AND `user_id` = $user_id";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
    
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if (empty($rows)) return false;
            return true;
        } catch (Exception $_) {
            return false;
        }
    }

    // Сколько всего лайков у записи
    function likes_good_count($good_id) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "SELECT COUNT(*) as count FROM `likes` WHERE `good_id` = $good_id;";
            // var_dump($sql_request);
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
    
            $count_res = mysqli_fetch_all($result, MYSQLI_ASSOC);
            // if (empty($rows)) return false;
            // return $count_res['count'];
            // var_dump($count_res);
            return $count_res[0]['count'];
        } catch (Exception $_) {
            return false;
        }
    }

    // Получить все лайкнутые продукты данным пользователем
    function get_all_liked_goods($user_id) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "SELECT * FROM `goods`
                JOIN `likes` ON `likes`.`good_id` = `goods`.`id`
                WHERE `likes`.`user_id` = $user_id;";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
    
            $goods = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if (empty($rows)) return false;
            return $goods;
        } catch (Exception $_) {
            return false;
        }
    }

    // Добавить заказ
    function add_order($user_id, $customer_name, $customer_phone, $order_price, $goods_in_order, $address) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql_request = "INSERT INTO `orders` 
                (`id`, `user_id`, `customer_name`, `customer_phone`, `date`, `order_price`, `goods_in_order`, `order_status_id`, `address`) 
                VALUES 
                (NULL, '$user_id', '$customer_name', '$customer_phone', CURRENT_TIMESTAMP, '$order_price', '$goods_in_order', '1', '$address');";
            $result = mysqli_query($connection, $sql_request);
            /// Если не получилось заполнить
            if (!$result) return false;
            // return $result;

            /// А если получилось, то берем вставленный id 
            $result = mysqli_insert_id($connection);
            $connection->close();
            return $result;
        } catch (Exception $_) {
            return false;
        }
    }

    // Добавить элемент заказа
    function add_order_element($order_id, $name, $image, $amount, $totalCost, $goodId) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql_request = "INSERT INTO `order_elements` 
                (`id`, `order_id`, `name`, `image`, `amount`, `total_cost`, `good_id`) 
                    VALUES 
                (NULL, '$order_id', '$name', '$image', '$amount', '$totalCost', '$goodId');";
            $result = mysqli_query($connection, $sql_request);
            return $result;
        } catch (Exception $_) {
            return false;
        }
    }

    // Получить все заказы
    function get_all_orders() {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "SELECT * FROM `orders`";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
    
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if (empty($rows)) return false;
            return $rows;
        } catch (Exception $_) {
            return false;
        }
    }

    // Получить все заказы пользователя
    function get_all_user_orders($user_id) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "SELECT * FROM `orders` WHERE `user_id`=$user_id";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
    
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if (empty($rows)) return false;
            return $rows;
        } catch (Exception $_) {
            return false;
        }
    }

    // Получить все заказы пользователя
    function get_all_order_elements($order_id) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "SELECT * FROM `order_elements` WHERE `order_id` = $order_id";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if (empty($rows)) return false;
            return $rows;
        } catch (Exception $_) {
            return false;
        }
    }

    // Обновить статус заказа
    function update_order_status($order_id, $new_status_id) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }
            $sql_request = "UPDATE `orders` SET `order_status_id` = '$new_status_id' WHERE `orders`.`id` = $order_id;";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
            return $result;
        } catch (Exception $_) {
            return false;
        }
    }
    
    // Удалить статус заказа
    function delete_order($order_id) {
        try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            if (!$connection) {
                die("Connection failed: " .mysqli_connect_error());
            }

            $sql_request = "DELETE FROM `order_elements` WHERE `order_id` = $order_id";
            $result = mysqli_query($connection, $sql_request);
            if (!$result) {
                $connection->close();
                return false;
            }

            $sql_request = "DELETE FROM orders WHERE `orders`.`id` = $order_id;";
            $result = mysqli_query($connection, $sql_request);
            $connection->close();
            return $result;

        } catch (Exception $_) {
            return false;
        }
    }
}