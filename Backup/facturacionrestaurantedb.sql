-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-05-2019 a las 20:06:23
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
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Cedula` varchar(18) DEFAULT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Direccion` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Cliente`
--

INSERT INTO `Cliente` (`Id`, `Nombre`, `Apellido`, `Cedula`, `Telefono`, `Email`, `Direccion`) VALUES
(2, 'Javier', 'Liriano', '402', '6643', 'he@gmail.com', 'MA, Salcedo'),
(3, 'Henry', 'German', '409', '800', 'he@gmail.com', 'MA, Salcedo'),
(4, 'Ivan', 'De Jesus', '404', '809', 'ivan@gmail.com', 'SFM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DetallePedido`
--

CREATE TABLE IF NOT EXISTS `DetallePedido` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Mesa`
--

INSERT INTO `Mesa` (`Id`, `Descripcion`) VALUES
(1, 'Mesa buffet'),
(2, 'Mesa pichadera'),
(3, 'Ensaladas, #4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pedido`
--

CREATE TABLE IF NOT EXISTS `Pedido` (
  `Id` int(11) NOT NULL,
  `Descripcion` varchar(150) NOT NULL,
  `Estado` varchar(100) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Pedido`
--

INSERT INTO `Pedido` (`Id`, `Descripcion`, `Estado`, `Fecha`, `Hora`) VALUES
(1, '1 buffet de pastel de carne', 'Pendiente', '2019-05-17', '07:53:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Permisos`
--

CREATE TABLE IF NOT EXISTS `Permisos` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Platos`
--

CREATE TABLE IF NOT EXISTS `Platos` (
  `Id` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Precio` decimal(15,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Producto`
--

CREATE TABLE IF NOT EXISTS `Producto` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Referencia` varchar(100) NOT NULL,
  `CantidadInicial` int(11) NOT NULL DEFAULT 0,
  `Categoria` varchar(100) NOT NULL,
  `Ubicacion` varchar(100) NOT NULL,
  `ITBIS` double NOT NULL,
  `Precio` double NOT NULL,
  `Costo` decimal(10,0) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Producto`
--

INSERT INTO `Producto` (`Id`, `Nombre`, `Referencia`, `CantidadInicial`, `Categoria`, `Ubicacion`, `ITBIS`, `Precio`, `Costo`) VALUES
(1, 'Arroz con habichuela', 'NN', 1, 'Armuerzo', '', 5, 35, '20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Reservaciones`
--

CREATE TABLE IF NOT EXISTS `Reservaciones` (
  `Id` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `IdMesa` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Reservaciones`
--

INSERT INTO `Reservaciones` (`Id`, `IdCliente`, `IdMesa`, `Fecha`) VALUES
(1, 3, 1, '2019-05-17'),
(2, 2, 2, '2019-05-17'),
(3, 2, 2, '2019-05-17'),
(4, 3, 3, '2019-05-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RolUsuario`
--

CREATE TABLE IF NOT EXISTS `RolUsuario` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `RolUsuario`
--

INSERT INTO `RolUsuario` (`Id`, `Nombre`) VALUES
(1, 'Administrador'),
(2, 'Vendedor'),
(3, 'Cajero'),
(4, 'Mesero'),
(5, 'Cocinero');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`Id`, `Nombre`, `Apellido`, `NombreUsuario`, `IdRolUsuario`, `Password`) VALUES
(1, 'Javier', 'Liriano', 'henry008', 3, '1608'),
(2, 'Javier', 'German', 'henry5059', 2, '16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Cliente_UN` (`Cedula`);

--
-- Indices de la tabla `DetallePedido`
--
ALTER TABLE `DetallePedido`
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
-- Indices de la tabla `Permisos`
--
ALTER TABLE `Permisos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Platos`
--
ALTER TABLE `Platos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Producto`
--
ALTER TABLE `Producto`
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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `DetallePedido`
--
ALTER TABLE `DetallePedido`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Mesa`
--
ALTER TABLE `Mesa`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `Pedido`
--
ALTER TABLE `Pedido`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Permisos`
--
ALTER TABLE `Permisos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Platos`
--
ALTER TABLE `Platos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Producto`
--
ALTER TABLE `Producto`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Reservaciones`
--
ALTER TABLE `Reservaciones`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `RolUsuario`
--
ALTER TABLE `RolUsuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
