-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2023 at 07:35 PM
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
(2, 'The Catcher in the Rye', 'J.D. Salinger', 'https://upload.wikimedia.org/wikipedia/id/3/32/Rye_catcher.jpg', 'Fiction', 'The Catcher in the Rye is a novel written by J.D. Salinger. Set in the 1950s, the story revolves around Holden Caulfield, a disenchanted teenager who rebels against the phoniness and hypocrisy he perceives in society. The book explores themes of alienation, identity, and the loss of innocence as Holden navigates through various encounters and reflects on his own struggles. With its raw and authentic narrative style, The Catcher in the Rye continues to captivate readers and provoke discussions about the complexities of adolescence.', '1951', 'Little, Brown and Company', 1),
(3, 'To Kill a Mockingbird', 'Harper Lee', 'https://upload.wikimedia.org/wikipedia/commons/4/4f/To_Kill_a_Mockingbird_%28first_edition_cover%29.jpg', 'Fiction', 'To Kill a Mockingbird, written by Harper Lee, takes place in the 1960s in a small Southern town called Maycomb. The story is narrated by Scout Finch, a young girl who witnesses the injustices and prejudices of society. Through Scout\'s eyes, readers witness her father, Atticus Finch, defending an African American man falsely accused of a crime. The novel explores themes of racism, morality, and the loss of innocence. With its powerful portrayal of social issues, To Kill a Mockingbird remains a timeless classic and a poignant commentary on the human condition.', '1960', 'J. B. Lippincott & Co.', 1),
(4, '1984', 'George Orwell', 'https://upload.wikimedia.org/wikipedia/commons/c/c3/1984first.jpg', 'Science Fiction', '1984, a dystopian novel by George Orwell, is set in a totalitarian society ruled by the Party, led by Big Brother. The story follows Winston Smith, a low-ranking member of the Party who starts questioning the oppressive regime. As Winston rebels against the surveillance, propaganda, and mind control prevalent in Oceania, he embarks on a dangerous journey of self-discovery and resistance. 1984 explores themes of government oppression, surveillance, and the manipulation of truth. Orwell\'s prophetic vision of a dystopian future continues to resonate with readers, serving as a chilling reminder of the importance of individual freedom and truth.', '1949', 'Secker & Warburg', 1),
(5, 'Pride and Prejudice', 'Jane Austen', 'https://upload.wikimedia.org/wikipedia/commons/1/17/PrideAndPrejudiceTitlePage.jpg', 'Romance', 'Pride and Prejudice, written by Jane Austen, is a classic romance novel set in early 19th-century England. The story revolves around the spirited Elizabeth Bennet and her tumultuous relationship with the enigmatic Mr. Darcy. Through witty dialogue, social commentary, and intricate character development, Austen explores themes of love, class, and societal expectations. As Elizabeth navigates the complexities of her family, suitors, and societal norms, Pride and Prejudice offers a charming and insightful glimpse into the world of Regency-era romance.', '1813', 'T. Egerton, Whitehall', 0),
(6, 'The Hobbit', 'J.R.R. Tolkien', 'https://upload.wikimedia.org/wikipedia/en/4/4a/TheHobbit_FirstEdition.jpg', 'Fantasy', 'The Hobbit, written by J.R.R. Tolkien, takes readers on a thrilling adventure through the mythical realm of Middle-earth. The story follows Bilbo Baggins, a reluctant hobbit who is recruited by the wizard Gandalf to accompany a group of dwarves on a quest to reclaim their homeland from the fearsome dragon Smaug. Along the way, Bilbo encounters magical creatures, treacherous landscapes, and battles with evil forces. The Hobbit is a tale of heroism, friendship, and self-discovery, serving as a prelude to the epic events chronicled in The Lord of the Rings.', '1937', 'George Allen & Unwin', 1),
(10, 'The Lord of the Rings', 'J.R.R. Tolkien', 'https://upload.wikimedia.org/wikipedia/en/e/e9/First_Single_Volume_Edition_of_The_Lord_of_the_Rings.gif', 'Fantasy', 'The Lord of the Rings, an epic fantasy novel by J.R.R. Tolkien, transports readers to the enchanting world of Middle-earth. The story follows a diverse fellowship of characters, including Frodo Baggins, Gandalf the wizard, and Aragorn the ranger, as they embark on a perilous quest to destroy the One Ring and defeat the dark lord Sauron. Along their journey, they face countless challenges, encounter mythical creatures, and navigate the intricate web of alliances and conflicts that shape the fate of Middle-earth. The Lord of the Rings is a timeless masterpiece that delves into themes of heroism, sacrifice, and the battle between good and evil.', '1954', 'George Allen & Unwin', 1),
(11, 'The Great Gatsby', 'F. Scott Fitzgerald', 'https://upload.wikimedia.org/wikipedia/commons/7/7a/The_Great_Gatsby_Cover_1925_Retouched.jpg', 'Fiction', 'The Great Gatsby, a novel by F. Scott Fitzgerald, immerses readers in the dazzling and decadent world of 1920s Jazz Age America. The story is narrated by Nick Carraway, a young man drawn into the lives of the wealthy elite of Long Island. Through his encounters with the enigmatic Jay Gatsby and the beautiful but elusive Daisy Buchanan, Nick delves into the themes of wealth, love, and the pursuit of the American Dream. Fitzgerald\'s lyrical prose and poignant exploration of the hollowness behind material wealth continue to make The Great Gatsby a quintessential portrayal of the Roaring Twenties.', '1925', 'Scribner', 1),
(12, 'Moby-Dick', 'Herman Melville', 'https://upload.wikimedia.org/wikipedia/commons/3/36/Moby-Dick_FE_title_page.jpg', 'Adventure', 'Moby-Dick, an epic novel by Herman Melville, takes readers on a perilous journey aboard the whaling ship Pequod. The story is narrated by Ishmael, a young sailor who joins Captain Ahab in his relentless pursuit of the white whale known as Moby Dick. As the crew ventures into the vast ocean, they face storms, conflicts, and the internal struggles of their own souls. Moby-Dick explores themes of obsession, fate, and the complexity of human nature. Melville\'s vivid descriptions of life at sea and his philosophical reflections have secured the novel\'s place as a literary masterpiece.', '1851', 'Harper & Brothers', 0),
(13, 'The Chronicles of Narnia: The Lion, the Witch and the Wardrobe', 'C.S. Lewis', 'https://upload.wikimedia.org/wikipedia/en/8/86/TheLionWitchWardrobe%281stEd%29.jpg', 'Fantasy', 'The Lion, the Witch and the Wardrobe, written by C.S. Lewis, invites readers into the enchanting world of Narnia. The story follows four siblings—Peter, Susan, Edmund, and Lucy—as they discover a magical wardrobe that leads them to a land frozen in eternal winter by the White Witch. Guided by the majestic lion Aslan, the children embark on a quest to fulfill an ancient prophecy and free Narnia from the Witch\'s grasp. With its themes of bravery, sacrifice, and the power of imagination, The Lion, the Witch and the Wardrobe is a beloved fantasy tale that captivates readers of all ages.', '1950', 'Geoffrey Bles', 1);

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
(1, 'mamank_kesbor@gmail.com', '123', 'Mamank Kesbor', 'Teknik Seni Mengoding'),
(3, '1@1.com', '123', 'Hamba Allah', 'Sastra Robot'),
(4, 'akmal@gmail.com', '123', 'Akmal Nafis', 'Informatika'),
(5, 'apabnar@iniakun.com', '123', 'lohe', 'Kesenian Seni ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
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
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
