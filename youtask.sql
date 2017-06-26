-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 26 2017 г., 17:35
-- Версия сервера: 5.7.16
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `youtask`
--

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `tasktext` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'In progress'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id`, `user_name`, `user_email`, `title`, `image`, `tasktext`, `status`) VALUES
(1, 'admin', 'myjuneisforyou@gmail.com', 'Admin\'s task 1', '4.jpg', 'Perfect car!', 'Completed'),
(2, 'admin', 'myjuneisforyou@gmail.com', 'Admin\'s task 2', '4QAKzUf1B7A.jpg', ' :<', 'In progress'),
(3, 'Ashley', 'a.young@gmail.com', 'Ashley\'s task', 'ciIZKP3xjQw.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate massa semper, bibendum magna a, fringilla sapien. Fusce placerat, sapien et dictum posuere, purus mauris rhoncus neque, porttitor maximus libero dui ornare quam. Curabitur aliquet nisl vitae pellentesque pharetra. Vivamus tristique malesuada tincidunt. Proin eget dignissim orci. Nullam id suscipit felis, ac egestas mauris. Sed ac sem tristique, elementum dui ut, blandit ipsum. Etiam nec iaculis diam. Nunc orci augue, dictum ac nisl fringilla, luctus gravida erat. Integer nulla dui, cursus vitae lacinia vitae, fermentum quis risus. Cras facilisis, erat nec ultricies gravida, lectus ante imperdiet arcu, at luctus ligula neque eu odio. Nullam volutpat nisl dui, ac scelerisque justo malesuada sit amet.\r\n\r\nNulla at ultrices nisi. Donec fringilla efficitur diam et iaculis. In vestibulum tellus id porttitor viverra. Vivamus congue sit amet turpis nec tincidunt. Sed venenatis lectus magna, sit amet tincidunt quam vehicula id. Sed ac nibh commodo, convallis lorem ac, auctor urna. Vestibulum imperdiet nec nibh posuere fringilla. Suspendisse vitae est lacus.', 'In progress'),
(4, 'Bradley', 'brad@yahoo.com', 'Bradley\'s Task', 'gDBHSFLMk1g.jpg', '1\r\n2\r\n3\r\n4\r\n5\r\n6\r\n7\r\n8\r\n9\r\n10\r\n11\r\n12\r\n13\r\n14\r\n15', 'Completed'),
(5, 'Chenn', 'chend2gg@gg.net', 'Chen\'s Task', 'hjN6W0mxZHo.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate massa semper, bibendum magna a, fringilla sapien. Fusce placerat, sapien et dictum posuere, purus mauris rhoncus neque, porttitor maximus libero dui ornare quam. Curabitur aliquet nisl vitae pellentesque pharetra. Vivamus tristique malesuada tincidunt. Proin eget dignissim orci. Nullam id suscipit felis, ac egestas mauris. Sed ac sem tristique, elementum dui ut, blandit ipsum. Etiam nec iaculis diam. Nunc orci augue, dictum ac nisl fringilla, luctus gravida erat. Integer nulla dui, cursus vitae lacinia vitae, fermentum quis risus. Cras facilisis, erat nec ultricies gravida, lectus ante imperdiet arcu, at luctus ligula neque eu odio. Nullam volutpat nisl dui, ac scelerisque justo malesuada sit amet.', 'In progress'),
(6, 'avalanche', 'tooeasyforhk@gmail.com', 'avalanche\'s task', 'vRx1wXTeMKI.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate massa semper, bibendum magna a, fringilla sapien. Fusce placerat, sapien et dictum posuere, purus mauris rhoncus neque, porttitor maximus libero dui ornare quam. Curabitur aliquet nisl vitae pellentesque pharetra. Vivamus tristique malesuada tincidunt. Proin eget dignissim orci. Nullam id suscipit felis, ac egestas mauris. Sed ac sem tristique, elementum dui ut, blandit ipsum. Etiam nec iaculis diam. Nunc orci augue, dictum ac nisl fringilla, luctus gravida erat. Integer nulla dui, cursus vitae lacinia vitae, fermentum quis risus. Cras facilisis, erat nec ultricies gravida, lectus ante imperdiet arcu, at luctus ligula neque eu odio. Nullam volutpat nisl dui, ac scelerisque justo malesuada sit amet.', 'Completed'),
(7, 'SoloQQ', 'itsSolo@gmail.com', 'soloQQ\'s task', 'Cat_says_no.gif', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate massa semper, bibendum magna a, fringilla sapien. Fusce placerat, sapien et dictum posuere, purus mauris rhoncus neque, porttitor maximus libero dui ornare quam. Curabitur aliquet nisl vitae pellentesque pharetra. Vivamus tristique malesuada tincidunt. Proin eget dignissim orci. Nullam id suscipit felis, ac egestas mauris. Sed ac sem tristique, elementum dui ut, blandit ipsum. Etiam nec iaculis diam. Nunc orci augue, dictum ac nisl fringilla, luctus gravida erat. Integer nulla dui, cursus vitae lacinia vitae, fermentum quis risus. Cras facilisis, erat nec ultricies gravida, lectus ante imperdiet arcu, at luctus ligula neque eu odio. Nullam volutpat nisl dui, ac scelerisque justo malesuada sit amet.', 'Completed'),
(8, 'sunrise', 'sunrise@gmail.com', 'sunrise\'s task', 'Imagination.gif', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate massa semper, bibendum magna a, fringilla sapien. Fusce placerat, sapien et dictum posuere, purus mauris rhoncus neque, porttitor maximus libero dui ornare quam. Curabitur aliquet nisl vitae pellentesque pharetra. Vivamus tristique malesuada tincidunt. Proin eget dignissim orci. Nullam id suscipit felis, ac egestas mauris. Sed ac sem tristique, elementum dui ut, blandit ipsum. Etiam nec iaculis diam. Nunc orci augue, dictum ac nisl fringilla, luctus gravida erat. Integer nulla dui, cursus vitae lacinia vitae, fermentum quis risus. Cras facilisis, erat nec ultricies gravida, lectus ante imperdiet arcu, at luctus ligula neque eu odio. Nullam volutpat nisl dui, ac scelerisque justo malesuada sit amet.', 'In progress'),
(9, 'admin', 'myjuneisforyou@gmail.com', 'Admin\'s task 3', 'PHN3l4Yx2NE.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate massa semper, bibendum magna a, fringilla sapien. Fusce placerat, sapien et dictum posuere, purus mauris rhoncus neque, porttitor maximus libero dui ornare quam. Curabitur aliquet nisl vitae pellentesque pharetra. Vivamus tristique malesuada tincidunt. Proin eget dignissim orci. Nullam id suscipit felis, ac egestas mauris. Sed ac sem tristique, elementum dui ut, blandit ipsum. Etiam nec iaculis diam. Nunc orci augue, dictum ac nisl fringilla, luctus gravida erat. Integer nulla dui, cursus vitae lacinia vitae, fermentum quis risus. Cras facilisis, erat nec ultricies gravida, lectus ante imperdiet arcu, at luctus ligula neque eu odio. Nullam volutpat nisl dui, ac scelerisque justo malesuada sit amet.', 'Completed'),
(10, 'Bradley', 'brad@yahoo.com', 'Bradley\'s Task 2', 'SiO0Ku3qGUw.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate massa semper, bibendum magna a, fringilla sapien. Fusce placerat, sapien et dictum posuere, purus mauris rhoncus neque, porttitor maximus libero dui ornare quam. Curabitur aliquet nisl vitae pellentesque pharetra. Vivamus tristique malesuada tincidunt. Proin eget dignissim orci. Nullam id suscipit felis, ac egestas mauris. Sed ac sem tristique, elementum dui ut, blandit ipsum. Etiam nec iaculis diam. Nunc orci augue, dictum ac nisl fringilla, luctus gravida erat. Integer nulla dui, cursus vitae lacinia vitae, fermentum quis risus. Cras facilisis, erat nec ultricies gravida, lectus ante imperdiet arcu, at luctus ligula neque eu odio. Nullam volutpat nisl dui, ac scelerisque justo malesuada sit amet.', 'In progress'),
(11, 'SoloQQ', 'itsSolo@gmail.com', 'soloQQ\'s task 2', 'hjN6W0mxZHo.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate massa semper, bibendum magna a, fringilla sapien. Fusce placerat, sapien et dictum posuere, purus mauris rhoncus neque, porttitor maximus libero dui ornare quam. Curabitur aliquet nisl vitae pellentesque pharetra. Vivamus tristique malesuada tincidunt. Proin eget dignissim orci. Nullam id suscipit felis, ac egestas mauris. Sed ac sem tristique, elementum dui ut, blandit ipsum. Etiam nec iaculis diam. Nunc orci augue, dictum ac nisl fringilla, luctus gravida erat. Integer nulla dui, cursus vitae lacinia vitae, fermentum quis risus. Cras facilisis, erat nec ultricies gravida, lectus ante imperdiet arcu, at luctus ligula neque eu odio. Nullam volutpat nisl dui, ac scelerisque justo malesuada sit amet.\r\n\r\nNulla at ultrices nisi. Donec fringilla efficitur diam et iaculis. In vestibulum tellus id porttitor viverra. Vivamus congue sit amet turpis nec tincidunt. Sed venenatis lectus magna, sit amet tincidunt quam vehicula id. Sed ac nibh commodo, convallis lorem ac, auctor urna. Vestibulum imperdiet nec nibh posuere fringilla. Suspendisse vitae est lacus.', 'In progress');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `superuser` int(11) DEFAULT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `superuser`, `login`, `email`, `password`) VALUES
(1, 1, 'admin', 'myjuneisforyou@gmail.com', '123'),
(2, NULL, 'avalanche', 'tooeasyforhk@gmail.com', '123321'),
(3, NULL, 'sunrise', 'sunrise@gmail.com', '111'),
(4, NULL, 'SoloQQ', 'itsSolo@gmail.com', '111'),
(5, NULL, 'Ashley', 'a.young@gmail.com', '111'),
(6, NULL, 'Bradley', 'brad@yahoo.com', '111'),
(7, NULL, 'Chenn', 'chend2gg@gg.net', '111');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
