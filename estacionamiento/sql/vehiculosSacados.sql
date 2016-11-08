SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `estacionamiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo_sacados`
--

CREATE TABLE IF NOT EXISTS `vehiculo_sacados` (
  `id` int(11) NOT NULL,
  `patente` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha` datetime COLLATE utf8mb4_spanish2_ci NOT NULL,
  `importe` float COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `vehiculo_sacados`
--

INSERT INTO `vehiculo_sacados` (`id`, `patente`, `fecha`,`importe`) VALUES
(1, 'ABC123', '2016-11-05',123),
(2, 'ABC123', '2016-11-05',234),
(3, 'ABC123', '2016-11-05',245),
(4, 'ABC123', '2016-11-05',453),
(5, 'ABC123', '2016-11-05',432),
(6, 'ABC123', '2016-11-05',321),
(7, 'ABC123', '2016-11-05',411),
(8, 'ABC123', '2016-11-05',154),
(9, 'ABC123', '2016-11-05',111),
(10, 'ABC123', '2016-11-05',222);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `vehiculo_sacados`
--
ALTER TABLE `vehiculo_sacados`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `vehiculo_sacados`
--
ALTER TABLE `vehiculo_sacados`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
