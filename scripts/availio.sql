DROP DATABASE IF EXISTS availio;
CREATE DATABASE availio;
USE availio;

CREATE TABLE IF NOT EXISTS `properties` (
`id` varchar(128) NOT NULL,
`bbid` varchar(128) NOT NULL,
`propertytype` varchar(128) NOT NULL,
`bedrooms` int(11) UNSIGNED NOT NULL,
`sleeps` int(11) UNSIGNED NOT NULL,
`province` varchar(128) NOT NULL,
`city` varchar(128) NOT NULL,
`suburb` varchar(128) NOT NULL,
PRIMARY KEY (`id`),
UNIQUE KEY `uniq_id` (`id`),
UNIQUE KEY `uniq_bbid` (`bbid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `properties` (`id`, `bbid`, `propertytype`, `bedrooms`, `sleeps`, `province`, `city`, `suburb`) VALUES
  ('1','17631', 'One Room Type', 2, 10, 'Western Cape', 'Capetown', 'Camps Bay'),
  ('2','17632', 'Multipe Room Types', 1, 3, 'Western Cape', 'Capetown', 'Camps Bay'),
  ('3','17633', 'Apartments', 4, 4, 'Western Cape', 'Capetown', 'Camps Bay');



