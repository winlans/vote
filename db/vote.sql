DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` INT(11) AUTO_INCREMENT,
  `username` VARCHAR(32) NOT NULL COMMENT '用户名',
  `password` VARCHAR(60) NOT NULL  COMMENT '密码',
  `role_id` INT(11) NOT NULL DEFAULT -1 COMMENT '角色id',
  `updated` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `status` TINYINT(4) NOT NULL DEFAULT 1 COMMENT '用户状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO user VALUES (1, 'superman', '$2y$10$4tovxhkuFZ0cATO2D9llnuRbaYF9ju8HYQTTs0rRU273WwqK3Q9Sm', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1);

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` INT(11) AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL COMMENT '投票标题',
  `descr` VARCHAR(600) NOT NULL DEFAULT '' COMMENT '投票描述',
  `deadline` TIMESTAMP NOT NULL COMMENT '投票结束时间',
  `type` TINYINT(4) NOT NULL DEFAULT 1 COMMENT '1 单选， 2 多选',
  `perm` INT(11) NOT NULL DEFAULT -1 COMMENT '允许哪个角色投票 默认所有, 关联role id',
  `user_id` INT(11) NOT NULL COMMENT '创建者',
  `updated` timestamp default current_timestamp on update current_timestamp,
  `created` timestamp default current_timestamp,
  `status` tinyint(4) not null default 1 comment '0 delete, 1 normal, 2 deadline',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `article_item`;
CREATE TABLE `article_item` (
  `id` BIGINT(11) AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL COMMENT '投票项目的条目',
  `article_id` INT(11) NOT NULL COMMENT 'article id',
  `poll` INT(11) NOT NULL DEFAULT 0 COMMENT '得票数',
  `updated` timestamp default current_timestamp on update current_timestamp,
  `created` timestamp default current_timestamp,
  `status` tinyint(4) not null default 1 comment '1 正常， 0 删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `votes`;
CREATE TABLE `votes`(
  `id` INT(11) AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL COMMENT 'user id',
  `item_id` BIGINT(11) NOT NULL COMMENT 'article item id',
  `updated` timestamp default current_timestamp on update current_timestamp,
  `created` timestamp default current_timestamp,
  `status` tinyint(4) not null default 1 comment '0 取消投票， 1 投票生效',
  PRIMARY KEY (`id`)
);

-- ----------------------------
-- Table structure for stroe role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`(
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NOT NULL COMMENT '角色名称',
  `descr` VARCHAR(100) NOT NULL DEFAULT '' COMMENT '描述',
  `isDel` TINYINT(4) NOT NULL DEFAULT 0 COMMENT '0 正常， 1 被删除',
  `created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` TIMESTAMP NOT NULL  DEFAULT  CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO role VALUES (1, 'superman', 'is superman', 0, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);