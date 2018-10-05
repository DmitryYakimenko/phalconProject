-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 05 2018 г., 15:14
-- Версия сервера: 5.6.38-log
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phalcon`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_category`, `name`) VALUES
(1, 'Игровой'),
(2, 'Универсальный'),
(3, 'Для работы'),
(4, 'Флагман');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id_good` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `id_good_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id_good`, `name`, `img`, `id_good_type`) VALUES
(1, 'ASUS X570UD-E4037 (90NB0HS1-M00460) Black', 'copy_asus_x570ud_e4026_5a6ef38f49ec7_images_2751817615.jpg', 1),
(2, 'Dell Inspiron 7577 (i75581S0DL-418) Black', 'copy_dell_inspiron_7577_i75581s2dl_418_5a67d47126ab8_images_2656406375.jpg', 1),
(3, 'HP 255 G6 (2EW01ES) Dark Ash', 'copy_hp_255_g6_2hg33es_59e5ed03f3de6_images_2271600422.jpg', 1),
(4, 'Lenovo V110 (80TG00AJRK) Black', 'copy_lenovo_80th001ark_5b0415db1d993_images_4675567408.jpg', 1),
(5, 'Everest Home 4070 (4070_9414)', 'everest_home_4070_9414_images_7691758248.jpg', 3),
(6, 'Everest MSI Dragon PC 9057 (9057_6410)', 'everest_msi_dragon_pc_9057_6410_images_6814830614.jpg', 3),
(7, 'ARTLINE Business B29 v02 (B29v02)', 'artline_business_b29_v02_images_508808317.jpg', 3),
(8, 'Artline Gaming X26 v01 (X26v01)', 'artline_x26v01_images_7016809194.jpg', 3),
(9, 'Samsung Galaxy Note 9 6/128GB Midnight Black', 'samsung_sm_n960fzkdsek_images_6520779374.jpg', 2),
(10, 'Samsung Galaxy A7 2017 Duos SM-A720 Gold', 'samsung_sm_a720fzddsek_images_1828064742.jpg', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `good_category`
--

CREATE TABLE `good_category` (
  `id_good_category` int(11) NOT NULL,
  `id_good` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `good_category`
--

INSERT INTO `good_category` (`id_good_category`, `id_good`, `id_category`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 2, 1),
(4, 3, 3),
(5, 3, 2),
(6, 4, 3),
(7, 5, 1),
(8, 6, 1),
(9, 6, 4),
(10, 7, 3),
(11, 8, 2),
(12, 9, 4),
(13, 10, 3),
(14, 10, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `good_types`
--

CREATE TABLE `good_types` (
  `id_good_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `good_types`
--

INSERT INTO `good_types` (`id_good_type`, `name`) VALUES
(1, 'Ноутбук'),
(2, 'Телефон'),
(3, 'Компьютер');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id_good`),
  ADD KEY `id_good_type` (`id_good_type`);

--
-- Индексы таблицы `good_category`
--
ALTER TABLE `good_category`
  ADD PRIMARY KEY (`id_good_category`),
  ADD KEY `id_good` (`id_good`),
  ADD KEY `id_category` (`id_category`);

--
-- Индексы таблицы `good_types`
--
ALTER TABLE `good_types`
  ADD PRIMARY KEY (`id_good_type`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id_good` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `good_category`
--
ALTER TABLE `good_category`
  MODIFY `id_good_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `good_types`
--
ALTER TABLE `good_types`
  MODIFY `id_good_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`id_good_type`) REFERENCES `good_types` (`id_good_type`);

--
-- Ограничения внешнего ключа таблицы `good_category`
--
ALTER TABLE `good_category`
  ADD CONSTRAINT `good_category_ibfk_1` FOREIGN KEY (`id_good`) REFERENCES `goods` (`id_good`),
  ADD CONSTRAINT `good_category_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
