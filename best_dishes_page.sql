-- phpMyAdmin SQL Dump
-- version 5.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `best_dishes_page`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opinions`
--

DROP TABLE IF EXISTS `opinions`;
CREATE TABLE `opinions` (
  `opinionId` int(11) NOT NULL,
  `dishName` text NOT NULL,
  `dishCategory` text NOT NULL,
  `price` float NOT NULL,
  `userId` int(11) NOT NULL,
  `restaurantName` text NOT NULL,
  `restaurantAdress` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `opinions`
--

INSERT INTO `opinions` (`opinionId`, `dishName`, `dishCategory`, `price`, `userId`, `restaurantName`, `restaurantAdress`, `date`) VALUES
(1, 'Pizza Americana', 'pizza', 30, 1, 'Pizzeria Florian', 'Wrocław, rynek 24', '2021-05-21 08:35:11'),
(4, 'Kebab w bułce', 'doner', 12.67, 2, 'Sevi kebab', 'Wrocław, Majowa 14', '2022-09-16 12:08:43'),
(8, 'Kebab', 'doner', 20, 1, 'Sevi Kebab', 'dsadsadsad', '2022-09-20 17:12:33'),
(9, 'Kebab', 'doner', 20, 1, 'Sevi Kebab', 'dsadsadsad', '2022-09-20 04:41:21'),
(10, 'Nuggetsy', 'others', 6, 2, 'Burger King', 'pl. Grunwaldzki', '2022-09-20 04:42:21'),
(11, 'Burger wiejski', 'burger', 35, 2, 'Pasibus', '', '2022-09-20 07:39:12'),
(12, 'Pizza margharita', 'pizza', 30, 2, 'Pizza hut', 'Brak danych', '2022-09-20 21:00:00'),
(14, 'Kebab', 'doner', 12, 3, 'Sevi Kebab', 'pl. Grunwaldzki', '2022-07-06 08:49:17'),
(15, 'Burger z jajkiem', 'burger', 32.59, 6, 'Burgerownia', 'Wrocław, Korona', '2022-09-21 10:06:25'),
(16, 'Pizza BIG Americana', 'pizza', 40.99, 6, 'Pizzeria Romana', 'Warszawa, ul. Kościuszki 12', '2022-09-21 10:08:27');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating` (
  `ratingId` int(11) NOT NULL,
  `flavour` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `rating`
--

INSERT INTO `rating` (`ratingId`, `flavour`, `service`, `price`) VALUES
(1, 5, 3, 8),
(4, 10, 4, 8),
(8, 3, 9, 8),
(9, 3, 9, 8),
(10, 6, 7, 10),
(11, 10, 8, 3),
(12, 5, 5, 5),
(14, 8, 3, 7),
(15, 7, 4, 7),
(16, 8, 3, 7);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` text COLLATE utf8_polish_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 NOT NULL,
  `password` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`userId`, `username`, `email`, `password`) VALUES
(1, 'uzytkownik1', 'uzytkownik@gmail.com', '$2y$10$96WkbWdp.IoGQbyfIdxu/udJhnWaXN6hJfEnpyMHTVsyoqXn0.YE.'),
(2, 'uzytkownik2', 'uzytkownik2@gmail.com', '$2y$10$23bFRLb8BzslMq/eLy8Fvu9fIx3jNpkcRgjWOfdR7ume3Rd18i.ee'),
(3, 'uzytkownik3', 'uzytkownik3@gmail.com', '$2y$10$ZQ1..OTlnsbmYYgibBq4O.wFzllU7ncLpdHqKNeWHbLpBYFkcN69y'),
(4, 'uzytkownik4', 'uzytkownik4@gmail.com', '$2y$10$CQEN13iYAn6yYXBkGK6WgenWDZW7Tezdv0JT9PxSbO8WON4dCHL3G'),
(6, 'uzytkownik5', 'uzytkownik5@gmail.com', '$2y$10$GYAFttlFXJUpBhR4WsK7LO8ac7ThLUC94EUEEHzgEXL2GFH4gKDEW');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `opinions`
--
ALTER TABLE `opinions`
  ADD PRIMARY KEY (`opinionId`);

--
-- Indeksy dla tabeli `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`ratingId`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `opinions`
--
ALTER TABLE `opinions`
  MODIFY `opinionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `rating`
--
ALTER TABLE `rating`
  MODIFY `ratingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
