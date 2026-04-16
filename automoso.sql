-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2026. Ápr 16. 10:46
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `automoso`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `autok`
--

CREATE TABLE `autok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marka` varchar(255) NOT NULL,
  `tipus` varchar(255) NOT NULL,
  `evjarat` int(11) NOT NULL,
  `rendszam` varchar(255) NOT NULL,
  `szin` varchar(255) DEFAULT NULL,
  `felhasznalo_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `autok`
--

INSERT INTO `autok` (`id`, `marka`, `tipus`, `evjarat`, `rendszam`, `szin`, `felhasznalo_id`, `created_at`, `updated_at`) VALUES
(1, 'Toyota', 'Corolla', 2020, 'ABC-123', 'Ezüst', 1, '2026-03-30 09:05:17', '2026-03-30 09:05:17');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nev` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `api_token` varchar(80) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `nev`, `phonenumber`, `email`, `password`, `role`, `api_token`, `created_at`, `updated_at`) VALUES
(1, 'Demo Felhasználó', '06301234567', 'demo@vizsga.hu', '$2y$12$T/RP/sLmblWFOxmy2RDTL.gXINAPsvH5B1CNDoMy8wlfryeKXsgXm', 'user', NULL, '2026-03-30 09:05:17', '2026-03-30 09:05:17'),
(2, 'Admin Felhasználó', '06309998888', 'admin@vizsga.hu', '$2y$12$kalBqlt/MicXm6vsZ9r74uQGlVydx0XPKK1DeUaAie4rwX9WHRW5m', 'admin', 'wzmIzW5AdDfInBbwRGhSnD7Eto9kK6sq0wTqodzJBQb4B1fBKboSj3pNs5mQ', '2026-03-30 09:05:17', '2026-03-30 09:05:33');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2026_01_18_000001_create_felhasznalos_table', 1),
(2, '2026_01_18_000002_create_takaritos_table', 1),
(3, '2026_01_18_000003_create_autos_table', 1),
(4, '2026_01_18_000004_create_munkas_table', 1),
(5, '2026_01_18_000005_create_szolgaltatas_table', 1),
(6, '2026_03_26_000006_add_role_to_felhasznalos_table', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `munkak`
--

CREATE TABLE `munkak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auto_id` bigint(20) UNSIGNED NOT NULL,
  `felhasznalo_id` bigint(20) UNSIGNED NOT NULL,
  `szolgaltatas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `datum` date NOT NULL,
  `helyszin` varchar(255) NOT NULL,
  `megjegyzes` text DEFAULT NULL,
  `ar` int(11) NOT NULL,
  `allapot` varchar(255) NOT NULL DEFAULT 'Új',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `munkak`
--

INSERT INTO `munkak` (`id`, `auto_id`, `felhasznalo_id`, `szolgaltatas_id`, `datum`, `helyszin`, `megjegyzes`, `ar`, `allapot`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, '2026-04-02', 'Ózd, Vasvár út 12.', 'Kapucsengő: 3-as', 14990, 'Foglalva', '2026-03-30 09:05:17', '2026-03-30 09:05:17');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szolgaltatasok`
--

CREATE TABLE `szolgaltatasok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nev` varchar(255) NOT NULL,
  `leiras` text NOT NULL,
  `ar` int(11) NOT NULL,
  `idotartam` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `szolgaltatasok`
--

INSERT INTO `szolgaltatasok` (`id`, `nev`, `leiras`, `ar`, `idotartam`, `created_at`, `updated_at`) VALUES
(1, 'Express külső mosás', 'Kézi habos mosás, felni- és gumiápolás, gyors szárítás.', 5990, '45 perc', '2026-03-30 09:05:17', '2026-03-30 09:05:17'),
(2, 'Belső frissítő tisztítás', 'Porszívózás, műanyagápolás, üvegtisztítás, illatosítás.', 8990, '60 perc', '2026-03-30 09:05:17', '2026-03-30 09:05:17'),
(3, 'Prémium teljes tisztítás', 'Teljes belső és külső takarítás kárpittisztítással és viaszolással.', 14990, '120 perc', '2026-03-30 09:05:17', '2026-03-30 09:05:17');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `takaritok`
--

CREATE TABLE `takaritok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nev` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `autok`
--
ALTER TABLE `autok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autok_rendszam_unique` (`rendszam`),
  ADD KEY `autok_felhasznalo_id_foreign` (`felhasznalo_id`);

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `felhasznalok_phonenumber_unique` (`phonenumber`),
  ADD UNIQUE KEY `felhasznalok_email_unique` (`email`),
  ADD UNIQUE KEY `felhasznalok_api_token_unique` (`api_token`);

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `munkak`
--
ALTER TABLE `munkak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `munkak_auto_id_foreign` (`auto_id`),
  ADD KEY `munkak_felhasznalo_id_foreign` (`felhasznalo_id`);

--
-- A tábla indexei `szolgaltatasok`
--
ALTER TABLE `szolgaltatasok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `takaritok`
--
ALTER TABLE `takaritok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `takaritok_phonenumber_unique` (`phonenumber`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `autok`
--
ALTER TABLE `autok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `munkak`
--
ALTER TABLE `munkak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `szolgaltatasok`
--
ALTER TABLE `szolgaltatasok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `takaritok`
--
ALTER TABLE `takaritok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `autok`
--
ALTER TABLE `autok`
  ADD CONSTRAINT `autok_felhasznalo_id_foreign` FOREIGN KEY (`felhasznalo_id`) REFERENCES `felhasznalok` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `munkak`
--
ALTER TABLE `munkak`
  ADD CONSTRAINT `munkak_auto_id_foreign` FOREIGN KEY (`auto_id`) REFERENCES `autok` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `munkak_felhasznalo_id_foreign` FOREIGN KEY (`felhasznalo_id`) REFERENCES `felhasznalok` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
