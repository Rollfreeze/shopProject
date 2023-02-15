-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: db
-- Время создания: Фев 15 2023 г., 22:31
-- Версия сервера: 8.0.32
-- Версия PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `advert`
--

CREATE TABLE `advert` (
  `id` int NOT NULL,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `advert`
--

INSERT INTO `advert` (`id`, `title`, `subtitle`, `image`) VALUES
(1, 'С новым годом!', 'Желаем счастья в новом году!', 'advertisment-logo-1.jpg'),
(2, 'Вкусный мед!', 'Покупайте у наших партнеров вкусный домашний мед!', 'advertisment-logo-2.jpg'),
(3, 'Томаты на зиму!', 'Запасайтесь томатами на зиму, в них много витаминов!', 'advertisment-logo-3.jpg'),
(4, 'Фрукты и овощи против старения!', '6 фруктов и овощей против старения организма.', 'ad1.jpeg'),
(5, 'Рост цен на овощи', 'Рост цен на огурцы и помидоры значительно повлиял на уровень инфляции.', 'ad2.jpeg'),
(6, 'Продукт дня', 'Авокадо является самым полезным продуктом для женского организма.', 'ad3.jpeg'),
(7, 'Полезность продуктов', 'Продукты, вызывающие привыкание.', 'ad4.jpeg'),
(8, 'Польза авакадо', 'Авокадо нормализует вес и работу сердца.', 'advertisment-logo-4.jpg'),
(9, 'Узнай о пользе ягод', 'Некоторые ягоды значительно полезнее, чем мы привыкли думать', 'good-logo-24-1.jpeg');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Экзотика'),
(2, 'Фрукты'),
(3, 'Овощи'),
(5, 'Грибы'),
(6, 'Ягоды');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `good_id` int NOT NULL,
  `user_id` int NOT NULL,
  `user_name` text NOT NULL,
  `comment` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `good_id`, `user_id`, `user_name`, `comment`, `time`) VALUES
(1, 6, 2, 'egor', 'Хорошая кортошка!', '2023-02-07 10:56:42'),
(3, 6, 2, 'egor', 'Привет!', '2023-02-07 10:57:24'),
(5, 6, 2, 'egor', 'hello', '2023-02-07 10:58:34'),
(6, 6, 3, 'kirill', 'das', '2023-02-07 11:01:46'),
(8, 4, 2, 'egor', 'Вкусный', '2023-02-12 19:48:06'),
(10, 3, 1, 'root', 'Найс', '2023-02-12 21:44:11'),
(11, 5, 2, 'egor', 'Вкуснейший!', '2023-02-14 21:26:46'),
(12, 2, 2, 'egor', 'Это мой комментарий! Вкусный продукт)', '2023-02-15 14:36:19'),
(13, 7, 2, 'egor', 'Вкус - что надо', '2023-02-15 20:26:55'),
(16, 7, 2, 'egor', '&lt;script&gt;alert(&quot;Злой скрипт!&quot;)&lt;/script&gt;', '2023-02-15 20:43:35');

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id` int NOT NULL,
  `country_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `country_name`) VALUES
(1, 'Россия'),
(2, 'Китай'),
(3, 'Италия'),
(4, 'Таджикистан'),
(5, 'Беларусь'),
(6, 'Япония');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int NOT NULL,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `image_path_1` text NOT NULL,
  `image_path_2` text NOT NULL,
  `category_id` int NOT NULL,
  `is_new` tinyint(1) NOT NULL,
  `is_leader` tinyint(1) NOT NULL,
  `price` int NOT NULL,
  `country_id` int NOT NULL,
  `popularity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `title`, `subtitle`, `image_path_1`, `image_path_2`, `category_id`, `is_new`, `is_leader`, `price`, `country_id`, `popularity`) VALUES
(1, 'Яблоко', 'Великолепное', 'good-logo-3-0.jpeg', '', 2, 0, 1, 125, 3, 5),
(2, 'Персик', 'Вкусный', 'big-persik.jpg', '', 2, 0, 1, 123, 1, 5),
(3, 'Грибы', 'Шампиньоны можно использовать в самых разнообразных блюдах. Они прекрасно сочетаются с мясом, овощам', 'good-logo-11.jpeg', '', 5, 1, 1, 406, 1, 5),
(4, 'Лайм', 'Освежающий', '112.jpeg', '', 1, 1, 0, 253, 6, 5),
(5, 'Виноград', 'Редкая разновидность вкуснейшего винограда', '111.jpeg', '', 1, 1, 0, 475, 4, 4),
(6, 'Картошка', 'Лучшая на свете!', 'good-logo-12.jpeg', '', 3, 1, 1, 27, 5, 5),
(7, 'Манго', 'Спелый и сочный', 'good-logo-13-0.jpeg', '', 1, 0, 1, 100, 4, 5),
(8, 'Киви', 'Сочные и свежие. Полезные!', 'good-logo-6-0.jpeg', '', 1, 0, 1, 165, 4, 5),
(9, 'Апельсины крупные', 'Апельсины крупные. Сочный и насыщенный вкус, яркость и ароматная цедра', 'good-logo-7-0.jpeg', '', 2, 0, 1, 201, 4, 5),
(10, 'Гранат', 'Недорого купить гранат с доставкой по Москве.', 'good-logo-4.jpeg', '', 1, 1, 0, 406, 2, 4),
(11, 'Грйпфрут красный', 'Отлично сочетается с морскими продуктами', 'good-logo-9-0.jpeg', '', 1, 1, 0, 182, 1, 5),
(12, 'Салат Айсберг', 'Айсберг удачно сочетается с многими продуктами', 'good-logo-10-0.jpeg', '', 3, 0, 0, 556, 1, 4),
(13, 'Баклажаны', 'Стройные и вкусные!', 'good-logo-11-0.jpeg', '', 3, 1, 0, 249, 1, 4),
(14, 'Слива', 'Плоды с толстой и грубой кожицей, плотно прилегающей к мякоти', 'good-logo-12-0.jpeg', '', 6, 0, 1, 537, 6, 5),
(15, 'Груша Конференс', 'Мякоть спелой груши нежная и сочная', 'good-logo-2-0.jpeg', '', 2, 1, 1, 295, 1, 5),
(16, 'Ананас', 'Сочнейший ананас, заряженный витаминами', '125.jpeg', '', 1, 1, 1, 245, 4, 5),
(17, 'Огурцы', 'Домашние и сочные огурчики!', 'good-logo-23-0.jpeg', '', 3, 1, 0, 134, 5, 5),
(18, 'Перец желтный', 'Перец болгарский, желтый.  Очень сладкий, с толстой мякотью', 'good-logo-13.jpeg', '', 3, 0, 1, 612, 5, 5),
(19, 'Питахайя красная', 'Родиной этого кактуса является Мексика, сейчас растение культивируется в Таиланде и Вьетнаме.', '123.jpeg', '', 1, 0, 1, 2065, 6, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `id` int NOT NULL,
  `good_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`id`, `good_id`, `user_id`) VALUES
(1, 2, 1),
(10, 2, 2),
(8, 3, 1),
(4, 4, 1),
(5, 4, 3),
(7, 5, 1),
(9, 5, 2),
(2, 6, 1),
(3, 6, 2),
(6, 7, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `customer_name` text NOT NULL,
  `customer_phone` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_price` int NOT NULL,
  `goods_in_order` int NOT NULL,
  `order_status_id` int NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `customer_name`, `customer_phone`, `date`, `order_price`, `goods_in_order`, `order_status_id`, `address`) VALUES
(35, 3, 'kirill', '75123551232', '2023-02-14 22:58:18', 135, 1, 2, 'Автово'),
(39, 2, 'egor', '88005553535', '2023-02-15 14:34:11', 1425, 3, 1, 'Спб, проспект Стачек');

-- --------------------------------------------------------

--
-- Структура таблицы `order_elements`
--

CREATE TABLE `order_elements` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `amount` int NOT NULL,
  `total_cost` int NOT NULL,
  `good_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `order_elements`
--

INSERT INTO `order_elements` (`id`, `order_id`, `name`, `image`, `amount`, `total_cost`, `good_id`) VALUES
(29, 35, 'Картошка', 'good-logo-12.jpeg', 5, 135, 6),
(38, 39, 'Яблоко', 'good-logo-3-0.jpeg', 3, 375, 1),
(39, 39, 'Виноград', '111.jpeg', 2, 950, 5),
(40, 39, 'Манго', 'good-logo-13-0.jpeg', 1, 100, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `order_status`
--

CREATE TABLE `order_status` (
  `id` int NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Обрабатывается'),
(2, 'Доставлено'),
(3, 'Отклонено');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `isRoot` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `isRoot`) VALUES
(1, 'root', 'root', 1),
(2, 'egor', 'egor', 0),
(3, 'kirill', 'kirill', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `good_id` (`good_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`,`country_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `good_id` (`good_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_status_id` (`order_status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `order_elements`
--
ALTER TABLE `order_elements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`,`good_id`),
  ADD KEY `good_id` (`good_id`);

--
-- Индексы таблицы `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `advert`
--
ALTER TABLE `advert`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `order_elements`
--
ALTER TABLE `order_elements`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`good_id`) REFERENCES `goods` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `goods_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`good_id`) REFERENCES `goods` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`order_status_id`) REFERENCES `order_status` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `order_elements`
--
ALTER TABLE `order_elements`
  ADD CONSTRAINT `order_elements_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_elements_ibfk_2` FOREIGN KEY (`good_id`) REFERENCES `goods` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
