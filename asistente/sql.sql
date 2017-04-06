--
-- Creación de TABLAS
--

--
-- Estructura de tabla para la tabla `conexion`
--

CREATE TABLE IF NOT EXISTS `conexion` (
  `ID-RED` int(11) NOT NULL,
  `ID-USUARIO` int(11) NOT NULL,
  `LINK-PERFIL` text COLLATE utf8_unicode_ci NOT NULL,
  `FECHA` datetime NOT NULL,
  KEY `ID-RED` (`ID-RED`),
  KEY `ID-USUARIO` (`ID-USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes`
--

CREATE TABLE IF NOT EXISTS `redes` (
  `ID-RED` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DESCRIPCION` text COLLATE utf8_unicode_ci NOT NULL,
  `ICONO` text COLLATE utf8_unicode_ci NOT NULL,
  `LINK` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID-RED`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `APEDILLOS` text COLLATE utf8_unicode_ci NOT NULL,
  `CORREO` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CONTRASENA` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `FOTO` text COLLATE utf8_unicode_ci NOT NULL,
  `FECHA` date NOT NULL,
  `ESTADO` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `CORREO` (`CORREO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Filtros para la tabla `conexion`
--
ALTER TABLE `conexion`
  ADD CONSTRAINT `conexion_ibfk_1` FOREIGN KEY (`ID-USUARIO`) REFERENCES `usuario` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conexion_ibfk_2` FOREIGN KEY (`ID-RED`) REFERENCES `redes` (`ID-RED`) ON DELETE CASCADE ON UPDATE CASCADE;