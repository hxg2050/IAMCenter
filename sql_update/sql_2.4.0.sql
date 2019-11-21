ALTER TABLE `theme` ADD `self_name` varchar(255) COMMENT '主题原本标识';
ALTER TABLE `theme` ADD `memo` text COMMENT '说明';
ALTER TABLE `theme` ADD `logo_path` varchar(255) DEFAULT '[]' COMMENT '展示图';
INSERT INTO `theme` (`id`, `title`, `self_name`, `name`, `status`, `version`, `memo`, `logo_path`) values (1, '简安米-系统默认', 'default', 'default', 1, '-.-.-', '简安米，一款以极简为理念的html5手机网站模板，且专注于移动端网站建设，专门为移动网站设计。功能强大，内容丰富，人性化的操作模式深受广大网友喜爱。', '["/upload/systheme/1.jpg", "/upload/systheme/2.jpg", "/upload/systheme/3.jpg", "/upload/systheme/4.jpg"]') ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `title` = VALUES(`title`), `self_name` = VALUES(`self_name`), `name` = VALUES(`name`), `status` = VALUES(`status`), `version` = VALUES(`version`), `memo` = VALUES(`memo`), `logo_path` = VALUES(`logo_path`)