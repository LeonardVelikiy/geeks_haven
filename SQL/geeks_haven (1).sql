-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 21 2021 г., 05:31
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
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(99) NOT NULL,
  `topic` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `topic`, `author`, `text`, `date`) VALUES
(28, 'СОздание нвостей', 'Никита', 'fdsafafaf', '2021-04-01'),
(29, 'СОздание нвостей', 'Никита', 'fgsdgsd', '2021-04-22');

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
(571, 'admin', 'admin', '-', '-', 'm', '1', '-'),
(573, 'admin111', 'admin', '-', '-', 'm', '1', '-');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `players_and_masters`
--
ALTER TABLE `players_and_masters`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=574;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
