CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL UNIQUE,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `email` varchar(80) NOT NULL,
  `token` varchar(100) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


