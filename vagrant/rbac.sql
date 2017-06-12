
--
-- 表的结构 `admin_action`
--

CREATE TABLE IF NOT EXISTS `admin_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'action功能ID',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '类型',
  `sign` varchar(255) NOT NULL DEFAULT '' COMMENT '签名',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '功能名称',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父模块ID',
  `myorder` tinyint(4) NOT NULL DEFAULT '0' COMMENT '展示顺序',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '跳转链接',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='action功能表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `admin_action`
--

INSERT INTO `admin_action` (`id`, `type`, `sign`, `name`, `pid`, `myorder`, `url`) VALUES
(1, 1, 'system', '系统管理', 0, 100, 'javascript:void(0)'),
(2, 2, 'system/action', '系统功能管理', 1, 1, 'index.php?r=system/action'),
(3, 2, 'system/role', '系统角色管理', 1, 2, 'index.php?r=system/role'),
(4, 2, 'system/user', '系统用户管理', 1, 3, 'index.php?r=system/user'),
(5, 1, 'user', '用户管理', 0, 1, 'index.php?r=user');


--
-- 表的结构 `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员用户ID',
  `username` varchar(255) NOT NULL DEFAULT '' COMMENT '用户名',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '类型',
  `password` varchar(100) NOT NULL DEFAULT '' COMMENT '密码',
  `salt` varchar(11) NOT NULL DEFAULT '' COMMENT '加密盐',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='管理员用户表';

--
-- 转存表中的数据 `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `type`, `password`, `salt`, `create_time`) VALUES
(1, 'admin', 0, '77e2edcc9b40441200e31dc57dbb8829', '', 0),
(2, 'liugaoyun', 0, '027ddf09dc08f31e78a06e48c057fb4a', 'TW4B9R9PD2E', 0);

--
-- 表的结构 `admin_role`
--

CREATE TABLE IF NOT EXISTS `admin_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员角色ID',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '角色名称',
  `desc` varchar(1024) NOT NULL DEFAULT '' COMMENT '角色说明',
  `vals` varchar(1024) NOT NULL DEFAULT '' COMMENT '角色允许操作的action ID集，逗号分隔',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0-正常 1-已禁用',
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='管理员角色表';

--
-- 转存表中的数据 `admin_role`
--

INSERT INTO `admin_role` (`id`, `name`, `desc`, `vals`, `status`) VALUES
(1, '系统管理员', '拥有所有权限', '5|1|2|3|4', 0);


--
-- 表的结构 `admin_role_user`
--

CREATE TABLE IF NOT EXISTS `admin_role_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户角色ID',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `role_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色ID',
  `add_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户角色表';

--
-- 转存表中的数据 `admin_role_user`
--

INSERT INTO `admin_role_user` (`id`, `user_id`, `role_id`, `add_time`) VALUES
(1, 2, 1, 0),
(2, 1, 1, 0);

