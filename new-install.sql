INSERT INTO `{#}controllers` (`title`, `name`, `is_enabled`, `options`, `author`, `url`, `version`, `is_backend`, `is_external`) VALUES ('Автологин', 'autologin', '1', NULL, 'Михайлов Михаил', 'https://vk.com/evilmixa', '2.0.0', '1', NULL);

INSERT INTO `{#}perms_rules` (`controller`, `name`, `type`, `options`) VALUES ('autologin', 'use', 'flag', NULL);


INSERT INTO `{#}widgets` (`controller`, `name`, `title`, `author`, `url`, `version`) VALUES ('autologin', 'fastlogin', 'Быстрая авторизация', 'Михайлов Михаил', 'https://vk.com/evilmixa', '0.9');

DROP TABLE IF EXISTS `{#}autologin_userlist`;

CREATE TABLE `{#}autologin_userlist` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `owner_id` int(255) DEFAULT NULL,
  `uid` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `{#}users_tabs` (`title`, `controller`, `name`, `is_active`, `ordering`, `show_only_owner`) VALUES ('Автологин', 'autologin', 'user_list', '1', '31', '1');