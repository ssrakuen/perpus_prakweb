-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 05:35 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbperpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(8) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `nama_penulis` varchar(100) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `sinopsis` text NOT NULL,
  `tahun_terbit` varchar(5) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tersedia` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `nama_penulis`, `cover`, `genre`, `sinopsis`, `tahun_terbit`, `penerbit`, `tersedia`) VALUES
(1, 'The Fall of Celestia', 'Dainsleif', 'https://e1.pxfuel.com/desktop-wallpaper/821/7/desktop-wallpaper-genshin-impact-mobile-in-high-resolution-or-portrait-mobile.jpg', 'Sejarah', '\"Shattered Stars: The Fall of Celestia\" is an epic fantasy tale set in the enchanting world of Teyvat. The story follows a diverse group of heroes, each hailing from different regions and blessed with unique elemental powers, as they uncover the dark secrets behind the once-majestic realm of Celestia.\r\n\r\nAt the heart of Teyvat lies Celestia, a celestial city floating high above the clouds, home to the mighty and godlike beings known as the Archons. For centuries, Celestia has been revered as a sacred and untouchable sanctuary, watched over by the ruling Archons who maintained the balance between the elements and guided the destiny of mortals.\r\n\r\nHowever, as the story unfolds, ominous signs begin to surface, indicating an impending catastrophe. The Archons, known for their infallibility, unexpectedly start exhibiting signs of corruption and abuse of their power. Rumors of Celestia\'s fall from grace start spreading among the inhabitants of Teyvat, causing fear and doubt among the people.\r\n\r\nOur group of heroes, driven by their love for Teyvat and their desire to protect its inhabitants, embarks on a perilous journey to uncover the truth behind Celestia\'s demise. Along the way, they face treacherous challenges, encounter ancient deities, and confront their own pasts, each hero grappling with personal demons and discovering hidden strengths within themselves.\r\n\r\nAs they delve deeper into the mysteries surrounding Celestia, they gradually uncover a shocking revelation. A malevolent force, long imprisoned and forgotten, seeks to shatter the balance of power and seize control over the celestial realm. The heroes must rally their courage and unite their elemental abilities to combat this encroaching darkness and prevent the destruction of Teyvat.\r\n\r\nThroughout their quest, the heroes confront the complexities of power, the consequences of unchecked authority, and the true meaning of sacrifice. They challenge the established order, forge unlikely alliances, and ignite a revolution that will forever alter the destiny of Teyvat.\r\n\r\n\"Shattered Stars: The Fall of Celestia\" is an emotionally charged adventure that explores themes of corruption, redemption, and the indomitable spirit of humanity. It delves into the mythology of the world of Genshin Impact, unraveling the secrets of Celestia while highlighting the strength and resilience of the heroes who rise to confront its downfall.', '2023', 'PT. LOHE', 1),
(2, 'The Catcher in the Rye', 'J.D. Salinger', 'catcher_in_the_rye.jpg', 'Fiction', 'The Catcher in the Rye is a novel...', '1951', 'Little, Brown and Company', 1),
(3, 'To Kill a Mockingbird', 'Harper Lee', 'to_kill_a_mockingbird.jpg', 'Fiction', 'To Kill a Mockingbird is set...', '1960', 'J. B. Lippincott & Co.', 1),
(4, '1984', 'George Orwell', '1984.jpg', 'Science Fiction', '1984 is a dystopian novel...', '1949', 'Secker & Warburg', 1),
(5, 'Pride and Prejudice', 'Jane Austen', 'pride_and_prejudice.jpg', 'Romance', 'Pride and Prejudice follows...', '1813', 'T. Egerton, Whitehall', 0),
(6, 'The Hobbit', 'J.R.R. Tolkien', 'the_hobbit.jpg', 'Fantasy', 'The Hobbit follows the journey...', '1937', 'George Allen & Unwin', 1),
(10, 'The Lord of the Rings', 'J.R.R. Tolkien', 'the_lord_of_the_rings.jpg', 'Fantasy', 'The Lord of the Rings is an epic...', '1954', 'George Allen & Unwin', 1),
(11, 'The Great Gatsby', 'F. Scott Fitzgerald', 'great_gatsby.jpg', 'Fiction', 'The Great Gatsby is a novel...', '1925', 'Scribner', 1),
(12, 'Moby-Dick', 'Herman Melville', 'moby_dick.jpg', 'Adventure', 'Moby-Dick is an epic novel...', '1851', 'Harper & Brothers', 0),
(13, 'The Chronicles of Narnia: The Lion, the Witch and the Wardrobe', 'C.S. Lewis', 'narnia_lion_witch_wardrobe.jpg', 'Fantasy', 'The Lion, the Witch and the Wardrobe...', '1950', 'Geoffrey Bles', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id` int(8) NOT NULL,
  `tanggal` date NOT NULL,
  `id_buku` int(8) NOT NULL,
  `id_user` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `nama`, `prodi`) VALUES
(1, 'mamank_kesbor@gmail.com', '123', 'Mamank Kesbor', 'Teknik Seni Mengoding');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
