-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2019 at 02:45 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hungry`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(255) NOT NULL,
  `ime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(1) NOT NULL,
  `uloga_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `email`, `password`, `token`, `active`, `uloga_id`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '0af2c684e2d0ebe86bae39eee7fde95c50c1af2c', 1, 1),
(2, 'Filip', 'Minic', 'filip@gmail.com', 'a21363e796f6626ee8e5579e587a3381', '524c4716078fc42d9d02264f77db8a741bc4af73', 1, 2),
(3, 'Filipo', 'Filipinjo', 'filipo@gmail.com', 'a21363e796f6626ee8e5579e587a3381', '524c4716078fc42d9d02264f77db8a741bc4af73', 1, 2),
(5, 'Filip', 'Minicc', 'filippp@gmail.com', 'a21363e796f6626ee8e5579e587a3381', 'e4749b8c0ec74c879a40159b87219a71bd9c0e30', 1, 2),
(7, 'Ivaaan', 'Ivann', 'ivann@gmail.com', 'a21363e796f6626ee8e5579e587a3381', '588e0086fbc6d924fa52b8fb7e1a38a561da67cd', 1, 2),
(8, 'Filip', 'Minic', 'filip.minic98@gmail.com', 'a21363e796f6626ee8e5579e587a3381', '5553d54c788b40406d0fb29ecf131f01876667a6', 1, 2),
(9, 'Abc', 'Abc', 'abcd@gmail.com', 'a21363e796f6626ee8e5579e587a3381', '5d9f7e1c97a212efd02123141639ea2ff4fa675e', 1, 2),
(10, 'Mika', 'Mikic', 'mika@gmail.com', 'a21363e796f6626ee8e5579e587a3381', 'ccb693ac3a2d1f430aa5aabbf95b92fd9f06b481', 1, 2),
(11, 'Kristina', 'Markovic', 'kicafilipovadevojka@gmail.com', '75b44eb219e01513ba53791a9f7370cc', '75b98f304221f99e7a74b362eea4326672b4126f', 1, 1),
(12, 'Korisnik', 'Korisnik', 'user@gmail.com', '6ad14ba9986e3615423dfca256d04e3f', '8969dd5376ddc32b730dc5b6182912978d0a47d3', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `id` int(255) NOT NULL,
  `slika` text COLLATE utf8_unicode_ci NOT NULL,
  `naslov` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cena` int(255) NOT NULL,
  `opis` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`id`, `slika`, `naslov`, `cena`, `opis`) VALUES
(1, 'images/menu/menu1.jpg', '\r\nGRILLED CHICKEN', 13, 'with wood grilled marinated chicken breast and mixed cheeses, garnished with lettuce, pico de gallo, guacamole and sour cream.'),
(2, 'images/menu/menu2.jpeg', 'PORK CARNITAS', 13, 'filled with pork carnitas and mixed cheeses. served with pico de gallo, sour cream and guacamole'),
(3, 'images/menu/menu3.jpg', 'STEAK', 13, 'marinated steak and mixed cheese, garnished with lettuce, pico de gallo, guacamole and sour cream'),
(4, 'images/menu/menu4.jpg', '\r\nCHICKEN SOUP', 7, 'tender chunks of grilled chicken, avocado green onion, crispy tortilla strips and melted monterrey jack cheese'),
(5, 'images/menu/menu5.jpg', 'SOUTHWESTERN CAESAR SALAD', 15, 'a new spicy twist on the traditional caesar salad, with corn, tomatoes, cotija cheese, avocado and chicken milanesa, tossed in house chipotle dressing.'),
(6, 'images/menu/menu6.jpg', 'COLORADO CHICKEN SALAD', 13, 'wood grilled chicken, mixed greens, sugar roasted pecans, dried cranberries, roasted corn, cilantro vinaigrette, tortilla chips and avocado slices'),
(7, 'images/menu/menu7.jpg', 'FIESTA TACO SALAD', 11, 'large crispy flour tortilla topped with seasoned ground beef, romaine lettuce, corn, tomatoes, black olives and mixed cheeses. garnished with guacamole and sour cream'),
(8, 'images/menu/menu8.jpg', '\r\nCHILE RELLENO', 16, 'xx tempura beer battered roasted problano pepper stuffed with oaxaca cheese topped with poblano sauce and drizzled with cilantro creme. served with rice, charro beans, guacamole and citrus chipotle slaw.'),
(9, 'images/menu/menu9.jpg', 'PORK CARNITAS', 18, 'braised pork topped with a roasted tomato sauce pickled red onions, served with guacamole, pico de gallo, charro beans and rice.'),
(10, 'images/menu/menu10.jpg', 'PEPPER JACK ENCHILADA', 17, 'grilled fajita chicken sauteed, bell peppers and onions, cheddar and pepper jack cheese, accompanied with a zesty poblano cheese sauce'),
(11, 'images/menu/menu11.jpg', 'GRINGO BEEF TACOS', 14, 'crispy corn shells, seasoned ground beef, lettuce, mixed cheese, tomatoes and sour cream'),
(12, 'images/menu/menu12.jpg', 'TEMPURA FISH', 15, 'tilapia dipped in dos equis beer tempura batter topped with a dill crema, shredded cabbage and pico de gallo'),
(13, 'images/menu/menu13.jpg', 'TACOS AL PASTOR', 15, 'melted jack cheese, caramelized onions, mixed cabbage, braised pork, pineapple relish, pico de gallo and mexican crema\r\nmelted jack cheese, caramelized onions, mixed cabbage, braised pork, pineapple relish, pico de gallo and mexican crema\r\n\r\n'),
(14, 'images/menu/menu14.jpg', 'FRENCH TACOS', 16, 'tortilla covered with melted cheese, caramelized onions, topped with chorizo sausage, grilled steak, chipotle crema, mix cabbage, pico de gallo and shredded cheese');

-- --------------------------------------------------------

--
-- Table structure for table `navigacija`
--

CREATE TABLE `navigacija` (
  `id` int(30) NOT NULL,
  `href` text COLLATE utf8_unicode_ci NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `navigacija`
--

INSERT INTO `navigacija` (`id`, `href`, `naziv`) VALUES
(1, '#home', 'Home'),
(2, '#about', 'About'),
(3, '#menu', 'Menu'),
(4, '#team', 'Team'),
(5, '#book-table', 'Book Table');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacije`
--

CREATE TABLE `rezervacije` (
  `id` int(255) NOT NULL,
  `telefonBr` text COLLATE utf8_unicode_ci NOT NULL,
  `korisnik_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rezervacije`
--

INSERT INTO `rezervacije` (`id`, `telefonBr`, `korisnik_id`) VALUES
(3, '11111111111111', 1),
(4, '11111111111111', 1),
(9, '063123213123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sefovi`
--

CREATE TABLE `sefovi` (
  `id` int(255) NOT NULL,
  `ime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `slika` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sefovi`
--

INSERT INTO `sefovi` (`id`, `ime`, `opis`, `slika`) VALUES
(1, 'Filip Minic ', '138/17', 'images/team/team-1.jpg'),
(2, 'Filip Minic ', '138/17', 'images/team/team-2.jpg'),
(3, 'Filip Minic ', '138/17', 'images/team/team-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slajder`
--

CREATE TABLE `slajder` (
  `id` int(20) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slika` text COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slajder`
--

INSERT INTO `slajder` (`id`, `naziv`, `slika`, `text`) VALUES
(1, 'Feel good Diner Menu', 'images/slide/bg-1.jpg', 'If you want to take a look at some of our delicious meals. '),
(2, 'Join Our Steak Club', 'images/slide/bg-2.jpg', 'Before you stop by, browse through our menu to plan your perfect lunch or dinner!'),
(3, 'Our Menu Has Arrived', 'images/slide/bg-3.jpg', 'Our philosophy is simple. Quality, delicious food at a reasonable price. ');

-- --------------------------------------------------------

--
-- Table structure for table `special`
--

CREATE TABLE `special` (
  `id` int(255) NOT NULL,
  `naslov` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `slika` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `special`
--

INSERT INTO `special` (`id`, `naslov`, `opis`, `slika`) VALUES
(1, 'TEMPURA FISH', 'Tilapia dipped in dos equis beer tempura batter topped with a dill crema, shredded cabbage and pico de gallo', 'images/special/sp-1.jpg'),
(2, 'GRILLED CHICKEN', 'With wood grilled marinated chicken breast and mixed cheeses, garnished with lettuce, pico de gallo, guacamole and sour cream.', 'images/special/sp-2.jpg'),
(3, 'STEAK', 'Marinated steak and mixed cheese, garnished with lettuce, pico de gallo, guacamole and sour cream', 'images/special/sp-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE `uloge` (
  `id` int(255) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`id`, `naziv`) VALUES
(1, 'administrator'),
(2, 'korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uloga_id` (`uloga_id`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigacija`
--
ALTER TABLE `navigacija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rezervacije`
--
ALTER TABLE `rezervacije`
  ADD PRIMARY KEY (`id`),
  ADD KEY `korisnik_id` (`korisnik_id`);

--
-- Indexes for table `sefovi`
--
ALTER TABLE `sefovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slajder`
--
ALTER TABLE `slajder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special`
--
ALTER TABLE `special`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uloge`
--
ALTER TABLE `uloge`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `navigacija`
--
ALTER TABLE `navigacija`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rezervacije`
--
ALTER TABLE `rezervacije`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sefovi`
--
ALTER TABLE `sefovi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slajder`
--
ALTER TABLE `slajder`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `special`
--
ALTER TABLE `special`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uloge`
--
ALTER TABLE `uloge`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD CONSTRAINT `uloga_id` FOREIGN KEY (`uloga_id`) REFERENCES `uloge` (`id`);

--
-- Constraints for table `rezervacije`
--
ALTER TABLE `rezervacije`
  ADD CONSTRAINT `korisnik_id` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnici` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
