CREATE TABLE IF NOT EXISTS `pictures` (
  `picID` int(11) NOT NULL auto_increment,   
  `photoid` int NOT NULL default 0,
  `Width` int NOT NULL default 0,
  `Height` int NOT NULL default 0,
  `Votes` int NOT NULL default 0,
  `Author` varchar(100) NOT NULL default 'None',
  `Description` varchar(255)  default 'None',
  `updated_at` DATETIME ON UPDATE CURRENT_TIMESTAMP,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY  (`picID`)
);