-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-03-2017 a las 17:55:43
-- Versión del servidor: 5.7.17-0ubuntu0.16.10.1
-- Versión de PHP: 7.0.15-0ubuntu0.16.10.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `PWEB`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `tipo` enum('auto','camioneta','motocicleta','bicicleta','otro') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `precio` float NOT NULL,
  `fecha` date NOT NULL,
  `foto` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `tipo`, `titulo`, `descripcion`, `precio`, `fecha`, `foto`) VALUES
(2, 'auto', 'Ferrari 488 GTB 2014', '-400 Kms 670 Cvs\r\n-Xenon Adaptativo \r\n-Ferrari Telemetrie \r\n-Cámara trasera y delantera \r\n-Pack Carbon Leds Hifi Soundsystem \r\n-Premium Bluetooth Navigations system ', 5500000, '2016-03-09', 'ferrari.jpg'),
(3, 'camioneta', 'Porsche Cayenne Turbo S 2015', 'Porsche cayenne turbo S, 500cv, 1 propietario, vehículo nacional, todas las revisiones en concesionario oficial, full equip, km reales y certificados. Cambio de nombre incluido,', 2416730, '2016-01-12', 'porsche.jpg'),
(4, 'motocicleta', 'Confederate WRAITH B120 2006', 'Chasis inspirado de aviones, marco de fibra de carbono, tenedor hecho a mano y ruedas de siete radios.\r\nMotor bicilindrico V de 1.600cc Potencia: 125 CV\r\nPar: 18 Kgm\r\nPeso: 186 kg', 874500, '2016-02-14', 'confederate.jpg'),
(5, 'auto', 'VW Polo', 'Polo usado blanco 2010', 50000, '2016-03-16', ''),
(6, 'camioneta', 'Ford Lobo Negra', 'Ford Lobo con todos sus accesorios, único dueño. 2015', 150000, '2016-03-15', ''),
(15, 'otro', 'Bicicleta de montaña bimex', 'Vendo bicicleta de montaña marca Bimex, muy bien cuidada.', 1500, '2016-03-16', '1458158062184061024LEVELFORCER20.jpg'),
(16, 'camioneta', 'VMW', 'Lorem ipsum', 28323900, '2017-03-22', ''),
(17, 'camioneta', 'Mama movil', 'Hola', 7837, '2017-03-22', ''),
(18, 'otro', 'Triciclo', 'Tres ruedas', 0, '2017-03-22', ''),
(19, 'motocicleta', 'Harley Davidson', 'judfjsdjio', 9091, '2017-03-22', ''),
(20, 'auto', 'Blanco', 'ioewjiowe', 5555, '2017-03-22', ''),
(21, 'auto', 'Mini copper', 'jkvjksdfjnksfv', 123455, '2017-03-22', ''),
(22, 'otro', 'Tres', 'jhkwefjkfwjk', 9292, '2017-03-22', ''),
(23, 'otro', 'Platillo volador', 'jokjfsdklj', 976, '2017-03-22', ''),
(24, 'auto', 'Batimovil', 'jidfjdfjl', 6362, '2017-03-22', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
