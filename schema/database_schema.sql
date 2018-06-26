# Table: 'be_categories' structure
CREATE TABLE `be_categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(60) default NULL,
  `url_name` varchar(200) default NULL,
  `description` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'be_categories' data
INSERT INTO `be_categories` (`id`, `name`, `url_name`, `description`) VALUES(1, 'Sample category', 'sample-category', 'Sample category');

# Table: 'be_comments' structure
CREATE TABLE `be_comments` (
  `id` int(11) NOT NULL auto_increment,
  `post_id` int(11) default '0',
  `user_id` int(11) default NULL,
  `author` varchar(50) default NULL,
  `author_email` varchar(100) default NULL,
  `author_website` varchar(200) default NULL,
  `author_ip` varchar(100) NOT NULL,
  `content` text,
  `date` datetime default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'be_languages' structure
CREATE TABLE `be_languages` (
  `id` int(11) NOT NULL auto_increment,
  `language` varchar(100) default NULL,
  `abbreviation` varchar(3) default NULL,
  `author` varchar(100) default NULL,
  `is_default` enum('0','1') default NULL,
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'be_languages' data
INSERT INTO `be_languages` (`id`, `language`, `abbreviation`, `author`, `is_default`) VALUES(1, 'english', 'en', 'Tomaz Muraus', '1');
INSERT INTO `be_languages` (`id`, `language`, `abbreviation`, `author`, `is_default`) VALUES(2, 'slovene', 'sl', 'Tomaz Muraus', '0');

# Table: 'be_links' structure
CREATE TABLE `be_links` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `url` varchar(255) default NULL,
  `target` enum('blank','self','parent') default 'blank',
  `description` varchar(100) default NULL,
  `visible` enum('yes','no') default 'yes',
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'be_links' data
INSERT INTO `be_links` (`id`, `name`, `url`, `target`, `description`, `visible`) VALUES(1, 'Open Blog', 'http://www.open-blog.info', 'blank', 'Open Blog Website', 'yes');
INSERT INTO `be_links` (`id`, `name`, `url`, `target`, `description`, `visible`) VALUES(2, 'CodeIgniter', 'http://www.codeigniter.com', 'blank', 'Codeigniter PHP Framework', 'yes');

# Table: 'be_navigation' structure
CREATE TABLE `be_navigation` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) default NULL,
  `description` varchar(100) default NULL,
  `url` varchar(255) default NULL,
  `position` int(11) default '0',
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'be_navigation' data
INSERT INTO `be_navigation` (`id`, `title`, `description`, `url`, `position`) VALUES(1, 'Home', 'Index', '', 0);
INSERT INTO `be_navigation` (`id`, `title`, `description`, `url`, `position`) VALUES(2, 'Archive', 'Archive', 'blog/archive/', 1);

# Table: 'be_pages' structure
CREATE TABLE `be_pages` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(200) default NULL,
  `url_title` varchar(200) default NULL,
  `author` int(11) default '0',
  `date` date default NULL,
  `content` text,
  `status` enum('active','inactive') default 'active',
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'be_posts' structure
CREATE TABLE `be_posts` (
  `id` int(11) NOT NULL auto_increment,
  `author` int(11) default '0',
  `title` varchar(200) default NULL,
  `url_title` varchar(200) default NULL,
  `category_id` int(11) default '0',
  `excerpt` text,
  `content` longtext,
  `allow_comments` enum('0','1') default '1',
  `status` enum('draft','published') default 'published',
  `published_date` datetime,
  `create_at` datetime default CURRENT_TIMESTAMP,
  `create_by` varchar(10) default NULL,
  `update_at` datetime default NULL,
  `update_by` varchar(10) default NULL,
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'be_posts' data
INSERT INTO `be_posts` (`id`, `author`, `date_posted`, `title`, `url_title`, `category_id`, `excerpt`, `allow_comments`, `status`) VALUES(1, 1, '2009-01-01', 'Welcome to Open Blog', 'welcome-to-open-blog', 1, '<p>Congratulations!</p>\n<p>If you can see this post, this means Open Blog was successfully installed.</p>\n<p>If you need help, don\'t hesitate and visit the Open Blog <a href="http://www.open-blog.info" target="_blank">home page</a>.</p>\n<p>Sincerely,<br />The Open Blog team</p>\n<p><em>Since this is just an example post, feel free to delete it.</em></p>', '1', 'published');

# Table: 'be_settings' structure
CREATE TABLE `be_settings` (
  `id` int(11) NOT NULL auto_increment,
  `blog_title` varchar(100) default NULL,
  `blog_description` varchar(255) default NULL,
  `meta_keywords` varchar(255) default NULL,
  `allow_registrations` enum('0','1') default '1',
  `enable_rss` enum('0','1') default '1',
  `enable_atom` enum('0','1') default '1',
  `posts_per_site` int(11) default '5',
  `links_per_box` int(11) default '5',
  `months_per_archive` int(11) default '8',
  `enabled` enum('0','1') default '1',
  `offline_reason` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
)  DEFAULT CHARSET=utf8;

# Table: 'be_settings' data
INSERT INTO `be_settings` (`id`,`blog_title`, `blog_description`, `meta_keywords`,`allow_registrations`,`enable_rss`,`enable_atom`,`posts_per_site`,`links_per_box`,`months_per_archive`,`enabled`,`offline_reason`) 
VALUES(1, 'Blog Engine', 'Codeigniter for blog and other purpose for simple website','open,blog,engine,free,site,website,cms','0',1,1,5,5,8,1,'');

# Table: 'be_templates' structure
CREATE TABLE `be_templates` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) default NULL,
  `author` varchar(100) default NULL,
  `path` varchar(100) default NULL,
  `image` varchar(100) default NULL,
  `is_default` enum('0','1') default '1',
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'be_templates' data
INSERT INTO `be_templates` (`id`, `name`, `author`, `path`, `image`, `is_default`) VALUES(1, 'Colorvoid', 'Arcsin', 'colorvoid', 'colorvoid.jpg', '1');
INSERT INTO `be_templates` (`id`, `name`, `author`, `path`, `image`, `is_default`) VALUES(2, 'Beautiful Day', 'Arcsin', 'beautiful_day', 'beautiful_day.jpg', '0');
INSERT INTO `be_templates` (`id`, `name`, `author`, `path`, `image`, `is_default`) VALUES(3, 'Natural Essence', 'Arcsin', 'natural_essence', 'natural_essence.jpg', '0');
INSERT INTO `be_templates` (`id`, `name`, `author`, `path`, `image`, `is_default`) VALUES(4, 'Contaminated', 'Arcsin', 'contaminated', 'contaminated.jpg', '0');
INSERT INTO `be_templates` (`id`, `name`, `author`, `path`, `image`, `is_default`) VALUES(5, 'Interlude', 'Free CSS Templates', 'interlude', 'interlude.jpg', '0');

# Table: 'be_sidebar' structure
CREATE TABLE `be_sidebar` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `status` enum('enabled','disabled') NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'be_sidebar' data
INSERT INTO `be_sidebar` VALUES(1, 'Search', 'search', 'enabled', 1);
INSERT INTO `be_sidebar` VALUES(2, 'Archive', 'archive', 'enabled', 2);
INSERT INTO `be_sidebar` VALUES(3, 'Categories', 'categories', 'enabled', 3);
INSERT INTO `be_sidebar` VALUES(4, 'Tag_cloud', 'tag_cloud', 'enabled', 4);
INSERT INTO `be_sidebar` VALUES(5, 'Feeds', 'feeds', 'enabled', 5);
INSERT INTO `be_sidebar` VALUES(6, 'Links', 'links', 'enabled', 6);
INSERT INTO `be_sidebar` VALUES(7, 'Other', 'other', 'enabled', 7);


# Table: 'be_tags' data
CREATE TABLE `be_tags` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'be_tags' data
INSERT INTO `be_tags` (`id`, `name`) VALUES(1, 'codeigniter');
INSERT INTO `be_tags` (`id`, `name`) VALUES(2, 'blog');

# Table: 'be_tags_to_posts' data
CREATE TABLE `be_tags_to_posts` (
  `id` int(11) NOT NULL auto_increment,
  `tag_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'be_tags_to_posts' data
INSERT INTO `ob_tags_to_posts` (`id`, `tag_id`, `post_id`) VALUES(1, 1, 1);
INSERT INTO `ob_tags_to_posts` (`id`, `tag_id`, `post_id`) VALUES(2, 2, 1);


DROP TABLE IF EXISTS `be_groups`;

#
# Table structure for table 'groups'
#

CREATE TABLE `be_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Dumping data for table 'groups'
#

INSERT INTO `be_groups` (`id`, `name`, `description`) VALUES
     (1,'admin','Administrator'),
     (2,'members','General User');



DROP TABLE IF EXISTS `be_users`;

#
# Table structure for table 'users'
#

CREATE TABLE `be_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# Dumping data for table 'users'
#

INSERT INTO `be_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
     ('1','127.0.0.1','administrator','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','admin@admin.com','',NULL,'1268889823','1268889823','1', 'Admin','istrator','ADMIN','0');


DROP TABLE IF EXISTS `be_users_groups`;

#
# Table structure for table 'users_groups'
#

CREATE TABLE `be_users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `uc_users_groups` UNIQUE (`user_id`, `group_id`),
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `be_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `be_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `be_users_groups` (`id`, `user_id`, `group_id`) VALUES
     (1,1,1),
     (2,1,2);


DROP TABLE IF EXISTS `be_login_attempts`;

#
# Table structure for table 'login_attempts'
#

CREATE TABLE `be_login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

