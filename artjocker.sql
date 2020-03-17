-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 17 2020 г., 14:47
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `artjocker`
--

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course` varchar(128) NOT NULL,
  `teacher` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `courses`
--

INSERT INTO `courses` (`id`, `course`, `teacher`) VALUES
(1, 'PHP', 'Ivanov'),
(2, 'Java', 'Petrov'),
(3, 'HTML11', 'Sidorov11'),
(4, 'Web', 'Somov'),
(5, 'Js', 'Danilov');

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id`, `course_id`, `last_name`, `name`, `email`, `photo`) VALUES
(1, 1, 'Lomov', 'Vladimir', 'vladimir55@gmail.com', 'th.jpg'),
(2, 2, 'Bikov', 'Evgeniy', 'bikov@gmail.com', 'preview-5.jpeg'),
(3, 3, 'Lobanov', 'Semen', 'semen@gmail.com', '7-1.jpg'),
(4, 4, 'Levin', 'Boris', 'lenin@gmail.com', 'unnamed.jpg'),
(5, 5, 'Bolotova', 'Marina', 'mary@gmail.com', '2.jpg'),
(6, 2, 'Sirota', 'Ivan', 'iv@gmail.com', 'красивый-боро-атый-че-овек-в-ш-япе-куря-сигарету-90997066.jpg'),
(7, 2, 'Kozlov', 'Andrey', 'kozya@gmail.com', 'adudley.jpeg'),
(8, 4, 'Novikova', 'Elena', 'nov@gmail.com', 'web-ready.jpeg'),
(9, 1, 'Baranova', 'Anna', 'anna@gmail.com', 'team_pic3.jpg'),
(17, 1, 'Gorin', 'Igor', 'ig@gmail.com', 'team_pic2.jpg'),
(18, 4, 'Durov', 'Denis', 'den@gmail.com', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
