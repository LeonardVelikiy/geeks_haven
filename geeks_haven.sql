-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 01 2021 г., 16:57
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `geeks_haven`
--

-- --------------------------------------------------------

--
-- Структура таблицы `players_and_masters`
--

CREATE TABLE `players_and_masters` (
  `id` int(99) NOT NULL,
  `login` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fam` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `mail` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `players_and_masters`
--

INSERT INTO `players_and_masters` (`id`, `login`, `pass`, `fam`, `name`, `gender`, `role`, `mail`) VALUES
(1, 'ДЕнис', 'ЛЮблю анал', 'ГОНДОН СУКА', 'ПРОВОСЛАВНЫЙ ЧЁРТ', 'f', '1', '@FUCKING_SLAVES.Сum'),
(2, '1231', '222222', '123123', '34442', 'm', '0', 'Anal.com'),
(3, 'a', '5656565', 'Головаш', 'nick', 'm', '0', 'Anal.com'),
(4, '', '', '', '', '', '0', ''),
(555, 'admin1', 'admin', 'admin', 'admin', 'f', '0', '@admin.com'),
(556, 'Come', '123456', 'wwww', 'dasfasfa', 'f', '0', 'wwww'),
(558, '1111111111111111111111111111111111111', '111111111111111111111111111', '11111111111111111111111111111111111111', '111111111111111111111111111111111111', 'f', '0', '1111111111111111111111111111111111111111111111111'),
(559, 'ййййййййй', 'фывфвыф', 'йййййййййййййййййй', 'ййййййййй', '', '0', 'йййййййййййййййййййййй'),
(562, 'gay_man', '15698', 'dasfasfa', '111111111111111111111111111111111111', 'f', '0', 'aaa.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `players_and_masters`
--
ALTER TABLE `players_and_masters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `players_and_masters`
--
ALTER TABLE `players_and_masters`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=563;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
