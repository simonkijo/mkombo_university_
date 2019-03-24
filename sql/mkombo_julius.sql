
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `author` varchar(11) NOT NULL,
  `publisher` varchar(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `category` varchar(45) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `books` (`id`, `title`, `author`, `publisher`, `date`, `category`, `total`) VALUES
(1111, 'Chetemo the lazy man', 'Ally', 'Koki', '2016/18/06', 'story', 150),
(2045, 'Project books for finalist', 'Ibrahim', 'Ibrahim', '2016-06-10', 'Project books', 32),
(2222, 'Nuclear physics and themionic emmissino', 'Mgamba', 'Edwin', '2016/1010/0505', 'Electronics', 149),
(2434, 'njiwa ndege mzuri', 'Julicana', 'Julicana', '2016-06-05', 'Play', 30),
(3492, 'Robot', 'Mungaya', 'Mungaya', '2016-05-23', 'Hardware', 20),
(4366, 'Balance diet', 'Amani', 'Mamalishe', '2016/04/06', 'hygine', 200),
(4567, 'Object Oriented', 'Vajehii', 'Hamza', '2016/22/05', 'novel', 398),
(4867, 'our home is reach of the resources', 'Janja', 'majanja deo', 'deo majanger', 'poem', 40),
(5454, 'Themionic emmision and nucleus physics', 'Julius', 'mungaya', '2016/22/05', 'physics', 150),
(5672, 'Trigonometrical and matrix', 'Ochiochi', 'Maulidi', '2016-05-23', 'Mathematics', 200),
(6424, 'programming for android programming', 'Aman', 'Aman', '2016-06-20', 'Programming', 50),
(7777, 'Tanzania independency was innevitable', 'Alima', 'Amadi', '2016/22/05', 'History', 200);

CREATE TABLE IF NOT EXISTS `borrow` (
  `_id` int(11) NOT NULL,
  `id` varchar(45) NOT NULL,
  `student_code` varchar(45) NOT NULL,
  `issue_date` varchar(40) NOT NULL,
  `due_date` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `borrow` (`_id`, `id`, `student_code`, `issue_date`, `due_date`) VALUES
(1, '120232323359', '120232323359', '2016-11-03', '2016-11-13'),
(2, '12345', '12345', '2016-5-20', '2016-5-30'),
(3, '13099', '120232377797', '2016-05-16', '2016-06-01'),
(4, '888', '120232323359', '1234-56-78', '7777-77-77'),
(5, '888', '1202324323499', '1234-56-78', '1234-56-78'),
(6, '7777', '120232377797', '2016-05-22', '2016-05-27'),
(7, '7777', '120232436458', '2016-05-22', '2016-05-24'),
(8, '7777', '120232436458', '2016-05-22', '2016-05-22'),
(9, '1111', '120232499435', '2016-05-26', '2016-05-30'),
(10, '2222', '1202324323499', '2016-05-27', '2016-05-30'),
(11, '1111', '120232323359', '2016-05-28', '2016-05-30'),
(12, '3099', '120232377797', '2016-06-01', '2016-06-06');

CREATE TABLE IF NOT EXISTS `classrooms` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `no_chairs` varchar(40) NOT NULL,
  `description` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `classrooms` (`id`, `name`, `no_chairs`, `description`, `status`) VALUES
(1001, 't1', '20', 'useful', 'near playgnd'),
(1001, 't2', '30', 'useful', 'near pgdn'),
(1003, 't4', '200', 'useful', 'near playgnd'),
(1004, 'b4', '600', 'useful', 'near pgdn'),
(5001, 'c1', '50', 'near play pnd', 'for meeting'),
(401, 'c2', '40', 'useful', 'nrpnd'),
(909, 'B15', '40', 'useful', 'near stry'),
(1000, 'c1', '30', 'for meeting', 'in use only this week');

CREATE TABLE IF NOT EXISTS `degree_payment` (
  `id` int(11) NOT NULL,
  `Description` varchar(40) NOT NULL,
  `year_1` varchar(11) NOT NULL,
  `year_2` varchar(11) NOT NULL,
  `year_3` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `degree_payment` (`id`, `Description`, `year_1`, `year_2`, `year_3`) VALUES
(1, 'Tuition fees', '1020000', '1020000', '1020000'),
(2, 'Accommodation', '62000', '60000', '60000'),
(3, 'Student Relief fund', '50400', '50400', '50400'),
(4, 'Coution Money', '10000', '-', '-'),
(5, 'Registration Fees', '5000', '5000', '5000'),
(6, 'Library id', '5000', '5000', '5000'),
(7, 'Identity card', '1000', '-', '-'),
(8, 'MUSTSO', '10000', '5000', '5000');

CREATE TABLE IF NOT EXISTS `diplom_payment` (
  `id` int(11) NOT NULL,
  `Description` varchar(40) NOT NULL,
  `year_1` int(11) NOT NULL,
  `year_2` varchar(11) NOT NULL,
  `year_3` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO `diplom_payment` (`id`, `Description`, `year_1`, `year_2`, `year_3`) VALUES
(1, 'Tuition fees', 700000, '700000', '1020000'),
(2, 'Accommodation', 62000, '60000', '60000'),
(3, 'Medical contribution', 50400, '50400', '50400'),
(4, 'Coution Money', 10000, '-', '-'),
(5, 'Registration Fees', 5000, '5000', '5000'),
(6, 'Library id', 5000, '5000', '5000'),
(7, 'Identity card', 1000, '-', '-'),
(8, 'MUSTSO', 10000, '5000', '5000'),
(9, 'Examination fees', 50000, '50000', '50000');

CREATE TABLE IF NOT EXISTS `financial_record` (
  `id` varchar(45) NOT NULL,
  `amount` varchar(45) NOT NULL,
  `purpose` varchar(45) NOT NULL,
  `date_financial` varchar(45) NOT NULL,
  `receipt_code` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `financial_record` (`id`, `amount`, `purpose`, `date_financial`, `receipt_code`) VALUES
('120232323359', '1120000', 'chakula', '2016-05-22', '123456 , 987654'),
('1202324323499', '2250000', 'all cost', '2016-07-01', '555555'),
('120232436458', '1500000', 'fees', '2016-05-15', '424242'),
('120232455348', '200000', 'graduation', '2016-05-15', '90126,468911'),
('120232499435', '4100000', 'fees', '2016-05-15', '566455'),
('120322446688', '10000300', 'fees', '2016-06-24', '34533'),
('160215830016', '7200500', 'penalt', '2016-05-15', '342523');


ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `borrow`
  ADD PRIMARY KEY (`_id`);

ALTER TABLE `degree_payment`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `diplom_payment`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `financial_record`
  ADD UNIQUE KEY `id` (`id`);


ALTER TABLE `borrow`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
ALTER TABLE `degree_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
ALTER TABLE `diplom_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
