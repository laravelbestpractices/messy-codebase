CREATE TABLE IF NOT EXISTS `Pictures` (
  `id` int(11) NOT NULL auto_increment,   
  `photo_id` int NOT NULL default 0,
  `width` int NOT NULL default 0,
  `height` int NOT NULL default 0,
  `author` varchar(100) NOT NULL default 'None',
  `description` varchar(255)  default 'None',
   PRIMARY KEY  (`id`)
);