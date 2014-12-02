DROP DATABASE IF EXISTS availio;
CREATE DATABASE availio;
USE availio;

CREATE TABLE IF NOT EXISTS `properties` (
`id` varchar(128) NOT NULL,
`bbid` varchar(128) NOT NULL,
`propertyname` varchar(128) NOT NULL,
`propertytype` varchar(128) NOT NULL,
`bedrooms` int(11) UNSIGNED NOT NULL,
`sleeps` int(11) UNSIGNED NOT NULL,
`province` varchar(128) NOT NULL,
`city` varchar(128) NOT NULL,
`suburb` varchar(128) NOT NULL,
`url` varchar(128) NOT NULL,
PRIMARY KEY (`id`),
UNIQUE KEY `uniq_id` (`id`),
UNIQUE KEY `uniq_bbid` (`bbid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `properties` (`id`, `bbid`, `propertyname`, `propertytype`, `bedrooms`, `sleeps`, `province`, `city`, `suburb`, `url`) VALUES
  ('1','17631', 'API Test 1 - One Room Type', 'One Room Type', 2, 10, 'Western Cape', 'Capetown', 'Camps Bay', 'http://www.oneroom.com'),
  ('2','17632', 'API Test 2 - Multi Room Types','Multipe Room Types', 1, 3, 'Western Cape', 'Capetown', 'Camps Bay', 'http://www.multiplerooms.com'),
  ('3','17633', 'API Test 3 - Apartments','Apartments', 4, 4, 'Western Cape', 'Capetown', 'Camps Bay', 'http://www.apartments.com');



