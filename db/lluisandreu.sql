-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Temps de generació: 27-05-2016 a les 16:35:32
-- Versió del servidor: 5.5.49-0ubuntu0.14.04.1
-- Versió de PHP: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de dades: `lluisandreu`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `ISBN` int(15) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `cover` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `review` longtext NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Bolcant dades de la taula `books`
--

INSERT INTO `books` (`id`, `ISBN`, `title`, `price`, `cover`, `author`, `review`, `created`) VALUES
(3, 2147483647, 'Fates and Furies: A Novel', 21.6, '61S1x2qa8fL__SX329_BO1,204,203,200_1.jpg', 'Lauren Groff', '<p><em>Fates and Furies</em>&nbsp;is a literary masterpiece that defies expectation. A dazzling examination of a marriage, it is also a portrait of creative partnership written by one of the best writers of her generation.&nbsp;<br /><br />Every story has two sides. Every relationship has two perspectives. And sometimes, it turns out, the key to a great marriage is not its truths but its secrets. At the core of this rich, expansive, layered novel, Lauren Groff presents the story of one such marriage over the course of twenty-four years.<br /><br />At age twenty-two, Lotto and Mathilde are tall, glamorous, madly in love, and destined for greatness. A decade later, their marriage is still the envy of their friends, but with an electric thrill we understand that things are even more complicated and remarkable than they have seemed. With stunning revelations and multiple threads, and in prose that is vibrantly alive and original, Groff delivers a deeply satisfying novel about love, art, creativity, and power that is unlike anything that has come before it. Profound, surprising, propulsive, and emotionally riveting, it stirs both the mind and the heart.</p>', '2016-05-27 10:41:49'),
(4, 812993543, 'Between the World and Me', 12.96, '51nX2wGTFXL__SX333_BO1,204,203,200_.jpg', 'Ta-Nehisi Coates', '<p>In a profound work that pivots from the biggest questions about American history and ideals to the most intimate concerns of a father for his son, Ta-Nehisi Coates offers a powerful new framework for understanding our nation&rsquo;s history and current crisis. Americans have built an empire on the idea of &ldquo;race,&rdquo; a falsehood that damages us all but falls most heavily on the bodies of black women and men&mdash;bodies exploited through slavery and segregation, and, today, threatened, locked up, and murdered out of all proportion. What is it like to inhabit a black body and find a way to live within it? And how can we all honestly reckon with this fraught history and free ourselves from its burden?<br /><br /><em>Between the World and Me&nbsp;</em>is Ta-Nehisi Coates&rsquo;s attempt to answer these questions in a letter to his adolescent son. Coates shares with his son&mdash;and readers&mdash;the story of his awakening to the truth about his place in the world through a series of revelatory experiences, from Howard University to Civil War battlefields, from the South Side of Chicago to Paris, from his childhood home to the living rooms of mothers whose children&rsquo;s lives were taken as American plunder. Beautifully woven from personal narrative, reimagined history, and fresh, emotionally charged reportage,&nbsp;<em>Between the World and Me</em>clearly illuminates the past, bracingly confronts our present, and offers a transcendent vision for a way forward.</p>', '2016-05-27 10:43:03'),
(5, 812995414, 'Becoming Nicole: The Transformation of an American Family', 18.69, '51D9LGodenL__SX336_BO1,204,203,200_.jpg', 'Amy Ellis Nutt', '<p>When Wayne and Kelly Maines adopted identical twin boys, they thought their lives were complete. But it wasn&rsquo;t long before they noticed a marked difference between Jonas and his brother, Wyatt. Jonas preferred sports and trucks and many of the things little boys were &ldquo;supposed&rdquo; to like; but Wyatt liked princess dolls and dress-up and playing Little Mermaid. By the time the twins were toddlers, confusion over Wyatt&rsquo;s insistence that he was female began to tear the family apart. In the years that followed, the Maineses came to question their long-held views on gender and identity, to accept and embrace Wyatt&rsquo;s transition to Nicole, and to undergo an emotionally wrenching transformation of their own that would change all their lives forever.</p>', '2016-05-27 10:44:14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
