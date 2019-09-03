-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-05-25 07:34:56
-- 服务器版本： 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviepool`
--

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `contents` varchar(255) DEFAULT NULL,
  `comment_datetime` datetime DEFAULT NULL,
  `m_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `comments`
--

INSERT INTO `comments` (`comment_id`, `Username`, `contents`, `comment_datetime`, `m_id`) VALUES
(1, 'ellen', 'Very interesting!', '2018-05-25 15:11:27', 1),
(2, 'ellen', 'good movie', '2018-05-25 15:11:38', 2),
(3, 'ellen', 'For all have sinned and fall short of the glory of God.', '2018-05-25 15:16:25', 4),
(4, 'ellen', 'Looking forward to this movie!!', '2018-05-25 15:16:45', 3),
(5, 'Jordan', 'really interesting\r\n', '2018-05-25 15:17:29', 2),
(6, 'Jordan', 'I AM A MARVIEL FAN', '2018-05-25 15:24:58', 4),
(7, 'kan', 'I LIKE THIS MOVIE!', '2018-05-25 15:32:04', 2);

-- --------------------------------------------------------

--
-- 表的结构 `Movies`
--

CREATE TABLE `Movies` (
  `movie_id` int(11) NOT NULL,
  `movie_name` varchar(255) DEFAULT NULL,
  `movie_desc` varchar(2000) DEFAULT NULL,
  `movie_url` varchar(255) DEFAULT NULL,
  `movie_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Movies`
--

INSERT INTO `Movies` (`movie_id`, `movie_name`, `movie_desc`, `movie_url`, `movie_date`) VALUES
(1, 'Duck Duck Goose', 'A bachelor goose must form a bond with two lost ducklings as they journey south.', 'upload/duck duck goose.jpg', '2018-05-24'),
(2, 'Deadpool2', 'Marvel\'s motormouth mercenary is back! Bigger, better and occasionally more pantless than ever before. When a super soldier arrives on a murderous mission, Deadpool is forced to think about friendship, family and what it really means to be a hero - all while kicking 50 shades of ass. Because, sometimes, to do the right thing you need to fight dirty.', 'upload/Deadpool2.jpg', '2018-05-16'),
(3, 'lnuyashiki Live Action ', 'This is the live-action film adaptation of Hiroya Oku\'s sci-fi manga. Inuyashiki Ichiro is a middle-aged, friendless man with an uncaring family. One fateful evening, he is struck by a mysterious explosion in a public park, which is of extraterrestrial origin, and his body is replaced by an incredibly powerful, but still outwardly human, mechanical body.', 'upload/Inuyashiki Live Action.jpg', '2018-05-31'),
(4, 'Avengers: Infinity War', 'The Avengers and their allies must be willing to sacrifice all in an attempt to defeat the powerful Thanos before his blitz of devastation and ruin puts an end to the universe.', 'upload/Avengers-Infinity War.jpg', '2018-04-25'),
(5, 'The bookshop', 'Set in a small town in 1959 England, it is the story of a woman who decides, against polite but ruthless local opposition, to open a bookshop, a decision which becomes a political minefield.', 'upload/The bookshop.jpg', '2018-05-24'),
(6, 'Breath', 'Based on Tim Winton\'s award-winning and international bestselling novel set in mid-70s coastal Australia. Two teenage boys, hungry for discovery, form an unlikely friendship with a mysterious older adventurer who pushes them to take risks that will have a lasting and profound impact on their lives.', 'upload/Breath.jpg', '2018-05-03');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `email` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`Username`, `Password`, `email`) VALUES
('111', '$2y$10$.rpQzbL0uA.vJdL/.s1tzO6ZAnenXaAQ3SU/bYoEE4bEEEz6tueJS', '1111111@qq.com'),
('123', '$2y$10$sFXZxEy3P4g42SlHvPjcbuiBcM62/1AAnTi3CR4wYJmbUomSFfjEy', '123@126.com'),
('ellen', '$2y$10$/v.mCdkDHgtsxo8mZCznJe9I1Tp2lCz8zK966MNvkXqKSbKEEr8/y', NULL),
('Jordan', '$2y$10$SdN4G4aaidSQ0mG0hftdV.9kaYmfA245eB9AORtsH.uHn97ca83BG', 'jordan@gmail.com'),
('kan', '$2y$10$ay9sfg./A7qngRbXGV/PKOE3yJcppuolm1L7V4DDxzcYgdDkvPUne', 'kan@gmail.com'),
('Kelsey', '$2y$10$.kySNuthrSQyp3EDVB5S8OB7o/RY7IyaQ5TRhSqA4kBkSlBbp2.6a', NULL),
('Sonia', '$2y$10$9uchkEWcjM7nyWtC/8lOkuq0Q3jnF2.B8TNSImx23pSeVZNSTDbD2', NULL),
('sun', '$2y$10$1/9FX1MWmFWzSap/1WK50.f62d8sg9nrLte/U4kx4ZK6yDwnKa69m', NULL),
('test', '$2y$10$QOO/6fKERWbtVKLbeqzt/ulEsQYbeW6jvLJKEOyuxLhxECeVJcnTW', '842767601@qq.com'),
('TIm', '$2y$10$n9j.tb/Z86mWaUDeP3NXNefHWUQ7dbO/KjCy9rcuLisjYQY1P7qkG', 'tim_1998@gmail.com'),
('Tom', '$2y$10$4HtZO8Ub7Ihza8BZJp4e5uZ3nTUqu4d3bpKJLDAUkJ8LYPUdTrOCG', 'tom@126.com'),
('xml', '$2y$10$R0uP.av0o0JijSY7A2RxXe.xdtRHAAqinJyxhCMEcKue6EAm2vxni', NULL),
('yorke', '$2y$10$gAKv6RnWXGniHZG2niGV9.j3l6A4V69DEq.JoKEIyfEM3J5VizunG', 'yorke@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `m_id` (`m_id`);

--
-- Indexes for table `Movies`
--
ALTER TABLE `Movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- 使用表AUTO_INCREMENT `Movies`
--
ALTER TABLE `Movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 限制导出的表
--

--
-- 限制表 `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `movies` (`Movie_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
