
CREATE DATABASE IF NOT EXISTS `mkombo_university` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mkombo_university`;

CREATE TABLE IF NOT EXISTS `academic_info` (
  `index_no_olevel` varchar(100) NOT NULL,
  `index_no_alevel` varchar(100) DEFAULT NULL,
  `school_name_olevel` varchar(100) DEFAULT NULL,
  `school_name_alevel` varchar(100) DEFAULT NULL,
  `sc_location_olevel` varchar(100) DEFAULT NULL,
  `sc_location_alevel` varchar(100) DEFAULT NULL,
  `cert_olevel` varchar(45) DEFAULT NULL,
  `cert_alevel` varchar(45) DEFAULT NULL,
  `completion_yr_olevel` varchar(5) DEFAULT NULL,
  `completion_yr_alevel` varchar(5) DEFAULT NULL,
  `subject_taken` longtext,
  `subject_combination` varchar(5) DEFAULT NULL,
  `reg_no` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `academic_info` (`index_no_olevel`, `index_no_alevel`, `school_name_olevel`, `school_name_alevel`, `sc_location_olevel`, `sc_location_alevel`, `cert_olevel`, `cert_alevel`, `completion_yr_olevel`, `completion_yr_alevel`, `subject_taken`, `subject_combination`, `reg_no`) VALUES
('S0878/8675/7444', 'S4667/6767/6767', 'moki', 'kesho', 'mbezi', 'arusha', 'CSEE', 'acsee', '2002', '2008', '["Physics,","Chemistry,","Biology,","Civics,","History,","Kiswahili,","Geography,","Mathematics,","English"]', 'PCM', '160210184934'),
('S3123/1321/3321', 'S9797/9878/9789', 'Mbezi Beach', 'arusha day', 'mbezi', 'arusha', 'CSEE', 'acsee', '2001', '2010', '["History"]', 'PCM', '160213521986'),
('S4323/2432/4234', 'S8913/2131/2321', 'mbezi Luis', 'arusha mjini', 'Dar es salaam', 'arusha', 'CSEE', 'acsee', '2010', '2012', '[",","Physics,","Chemistry,","Biology,","Civics,","History,","Kiswahili,","Geography,","Mathematics,","English"]', 'PCM', '160215313685'),
('S4545/4545/4545', 'S1234/5555/5454', 'Mbezi Beach', 'kisimiri', 'Mbezi', 'arusha', 'CSEE', 'acsee', '2009', '2012', '["Chemistry,","Biology"]', 'PCM', '160210633999'),
('S4565/6562/5625', 'S0343/3533/4343', 'Kisimiri', 'Olekungwadu', 'Dar es salaam', 'Arusha', 'CSEE', 'acsee', '2004', '2008', '["Physics,","Chemistry,","Biology,","Civics,","History,","Kiswahili,","Geography,","Mathematics,","English"]', 'PCM', '160210998257');

CREATE TABLE IF NOT EXISTS `admin` (
  `fname` varchar(60) DEFAULT NULL,
  `mname` varchar(60) DEFAULT NULL,
  `sname` varchar(60) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `phone_no` varchar(15) DEFAULT NULL,
  `email_address` varchar(100) NOT NULL,
  `nationality` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `admin` (`fname`, `mname`, `sname`, `username`, `password`, `gender`, `phone_no`, `email_address`, `nationality`) VALUES
('admin', 'admin', 'admin', 'admin', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Male', '255786722121', 'hamzaedit@gmail.com', 'Tanzanian');

CREATE TABLE IF NOT EXISTS `bank_account` (
  `bank_name` varchar(45) DEFAULT NULL,
  `bank_branch` varchar(45) DEFAULT NULL,
  `account_no` varchar(100) NOT NULL,
  `reg_no` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `bank_account` (`bank_name`, `bank_branch`, `account_no`, `reg_no`) VALUES
('NMB', 'Mlimani City', '0909090909090909', '160210633999'),
('NMB', 'Posta', '092323232322', '160210998257'),
('crdb', 'mbezi', '12321321321', '160213521986'),
('crdb', 'vijana', '5645645645645', '160210184934'),
('crdb', 'mbezi', '7676765756756', '160215313685');

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

CREATE TABLE IF NOT EXISTS `calculus` (
  `calculus_reg_no` varchar(12) NOT NULL,
  `calculus_ca` int(2) DEFAULT NULL,
  `calculus_fe` int(2) DEFAULT NULL,
  `calculus_total` int(3) DEFAULT NULL,
  `calculus_grade` varchar(2) DEFAULT NULL,
  `calculus_grade_point_x_credit` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `calculus` (`calculus_reg_no`, `calculus_ca`, `calculus_fe`, `calculus_total`, `calculus_grade`, `calculus_grade_point_x_credit`) VALUES
('160210184934', 34, 40, 74, 'B+', 44);

CREATE TABLE IF NOT EXISTS `check_module` (
  `id_m` int(11) NOT NULL,
  `lec_no` varchar(12) DEFAULT NULL,
  `module` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE IF NOT EXISTS `communication_systems` (
  `communication_systems_reg_no` varchar(12) NOT NULL,
  `communication_systems_ca` int(2) DEFAULT NULL,
  `communication_systems_fe` int(2) DEFAULT NULL,
  `communication_systems_total` int(3) DEFAULT NULL,
  `communication_systems_grade` varchar(2) DEFAULT NULL,
  `communication_systems_grade_point_x_credit` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `communication_systems` (`communication_systems_reg_no`, `communication_systems_ca`, `communication_systems_fe`, `communication_systems_total`, `communication_systems_grade`, `communication_systems_grade_point_x_credit`) VALUES
('160210633999', 18, 34, 52, 'B', 21),
('160213521986', 20, 40, 60, 'B+', 28),
('160215313685', 23, 39, 62, 'B+', 28),
('160250853553', 15, 24, 39, 'D', 7),
('160283824583', 16, 30, 46, 'C', 14);

CREATE TABLE IF NOT EXISTS `computer_aided_systems` (
  `computer_aided_systems_reg_no` varchar(12) NOT NULL,
  `computer_aided_systems_ca` int(2) DEFAULT NULL,
  `computer_aided_systems_fe` int(2) DEFAULT NULL,
  `computer_aided_systems_total` int(3) DEFAULT NULL,
  `computer_aided_systems_grade` varchar(2) DEFAULT NULL,
  `computer_aided_systems_grade_point_x_credit` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `computer_aided_systems` (`computer_aided_systems_reg_no`, `computer_aided_systems_ca`, `computer_aided_systems_fe`, `computer_aided_systems_total`, `computer_aided_systems_grade`, `computer_aided_systems_grade_point_x_credit`) VALUES
('160210633999', 20, 30, 50, 'B', 30),
('160213521986', 25, 40, 65, 'B+', 40),
('160215313685', 24, 36, 60, 'B+', 40),
('160250853553', 18, 50, 68, 'B+', 40),
('160283824583', 16, 45, 61, 'B+', 40);

CREATE TABLE IF NOT EXISTS `course` (
  `id_course` int(11) NOT NULL,
  `course` varchar(100) DEFAULT NULL,
  `programme` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO `course` (`id_course`, `course`, `programme`) VALUES
(2, 'Information Technology', 'Bachelor Degree'),
(3, 'Computer Engineering', 'Bachelor Degree'),
(4, 'Civil Engineering', 'Bachelor Degree'),
(5, 'Electronics And Communication', 'Bachelor Degree'),
(6, 'Information Technology', 'Ordinary Diploma'),
(7, 'Computer Engineering', 'Ordinary Diploma'),
(8, 'Civil Engineering', 'Ordinary Diploma'),
(9, 'Electronics And Communication', 'Ordinary Diploma'),
(10, 'Petroleum Systems', 'Ordinary Diploma');

CREATE TABLE IF NOT EXISTS `database_systems` (
  `database_systems_reg_no` varchar(12) NOT NULL,
  `database_systems_ca` int(2) DEFAULT NULL,
  `database_systems_fe` int(2) DEFAULT NULL,
  `database_systems_total` int(3) DEFAULT NULL,
  `database_systems_grade` varchar(2) DEFAULT NULL,
  `database_systems_grade_point_x_credit` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `database_systems` (`database_systems_reg_no`, `database_systems_ca`, `database_systems_fe`, `database_systems_total`, `database_systems_grade`, `database_systems_grade_point_x_credit`) VALUES
('160210633999', 40, 60, 100, 'A', 60),
('160213521986', 23, 45, 68, 'B+', 48),
('160215313685', 24, 50, 74, 'A', 60),
('160250853553', 17, 34, 51, 'B', 36),
('160283824583', 18, 44, 62, 'B+', 48);

CREATE TABLE IF NOT EXISTS `data_sheet` (
  `data_sheet_reg_no` varchar(12) NOT NULL,
  `data_sheet_ca` int(2) DEFAULT NULL,
  `data_sheet_fe` int(2) DEFAULT NULL,
  `data_sheet_total` int(3) DEFAULT NULL,
  `data_sheet_grade` varchar(2) DEFAULT NULL,
  `data_sheet_grade_point_x_credit` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `data_sheet` (`data_sheet_reg_no`, `data_sheet_ca`, `data_sheet_fe`, `data_sheet_total`, `data_sheet_grade`, `data_sheet_grade_point_x_credit`) VALUES
('160210184934', 23, 40, 63, 'B', 21);

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

CREATE TABLE IF NOT EXISTS `embedded_systems` (
  `embedded_systems_reg_no` varchar(12) NOT NULL,
  `embedded_systems_ca` int(2) DEFAULT NULL,
  `embedded_systems_fe` int(2) DEFAULT NULL,
  `embedded_systems_total` int(3) DEFAULT NULL,
  `embedded_systems_grade` varchar(2) DEFAULT NULL,
  `embedded_systems_grade_point_x_credit` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `embedded_systems` (`embedded_systems_reg_no`, `embedded_systems_ca`, `embedded_systems_fe`, `embedded_systems_total`, `embedded_systems_grade`, `embedded_systems_grade_point_x_credit`) VALUES
('160210633999', 26, 40, 66, 'B+', 44),
('160213521986', 30, 50, 80, 'A', 55),
('160215313685', 24, 45, 69, 'B+', 44),
('160250853553', 34, 40, 74, 'A', 55),
('160283824583', 16, 50, 66, 'B+', 44);

CREATE TABLE IF NOT EXISTS `fiber_engineering` (
  `fiber_engineering_reg_no` varchar(12) NOT NULL,
  `fiber_engineering_ca` int(2) DEFAULT NULL,
  `fiber_engineering_fe` int(2) DEFAULT NULL,
  `fiber_engineering_total` int(3) DEFAULT NULL,
  `fiber_engineering_grade` varchar(2) DEFAULT NULL,
  `fiber_engineering_grade_point_x_credit` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `fiber_engineering` (`fiber_engineering_reg_no`, `fiber_engineering_ca`, `fiber_engineering_fe`, `fiber_engineering_total`, `fiber_engineering_grade`, `fiber_engineering_grade_point_x_credit`) VALUES
('160210633999', 17, 45, 62, 'B+', 32),
('160213521986', 25, 30, 55, 'B', 24),
('160215313685', 24, 55, 79, 'A', 40),
('160250853553', 16, 50, 66, 'B+', 32),
('160283824583', 17, 26, 43, 'C', 16);

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

CREATE TABLE IF NOT EXISTS `for_report` (
  `id_r` int(11) NOT NULL,
  `reg_no` varchar(12) DEFAULT NULL,
  `course` varchar(200) DEFAULT NULL,
  `programme` varchar(20) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

INSERT INTO `for_report` (`id_r`, `reg_no`, `course`, `programme`, `year`, `semester`) VALUES
(7, '160210633999', 'Information Technology', 'Bachelor Degree', 'first', 'first'),
(8, '160213521986', 'Information Technology', 'Bachelor Degree', 'first', 'first'),
(9, '160215313685', 'Information Technology', 'Bachelor Degree', 'first', 'first'),
(10, '160250853553', 'Information Technology', 'Bachelor Degree', 'first', 'first'),
(11, '160283824583', 'Information Technology', 'Bachelor Degree', 'first', 'first'),
(12, '160210184934', 'Information Technology', 'Ordinary Diploma', 'first', 'first'),
(13, '160210633999', 'Information Technology', 'Bachelor Degree', 'first', 'second'),
(14, '160213521986', 'Information Technology', 'Bachelor Degree', 'first', 'second'),
(15, '160215313685', 'Information Technology', 'Bachelor Degree', 'first', 'second'),
(16, '160250853553', 'Information Technology', 'Bachelor Degree', 'first', 'second'),
(17, '160283824583', 'Information Technology', 'Bachelor Degree', 'first', 'second'),
(18, '160210184934', 'Information Technology', 'Ordinary Diploma', 'first', 'second');

CREATE TABLE IF NOT EXISTS `gpa` (
  `id_gpa` int(11) NOT NULL,
  `year` varchar(10) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `gpa` float DEFAULT NULL,
  `reg_no` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

INSERT INTO `gpa` (`id_gpa`, `year`, `semester`, `gpa`, `reg_no`) VALUES
(49, 'first', 'first', 3.7188, '160210633999'),
(50, 'first', 'first', 5, '160213521986'),
(51, 'first', 'first', 3.625, '160215313685'),
(52, 'first', 'first', 4.3438, '160250853553'),
(53, 'first', 'first', 4.2813, '160283824583'),
(54, 'first', 'second', 3.32, '160210633999'),
(55, 'first', 'second', 3.68, '160213521986'),
(56, 'first', 'second', 4.32, '160215313685'),
(57, 'first', 'second', 3.16, '160250853553'),
(58, 'first', 'second', 2.8, '160283824583'),
(59, 'first', 'first', 2.6154, '160210184934'),
(60, 'first', 'second', 3.1, '160210184934');

CREATE TABLE IF NOT EXISTS `gpa_class` (
  `id_gpa_class` int(11) NOT NULL,
  `reg_no` varchar(15) DEFAULT NULL,
  `cgpa` float DEFAULT NULL,
  `cgpa_class` varchar(50) DEFAULT NULL,
  `year` varchar(40) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

INSERT INTO `gpa_class` (`id_gpa_class`, `reg_no`, `cgpa`, `cgpa_class`, `year`) VALUES
(16, '160210633999', 3.5, 'Upper Second Class', 'first'),
(17, '160213521986', 4.3, 'Upper Second Class', 'first'),
(18, '160215313685', 4, 'Upper Second Class', 'first'),
(19, '160250853553', 3.8, 'Upper Second Class', 'first'),
(20, '160283824583', 3.5, 'Upper Second Class', 'first'),
(21, '160210184934', 2.9, 'Lower Second Class', 'first');

CREATE TABLE IF NOT EXISTS `grade_summary` (
  `id_g` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `a` int(11) DEFAULT NULL,
  `b_plus` int(11) DEFAULT NULL,
  `b` int(11) DEFAULT NULL,
  `c` int(11) DEFAULT NULL,
  `d` int(11) DEFAULT NULL,
  `f` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO `grade_summary` (`id_g`, `code`, `year`, `a`, `b_plus`, `b`, `c`, `d`, `f`) VALUES
(7, 'CSET 02454', '2016-2017', 2, 2, 1, 0, 0, 0),
(8, 'CSET 04782', '2016-2017', 2, 3, 0, 0, 0, 0),
(9, 'CSET 08123', '2016-2017', 2, 2, 1, 0, 0, 0),
(10, 'cset 01456', '2015-2016', 0, 4, 1, 0, 0, 0),
(11, 'cset 03457', '2015-2016', 0, 2, 1, 1, 1, 0),
(12, 'cset 05123', '2015-2016', 1, 2, 1, 1, 0, 0),
(13, 'cset 08934', '2015-2016', 0, 1, 0, 0, 0, 0),
(14, 'cset 07345', '2015-2016', 0, 0, 0, 1, 0, 0);

CREATE TABLE IF NOT EXISTS `health_insurance` (
  `membership_no` varchar(45) NOT NULL,
  `vote` varchar(15) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `issue_date` varchar(15) DEFAULT NULL,
  `reg_no` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `health_insurance` (`membership_no`, `vote`, `address`, `issue_date`, `reg_no`) VALUES
('', '', '', '', '160215313685'),
('07-25365263', 'D23', '123, Dar es salaam, Tanzania', '13/09/2000', '160210998257'),
('09-23223232', '323', '2123', '12/03/1999', '160210633999'),
('21-32132132', '12321312321', '12323', '12/03/2013', '160213521986'),
('97-45322423', '1213', '655645', '13/02/2014', '160210184934');

CREATE TABLE IF NOT EXISTS `lecturer_role` (
  `lec_no` varchar(15) NOT NULL,
  `programme` varchar(40) DEFAULT NULL,
  `hod` varchar(100) NOT NULL DEFAULT 'NO',
  `department` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `lecturer_role` (`lec_no`, `programme`, `hod`, `department`) VALUES
('160212341870', 'Bachelor Degree', 'NO', 'Information Technology'),
('160212886982', 'Ordinary Diploma', 'NO', 'Information Technology'),
('160215432387', 'Bachelor Degree', 'NO', 'Information Technology'),
('160215704925', 'Ordinary Diploma', 'NO', 'Information Technology'),
('160217002549', 'Ordinary Diploma', 'YES', 'Information Technology'),
('160218554001', 'Ordinary Diploma', 'NO', 'Information Technology'),
('160218570031', 'Bachelor Degree', 'NO', 'Information Technology'),
('160220535671', 'Bachelor Degree', 'NO', 'Information Technology'),
('160221610417', 'Bachelor Degree', 'NO', 'Information Technology'),
('160281425034', 'Bachelor Degree', 'YES', 'Information Technology');

CREATE TABLE IF NOT EXISTS `modules` (
  `id_module` int(11) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `module_title` varchar(100) DEFAULT NULL,
  `course` varchar(45) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `semister` varchar(20) DEFAULT NULL,
  `credit` int(4) DEFAULT NULL,
  `programme` varchar(50) DEFAULT NULL,
  `access` varchar(3) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO `modules` (`id_module`, `code`, `module_title`, `course`, `year`, `semister`, `credit`, `programme`, `access`) VALUES
(1, 'CSET 02454', 'database_systems', 'Information Technology', 'first', 'first', 12, 'Bachelor Degree', 'YES'),
(2, 'CSET 04782', 'embedded_systems', 'Information Technology', 'first', 'first', 11, 'Bachelor Degree', 'NO'),
(3, 'CSET 08123', 'user_interface_design', 'Information Technology', 'first', 'first', 9, 'Bachelor Degree', 'NO'),
(4, 'CSET 04523', 'traffic_engineering', 'Information Technology', 'first', 'first', 10, 'Ordinary Diploma', 'NO'),
(5, 'CSET 02356', 'word_processing', 'Information Technology', 'first', 'first', 9, 'Ordinary Diploma', 'NO'),
(6, 'CSET 01245', 'data_sheet', 'Information Technology', 'first', 'first', 7, 'Ordinary Diploma', 'NO'),
(7, 'cset 01456', 'computer_aided_systems', 'Information Technology', 'first', 'second', 10, 'Bachelor Degree', 'NO'),
(8, 'cset 03457', 'communication_systems', 'Information Technology', 'first', 'second', 7, 'Bachelor Degree', 'NO'),
(9, 'cset 05123', 'fiber_engineering', 'Information Technology', 'first', 'second', 8, 'Bachelor Degree', 'NO'),
(10, 'cset 08934', 'calculus', 'Information Technology', 'first', 'second', 11, 'Ordinary Diploma', 'NO'),
(11, 'cset 07345', 'petroleum_systems', 'Information Technology', 'first', 'second', 9, 'Ordinary Diploma', 'NO');

CREATE TABLE IF NOT EXISTS `module_assignment` (
  `lec_no` varchar(15) NOT NULL,
  `module` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `module_assignment` (`lec_no`, `module`) VALUES
('160212886982', '["traffic engineering"]'),
('160215432387', '["embedded systems","user interface design"]'),
('160215704925', '["calculus"]'),
('160217002549', '["word processing","data sheet"]'),
('160218554001', '["petroleum systems"]'),
('160218570031', '["computer aided systems"]'),
('160221610417', '["communication systems","fiber engineering"]'),
('160281425034', '["database systems"]');

CREATE TABLE IF NOT EXISTS `parent` (
  `fullname` varchar(100) DEFAULT NULL,
  `phone_no_p` varchar(45) DEFAULT NULL,
  `email_p` varchar(100) NOT NULL,
  `physical_location` varchar(50) DEFAULT NULL,
  `reg_no` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `parent` (`fullname`, `phone_no_p`, `email_p`, `physical_location`, `reg_no`) VALUES
('Elizabeth Kaijage', '+312-321-312312', 'elizabeth@gmail.com', 'Mbezi', '160210633999'),
('Happy Urassa', '+255-099-909900', 'happy@gmail.com', 'Arusha', '160210998257'),
('malya joseph', '+255-132-132131', 'malya@gmail.com', 'mbezi', '160210184934'),
('Julio Peter', '+255-556-656565', 'peter@gmail.com', 'mbezi', '160213521986'),
('Rose ', '+255-122-312312', 'rose@gmail.com', 'arusha', '160215313685');

CREATE TABLE IF NOT EXISTS `petroleum_systems` (
  `petroleum_systems_reg_no` varchar(12) NOT NULL,
  `petroleum_systems_ca` int(2) DEFAULT NULL,
  `petroleum_systems_fe` int(2) DEFAULT NULL,
  `petroleum_systems_total` int(3) DEFAULT NULL,
  `petroleum_systems_grade` varchar(2) DEFAULT NULL,
  `petroleum_systems_grade_point_x_credit` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `petroleum_systems` (`petroleum_systems_reg_no`, `petroleum_systems_ca`, `petroleum_systems_fe`, `petroleum_systems_total`, `petroleum_systems_grade`, `petroleum_systems_grade_point_x_credit`) VALUES
('160210184934', 17, 30, 47, 'C', 18);

CREATE TABLE IF NOT EXISTS `sponsor` (
  `sponsor_name` varchar(100) DEFAULT NULL,
  `sponsor_phone` varchar(40) DEFAULT NULL,
  `sponsor_email` varchar(100) DEFAULT NULL,
  `reg_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `sponsor` (`sponsor_name`, `sponsor_phone`, `sponsor_email`, `reg_no`) VALUES
('HESLB', '+255-343-434345', '', '160210184934'),
('HESLB', '+989-998-798789', 'hamza@gmail.com', '160210633999'),
('HESLB', '+255-767-767676', 'heslb@go.tz', '160210998257'),
('HESLB', '+255-344-324234', 'heslb@go.tz', '160213521986'),
('', '', '', '160215313685');

CREATE TABLE IF NOT EXISTS `staff` (
  `lec_no` varchar(15) NOT NULL,
  `fname` varchar(60) DEFAULT NULL,
  `mname` varchar(60) DEFAULT NULL,
  `sname` varchar(60) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `phone_no` varchar(15) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `nationality` varchar(45) DEFAULT NULL,
  `marital_status` varchar(8) DEFAULT NULL,
  `starting_year` varchar(10) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `staff` (`lec_no`, `fname`, `mname`, `sname`, `username`, `password`, `gender`, `phone_no`, `email_address`, `nationality`, `marital_status`, `starting_year`, `role`) VALUES
('160211214885', 'muhamed', 'juma', 'juma', '', '', '', '', '', '', '', '2016', 'admission officer'),
('160212341870', 'moses', 'angweni', 'mgana', '', '', '', '', '', '', '', '2016', 'lecturer'),
('160212886982', 'asha', 'manase', 'wilson', 'asha', '33c4ff4a5b45c59248a7535de46109d7', 'Female', '+255-465-464576', 'asha@gmail.com', 'Tanzanian', 'Single', '2016', 'lecturer'),
('160215432387', 'gabriel', 'gabo', 'gabo', 'gabriel', '33c4ff4a5b45c59248a7535de46109d7', 'Male', '+255-778-787777', 'gabriel@gmail.com', 'Tanzanian', 'Single', '2016', 'lecturer'),
('160215704925', 'sara', 'mboni', 'mboni', 'sara', '33c4ff4a5b45c59248a7535de46109d7', 'Female', '+255-899-585774', 'sara@gmail.com', 'Tanzanian', 'Single', '2016', 'lecturer'),
('160215921284', 'Willium', 'Charles', 'Manase', 'willium', '33c4ff4a5b45c59248a7535de46109d7', 'Male', '+255-667-676767', 'willium@gmail.com', 'Tanzanian', 'Single', '2016', 'time table master'),
('160216599999', 'bakari', 'kilinjo', 'njaro', '', '', '', '', '', '', '', '2016', 'Busar'),
('160217002549', 'joseph', 'makwinya', 'joseph', 'joseph', '33c4ff4a5b45c59248a7535de46109d7', 'Male', '+255-567-675565', 'joseph@gmail.com', 'Tanzanian', 'Single', '2016', 'lecturer'),
('160217811640', 'testone', 'testtwo', 'testthree', '', '', '', '', '', '', '', '2016', 'Storekeeper'),
('160218083639', 'neema', 'ngamia', 'kiloma', 'neema', '33c4ff4a5b45c59248a7535de46109d7', 'Female', '+255-789-797979', 'neema@gmail.com', 'Tanzanian', 'Single', '2016', 'Librarian'),
('160218554001', 'emmanuel', 'leo', 'leo', 'emmanuel', '33c4ff4a5b45c59248a7535de46109d7', 'Male', '+255-674-533323', 'emmanuel@gmail.com', 'Tanzanian', 'Single', '2016', 'lecturer'),
('160218570031', 'mkuchi', 'kijo', 'kijo', 'mkuchi', '33c4ff4a5b45c59248a7535de46109d7', 'Male', '+255-782-345789', 'mkuchi@gmail.com', 'Tanzanian', 'Single', '2016', 'lecturer'),
('160220535671', 'suma', 'kijo', 'kijo', '', '', '', '', '', '', '', '2016', 'lecturer'),
('160221028692', 'Ambokile', 'Kifukwe', 'Kifukwe', 'kifukwe', '33c4ff4a5b45c59248a7535de46109d7', 'Male', '+255-798-797987', 'kifukwe@gmail.com', 'Tanzanian', 'Single', '2016', 'admission officer'),
('160221610417', 'simbila', 'kwiyega', 'kwiyega', 'simbila', '33c4ff4a5b45c59248a7535de46109d7', 'Male', '+255-872-236711', 'simbila@gmail.com', 'Tanzanian', 'Single', '2016', 'lecturer'),
('160245397715', 'Omary', 'Kipimo', 'Kipimo', 'omary', '33c4ff4a5b45c59248a7535de46109d7', 'Male', '+255-787-879879', 'kipimo@gmail.com', 'Tanzanian', 'Single', '2016', 'examination officer'),
('160281425034', 'daniel', 'kijo', 'kijo', 'daniel', '33c4ff4a5b45c59248a7535de46109d7', 'Male', '+255-979-879797', 'daniel2@gmail.com', 'Tanzanian', 'Single', '2016', 'lecturer'),
('160287869518', 'ahmed', 'juma', 'juma', '', '', '', '', '', '', '', '2016', 'admission officer'),
('160290529238', 'kanjoli', 'narimo', 'mkombi', '', '', '', '', '', '', '', '2016', 'Storekeeper'),
('218723457123', 'Julius', 'Lema', 'Mungaya', 'lema', '33c4ff4a5b45c59248a7535de46109d7', 'Male', '+255-555-555555', 'mungaya-julius@gmail.com', 'Tanzanian', 'Single', '2016', 'Storekeeper'),
('237487234575', 'John', 'Maziku', 'Ngurumo', 'elihuruma', '33c4ff4a5b45c59248a7535de46109d7', 'Male', '+255-454-545454', 'Julius@gmail.com', 'Tanzanian', 'Single', '2016', 'Librarian'),
('902364457903', 'Caross', 'Koki', 'Samson', 'caros', '33c4ff4a5b45c59248a7535de46109d7', 'Male', '+255-555-555555', 'mungaya44julius@gmail.com', 'Tanzanian', 'Single', '2016', 'Busar');

CREATE TABLE IF NOT EXISTS `student` (
  `reg_no` varchar(20) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `mname` varchar(45) DEFAULT NULL,
  `sname` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `marital_status` varchar(45) DEFAULT NULL,
  `nationality` varchar(45) DEFAULT NULL,
  `birth_country` varchar(45) DEFAULT NULL,
  `birth_date` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `phone_no` varchar(15) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `home_place` varchar(100) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `programme` varchar(50) DEFAULT NULL,
  `starting_year` varchar(10) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `student` (`reg_no`, `fname`, `mname`, `sname`, `gender`, `marital_status`, `nationality`, `birth_country`, `birth_date`, `password`, `phone_no`, `email_address`, `home_place`, `course`, `programme`, `starting_year`, `year`, `semester`) VALUES
('160210184934', 'elizabeth', 'kaijage', 'elfasi', 'Female', 'Single', 'Tanzanian', 'Tanzania', '13/12/2031', '33c4ff4a5b45c59248a7535de46109d7', '+255-654-645645', 'eliza@gmail.com', 'mbezi', 'Information Technology', 'Ordinary Diploma', '2016', 'second', 'first'),
('160210633999', 'simon', 'edward', 'sarita', 'Male', 'Single', 'Tanzania', 'Tanzania', '12/07/1990', '33c4ff4a5b45c59248a7535de46109d7', '+089-080-989808', 'simonkijo@gmail.com', 'Mbezi', 'Information Technology', 'Bachelor Degree', '2016', 'first', 'first'),
('160213521986', 'makala', 'julio', 'peter', 'Male', 'Single', 'Tanzanian', 'Tanzania', '23/04/1980', '33c4ff4a5b45c59248a7535de46109d7', '+255-322-132132', 'julio@gmail.com', 'Dar Es Salaam', 'Information Technology', 'Bachelor Degree', '2016', 'first', 'first'),
('160215313685', 'asha', 'rose', 'pemba', 'Female', 'Single', 'Tanzanian', 'Tanzania', '21/02/2013', '33c4ff4a5b45c59248a7535de46109d7', '+255-645-645756', 'asha@gmail.com', 'mbezi', 'Information Technology', 'Bachelor Degree', '2016', 'first', 'first'),
('160215678662', 'willium', 'sarita', 'kiangazi', '', '', '', '', '', '', '', '', '', 'Information Technology', 'Bachelor Degree', '2016', 'first', 'first'),
('160215935798', 'jenyrose', 'albert', 'robert', '', '', '', '', '', '', '', '', '', 'Information Technology', 'Bachelor Degree', '2016', 'first', 'first'),
('160216385534', 'brian', 'masawe', 'masawe', '', '', '', '', '', '', '', '', '', 'Information Technology', 'Bachelor Degree', '2016', 'first', 'first'),
('160216469040', 'hamza', 'esmail', 'vajihee', '', '', '', '', '', '', '', '', '', 'Information Technology', 'Ordinary Diploma', '2016', 'first', 'first'),
('160216799886', 'sebastian', 'justine', 'leonard', '', '', '', '', '', '', '', '', '', 'Information Technology', 'Ordinary Diploma', '2016', 'first', 'first'),
('160217786288', 'ambokile', 'kifukwe', 'kabane', '', '', '', '', '', '', '', '', '', 'Information Technology', 'Bachelor Degree', '2016', 'first', 'first'),
('160217801604', 'simon', 'wilson', 'kijo', '', '', '', '', '', '', '', '', '', 'Information Technology', 'Bachelor Degree', '2016', 'first', 'first'),
('160218894099', 'festo', 'mjogolo', 'joseph', '', '', '', '', '', '', '', '', '', 'Information Technology', 'Bachelor Degree', '2016', 'first', 'first'),
('160220864226', 'otiria', 'sebastian', 'brian', '', '', '', '', '', '', '', '', '', 'Information Technology', 'Bachelor Degree', '2016', 'first', 'first'),
('160225257399', 'anna', 'simumba', 'mwakyusa', '', '', '', '', '', '', '', '', '', 'Information Technology', 'Bachelor Degree', '2016', 'first', 'first'),
('160250853553', 'daniel', 'kijo', 'kijo', '', '', '', '', '', '', '', '', '', 'Information Technology', 'Bachelor Degree', '2016', 'first', 'first'),
('160265630991', 'gretina', 'joseph', 'makwinya', '', '', '', '', '', '', '', '', '', 'Information Technology', 'Ordinary Diploma', '2016', 'first', 'first'),
('160265797424', 'simbila', 'ombeni', 'mramba', '', '', '', '', '', '', '', '', '', 'Information Technology', 'Ordinary Diploma', '2016', 'first', 'first'),
('160283251370', 'charles', 'manase', 'kijo', '', '', '', '', '', '', '', '', '', 'Information Technology', 'Bachelor Degree', '2016', 'first', 'first'),
('160283824583', 'julius', 'mungaya', 'john', '', '', '', '', '', '', '', '', '', 'Information Technology', 'Bachelor Degree', '2016', 'first', 'first');

CREATE TABLE IF NOT EXISTS `time_table` (
  `id_time_table` int(11) NOT NULL,
  `day` varchar(200) DEFAULT NULL,
  `module` varchar(200) DEFAULT NULL,
  `time` varchar(200) DEFAULT NULL,
  `v_title` varchar(200) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `year` varchar(13) DEFAULT NULL,
  `semister` varchar(15) DEFAULT NULL,
  `programme` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `time_table` (`id_time_table`, `day`, `module`, `time`, `v_title`, `course`, `year`, `semister`, `programme`) VALUES
(1, '["Monday","Wednesday","Friday"]', 'database systems', '["8:00-10:30","10:30-13:00","8:00-10:30"]', '["D1","D2","D3"]', 'Information Technology', 'first', 'first', 'Bachelor Degree'),
(2, '["Monday","Tuesday","Thursday"]', 'embedded systems', '["10:30-12:10","8:00-10:30","8:00-10:30"]', '["T1","T2","T4"]', 'Information Technology', 'first', 'first', 'Bachelor Degree'),
(3, '["Tuesday","Wednesday","Friday"]', 'user interface design', '["10:30-13:00","8:00-10:30","10:30-13:00"]', '["T1","C1","B4"]', 'Information Technology', 'first', 'first', 'Bachelor Degree');

CREATE TABLE IF NOT EXISTS `traffic_engineering` (
  `traffic_engineering_reg_no` varchar(12) NOT NULL,
  `traffic_engineering_ca` int(2) DEFAULT NULL,
  `traffic_engineering_fe` int(2) DEFAULT NULL,
  `traffic_engineering_total` int(3) DEFAULT NULL,
  `traffic_engineering_grade` varchar(2) DEFAULT NULL,
  `traffic_engineering_grade_point_x_credit` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `traffic_engineering` (`traffic_engineering_reg_no`, `traffic_engineering_ca`, `traffic_engineering_fe`, `traffic_engineering_total`, `traffic_engineering_grade`, `traffic_engineering_grade_point_x_credit`) VALUES
('160210184934', 23, 30, 53, 'C', 20);

CREATE TABLE IF NOT EXISTS `user_interface_design` (
  `user_interface_design_reg_no` varchar(12) NOT NULL,
  `user_interface_design_ca` int(2) DEFAULT NULL,
  `user_interface_design_fe` int(2) DEFAULT NULL,
  `user_interface_design_total` int(3) DEFAULT NULL,
  `user_interface_design_grade` varchar(2) DEFAULT NULL,
  `user_interface_design_grade_point_x_credit` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_interface_design` (`user_interface_design_reg_no`, `user_interface_design_ca`, `user_interface_design_fe`, `user_interface_design_total`, `user_interface_design_grade`, `user_interface_design_grade_point_x_credit`) VALUES
('160210633999', 13, 45, 58, 'B', 27),
('160213521986', 23, 55, 78, 'A', 45),
('160215313685', 34, 34, 68, 'B+', 36),
('160250853553', 25, 40, 65, 'B+', 36),
('160283824583', 34, 45, 79, 'A', 45);

CREATE TABLE IF NOT EXISTS `venue` (
  `id_venue` int(11) NOT NULL,
  `v_title` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

INSERT INTO `venue` (`id_venue`, `v_title`) VALUES
(1, 'D1'),
(2, 'D2'),
(3, 'D3'),
(4, 'T1'),
(5, 'T2'),
(6, 'T3'),
(7, 'T4'),
(8, 'T5'),
(9, 'T6'),
(10, 'C1'),
(11, 'C2'),
(12, 'B1'),
(13, 'B2'),
(14, 'B3'),
(15, 'B4'),
(16, 'B5'),
(17, 'B6'),
(18, 'B7'),
(19, 'B8'),
(20, 'B9'),
(21, 'B10'),
(22, 'B11'),
(23, 'B12'),
(24, 'B13'),
(25, 'B14'),
(26, 'B15'),
(27, 'A1'),
(28, 'A2'),
(29, 'A3'),
(30, 'A4'),
(31, 'A5'),
(32, 'A6'),
(33, 'A7'),
(34, 'A8'),
(35, 'A9'),
(36, 'A10'),
(37, 'A11'),
(38, 'W14'),
(39, 'W15'),
(40, 'W1F'),
(41, 'W2F'),
(42, 'W3F'),
(43, 'W4F'),
(44, 'Q1'),
(45, 'W9'),
(46, 'C3'),
(47, 'C4'),
(48, 'C5'),
(49, 'C6'),
(50, 'C1F'),
(51, 'C2F'),
(52, 'C3F');

CREATE TABLE IF NOT EXISTS `word_processing` (
  `word_processing_reg_no` varchar(12) NOT NULL,
  `word_processing_ca` int(2) DEFAULT NULL,
  `word_processing_fe` int(2) DEFAULT NULL,
  `word_processing_total` int(3) DEFAULT NULL,
  `word_processing_grade` varchar(2) DEFAULT NULL,
  `word_processing_grade_point_x_credit` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `word_processing` (`word_processing_reg_no`, `word_processing_ca`, `word_processing_fe`, `word_processing_total`, `word_processing_grade`, `word_processing_grade_point_x_credit`) VALUES
('160210184934', 13, 45, 58, 'B', 27);


ALTER TABLE `academic_info`
  ADD PRIMARY KEY (`index_no_olevel`);

ALTER TABLE `admin`
  ADD PRIMARY KEY (`email_address`);

ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`account_no`);

ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `borrow`
  ADD PRIMARY KEY (`_id`);

ALTER TABLE `calculus`
  ADD PRIMARY KEY (`calculus_reg_no`);

ALTER TABLE `check_module`
  ADD PRIMARY KEY (`id_m`);

ALTER TABLE `communication_systems`
  ADD PRIMARY KEY (`communication_systems_reg_no`);

ALTER TABLE `computer_aided_systems`
  ADD PRIMARY KEY (`computer_aided_systems_reg_no`);

ALTER TABLE `course`
  ADD PRIMARY KEY (`id_course`);

ALTER TABLE `database_systems`
  ADD PRIMARY KEY (`database_systems_reg_no`);

ALTER TABLE `data_sheet`
  ADD PRIMARY KEY (`data_sheet_reg_no`);

ALTER TABLE `degree_payment`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `diplom_payment`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `embedded_systems`
  ADD PRIMARY KEY (`embedded_systems_reg_no`);

ALTER TABLE `fiber_engineering`
  ADD PRIMARY KEY (`fiber_engineering_reg_no`);

ALTER TABLE `financial_record`
  ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `for_report`
  ADD PRIMARY KEY (`id_r`);

ALTER TABLE `gpa`
  ADD PRIMARY KEY (`id_gpa`);

ALTER TABLE `gpa_class`
  ADD PRIMARY KEY (`id_gpa_class`);

ALTER TABLE `grade_summary`
  ADD PRIMARY KEY (`id_g`);

ALTER TABLE `health_insurance`
  ADD PRIMARY KEY (`membership_no`);

ALTER TABLE `lecturer_role`
  ADD PRIMARY KEY (`lec_no`);

ALTER TABLE `modules`
  ADD PRIMARY KEY (`id_module`);

ALTER TABLE `module_assignment`
  ADD PRIMARY KEY (`lec_no`);

ALTER TABLE `parent`
  ADD PRIMARY KEY (`email_p`);

ALTER TABLE `petroleum_systems`
  ADD PRIMARY KEY (`petroleum_systems_reg_no`);

ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`reg_no`);

ALTER TABLE `staff`
  ADD PRIMARY KEY (`lec_no`);

ALTER TABLE `student`
  ADD PRIMARY KEY (`reg_no`);

ALTER TABLE `time_table`
  ADD PRIMARY KEY (`id_time_table`);

ALTER TABLE `traffic_engineering`
  ADD PRIMARY KEY (`traffic_engineering_reg_no`);

ALTER TABLE `user_interface_design`
  ADD PRIMARY KEY (`user_interface_design_reg_no`);

ALTER TABLE `venue`
  ADD PRIMARY KEY (`id_venue`);

ALTER TABLE `word_processing`
  ADD PRIMARY KEY (`word_processing_reg_no`);


ALTER TABLE `borrow`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
ALTER TABLE `check_module`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `course`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
ALTER TABLE `degree_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
ALTER TABLE `diplom_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
ALTER TABLE `for_report`
  MODIFY `id_r` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
ALTER TABLE `gpa`
  MODIFY `id_gpa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
ALTER TABLE `gpa_class`
  MODIFY `id_gpa_class` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
ALTER TABLE `grade_summary`
  MODIFY `id_g` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
ALTER TABLE `modules`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
ALTER TABLE `time_table`
  MODIFY `id_time_table` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
ALTER TABLE `venue`
  MODIFY `id_venue` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
