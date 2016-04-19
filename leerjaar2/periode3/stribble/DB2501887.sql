-- phpMyAdmin SQL Dump
-- version 4.2.12
-- http://www.phpmyadmin.net
--
-- Machine: rdbms
-- Gegenereerd op: 18 mrt 2016 om 14:00
-- Serverversie: 5.5.47-log
-- PHP-versie: 5.5.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `DB2501887`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`memberID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `members`
--

INSERT INTO `members` (`memberID`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`pageID` int(11) NOT NULL,
  `pageTitle` varchar(255) DEFAULT NULL,
  `pageCont` text,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `pages`
--

INSERT INTO `pages` (`pageID`, `pageTitle`, `pageCont`, `image`) VALUES
(1, 'Stribble', 'Stribble is een bedrijf, die mensen helpt met een beperking. Dit doen wij met behulp van een stappenplan, zodat het een stuk gemakkelijker word met dingen doen.<br><br> Onze missie is deze mensen onafhankelijk laten worden. Zodat ze zoveel mogelijk zelf kunnen en dat wij met trots kunnen vertellen dat het ons gelukt is.', 'waarom.jpg'),
(2, 'Moeder', 'Wat de meesten van ons voor lief nemen is helemaal niet als dat voor mijn dochter. Elk klein taak die we automatisch doen is iets wat ze nodig heeft om over en weer te leren. Elke dag. Keer op keer. Het is een dagelijkse strijd in haar routine. Well - onze routine, zoals alle leden van onze familie zijn betrokken.<Br><br>Met behulp van Stribble helpt onze dochter in haar routine als het haar stap-voor-stap door haar dagelijkse activiteiten begeleidt. Op hetzelfde moment dat maakt het ook mogelijk de rest van ons om eenvoudig opzetten, plannen en aanpassen van haar dagelijkse schema.Oh, en ze houdt van de stem assistent!', 'motherson.png'),
(3, 'Specialist', 'Met Stribble beheer ik gelijktijdig de gemaakte opdrachten van meerdere patienten welke ik regelmatig begeleid. Vergeleken met process ervoor, waar ik per patient alle opdrachten apart en handmatig moest maken, biedt Stribble veel meer vrijheid en mogelijkheden waardoor ik meer tijd bespaar en efficienter werk. \r\nGezien de neutrale karakter van de pictogrammen zijn ze ideaal voor verschillende soorten aandoeningen welke ik behandel. ', 'inchair.jpg'),
(4, 'test', 'safsasaf', '01.jpg'),
(5, 'test', 'Sample Sample content', '01.jpg'),
(8, 'Wie zijn wij?', 'Wij zijn Stribble. Ons doel is door behulp van deze dienst de mensen met een beperking, zoveel mogelijk onafhankelijk te laten worden.<br><br>\r\nDe app bestaat uit een stappenplan om de dag door te nemen. De app is te downloaden in de \r\nAppstore en Google Play.', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pages_eng`
--

CREATE TABLE IF NOT EXISTS `pages_eng` (
`pageID` int(11) NOT NULL,
  `pageTitle` varchar(255) DEFAULT NULL,
  `pageCont` text,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `pages_eng`
--

INSERT INTO `pages_eng` (`pageID`, `pageTitle`, `pageCont`, `image`) VALUES
(1, 'Why Stribble', 'Stribble is a company that helps people with disabilities. We do this by using a roadmap, so it gets a lot easier to do things.<br><br> Our mission is to let those people be independent. Because they can help themselves as far as possible and that we can say with pride that we have succeeded.', 'waarom.jpg'),
(2, 'Mother', 'What most of us take for granted is not at all like that for my daughter. Every little task we automatically do is something she needs to learn over and over again. Every day. Time after time. It is a daily struggle in her routine. Well â€“ our routine, as all members of our family are involved. <br><br>\r\nUsing Stribble helps our daughter in her routine as it guides her step-by-step through her daily activities. At the same time it also enables the rest of us to easily set up, plan and adjust her daily schedule. \r\nOh, and she loves the voice assistant! ', 'motherson.png'),
(3, 'Specialist', 'With Stribble, I can simultaneously manage the tasks of several patients under my supervision. Before using Stribble, I had to work, by hand,on all of the tasks seperately for every patient, by hand. Compared to this process, Stribble allows me to work far more efficient, gives me more freedom and costs less time. Because of the neural character of the pictograms they are perfectly suited for the various illnesses I treat,\r\n', 'inchair.jpg'),
(4, 'empty slide', '', '01.jpg'),
(5, 'empty slide', '', '01.jpg'),
(8, 'Wie zijn wij?', 'We are Stribble. Our goal is by using this service to help people with disabilities to be as independent as possible.<br><br>\r\nThe app consists of a roadmap to get through the day. The app is available for download in the Appstore and Google Play Store.', '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`memberID`);

--
-- Indexen voor tabel `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`pageID`);

--
-- Indexen voor tabel `pages_eng`
--
ALTER TABLE `pages_eng`
 ADD PRIMARY KEY (`pageID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `members`
--
ALTER TABLE `members`
MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `pages`
--
ALTER TABLE `pages`
MODIFY `pageID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT voor een tabel `pages_eng`
--
ALTER TABLE `pages_eng`
MODIFY `pageID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
