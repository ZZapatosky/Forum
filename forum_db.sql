SELECT * FROM `master_db`.`users` LIMIT 1000;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `name` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `name`, `password`) VALUES
(1, 'yssyogesh', 'Yogesh Singh', '12345'),
(2, 'bsonarika', 'Sonarika Bhadoria', '12345'),
(3, 'vishal', 'Vishal Sahu', '12345'),
(4, 'vijay', 'Vijay mourya', '12345')


--
-- Table structure for table `topic`
--

SELECT * FROM `master_db`.`topic` LIMIT 1000;
CREATE TABLE IF NOT EXISTS `topic` (
  `id` int(11) NOT NULL  COMMENT 'primary key' AUTO_INCREMENT,
  `topic_name` varchar(255) NOT NULL COMMENT 'topic name',
  `topic_text` varchar(255) NOT NULL COMMENT 'topic text',
   PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

ALTER TABLE `topic` AUTO_INCREMENT=100;

INSERT INTO `topic` (`id`, `topic_name`, `topic_text`) VALUES
(1, 'Tiger Nixon', 'Vokalia and Consonantia there live'),
(2, 'Garrett Winters', 'Omnis iste natus error'),
(3, 'Ashton Cox', 'Psed quia consequuntur magni'),
(4, 'Cedric Kelly', 'Eonsequuntur magni quia'),
(5, 'Airi Satou', 'Sedutonsequuntur magni'),
(6, 'Brielle Williamson', 'Psed perspiciatis quia'),
(7, 'Herrod Chandler', 'At vero eos et accusamus'),
(8, 'Rhona Davidson', 'A small river named Duden'),
(9, 'Colleen Hurst', 'It is a paradisematic country,'),
(10, 'Sonya Frost', 'Pointing has no control about'),
(11, 'Jena Gaines', ' Duden flows by their place and'),
(12, 'Quinn Flynn', 'One morning, when Gregor Sams'),
(13, 'Charde Marshall', 'The bedding was hardly able to cover'),
(14, 'Haley Kennedy', 'The European languages are members '),
(15, 'Tatyana Fitzpatrick', 'Nemo enim ipsam voluptatem quia ');