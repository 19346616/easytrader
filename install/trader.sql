CREATE TABLE `user` (
  `userid` varchar(20)  NOT NULL,
  `passwd` varchar(20)  NOT NULL,
  `nickname` varchar(20)  NOT NULL,
  `name` varchar(16)  NOT NULL,
  `photo` varchar(100)  NOT NULL,
  `sex` char(1) NOT NULL COMMENT '0-man,1-women',
  `mobile` varchar(13) NOT NULL,
   `email` varchar(50) NOT NULL,
  `recommend` varchar(20)  NOT NULL,
  `register_date` date NOT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Table structure for table `user_extends`
--

CREATE TABLE `user_extends` (
  `userid` varchar(20)  NOT NULL,
  `address` varchar(100)  NOT NULL,
  `resume` varchar(1000)  NOT NULL COMMENT '简历',
  `number` int(11) NOT NULL COMMENT '资格编号'
) ENGINE=InnoDB;
