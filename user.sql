-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 18, 2024 at 01:21 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `check-in`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `firma` varchar(250) DEFAULT NULL,
  `tipo_user` int(1) DEFAULT NULL,
  `stat` int(1) DEFAULT NULL,
  `departamento` varchar(100) DEFAULT NULL,
  `fecha_log` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nombre`, `apellido`, `email`, `firma`, `tipo_user`, `stat`, `departamento`, `fecha_log`) VALUES
(1, 'Abi', 'Pineda', 'abi.pineda@grupopcr.com.pa', NULL, 2, 1, 'RRHH', '2024-09-30 16:21:06'),
(2, 'aida', 'Jaen', 'aida.jaen@grupopcr.com.pa', NULL, 2, 1, 'Mercadeo', '2024-09-30 16:21:06'),
(3, 'Ana', 'Mock', 'ana.mock@grupopcr.com.pa', NULL, 2, 1, 'Mercadeo', '2024-09-30 16:21:06'),
(4, 'Andrea', ' Carolina Suarez', 'andrea.suarez@grupopcr.com.pa', NULL, 2, 1, 'Operaciones', '2024-09-30 16:21:06'),
(5, 'Andrea', 'Victoria', 'andrea.victoria@grupopcr.com.pa', NULL, 2, 1, 'Ventas Corp', '2024-09-30 16:21:06'),
(6, 'Anthony', 'Almanza', 'anthony.almanza@grupopcr.com.pa', NULL, 2, 1, 'Operaciones', '2024-09-30 16:21:06'),
(7, 'Arelis', 'Maure', 'arelis.maure@grupopcr.com.pa', NULL, 2, 1, 'Ventas Corp', '2024-09-30 16:21:06'),
(8, 'Aristides', 'Enrique Perez Alveo', 'aristides.perez@grupopcr.com.pa', NULL, 2, 1, 'Operaciones', '2024-09-30 16:21:06'),
(9, 'Ashline', 'Guerra', 'ashline.guerra@grupopcr.com.pa', NULL, 2, 1, 'Contabilidad', '2024-09-30 16:21:06'),
(10, 'Beyonce', 'Grant', 'beyonce.grant@grupopcr.com.pa', NULL, 2, 1, 'RRHH', '2024-09-30 16:21:06'),
(11, 'Carlos', 'Soto', 'carlos.soto@dollarpanama.com', NULL, 2, 1, 'Retail', '2024-09-30 16:21:06'),
(12, 'Cesar', 'Asprilla', 'cesar.asprilla@grupopcr.com.pa', NULL, 2, 1, 'Tecnologia', '2024-09-30 16:21:06'),
(13, 'Cesar', 'Durufour', 'cesar.durufour@grupopcr.com.pa', NULL, 2, 1, 'Operaciones', '2024-09-30 16:21:06'),
(14, 'Darlene', 'Bernal', 'darlene.bernal@grupopcr.com.pa', NULL, 2, 1, 'Mercadeo', '2024-09-30 16:21:06'),
(15, 'Dash', 'Vaz', 'dashka.vaz@grupopcr.com.pa', NULL, 2, 1, 'Mercadeo', '2024-09-30 16:21:06'),
(16, 'Dunia', ' Cedeño', 'dunia.cedeno@grupopcr.com.pa', NULL, 2, 1, 'Cobros', '2024-09-30 16:21:06'),
(17, 'Edwin', 'Edwards', 'edwin.edwards@grupopcr.com.pa', NULL, 2, 1, 'Rrhh', '2024-09-30 16:21:06'),
(18, 'Edwing', 'Sanchez', 'edwing.sanchez@grupopcr.com.pa', NULL, 2, 1, 'Cobros', '2024-09-30 16:21:06'),
(19, 'Estefani', 'Mendez', 'Estefani.mendez@panarenting.com', NULL, 2, 1, 'Panarenting', '2024-09-30 16:21:06'),
(20, 'Estrella', 'Gabriela Carrillo', 'estrella.carrillo@panarenting.com', NULL, 2, 1, 'Panarenting', '2024-09-30 16:21:06'),
(21, 'Fernando', ' Alvendas', 'fernando.alvendas@grupopcr.com.pa', NULL, 2, 1, 'Tecnologia', '2024-09-30 16:21:06'),
(22, 'Giovanni', 'Colucci', 'giovanni.colucci@panarenting.com', NULL, 2, 1, 'Panarenting', '2024-09-30 16:21:06'),
(23, 'Gisela', 'Chamorro', 'gisela.chamorro@grupopcr.com.pa', NULL, 2, 1, 'Administracion', '2024-09-30 16:21:06'),
(24, 'Graciela', 'Mora', 'graciela.mora@grupopcr.com.pa', NULL, 2, 1, 'Cobros', '2024-09-30 16:21:06'),
(25, 'Gustavo', 'Avila', 'gustavo.avila@grupopcr.com.pa', NULL, 2, 1, 'Ventas Corp', '2024-09-30 16:21:06'),
(26, 'Gustavo', 'Urrutia', 'gustavo.urrutia@grupopcr.com.pa', NULL, 2, 1, 'Retail', '2024-09-30 16:21:06'),
(27, 'Herminda', 'Sanchez', 'herminda.sanchez@grupopcr.com.pa', NULL, 2, 1, 'Taller', '2024-09-30 16:21:06'),
(28, 'Hernan', 'Solano', 'hernan.solano@grupopcr.com.pa', NULL, 2, 1, 'Tecnologia', '2024-09-30 16:21:06'),
(29, 'Irving', 'Trejos Caceres', 'irving.trejos@grupopcr.com.pa', NULL, 2, 1, 'Contabilidad', '2024-09-30 16:21:06'),
(30, 'Isidro', 'Martinez', 'isidro.martinez@grupopcr.com.pa', NULL, 2, 1, 'Operaciones', '2024-09-30 16:21:06'),
(31, 'Ivette', 'Concepcion Romero', 'ivette.romero@grupopcr.com.pa', NULL, 2, 1, 'Cobros', '2024-09-30 16:21:06'),
(32, 'Jaime', 'Cedeño', 'jaime.cedeno@grupopcr.com.pa', NULL, 2, 1, 'Operaciones', '2024-09-30 16:21:06'),
(33, 'Jasson', 'Rojas', 'jasson.rojas@grupopcr.com.pa', NULL, 2, 1, 'Taller', '2024-09-30 16:21:06'),
(34, 'Jhoziel', 'Gill', 'jhoziel.gill@grupopcr.com.pa', NULL, 2, 1, 'Operaciones', '2024-09-30 16:21:06'),
(35, 'Joel', 'De Leon', 'joel.deleon@automarketpan.com', NULL, 2, 1, 'Automarket', '2024-09-30 16:21:06'),
(36, 'Jonathan', 'Delgado', 'jonathan.delgado@panarenting.com', NULL, 2, 1, 'Panarenting', '2024-09-30 16:21:06'),
(37, 'Jorge', 'De la Guardia Romero', 'jorge.delaguardia@grupopcr.com.pa', NULL, 2, 1, 'Gerencia', '2024-09-30 16:21:06'),
(38, 'Jorge', 'Juan De La Guardia', 'jj@grupopcr.com.pa', NULL, 2, 1, 'Gerencia', '2024-09-30 16:21:06'),
(39, 'Jorge', 'Soto', 'jorge.soto@grupopcr.com.pa', NULL, 2, 1, 'Contabilidad', '2024-09-30 16:21:06'),
(40, 'Jose', ' Diaz', 'jose.diaz@panarenting.com', NULL, 2, 1, 'Panarenting', '2024-09-30 16:21:06'),
(41, 'Joselin', 'Urriola', 'joselin.urriola@grupopcr.com.pa', NULL, 2, 1, 'Contabilidad', '2024-09-30 16:21:06'),
(42, 'Juan', 'Zapata', 'juan.zapata@grupopcr.com.pa', NULL, 2, 1, 'Compras', '2024-09-30 16:21:06'),
(43, 'Keveen', ' Vargas', 'keveen.vargas@grupopcr.com.pa', NULL, 2, 1, 'Mercadeo', '2024-09-30 16:21:06'),
(44, 'Kevin', 'Batista', 'kevin.batista@grupopcr.com.pa', NULL, 2, 1, 'Contabilidad', '2024-09-30 16:21:06'),
(45, 'Lauren', 'Bastidas', 'lauren.bastidas@grupopcr.com.pa', NULL, 2, 1, 'Ventas Corp', '2024-09-30 16:21:06'),
(46, 'Lourdes', 'Martinez', 'lourdes.martinez@grupopcr.com.pa', NULL, 2, 1, 'Compras', '2024-09-30 16:21:06'),
(47, 'Luis', 'Hernandez', 'luis.hernandez@grupopcr.com.pa', NULL, 2, 1, 'Tecnologia', '2024-09-30 16:21:06'),
(48, 'Luis', 'Reyes', 'luis.reyes@grupopcr.com.pa', NULL, 2, 1, 'Operaciones', '2024-09-30 16:21:06'),
(49, 'luis', 'Valverde', 'luis.valverde@dollarpanama.com', NULL, 2, 1, 'Retail', '2024-09-30 16:21:06'),
(50, 'Maria', 'Eugenia Barrios', 'maria.barrios@grupopcr.com.pa', NULL, 2, 1, 'Cobros', '2024-09-30 16:21:06'),
(51, 'Maria', 'Eugenia De la Guardia', 'mariae.delaguardia@grupopcr.com.pa', NULL, 2, 1, 'Gerencia', '2024-09-30 16:21:06'),
(52, 'Marilin', 'Santos Ruiz', 'marilin.santosruiz@grupopcr.com.pa', NULL, 2, 1, 'Gerencia', '2024-09-30 16:21:06'),
(53, 'Mariluz', 'Rivera', 'mariluz.rivera@grupopcr.com.pa', NULL, 2, 1, 'Cobros', '2024-09-30 16:21:06'),
(54, 'Marta', 'Jimenez', 'marta.jimenez@dollarpanama.com', NULL, 2, 1, 'Retail', '2024-09-30 16:21:06'),
(55, 'Martín', 'Avellanedo', 'martin.avellanedo@grupopcr.com.pa', NULL, 2, 1, 'Taller', '2024-09-30 16:21:06'),
(56, 'Mayinis', 'Sandoval', 'mayinis.sandoval@grupopcr.com.pa', NULL, 2, 1, 'Ventas Corp', '2024-09-30 16:21:06'),
(57, 'Melissa', 'Solis', 'melissa.solis@grupopcr.com.pa', NULL, 2, 1, 'Cobros', '2024-09-30 16:21:06'),
(58, 'Merly', 'De Casanova', 'merly.decasanova@grupopcr.com.pa', NULL, 2, 1, 'Ventas Corp', '2024-09-30 16:21:06'),
(59, 'Michelle', 'De La Guardia', 'mdlg@grupopcr.com.pa', NULL, 2, 1, 'Gerencia', '2024-09-30 16:21:06'),
(60, 'Moyra', 'Carrera', 'moyra.carrera@grupopcr.com.pa', NULL, 2, 1, 'Ventas Corp', '2024-09-30 16:21:06'),
(61, 'Nelson', 'Abrego', 'nelson.abrego@grupopcr.com.pa', NULL, 2, 1, 'Contabilidad', '2024-09-30 16:21:06'),
(62, 'Omayra', 'Cruz', 'omayra.cruz@grupopcr.com.pa', NULL, 2, 1, 'Administracion', '2024-09-30 16:21:06'),
(63, 'Oscar', 'Castillo', 'oscar.castillo@grupopcr.com.pa', NULL, 2, 1, 'Auditoria', '2024-09-30 16:21:06'),
(64, 'Patricia', 'Fadul', 'patricia.fadul@grupopcr.com.pa', NULL, 2, 1, 'Ventas Corp', '2024-09-30 16:21:06'),
(65, 'Pedro', 'Arrieta', 'pedro.arrieta@grupopcr.com.pa', NULL, 2, 1, 'Tecnologia', '2024-09-30 16:21:06'),
(66, 'Ricardo', 'De La Guardia', 'rdlg@grupopcr.com.pa', NULL, 2, 1, 'Gerencia', '2024-09-30 16:21:06'),
(67, 'Rigoberto', 'Lopez', 'rigoberto.lopez@grupopcr.com.pa', NULL, 2, 1, 'Operaciones', '2024-09-30 16:21:06'),
(68, 'Rodolfo', 'Vernaza', 'rodolfo.vernaza@grupopcr.com.pa', NULL, 2, 1, 'Reclamos', '2024-09-30 16:21:06'),
(69, 'Ruben', 'Dario Sagel Dominguez', 'ruben.sagel@grupopcr.com.pa', NULL, 2, 1, 'Taller', '2024-09-30 16:21:06'),
(70, 'Sharon', 'Barnabas', 'sharon.barnabas@grupopcr.com.pa', NULL, 2, 1, 'Contabilidad', '2024-09-30 16:21:06'),
(71, 'Sofia', 'Macias', 'sofia.macias@grupopcr.com.pa', NULL, 2, 1, 'RRHH', '2024-09-30 16:21:06'),
(72, 'Tatiana', 'Zapata', 'tatiana.zapata@dollarpanama.com', NULL, 2, 1, 'Retail', '2024-09-30 16:21:06'),
(73, 'Vanessa', 'Hernández', 'vanessa.hernandez@grupopcr.com.pa', NULL, 2, 1, 'Compras', '2024-09-30 16:21:06'),
(74, 'Wendy', 'Palomo', 'wendy.palomo@automarketpan.com', NULL, 2, 1, 'Automarket', '2024-09-30 16:21:06'),
(75, 'Yamileth', 'Rodriguez', 'yamileth.rodriguez@grupopcr.com.pa', NULL, 2, 1, 'Auditoria', '2024-09-30 16:21:06'),
(76, 'Yaribeth', 'Ortiz', 'yaribeth.ortiz@grupopcr.com.pa', NULL, 2, 1, 'RRHH', '2024-09-30 16:21:06'),
(77, 'Yasbethe', 'Crocamo', 'Yasbethe.Crocamo@grupopcr.com.pa', NULL, 2, 1, 'Compras', '2024-09-30 16:21:06'),
(78, 'Yisara', 'Elizabeth Caceres Hawkins', 'yisara.caceres@grupopcr.com.pa', NULL, 2, 1, 'Contabilidad', '2024-09-30 16:21:06'),
(79, 'Yissell', 'Perez', 'yissell.perez@grupopcr.com.pa', NULL, 2, 1, 'RRHH', '2024-09-30 16:21:06'),
(80, 'Yorlenis', 'Guzman', 'yorlenis.guzman@grupopcr.com.pa', NULL, 2, 1, 'Tecnologia', '2024-09-30 16:21:06'),
(108, 'qmax', 'qmax', 'pedroarrieta25@hotmail.com', 'firmas/66fda2955de5d.png', 3, 1, 'Visitas', '2024-10-02 19:44:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
