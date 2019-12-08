-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 23 jan. 2019 à 16:33
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bigtree`
--

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `faq_text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`id`, `faq_text`) VALUES
(11, '<p>1.What is a smart home?<br />\r\nA smart home is a home outfitted with devices that can be controlled over an internet connection on the desktop, tablet, or smartphone. These connected devices can be appliances, lights, security systems, cameras, audio and video systems, televisions, thermostats, and even sprinklers. Generally speaking, if your home has devices that connect to each other and to a network, it is a smart home. The complexity of smart systems may differ somewhat from home to home,'),
(12, '<p><br />\r\n2.What is a smart thermostat?<br />\r\nA smart thermostat is responsible for controlling your home temperature. As with many smart devices, smart thermostats connect to your home network, giving you remote access and control over all the devices functions.</p>\r\n'),
(13, '<p>3.&nbsp;What are the benefits of home automation?<br />\r\nThe benefits of home automation typically fall into a few categories, including savings, safety, convenience, and control. Additionally, some consumers purchase home automation for comfort and peace of mind.</p>\r\n'),
(14, '<p>2.What is a smart thermostat?<br />\r\nA smart thermostat is responsible for controlling your home temperature. As with many smart devices, smart thermostats connect to your home network, giving you remote access and control over all the devices functions.</p>\r\n\r\n<p>3.What are the benefits of home automation?<br />\r\nThe benefits of home automation typically fall into a few categories, including savings, safety, convenience, and control. Additionally, some consumers purchase home automation for '),
(15, '<p>4.Are smart homes affordable?<br />\r\nSmart homes are affordable as long as you set a budget before venturing into the world of home automation. As a general rule, the home automation cost for a simpler setup will be substantially less than a complex setup. Not all smart homes are the same. Some include automation for nearly every electronic device, while others focus on addressing the basics. Neither way is necessarily better.</p>\r\n'),
(16, '<p>&nbsp;</p>\r\n\r\n<p>4.Are smart homes affordable?<br />\r\nSmart homes are affordable as long as you set a budget before venturing into the world of home automation. As a general rule, the home automation cost for a simpler setup will be substantially less than a complex setup. Not all smart homes are the same. Some include automation for nearly every electronic device, while others focus on addressing the basics. Neither way is necessarily better.</p>\r\n'),
(17, '<p>3.What are the benefits of home automation?<br />\r\nThe benefits of home automation typically fall into a few categories, including savings, safety, convenience, and control. Additionally, some consumers purchase home automation for comfort and peace of mind.</p>\r\n'),
(18, '<p>ewm.fnew</p>\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `homes`
--

CREATE TABLE `homes` (
  `home_id` int(25) NOT NULL,
  `home_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `user_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Déchargement des données de la table `homes`
--

INSERT INTO `homes` (`home_id`, `home_name`, `address`, `user_id`) VALUES
(17, 'Dream', 'PARIS', 23);

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(25) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `room_type` varchar(25) NOT NULL,
  `home_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Déchargement des données de la table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_name`, `room_type`, `home_id`) VALUES
(204, 'Kitchen', 'cooking', 17),
(234, 'Store room', 'others', 17),
(235, 'Store room', 'others', 17),
(236, 'Store room', 'others', 17),
(237, 'Store room', 'others', 17),
(238, 'Store room', 'others', 17),
(239, 'Store room', 'others', 17),
(240, 'Store room', 'others', 17),
(241, 'Store room', 'others', 17),
(242, 'Store room', 'others', 17);

-- --------------------------------------------------------

--
-- Structure de la table `sensors`
--

CREATE TABLE `sensors` (
  `sensor_id` int(25) NOT NULL,
  `sensor_name` varchar(50) NOT NULL,
  `sensor_type` varchar(25) NOT NULL,
  `room_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Déchargement des données de la table `sensors`
--

INSERT INTO `sensors` (`sensor_id`, `sensor_name`, `sensor_type`, `room_id`) VALUES
(8, 'light', 'sdf', 204);

-- --------------------------------------------------------

--
-- Structure de la table `terms`
--

CREATE TABLE `terms` (
  `id` int(100) NOT NULL,
  `terms_text` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `terms`
--

INSERT INTO `terms` (`id`, `terms_text`) VALUES
(1, 'These Website Standard Terms And Conditions (these â€œTermsâ€ or these â€œWebsite Standard Terms And Conditionsâ€) contained herein on this webpage, shall govern your use of this website, including all pages within this website (collectively referred to herein below as this â€œWebsiteâ€). These Terms apply in full force and effect to your use of this Website and by using this Website, you expressly accept all terms and conditions contained herein in full. You must not use this Website, if you have any objection to any of these Website Standard Terms And Conditions.\r\n\r\nThis Website is not for use by any minors (defined as those who are not at least 18 years of age), and you must not use this Website if you a minor.'),
(2, '1. Intellectual Property Rights.\r\n\r\nOther than content you own, which you may have opted to include on this Website, under these Terms, [COMPANY NAME] and/or its licensors own all rights to the intellectual property and material contained in this Website, and all such rights are reserved.'),
(3, 'You are granted a limited license only, subject to the restrictions provided in these Terms, for purposes of viewing the material contained on this Website'),
(4, '2. Restrictions.\r\n\r\nYou are expressly and emphatically restricted from all of the following:\r\n\r\npublishing any Website material in any media;\r\n\r\nselling, sublicensing and/or otherwise commercializing any Website material;\r\n\r\npublicly performing and/or showing any Website material;\r\n\r\nusing this Website in any way that is, or may be, damaging to this Website;\r\n\r\nusing this Website in any way that impacts user access to this Website;\r\n\r\nusing this Website contrary to applicable laws and regulations, or in a way that causes, or may cause, harm to the Website, or to any person or business entity;\r\n\r\nengaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website, or while using this Website;\r\n\r\nusing this Website to engage in any advertising or marketing;\r\n\r\nCertain areas of this Website are restricted from access by you and [COMPANY NAME] may further restrict access by you to any areas of this Website, at any time, in its sole and absolute discretion.  Any user ID and password you may have for this Website are confidential and you must maintain confidentiality of such information.'),
(5, '3.Your Content.\r\n\r\nIn these Website Standard Terms And Conditions, â€œYour Contentâ€ shall mean any audio, video, text, images or other material you choose to display on this Website. With respect to Your Content, by displaying it, you grant [COMPANY NAME] a non-exclusive, worldwide, irrevocable, royalty-free, sublicensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.\r\n\r\nYour Content must be your own and must not be infringing on any third partyâ€™s rights. [COMPANY NAME] reserves the right to remove any of Your Content from this Website at any time, and for any reason, without notice.'),
(11, '4. No warranties.\r\n\r\nThis Website is provided â€œas is,â€ with all faults, and [COMPANY NAME] makes no express or implied representations or warranties, of any kind related to this Website or the materials contained on this Website. Additionally, nothing contained on this Website shall be construed as providing consult or advice to you.'),
(13, '<p>shduvcsdfwdsklgnvsdklv</p>\r\n'),
(14, '<p>ufuuffujgigiguyygk</p>\r\n'),
(15, ''),
(16, '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `type`) VALUES
(2, 'Nik', 'Jonas', 'Nick@gmail.com', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'User'),
(5, 'Rajesh', 'Sun', 'raj@gmail.com', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'User'),
(6, 'Tom ', 'Hanks', 'tom.hanks@hotmail.com', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'User'),
(9, 'Leo', 'Messi', 'leo.messi@yahoo.com', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'User'),
(10, 'Ricky', 'Ponting', 'ponting@12345.com', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'User'),
(12, 'yevs', 'Blaise', 'blaise@gmail.com', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'User'),
(15, 'Junyi', 'zhong', 'junyi@gmail.com', '$2y$10$LkfE2TA8DTQPQLcDxjzDKuKNLlYGktNRuIqsEc98sOClPe9iVSjPa', 'Admin'),
(16, 'Mic', 'Jagger', 'mic.jagger@gmail.com', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'Admin'),
(17, 'Peter', 'Parker', 'peter@yahoo.com', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'User'),
(18, 'Nikhil', 'Bhatti', 'niks@gmail.com', '$2y$10$Wubzd0uGpj4J/bEQG4ZQPuxSjOWZ/aUi6jzFxZaNU8l9nomVpbe6G', 'User'),
(19, 'Maria', 'Sharapova', 'maria@gmail.com', '$2y$10$4ue11nHGS5LMzoT1gtvbU.kFNfUDtui7GysyL0ziLthUH7Fy0tuX2', 'User'),
(20, 'Saurav', 'Ganguly', 'saurav.ganguly@hotmail.com', '$2y$10$mYmF.j6r4.1wcjCU.lOyheZpp0df.cpVG71HcRemoTUkDOgcPUeJC', 'User'),
(21, 'Tim ', 'Paine', 'tim.paine@gmail.com', '$2y$10$rowIl1kfIZfh8Che/Jzl4.wFiFvzBBOOvoo7Gbc9tFnvGrQyzAuiu', 'User'),
(22, 'Shane', 'Warne', 'shane@gmail.com', '$2y$10$ab8TSmcwYUo7Tu2Ys7ZpKOjhdaUbusTqKkyUR7KkMwtBrojFecpjO', 'User'),
(24, 'Jack ', 'Ma', 'ma@gmail.com', '$2y$10$q.Oan.BT8EcHxODtI0rC8uiwydETo5W3qByrS6wPADVC30HN5YQSW', 'Admin'),
(25, 'user', 'users', 'user@hotmail.com', '$2y$10$3BKN0ahlw7ece1a4tpDAqOBVin4i0xqpRLIyh28Lqo/kfAjk5mAya', 'User'),
(27, 'piyush', 'kumar', 'piyush@gmail.com', '$2y$10$Z8300B62vYy85t0qInfXdObxurkbYS6cvu6KyqCq6udYYthliiTza', 'User'),
(28, 'Ashish', 'Tiwari', 'ash@gmail.com', '$2y$10$5pJZpO9.aVRvhI3kpJfp1e1KYp7Bw6Xdu8b.3LBM1iTWrM19IDRmK', ''),
(29, 'Mohit', 'kaniyal', 'mohit@gmail.com', '$2y$10$62qoIkbNUmIgdR188jCNQ.PDNd5sTgSg2Gx43z/YlyHiUkv64Vnc.', 'User'),
(30, 'mayank', 'mamgain', 'mayank@123.com', '$2y$10$Gf9AgFeACq.dcx4Te./q6eakWpqsWP2KHHysWtUbl5VeAL6HQFpqy', 'User'),
(31, 'anurag', 'v', 'anuraj@gmail.com', '$2y$10$6Pn3L1y4VJPYsQlPBJrX/.v2DU6MnjPW.nD82zkoCc6nlJqlOKnei', 'User'),
(32, 'anil', 'meena', 'anil@gmail.com', '$2y$10$7NzPIiqECOCuMYYtkvIFV.yjdhPHigl5USlgYkTIVekTS/YyRLdq6', 'User'),
(33, 'Siva', 'Sivasankaran', 'sivak5692@gmail.com', '$2y$10$nNYuL3WrHz/zMepex58dPON6igg.terTOxe4Dh27sErqcXRy35b4K', 'User'),
(34, 'Arpit', 'Happy', 'happy@gmail.com', '$2y$10$o3uzwrTN/tLMBWzPMUtWp.K5gtICHxKbUaJJJK6wWFWyj9G3mx1K2', 'User');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`home_id`);

--
-- Index pour la table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Index pour la table `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`sensor_id`);

--
-- Index pour la table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `homes`
--
ALTER TABLE `homes`
  MODIFY `home_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT pour la table `sensors`
--
ALTER TABLE `sensors`
  MODIFY `sensor_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
