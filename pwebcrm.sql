-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2022 at 05:45 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwebcrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `acciones`
--

CREATE TABLE `acciones` (
  `PK` int(8) NOT NULL,
  `Accion` varchar(56) NOT NULL,
  `userpk` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acciones`
--

INSERT INTO `acciones` (`PK`, `Accion`, `userpk`) VALUES
(1, 'Birras', 1),
(3, 'hola', 1);

-- --------------------------------------------------------

--
-- Table structure for table `actividades`
--

CREATE TABLE `actividades` (
  `PK` int(8) NOT NULL,
  `userpk` int(8) NOT NULL,
  `lugarpk` int(8) NOT NULL,
  `personapk` int(8) NOT NULL,
  `accionpk` int(8) NOT NULL,
  `hora` varchar(56) NOT NULL,
  `dia` date NOT NULL,
  `notas` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actividades`
--

INSERT INTO `actividades` (`PK`, `userpk`, `lugarpk`, `personapk`, `accionpk`, `hora`, `dia`, `notas`) VALUES
(1, 1, 1, 14, 1, '234', '2022-10-10', 'lksfjdña sdñkajd fñkajsd flkja sdlkjawoeua dfhjkad fadfk');

-- --------------------------------------------------------

--
-- Table structure for table `contactos`
--

CREATE TABLE `contactos` (
  `PK` int(8) NOT NULL,
  `nombre` varchar(56) NOT NULL,
  `apellido` varchar(56) NOT NULL,
  `telefono` varchar(56) NOT NULL,
  `direccion` varchar(56) NOT NULL,
  `cumple` date NOT NULL,
  `userpk` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactos`
--

INSERT INTO `contactos` (`PK`, `nombre`, `apellido`, `telefono`, `direccion`, `cumple`, `userpk`) VALUES
(14, 'fsdf', '4234', '324234', '234', '2022-10-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lugares`
--

CREATE TABLE `lugares` (
  `PK` int(8) NOT NULL,
  `lugar` varchar(56) NOT NULL,
  `telefono` varchar(56) NOT NULL,
  `direccion` varchar(56) NOT NULL,
  `userpk` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lugares`
--

INSERT INTO `lugares` (`PK`, `lugar`, `telefono`, `direccion`, `userpk`) VALUES
(1, 'lugar', '123123', 'sdfsad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `PK` int(8) NOT NULL,
  `User` varchar(56) NOT NULL,
  `Password` varchar(56) NOT NULL,
  `Mail` varchar(56) NOT NULL,
  `Nacimiento` date NOT NULL,
  `Fechadecreacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`PK`, `User`, `Password`, `Mail`, `Nacimiento`, `Fechadecreacion`) VALUES
(1, 'dibi', 'dibi', 'skdjfh@kasdhf.cas', '2022-10-20', '2022-10-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acciones`
--
ALTER TABLE `acciones`
  ADD PRIMARY KEY (`PK`),
  ADD KEY `userpk` (`userpk`) USING BTREE;

--
-- Indexes for table `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`PK`),
  ADD KEY `userpk` (`userpk`),
  ADD KEY `personapk` (`personapk`),
  ADD KEY `lugarpk` (`lugarpk`),
  ADD KEY `accionpk` (`accionpk`);

--
-- Indexes for table `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`PK`),
  ADD KEY `userpk` (`userpk`);

--
-- Indexes for table `lugares`
--
ALTER TABLE `lugares`
  ADD PRIMARY KEY (`PK`),
  ADD KEY `userpk` (`userpk`) USING BTREE;

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`PK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acciones`
--
ALTER TABLE `acciones`
  MODIFY `PK` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `actividades`
--
ALTER TABLE `actividades`
  MODIFY `PK` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactos`
--
ALTER TABLE `contactos`
  MODIFY `PK` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lugares`
--
ALTER TABLE `lugares`
  MODIFY `PK` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `PK` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acciones`
--
ALTER TABLE `acciones`
  ADD CONSTRAINT `acciones_ibfk_1` FOREIGN KEY (`userpk`) REFERENCES `usuarios` (`PK`) ON DELETE CASCADE;

--
-- Constraints for table `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`userpk`) REFERENCES `usuarios` (`PK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actividades_ibfk_2` FOREIGN KEY (`lugarpk`) REFERENCES `lugares` (`PK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actividades_ibfk_3` FOREIGN KEY (`accionpk`) REFERENCES `acciones` (`PK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actividades_ibfk_4` FOREIGN KEY (`personapk`) REFERENCES `contactos` (`PK`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `contactos_ibfk_1` FOREIGN KEY (`userpk`) REFERENCES `usuarios` (`PK`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `lugares`
--
ALTER TABLE `lugares`
  ADD CONSTRAINT `lugares_ibfk_1` FOREIGN KEY (`userpk`) REFERENCES `usuarios` (`PK`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
