-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2019 a las 03:24:39
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Cedula` varchar(18) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Direccion` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Id`, `Nombre`, `Apellido`, `Cedula`, `Telefono`, `Email`, `Direccion`) VALUES
(1, 'Ivan ', 'De Jesus Matrille', '402-11111111', '829-222-2222', 'id@gmail.com', 'Mi casa'),
(2, 'sdfgsdfg', 'sdfgsdfgsdfg', 'sdfgsdfg', 'dfsgsdg', 'sdfgsdfgsdg', 'sdfgsdfg'),
(3, 'dsgsdfgs', 'dfgsdfg', 'gsdfgsdfgsd', 'fgsdfgsdfgs', 'fgsdfgsdfgsd', 'dfgsdfgsdfg'),
(4, 'asdfadsfasdf', 'asdfasdf', 'asdfasdf', 'asdfasdf', 'asdfasdf', 'asdfasdfsadf'),
(5, 'sdfvbsdfvsdfv', 'sdfvsdfvdsfv', 'sdfvsdfvsdfv', 'sdvsdfv', 'sdfvsdfv', 'sdfvsdfvfdv'),
(6, 'dfvsfdvdsf', 'vsdfvsdfv', 'fdvsdfvsdfv', 'sdfvsdfvsdfv', 'sdfvsdfv', 'sdfvsdfvsdfv'),
(7, 'sdvasdvsadv', 'asdvasdv', 'asdvasdva', '', 'asdvasdvsdv', ''),
(8, 'sdvasdvsadv', 'asdvasdv', 'asdvasdva', '', 'asdvasdvsdv', ''),
(9, 'sadfasdfdsaf', 'asdfasdfasdf', '', '', '', ''),
(10, 'sadfadsfdsaf', 'asdfasdfasdf', '', '', '', ''),
(11, 'dsfasdf', 'asdfasdf', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallespedido`
--

CREATE TABLE `detallespedido` (
  `Id` int(11) NOT NULL,
  `IdMesa` int(11) DEFAULT NULL,
  `IdPlato` int(11) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `IdMesero` int(11) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `Id` int(11) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`Id`, `Descripcion`) VALUES
(1, NULL),
(2, 'dsafdasfdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `Id` int(11) NOT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Estado` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `Id` int(11) NOT NULL,
  `nombre_permiso` varchar(100) DEFAULT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `Id` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`Id`, `Descripcion`, `Precio`) VALUES
(1, 'Arroz con maiz, pollo frito y ensalada verde.', 250),
(2, 'Moro de guandules, pica pica y aguacate', 225);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Referencia` varchar(100) NOT NULL,
  `CantidadInicial` int(11) NOT NULL DEFAULT '0',
  `Categoria` varchar(100) NOT NULL,
  `Ubicacion` varchar(100) NOT NULL,
  `ITBIS` double NOT NULL,
  `Precio` double NOT NULL,
  `Costo` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Id`, `Nombre`, `Referencia`, `CantidadInicial`, `Categoria`, `Ubicacion`, `ITBIS`, `Precio`, `Costo`) VALUES
(1, 'sadfasfasdf', 'asdfasdfas', 23, 'asdfasdfasdf', 'dsfdsfg', 12, 120, '100'),
(2, 'asdfasdfasdf', 'sdafasdf', 23, 'asfasdf', '23', 23, 23, '23'),
(3, 'asdfasdfasdf', 'sdafasdf', 23, 'asfasdf', '23', 23, 23, '23'),
(4, 'asdfasdfasdf', 'sdafasdf', 23, 'asfasdf', '23', 23, 23, '23'),
(5, 'fasdf', 'asdfasdf', 34, 'asdfasdf', 'sadffsdfg', 10, 23, '23'),
(6, 'fasdf', 'asdfasdf', 34, 'asdfasdf', 'sadffsdfg', 10, 23, '23'),
(7, 'dfgdsfg', 'sdfgsdfgsdfg', 23, 'sdfgsdfgsd', 'dsfdsfgsdfg', 19, 34, '23'),
(8, 'sdfasdf', 'dfgsdfgdsfg', 34, 'sdfgsdfg', 'dsfgsdfg', 10, 10, '10'),
(9, 'sdfasf', 'asdfasdfasf', 34, 'asfdasfasf', 'sdadasdf', 10, 23, '3'),
(10, 'sdafasdf', 'asdfasdfa', 234, 'asdfasdf', 'sdfsadf', 10, 100, '10'),
(11, 'sdfasdfasdf', 'asfdasdf', 100, 'asdfasdf', 'asdfasdf', 10, 3434, '34'),
(12, 'sdfasdfasdf', 'asfdasdf', 100, 'asdfasdf', 'asdfasdf', 10, 3434, '34'),
(13, 'asdfasdfasf', 'asdfasdfasdf', 34, 'asdfasdfasdf', 'sdsadf', 23, 345, '324'),
(14, 'asdfasdf', 'asdfasdfasdf', 34, 'asdfasdfsadf', 'sfdgsdfg', 34, 3434, '34'),
(15, 'asdfasdf', 'asdfasdf', 2323, 'sadfsadf', 'sadfsadf', 23, 23, '23'),
(16, 'asdfasdf', 'asdfasdf', 2323, 'sadfsadf', 'sadfsadf', 23, 23, '23'),
(17, 'sadfasdfa', 'fasfddsadf', 343, 'asdfasdfsadf', 'safasdf', 34, 34, '34'),
(18, 'sadfasdf', 'asdfasdf', 23, 'sadfasdf', 'sadf', 23, 23, '23'),
(19, 'sadfasdfas', 'asdfasdfsadf', 34, 'sdafsadf', 'efdasdf', 34, 324, '34'),
(20, 'asdfdasf', 'sadfasdfasdf', 34, 'asdfasdf', 'sdfasdf', 34, 34, '34'),
(21, 'sdafasf', 'asdfasdf', 34, 'asdfasdf', 'sdfasdf', 34, 34, '34'),
(22, 'fdsgsdfgdsfg', 'sdfgsdfgsdfg', 34, 'sdfgsdfgsdfg', 'sdfgsdfgsdfg', 34, 3535, '345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE `reservaciones` (
  `Id` int(11) NOT NULL,
  `Codigo` varchar(30) DEFAULT NULL,
  `Mesa` varchar(30) DEFAULT NULL,
  `Fecha` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`Id`, `Codigo`, `Mesa`, `Fecha`) VALUES
(1, '2', '2', '2018-12-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `NombreUsuario` varchar(100) NOT NULL,
  `RolUsuario` varchar(50) NOT NULL,
  `Contrasena` varchar(65000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `Nombre`, `Apellido`, `NombreUsuario`, `RolUsuario`, `Contrasena`) VALUES
(1, 'sadfasdf', 'asdfasdf', 'asdfasdf', 'sadfasdfsadf,', 'Cajero'),
(2, 'randy', 'pena', 'rpj92', 'Administrador,', ''),
(3, 'randy', 'pena', 'rpj92', 'Administrador,', 'LLUEVEpordentro1'),
(4, 'randy', 'pena', 'rpj92', 'Administrador,', 'LLUEVEpor1'),
(5, 'dsafadsf', 'asdfasdf', 'asdfasdf', 'Administrador,', 'asdfasdf'),
(6, 'errwertert', 'ewrtwertewrrt', 'wertwert', 'Administrador,', 'wertwertewrt'),
(7, 'errwertert', 'ewrtwertewrrt', 'wertwert', 'Administrador,', 'wertwertewrt'),
(8, 'errwertert', 'ewrtwertewrrt', 'wertwert', 'Administrador,', 'wertwertewrt'),
(9, 'jose andres', 'jimenez', 'jimenez', 'Administrador,', 'lalalla'),
(10, 'junio', 'amaro', 'amaro', 'Administrador,', '124'),
(11, '7', 'errwertert', 'ewrtwertewrrt', ',', 'sdfasdfasdf'),
(12, 'sadfasdf', 'asdfasdf', 'sadfasdfsadf,', ',', 'safddffgasdfdsf');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `detallespedido`
--
ALTER TABLE `detallespedido`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `detallespedido`
--
ALTER TABLE `detallespedido`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
