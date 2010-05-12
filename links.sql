use barce;


CREATE TABLE `links` (
  `id` int(11) NOT NULL auto_increment,
  `url` text,
  `short_link` varchar(255) default NULL,
  `clicks` int(11) default NULL,
  `created_at` datetime,
  `updated_at` timestamp,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

