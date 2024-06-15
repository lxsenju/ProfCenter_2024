-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 15 2024 г., 08:51
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `profcenter`
--
CREATE DATABASE IF NOT EXISTS `profcenter` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `profcenter`;

DELIMITER $$
--
-- Процедуры
--
DROP PROCEDURE IF EXISTS `InsertOrder`$$
CREATE DEFINER=`root`@`%` PROCEDURE `InsertOrder` (IN `p_email` VARCHAR(255), IN `p_ID_service` INT, IN `p_ID_user` INT, IN `p_ID_order_status` INT)   BEGIN
    INSERT INTO `ordering` (`ID_ordering`, `email`, `ID_service`, `ID_user`, `ID_ordering_status`) 
    VALUES (NULL, p_email, p_ID_service, p_ID_user, p_ID_order_status);
END$$

DROP PROCEDURE IF EXISTS `InsertUser`$$
CREATE DEFINER=`root`@`%` PROCEDURE `InsertUser` (IN `p_fname` VARCHAR(255), IN `p_lname` VARCHAR(255), IN `p_login` VARCHAR(255), IN `p_password` VARCHAR(255), IN `p_ID_user_status` INT)   BEGIN
    INSERT INTO `user` (`ID_user`, `fname`, `lname`, `login`, `password`, `ID_user_status`) 
    VALUES (NULL, p_fname, p_lname, p_login, p_password, p_ID_user_status);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `ordering`
--

DROP TABLE IF EXISTS `ordering`;
CREATE TABLE `ordering` (
  `ID_ordering` int NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_service` int NOT NULL,
  `ID_user` int NOT NULL,
  `ID_ordering_status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ordering`
--

INSERT INTO `ordering` (`ID_ordering`, `email`, `ID_service`, `ID_user`, `ID_ordering_status`) VALUES
(3, 'kalina333@gmail.com', 10, 1, 2),
(4, 'moyboy@gmail.com', 7, 2, 3),
(5, 'kiril@gmail.com', 17, 4, 2),
(7, 'irinkapor@gmail.com', 7, 11, 1),
(8, 'irinkapor@gmail.com', 10, 11, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `ordering_status`
--

DROP TABLE IF EXISTS `ordering_status`;
CREATE TABLE `ordering_status` (
  `ID_ordering_status` int NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ordering_status`
--

INSERT INTO `ordering_status` (`ID_ordering_status`, `name`) VALUES
(1, 'На рассмотрении'),
(2, 'Одобрен'),
(3, 'Отклонен');

-- --------------------------------------------------------

--
-- Структура таблицы `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE `service` (
  `ID_service` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `ID_service_type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `service`
--

INSERT INTO `service` (`ID_service`, `name`, `price`, `ID_service_type`) VALUES
(1, 'Контроль ведения учета', 5000, 1),
(2, 'Ведение кадрового учета', 3000, 1),
(3, 'Аутсорсинг', 5500, 1),
(4, 'Удаленное бухгалтерское сопровождение', 4500, 1),
(5, 'Анализ учета', 2000, 1),
(6, 'Аудит', 6000, 1),
(7, 'Оформление ЭЦП', 3000, 1),
(8, 'Сопровождение нулевой деятельности', 3500, 1),
(9, 'Регистрация', 2000, 2),
(10, 'Разрешение споров', 4500, 2),
(11, 'Ликвидация', 4500, 2),
(12, 'Смена юридического адреса', 1500, 2),
(13, 'Изменение устава', 2500, 2),
(14, 'Лицензии', 4500, 2),
(15, 'Консалтинг', 5500, 2),
(16, 'Изменение видов деятельности', 4500, 2),
(17, 'Консультация', 1500, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `service_type`
--

DROP TABLE IF EXISTS `service_type`;
CREATE TABLE `service_type` (
  `ID_service_type` int NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `service_type`
--

INSERT INTO `service_type` (`ID_service_type`, `name`) VALUES
(1, 'Бухгалтерские'),
(2, 'Юридические');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `ID_user` int NOT NULL,
  `fname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_user_status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`ID_user`, `fname`, `lname`, `login`, `password`, `ID_user_status`) VALUES
(1, 'Елена', 'Локтюк', 'elena', 'elena', 1),
(2, 'Марина', 'Гнездо', 'marina', 'marina', 1),
(3, 'Админ', 'Админ', 'god', 'god', 2),
(4, 'Владимир', 'Кривозуб', 'vova', 'vova', 1),
(5, 'Бобик', 'Бобикович', 'bob', 'bob', 1),
(6, 'Григорий', 'Михаилян', 'grig', 'grig', 1),
(8, 'Матвей', 'Матвеевов', 'matvey', 'matvey', 1),
(9, 'Алена', 'Шишкова', 'alena', 'alena', 1),
(10, 'саша', 'саша', 'sasha', 'sasha', 1),
(11, 'Порошенко', 'Ирина', 'irina', 'irina', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user_status`
--

DROP TABLE IF EXISTS `user_status`;
CREATE TABLE `user_status` (
  `ID_status` int NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_status`
--

INSERT INTO `user_status` (`ID_status`, `name`) VALUES
(1, 'Пользователь'),
(2, 'Админ');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ordering`
--
ALTER TABLE `ordering`
  ADD PRIMARY KEY (`ID_ordering`),
  ADD KEY `ID_service` (`ID_service`),
  ADD KEY `ID_user` (`ID_user`),
  ADD KEY `ID-order_status` (`ID_ordering_status`);

--
-- Индексы таблицы `ordering_status`
--
ALTER TABLE `ordering_status`
  ADD PRIMARY KEY (`ID_ordering_status`);

--
-- Индексы таблицы `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ID_service`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `ID_service_type` (`ID_service_type`);

--
-- Индексы таблицы `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`ID_service_type`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_user`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `ID_user_status` (`ID_user_status`);

--
-- Индексы таблицы `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`ID_status`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ordering`
--
ALTER TABLE `ordering`
  MODIFY `ID_ordering` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `service`
--
ALTER TABLE `service`
  MODIFY `ID_service` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `service_type`
--
ALTER TABLE `service_type`
  MODIFY `ID_service_type` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `ID_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `ordering`
--
ALTER TABLE `ordering`
  ADD CONSTRAINT `ordering_ibfk_1` FOREIGN KEY (`ID_ordering_status`) REFERENCES `ordering_status` (`ID_ordering_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordering_ibfk_2` FOREIGN KEY (`ID_service`) REFERENCES `service` (`ID_service`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordering_ibfk_3` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`ID_service_type`) REFERENCES `service_type` (`ID_service_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`ID_user_status`) REFERENCES `user_status` (`ID_status`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
