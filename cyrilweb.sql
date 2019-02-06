-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 06, 2019 at 05:10 PM
-- Server version: 8.0.12
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cyrilweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouttb`
--

CREATE TABLE `abouttb` (
  `about_id` int(11) NOT NULL,
  `about_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abouttb`
--

INSERT INTO `abouttb` (`about_id`, `about_message`) VALUES
(1, '<h3>Background and History</h3>\r\n\r\n<p>Founded in 2009, the Unity Chorale Nigeria (UCN) is a community-based auditioned choir that provides serious singers with opportunities to seek excellence in a variety of choral literature and styles. Under the direction of Eld. Joshua Umahi&mdash;UCN&rsquo;s artistic director and conductor&mdash;the ensemble continues to find unique ways to share its music with the community, to encourage the musical development of local youths, and to foster cooperation with other fine arts organizations in Nigeria and beyond.</p>\r\n\r\n<p>The ensemble serves residents of Greater Nigerians of various ages and musical tastes. The 30- to 40-member choir consists of auditioned adult singers of various ages, backgrounds and occupations. As part of its mission of promoting excellence in performance, UCN regularly performs for and with younger singers from Babcock University. The choir typically performs two to three concerts each year for the general public. During its history the choir has sought to collaborate with other choirs and to provide choral support at significant community events.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `adminlogintb`
--

CREATE TABLE `adminlogintb` (
  `login_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogintb`
--

INSERT INTO `adminlogintb` (`login_id`, `name`, `username`, `password`, `role`) VALUES
(1, 'Kparou Cyril', 'admin@cyrilweb.dev', 'e38ad214943daad1d64c102faec29de4afe9da3d', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bannertb`
--

CREATE TABLE `bannertb` (
  `banner_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `banner_info` text NOT NULL,
  `image_path` text NOT NULL,
  `image_thumb_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bannertb`
--

INSERT INTO `bannertb` (`banner_id`, `title`, `banner_info`, `image_path`, `image_thumb_path`) VALUES
(1, 'Unity Chorale in Ghana', '<p>Unity Chorale with the Nigerian Ambassador to Ghana, in one of their visit to Ghana for a choral concert.</p>', './assets/dist_web/images/banner/1.JPG', './assets/dist_web/images/banner/1_thumb.JPG'),
(2, 'The Ambassador\'s Office', '<p>Members of Unity Chorale relaxing at the Nigerian Ambassador to Ghana&#39;s office.</p>', './assets/dist_web/images/banner/2.JPG', './assets/dist_web/images/banner/2_thumb.JPG'),
(3, 'At Kessington\'s birthday', '<p>Unity Chorale at 70th birthday of an indigenous member of Ilisan Community - Kessington</p>', './assets/dist_web/images/banner/3.JPG', './assets/dist_web/images/banner/3_thumb.JPG'),
(4, 'Feast of Light', '<p>Unity Chorale&#39;s Feast of Light - It was an inspiring moment.</p>', './assets/dist_web/images/banner/4.jpg', './assets/dist_web/images/banner/4_thumb.jpg'),
(5, 'Orele Night', '<p>Unity Chorale&#39;s organized Afro-cultural concert tagged Orele.</p>', './assets/dist_web/images/banner/5.jpg', './assets/dist_web/images/banner/5_thumb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contactstb`
--

CREATE TABLE `contactstb` (
  `contact_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `status` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactstb`
--

INSERT INTO `contactstb` (`contact_id`, `date`, `name`, `email`, `subject`, `message`, `status`) VALUES
(1, '2017-06-30 10:22:57', 'Agu Ekeoma', 'emanixworld@gmail.com', 'How can i join the group', 'Dear sir/ma,\r\n\r\nPlease i\'ll like to become a member of this wonderful group. Am passionate at music and building my music knowledge. Kindly guide me on how to join the group.', '1'),
(2, '2017-06-30 10:22:57', 'Adesegun Oluwambo', 'olu@yahoo.com', 'Wants to join your group', 'Sir, i am interested in joining unity chorale. Kindly tell me steps to follow in other to be a member. thanks', '0'),
(5, '2017-06-30 10:22:57', 'Agu Precious', 'prezybabe@gmail.com', 'lkjgkljaklgjlakjgl;aksjgk;lasjk;sa', 'lkgadkljgsflakjflksajfg;lakvj.m,nvlkasjfg;lsakfl;askglksahgkjasjfg.sajfopsajg,sfmabgfjksabvm,s vjklashflksanfmkslajfs\r\nsdfnjadsjkfjadslk;fksadl;fksaklgfhsakljfm,s.agfkshgm,sfangjakslfjksalkf;lasf', '0'),
(6, '2017-06-30 11:16:32', 'Ebenezer Oyenuga', 'ebene.oyen@yahoo.com', 'I need one of you songs', 'Dear sir, I am the choir master of Ilisan No 1 church choir, i heard your group perform the song \"Messiah Baba mi\" and will like to get a copy of the sheet. Kindly afford me this privilege as i will like my choir to learn the song. Thanks and God bless you. Yours in God\'s service.', '0'),
(7, '2017-07-02 21:32:46', 'Agu Precious', 'prezybabe@gmail.com', 'How can i join the group', 'fgsdfggfj,nknm,vccvj,n,.', '0');

-- --------------------------------------------------------

--
-- Table structure for table `eventstb`
--

CREATE TABLE `eventstb` (
  `eventid` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallerytb`
--

CREATE TABLE `gallerytb` (
  `gallery_id` int(11) NOT NULL,
  `image_description` text NOT NULL,
  `image_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallerytb`
--

INSERT INTO `gallerytb` (`gallery_id`, `image_description`, `image_path`) VALUES
(1, 'About to sing at the group\'s Chairman 50th birthday. The event took place at Aba, Abia State Nigeria.', './assets/dist_web/images/gallery/1.JPG'),
(2, 'Meet the groups chairman, Prof James Ogunji.', './assets/dist_web/images/gallery/2.JPG'),
(3, 'Unity Chorale visited Ghana for a musical retreat/concert. Members pose for picture in front of the Seventh-Day Adventist Church, Kumasi Ghana', './assets/dist_web/images/gallery/3.JPG'),
(5, 'Members of Unity Chorale enjoying the cool of the Ghanian evening.', './assets/dist_web/images/gallery/5.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `hometb`
--

CREATE TABLE `hometb` (
  `homeid` int(11) NOT NULL,
  `home_message` text NOT NULL,
  `home_event_pics` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hometb`
--

INSERT INTO `hometb` (`homeid`, `home_message`, `home_event_pics`) VALUES
(1, '<p><big>The International Institute of Translation and Allied Services (IITAS) is the fastest quality and trusted language service, delivering Certified Language Services in English and French.</big></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><big><strong>We provide a wide range of Certified Language Services, which include:</strong></big></p>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `ourconnecttb`
--

CREATE TABLE `ourconnecttb` (
  `conn_id` int(11) NOT NULL,
  `phone1` varchar(20) NOT NULL,
  `phone2` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `googleplus` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ourconnecttb`
--

INSERT INTO `ourconnecttb` (`conn_id`, `phone1`, `phone2`, `email`, `facebook`, `instagram`, `googleplus`, `twitter`) VALUES
(1, '+234 814 251 8568', '+234 816 537 0272', 'info@iitas.org', 'https://www.facebook.com/', 'ggdsfgdfsg', 'https://plus.google.com/+EkeomaAgu', 'sgbvdfgdfsg');

-- --------------------------------------------------------

--
-- Table structure for table `pricetb`
--

CREATE TABLE `pricetb` (
  `prid` int(5) NOT NULL,
  `stid` int(5) NOT NULL,
  `naira_amount` text,
  `dollar_amount` text,
  `cfa_amount` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pricetb`
--

INSERT INTO `pricetb` (`prid`, `stid`, `naira_amount`, `dollar_amount`, `cfa_amount`) VALUES
(1, 2, '20000', NULL, NULL),
(2, 2, NULL, NULL, '30000'),
(3, 3, '30000', NULL, NULL),
(4, 3, NULL, NULL, '45000'),
(5, 2, NULL, '120', NULL),
(6, 3, NULL, '160', NULL),
(7, 4, '35000', NULL, NULL),
(8, 4, NULL, NULL, '50000'),
(9, 4, NULL, '180', NULL),
(10, 5, '40000', NULL, NULL),
(11, 5, NULL, NULL, '60000'),
(12, 5, NULL, '210', NULL),
(14, 6, '10000', NULL, NULL),
(15, 6, NULL, NULL, '15000'),
(16, 6, NULL, '60', NULL),
(17, 7, '15000', NULL, NULL),
(18, 7, NULL, NULL, '25000'),
(19, 7, NULL, '80', NULL),
(20, 8, '20000', NULL, NULL),
(21, 8, NULL, NULL, '30000'),
(22, 8, NULL, '90', NULL),
(23, 9, '25000', NULL, NULL),
(24, 9, NULL, NULL, '35000'),
(25, 9, NULL, '100', NULL),
(26, 10, '5000', NULL, NULL),
(27, 10, NULL, NULL, '8000'),
(28, 10, NULL, '30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `repertoiretb`
--

CREATE TABLE `repertoiretb` (
  `song_id` int(11) NOT NULL,
  `song_title` text NOT NULL,
  `genre` varchar(100) NOT NULL,
  `file_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repertoiretb`
--

INSERT INTO `repertoiretb` (`song_id`, `song_title`, `genre`, `file_path`) VALUES
(2, 'Come, come ye saints', 'Gospel', './assets/dist_web/repertoire/2.pdf'),
(3, 'God is Love', 'Gospel', './assets/dist_web/repertoire/3.pdf'),
(4, 'Amen', 'Gospel', './assets/dist_web/repertoire/4.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `rhservicetb`
--

CREATE TABLE `rhservicetb` (
  `rhid` int(5) NOT NULL,
  `stid` int(5) NOT NULL,
  `servicetype` text,
  `rhdescription` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servicestb`
--

CREATE TABLE `servicestb` (
  `service_id` int(11) NOT NULL,
  `service_head` text NOT NULL,
  `service` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicestb`
--

INSERT INTO `servicestb` (`service_id`, `service_head`, `service`) VALUES
(2, 'Translation Services', '<p>At International Institute of Translation and Allied Services (IITAS), we provide translation services such as Translation with Court Certification Stamp, Global Translation Certification Stamp, or both).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Our Certified Translations Services covers:</strong></p>\r\n\r\n<ul>\r\n	<li>Diploma/Transcripts</li>\r\n	<li>Birth/Marriage Certificates</li>\r\n	<li>Court records</li>\r\n	<li>Bank Statements</li>\r\n	<li>Any Official Document</li>\r\n	<li>Contracts/Agreemets</li>\r\n	<li>Drivers Licence</li>\r\n	<li>Medical records</li>\r\n	<li>Travel Document Translation</li>\r\n	<li>Passport Translation</li>\r\n</ul>\r\n'),
(3, 'Credential Evaluation Services', '<p>We offer Credential Evaluation services from and to francophone and English speaking countries and organizations, to allow easier exchange of services, academic credits, employee records and migration.</p>\r\n\r\n<p>Our evaluation services covers both <strong>Course-by-Course</strong> and <strong>Document-by-Document</strong> evaluations depending on your service need. We also provide <strong>rush hour</strong> services for clients in need of urgent service attention.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(4, 'Translation Certification Training Services', '<p>Translation Certification School (Certified Professional Translator Designation, CPT) is designed to train and certify potential translators in order to boost their career, as well as provide career opportunities for potential upcoming language translators.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `servicetypetb`
--

CREATE TABLE `servicetypetb` (
  `stid` int(5) NOT NULL,
  `service_id` int(5) NOT NULL,
  `stname` text,
  `stdescription` text,
  `category` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `servicetypetb`
--

INSERT INTO `servicetypetb` (`stid`, `service_id`, `stname`, `stdescription`, `category`) VALUES
(2, 3, 'Course-by-Course Evaluation', 'Apart from providing an authentic report, the course-by-course evaluation gives the equivalence of every course, grade, credit and GPA/CGPA.', 'Standard'),
(3, 3, 'Course-by-Course Rush Evaluation', '3 Days Rush', 'Rush Hour'),
(4, 3, 'Course-by-Course Rush Evaluation', '2 Days Rush', 'Rush Hour'),
(5, 3, 'Course-by-Course Rush Evaluation', '1 Day Rush', 'Rush Hour'),
(6, 3, 'Document-by-Document Evaluation', 'Provides authenticity verification and equivalence of the document', 'Standard'),
(7, 3, 'Document-by-Document Rush Evaluation', '3 Days Rush', 'Rush Hour'),
(8, 3, 'Document-by-Document Rush Evaluation', '2 Days Rush', 'Rush Hour'),
(9, 3, 'Document-by-Document Rush Evaluation', '1 Day Rush', 'Rush Hour'),
(10, 2, 'Document Translation', 'We offer a page by page translation service, and our pricing is calculated per page of the document to be translated.', 'Standard');

-- --------------------------------------------------------

--
-- Table structure for table `signuptb`
--

CREATE TABLE `signuptb` (
  `signup_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(16) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `music_quality` text NOT NULL,
  `part` varchar(45) NOT NULL,
  `musical_skill` text NOT NULL,
  `denomination` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signuptb`
--

INSERT INTO `signuptb` (`signup_id`, `username`, `fname`, `lname`, `email`, `phone`, `gender`, `music_quality`, `part`, `musical_skill`, `denomination`) VALUES
(1, 'eemanix', 'Joshua', 'Umahi', 'felijoe@gmail.com', '07064637363', 'Male', 'Vocalist, Instrumentalist', 'Bass', 'Woodwind Instruments', 'Seventh-Day Adventist');

-- --------------------------------------------------------

--
-- Table structure for table `subscribetb`
--

CREATE TABLE `subscribetb` (
  `subs_id` int(11) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribetb`
--

INSERT INTO `subscribetb` (`subs_id`, `email`) VALUES
(1, 'ebene.oyen@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `teamstb`
--

CREATE TABLE `teamstb` (
  `teamid` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `office` varchar(100) NOT NULL,
  `google` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `image_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teamstb`
--

INSERT INTO `teamstb` (`teamid`, `name`, `office`, `google`, `facebook`, `twitter`, `image_path`) VALUES
(1, 'Umahi Joshua', 'President', '', 'https://www.facebook.com/', '', './assets/dist_web/images/team/1.JPG'),
(2, 'Agu Ekeoma Emmanuel', 'Executive Secretary', 'https://plus.google.com/+EkeomaAgu', 'https://www.facebook.com/emanixworld', '', './assets/dist_web/images/team/2.jpg'),
(3, 'Ukangwa Hope A', 'Treasurer', '', 'https://www.facebook.com/', '', './assets/dist_web/images/team/3.JPG'),
(4, 'Amarachi Dennis', 'Music Director', '', 'https://www.facebook.com/', '', './assets/dist_web/images/team/4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `userstb`
--

CREATE TABLE `userstb` (
  `user_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` varchar(70) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `music_quality` varchar(30) NOT NULL,
  `part` varchar(20) NOT NULL,
  `musical_skill` varchar(100) NOT NULL,
  `denomination` varchar(150) NOT NULL,
  `status` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userstb`
--

INSERT INTO `userstb` (`user_id`, `username`, `password`, `fname`, `lname`, `email`, `phone`, `gender`, `music_quality`, `part`, `musical_skill`, `denomination`, `status`) VALUES
(3, 'ague', 'e38ad214943daad1d64c102faec29de4afe9da3d', 'Ekeoma', 'Agu', 'emanixworld@gmail.com', '07030846612', 'Male', 'Vocalist', 'Tenor', 'String Instruments', 'Seventh-Day Adventist', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouttb`
--
ALTER TABLE `abouttb`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `adminlogintb`
--
ALTER TABLE `adminlogintb`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `bannertb`
--
ALTER TABLE `bannertb`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `contactstb`
--
ALTER TABLE `contactstb`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `eventstb`
--
ALTER TABLE `eventstb`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `gallerytb`
--
ALTER TABLE `gallerytb`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `hometb`
--
ALTER TABLE `hometb`
  ADD PRIMARY KEY (`homeid`);

--
-- Indexes for table `ourconnecttb`
--
ALTER TABLE `ourconnecttb`
  ADD PRIMARY KEY (`conn_id`);

--
-- Indexes for table `pricetb`
--
ALTER TABLE `pricetb`
  ADD PRIMARY KEY (`prid`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `repertoiretb`
--
ALTER TABLE `repertoiretb`
  ADD PRIMARY KEY (`song_id`);

--
-- Indexes for table `rhservicetb`
--
ALTER TABLE `rhservicetb`
  ADD PRIMARY KEY (`rhid`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `servicestb`
--
ALTER TABLE `servicestb`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `servicetypetb`
--
ALTER TABLE `servicetypetb`
  ADD PRIMARY KEY (`stid`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `signuptb`
--
ALTER TABLE `signuptb`
  ADD PRIMARY KEY (`signup_id`);

--
-- Indexes for table `subscribetb`
--
ALTER TABLE `subscribetb`
  ADD PRIMARY KEY (`subs_id`);

--
-- Indexes for table `teamstb`
--
ALTER TABLE `teamstb`
  ADD PRIMARY KEY (`teamid`);

--
-- Indexes for table `userstb`
--
ALTER TABLE `userstb`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouttb`
--
ALTER TABLE `abouttb`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adminlogintb`
--
ALTER TABLE `adminlogintb`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bannertb`
--
ALTER TABLE `bannertb`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contactstb`
--
ALTER TABLE `contactstb`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `eventstb`
--
ALTER TABLE `eventstb`
  MODIFY `eventid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallerytb`
--
ALTER TABLE `gallerytb`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hometb`
--
ALTER TABLE `hometb`
  MODIFY `homeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ourconnecttb`
--
ALTER TABLE `ourconnecttb`
  MODIFY `conn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pricetb`
--
ALTER TABLE `pricetb`
  MODIFY `prid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `repertoiretb`
--
ALTER TABLE `repertoiretb`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rhservicetb`
--
ALTER TABLE `rhservicetb`
  MODIFY `rhid` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicestb`
--
ALTER TABLE `servicestb`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `servicetypetb`
--
ALTER TABLE `servicetypetb`
  MODIFY `stid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `signuptb`
--
ALTER TABLE `signuptb`
  MODIFY `signup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribetb`
--
ALTER TABLE `subscribetb`
  MODIFY `subs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teamstb`
--
ALTER TABLE `teamstb`
  MODIFY `teamid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userstb`
--
ALTER TABLE `userstb`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pricetb`
--
ALTER TABLE `pricetb`
  ADD CONSTRAINT `pricetb_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `servicetypetb` (`stid`);

--
-- Constraints for table `rhservicetb`
--
ALTER TABLE `rhservicetb`
  ADD CONSTRAINT `rhservicetb_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `servicetypetb` (`stid`);

--
-- Constraints for table `servicetypetb`
--
ALTER TABLE `servicetypetb`
  ADD CONSTRAINT `servicetypetb_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `servicestb` (`service_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
