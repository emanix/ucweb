-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2017 at 10:37 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ucwebdb`
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
(1, 'Agu Ekeoma E', 'secretary@unitychoraleng.org', 'e38ad214943daad1d64c102faec29de4afe9da3d', 'admin');

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
(2, 'The Ambassador''s Office', '<p>Members of Unity Chorale relaxing at the Nigerian Ambassador to Ghana&#39;s office.</p>', './assets/dist_web/images/banner/2.JPG', './assets/dist_web/images/banner/2_thumb.JPG'),
(3, 'At Kessington''s birthday', '<p>Unity Chorale at 70th birthday of an indigenous member of Ilisan Community - Kessington</p>', './assets/dist_web/images/banner/3.JPG', './assets/dist_web/images/banner/3_thumb.JPG'),
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
(1, '2017-06-30 10:22:57', 'Agu Ekeoma', 'emanixworld@gmail.com', 'How can i join the group', 'Dear sir/ma,\r\n\r\nPlease i''ll like to become a member of this wonderful group. Am passionate at music and building my music knowledge. Kindly guide me on how to join the group.', '1'),
(2, '2017-06-30 10:22:57', 'Adesegun Oluwambo', 'olu@yahoo.com', 'Wants to join your group', 'Sir, i am interested in joining unity chorale. Kindly tell me steps to follow in other to be a member. thanks', '0'),
(5, '2017-06-30 10:22:57', 'Agu Precious', 'prezybabe@gmail.com', 'lkjgkljaklgjlakjgl;aksjgk;lasjk;sa', 'lkgadkljgsflakjflksajfg;lakvj.m,nvlkasjfg;lsakfl;askglksahgkjasjfg.sajfopsajg,sfmabgfjksabvm,s vjklashflksanfmkslajfs\r\nsdfnjadsjkfjadslk;fksadl;fksaklgfhsakljfm,s.agfkshgm,sfangjakslfjksalkf;lasf', '0'),
(6, '2017-06-30 11:16:32', 'Ebenezer Oyenuga', 'ebene.oyen@yahoo.com', 'I need one of you songs', 'Dear sir, I am the choir master of Ilisan No 1 church choir, i heard your group perform the song "Messiah Baba mi" and will like to get a copy of the sheet. Kindly afford me this privilege as i will like my choir to learn the song. Thanks and God bless you. Yours in God''s service.', '0'),
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

--
-- Dumping data for table `eventstb`
--

INSERT INTO `eventstb` (`eventid`, `event_date`, `event_info`) VALUES
(1, '2017-08-20', 'Performance at a wedding at Pioneer SDA Church Babcock University.'),
(3, '2017-08-27', 'Performance at a wedding at Pioneer SDA Church Babcock University. A UC member gets married.');

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
(1, 'About to sing at the group''s Chairman 50th birthday. The event took place at Aba, Abia State Nigeria.', './assets/dist_web/images/gallery/1.JPG'),
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
(1, '<p><strong>Unity Chorale Nigeria</strong> is a professional vocal ensemble based in South-Western Nigeria, in the Western sub-region of the lustrous black continent of Africa. The Chorale founded in 2009, features classical, art, traditional and contemporary Afro-cultural, Afro-American and Trans-African musical pieces sizzled with unrivaled vocal excellence and dynamism that has never failed to &ldquo;wow!&rdquo; our audiences the world over.</p>\r\n\r\n<p>Although Chorale membership spans various other professional career endeavors, that which stands uniquely paramount remains a propelling quest for vocal and musical excellence that is second to none. With numerous achievements and laurels in the wake of our almost &ldquo;half-decade&rdquo; sojourn, we remain ever humbled by the knowledge of a Creator who gave all that fallen humanity might live. We are grateful for the sacrifice He made for our sins; and mindful for the life He has offered us to be fashioned after His similitude &ndash; the praises of whom remains the theme of our noble song.</p>\r\n\r\n<p>Chorale membership currently stands at 50. However, applications for membership are welcome at any time of the year. Prospective members would however be required to successfully complete a multi-phased audition process in a location and venue of the Chorale&rsquo;s choosing.</p>\r\n\r\n<p>Various charity and hospitality interests delight the Chorale because we believe greatly in networking to meet the needs of our ailing society. We thus invite you to be part of our network of friends, associates and contemporaries, of which reading this message expresses an appreciated first step.</p>\r\n\r\n<p>Welcome to our web space and feel free to contact us for bookings, partnerships and donations. We look forward to performing or ministering at any of your upcoming worship or social events.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '');

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
(1, '+234 706 463 7363', '+234 703 084 6612', 'info@unitychoraleng.org', 'https://www.facebook.com/', 'ggdsfgdfsg', 'https://plus.google.com/+EkeomaAgu', 'sgbvdfgdfsg');

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
(2, 'Sounds of the Season', 'This is a yearly event brought to our immediate community. This holds every Christmas. The blend of African and Western Christmas compositions.'),
(3, 'Community Impact', 'Certain programs are performed to impact and add value to the environment we find ourselves. These programs includes Music seminars organized to help train Choir Directors of Church Choirs, Music Ministers and training to Primary School, Community Services e.t.c'),
(4, 'Concerts', 'A variety of concerts both small scale and large scale are held to thrill different level of people. These concerts includes Afri-Cultural concert, Hymns for Him, Negro Spiritual concert.');

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
-- Indexes for table `repertoiretb`
--
ALTER TABLE `repertoiretb`
  ADD PRIMARY KEY (`song_id`);

--
-- Indexes for table `servicestb`
--
ALTER TABLE `servicestb`
  ADD PRIMARY KEY (`service_id`);

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
-- AUTO_INCREMENT for table `repertoiretb`
--
ALTER TABLE `repertoiretb`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `servicestb`
--
ALTER TABLE `servicestb`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
