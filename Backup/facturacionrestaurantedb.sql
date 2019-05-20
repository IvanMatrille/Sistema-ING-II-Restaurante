-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-05-2019 a las 21:21:09
-- Versión del servidor: 10.3.13-MariaDB
-- Versión de PHP: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `facturacionrestaurantedb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cliente`
--

CREATE TABLE IF NOT EXISTS `Cliente` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Cedula` varchar(18) DEFAULT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Direccion` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Cliente`
--

INSERT INTO `Cliente` (`Id`, `Nombre`, `Apellido`, `Cedula`, `Telefono`, `Email`, `Direccion`) VALUES
(12, 'Henry Javier', 'Liriano German', '402-2334422', '809', 'henryliriano5059@gmail.com', 'Monte Adentro, Salcedo'),
(3, 'Henry', 'German', '409', '800', 'he@gmail.com', 'MA, Salcedo'),
(18, 'Amaro', 'Petronic', '2323', '8095206644', 'ass@gmail.com', 'hhj'),
(17, 'Randy', 'Perez', '2323', '788', 'ass@gmail.com', 'hhj'),
(16, 'Randy', 'Perez', '2323', '788', 'ass@gmail.com', 'hhj'),
(4, 'Ivan', 'De Jesus', '404', '809', 'ivan@gmail.com', 'SFM'),
(19, 'Carlos', 'Ortega', '4556', '809', 'ass@gmail.com', 'hhj'),
(2, 'Javier', 'Liriano', '402', '6643', 'he@gmail.com', 'MA, Salcedo'),
(13, 'DaSD', 'UUI', '4556', '990', 'henryliriano5059@gmail.com', 'Monte Adentro, Salcedo'),
(15, 'Henry Javier', 'JHH', '402-2334422-0', '990', 'henryliriano5059@gmail.com', 'Monte Adentro, Salcedo'),
(20, 'Joel', 'Mena', '056-012', '829', 'he@gmail.com', 'Macoris');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallespedido`
--

CREATE TABLE IF NOT EXISTS `detallespedido` (
  `Id` int(11) NOT NULL,
  `IdMesa` int(11) NOT NULL,
  `IdMesero` int(11) NOT NULL,
  `IdPlato` int(11) NOT NULL,
  `Cantidad` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Mesa`
--

CREATE TABLE IF NOT EXISTS `Mesa` (
  `Id` int(11) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Mesa`
--

INSERT INTO `Mesa` (`Id`, `Descripcion`) VALUES
(1, 'Buffet'),
(2, '#2'),
(3, 'Bocadillo'),
(4, 'Mesa #01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pedido`
--

CREATE TABLE IF NOT EXISTS `Pedido` (
  `Id` int(11) NOT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Estado` varchar(20) DEFAULT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Pedido`
--

INSERT INTO `Pedido` (`Id`, `Descripcion`, `Estado`, `Fecha`, `Hora`) VALUES
(4, '3 vasos de sopa de letra', 'Pendiente', '2019-05-16', '21:52:08'),
(7, 'Pizza italiana vegetariana', 'Pendiente', '2019-05-18', '21:23:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `Id` int(11) NOT NULL,
  `nombre_permiso` varchar(100) DEFAULT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Plato`
--

CREATE TABLE IF NOT EXISTS `Plato` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Cantidad` int(11) NOT NULL DEFAULT 0,
  `Ubicacion` varchar(100) DEFAULT NULL,
  `ITBIS` double DEFAULT NULL,
  `Precio` double NOT NULL,
  `Costo` decimal(10,0) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Plato`
--

INSERT INTO `Plato` (`Id`, `Nombre`, `Cantidad`, `Ubicacion`, `ITBIS`, `Precio`, `Costo`) VALUES
(1, 'Arroz con habichuela', 1, 'Mesa 4', 12, 115, '94'),
(23, 'Moro de habicuela', 1, 'Mesa', 4, 199, '76'),
(24, 'DaSD', 1, 'Mesa', 66, 99, '88'),
(25, 'Pechuga de pollo a la plancha', 1, 'AScv', 1, 100, '85'),
(26, 'Carne azada', 5, 'ASD', 5, 50, '15'),
(27, 'QWQE', 4, '', 88, 100, '75');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Reservaciones`
--

CREATE TABLE IF NOT EXISTS `Reservaciones` (
  `Id` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `IdMesa` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Reservaciones`
--

INSERT INTO `Reservaciones` (`Id`, `IdCliente`, `IdMesa`, `Fecha`, `Hora`) VALUES
(4, 12, 3, '2019-05-18', '2 pm'),
(12, 17, 2, '2019-05-18', '2 pm'),
(14, 12, 2, '2019-05-19', '1 pm'),
(10, 17, 3, '2019-05-18', '3 pm'),
(11, 12, 3, '2019-05-18', '3 am'),
(15, 2, 2, '2019-05-20', '1 pm'),
(16, 2, 2, '2019-05-23', '8 pm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RolUsuario`
--

CREATE TABLE IF NOT EXISTS `RolUsuario` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `RolUsuario`
--

INSERT INTO `RolUsuario` (`Id`, `Nombre`) VALUES
(1, 'Administrador'),
(2, 'Cajero'),
(3, 'Mesero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `NombreUsuario` varchar(100) NOT NULL,
  `IdRolUsuario` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`Id`, `Nombre`, `Apellido`, `NombreUsuario`, `IdRolUsuario`, `Password`) VALUES
(1, 'sadfasdf', 'asdfasdf', 'asdfasdf', 2, 'Cajero'),
(2, 'randy', 'pena', 'rpj92', 1, '1608'),
(3, 'randy', 'pena', 'rpj92', 1, 'LLUEVEpordentro1'),
(4, 'randy', 'pena', 'rpj92', 1, 'LLUEVEpor1'),
(5, 'dsafadsf', 'asdfasdf', 'asdfasdf', 1, 'asdfasdf'),
(6, 'errwertert', 'ewrtwertewrrt', 'wertwert', 1, 'wertwertewrt'),
(7, 'errwertert', 'ewrtwertewrrt', 'wertwert', 1, 'wertwertewrt'),
(8, 'errwertert', 'ewrtwertewrrt', 'wertwert', 1, 'wertwertewrt'),
(9, 'jose andres', 'jimenez', 'jimenez', 1, 'lalalla'),
(10, 'junio', 'amaro', 'amaro', 1, '124'),
(11, '7', 'errwertert', 'ewrtwertewrrt', 1, 'sdfasdfasdf'),
(12, 'sadfasdf', 'asdfasdf', 'sadfasdfsadf,', 1, 'safddffgasdfdsf'),
(13, 'Ramon', 'Sanchez', 'SSystem', 2, '1608'),
(14, 'Henry Javier', 'Liriano German', 'henry5059', 3, '1608');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Mesa`
--
ALTER TABLE `Mesa`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Pedido`
--
ALTER TABLE `Pedido`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Plato`
--
ALTER TABLE `Plato`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Reservaciones`
--
ALTER TABLE `Reservaciones`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `RolUsuario`
--
ALTER TABLE `RolUsuario`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Cliente`
--
ALTER TABLE `Cliente`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `Mesa`
--
ALTER TABLE `Mesa`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `Pedido`
--
ALTER TABLE `Pedido`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Plato`
--
ALTER TABLE `Plato`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `Reservaciones`
--
ALTER TABLE `Reservaciones`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `RolUsuario`
--
ALTER TABLE `RolUsuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
