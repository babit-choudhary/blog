-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `blogs` (`id`, `title`, `description`, `created_at`, `updated_at`, `user_id`, `image`) VALUES
(3,	'firdy ',	'<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n',	'2020-06-24 10:52:34',	'2020-06-24 17:00:34',	1,	'uploads/5eec876994925_Departure--34qm7o9kqy8rrgbz8rop34.jpg');

DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base',	1592885202),
('m150828_085134_init_user_tables',	1592885473),
('m161109_112016_rename_user_table',	1592885473),
('m170608_141511_rename_columns',	1592885474);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `last_login` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `passwordResetToken` (`password_reset_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user` (`id`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `last_login`) VALUES
(1,	'qdmJOq1O5uA12C-YqmDqe9Ku5w6Phhjh',	'$2y$13$GtA.g3Nzh3bQaMz/ewV5fed4y.dYrPYM2lLecXr2CdUZUc8J8STiO',	NULL,	'babitkumar6@gmail.com',	10,	1592964204,	1592964204,	NULL),
(2,	'WaExpDfR9_EvxbxhycuclusNhuTz7V34',	'$2y$13$/rZTqNG/vlbz85PR22Nc2./d7q/eK/WcO9jU9C1kMvm8kAyklZcbu',	NULL,	'babitkumar6@gmail.c',	9,	1593025803,	1593025803,	NULL),
(3,	'oTwirRGUshHQnE-vbnAjMYmTpISFMO8m',	'$2y$13$4r3eboEldhPYuF1jePQu2OqTCFGa1JHakQyf2lfohtqDEA3BTPoMS',	NULL,	'babitkumar6@gmail.crrtr',	9,	1593025860,	1593025860,	NULL),
(4,	'tkSGu7kfpHafTcb3JeILNMNxFPOHLLou',	'$2y$13$/yqKVq2YWzJn9spARfJxAeltn6nTUxVTJpVHvW89RkbZ11VhnIf86',	NULL,	'babitkumar@gmail.com',	9,	1593027758,	1593027758,	NULL),
(5,	'h4SOCJ8GIedkdr0ybyqigSWyhE9yYtv-',	'$2y$13$ernIAiC21EZg2IW2Z14Ece4i57wFluWM03cWkj4pA4zBvt32pByJa',	NULL,	'babitk@yopmail.com',	10,	1593028401,	1593028401,	NULL),
(6,	'EqyXAFpyH0m73aMugvL0UG_K7Yk3W82l',	'$2y$13$o8DNcldqle5Ofd.4a9IE0.K1SISvG8dt5Fn.G0.BXF/gxsKvIiEJW',	NULL,	'raj@yopmail.com',	9,	1593028525,	1593028525,	NULL);

-- 2020-06-25 04:02:13
