UPDATE `{#}controllers` SET `version`='2.0.0' WHERE (`name`='autologin') LIMIT 1;

DROP TABLE IF EXISTS `{#}autologin_userlist`;

CREATE TABLE `{#}autologin_userlist` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `owner_id` int(255) DEFAULT NULL,
  `uid` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `{#}users_tabs` (`title`, `controller`, `name`, `is_active`, `ordering`, `show_only_owner`) VALUES ('Автологин', 'autologin', 'user_list', '1', '31', '1');