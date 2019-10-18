-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.21 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5279
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla tothembd.alumnosasistenciaasistenciaasistencia
CREATE TABLE IF NOT EXISTS `alumnos` (
  `Id_Alumno` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Curso` int(11) NOT NULL DEFAULT '0',
  `Nombre` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `Apellidos` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `Rut` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id_Alumno`),
  UNIQUE KEY `Id_Alumno` (`Id_Alumno`),
  KEY `Id_Curso` (`Id_Curso`),
  CONSTRAINT `Id_Curso` FOREIGN KEY (`Id_Curso`) REFERENCES `cursos` (`Id_Curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla tothembd.alumnos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;

-- Volcando estructura para tabla tothembd.asignaturas
CREATE TABLE IF NOT EXISTS `asignaturas` (
  `Id_Asignatura` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Curso` int(11) NOT NULL DEFAULT '0',
  `id_teacher` int(11) NOT NULL DEFAULT '0',
  `Nombre` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `Bibliografía` varchar(500) COLLATE utf8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id_Asignatura`),
  UNIQUE KEY `Id_Asignatura` (`Id_Asignatura`),
  KEY `Id_Cursos` (`Id_Curso`),
  KEY `Id_Profe` (`id_teacher`),
  CONSTRAINT `Id_Cursos` FOREIGN KEY (`Id_Curso`) REFERENCES `cursos` (`Id_Curso`),
  CONSTRAINT `Id_Profe` FOREIGN KEY (`id_teacher`) REFERENCES `profesores` (`id_teacher`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla tothembd.asignaturas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `asignaturas` DISABLE KEYS */;
/*!40000 ALTER TABLE `asignaturas` ENABLE KEYS */;

-- Volcando estructura para tabla tothembd.asistencia
CREATE TABLE IF NOT EXISTS `asistencia` (
  `Fecha_Hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Id_Cursos` int(11) NOT NULL,
  `Id_Alumnos` int(11) NOT NULL,
  `Presente` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Fecha_Hora`,`Id_Cursos`,`Id_Alumnos`),
  UNIQUE KEY `Fecha_Hora` (`Fecha_Hora`),
  KEY `Curso` (`Id_Cursos`),
  KEY `Alumnos` (`Id_Alumnos`),
  CONSTRAINT `Alumnos` FOREIGN KEY (`Id_Alumnos`) REFERENCES `alumnos` (`Id_Alumno`),
  CONSTRAINT `Curso` FOREIGN KEY (`Id_Cursos`) REFERENCES `cursos` (`Id_Curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla tothembd.asistencia: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `asistencia` ENABLE KEYS */;

-- Volcando estructura para tabla tothembd.cursos
CREATE TABLE IF NOT EXISTS `cursos` (
  `Id_Curso` int(11) NOT NULL AUTO_INCREMENT,
  `id_teacher` int(11) NOT NULL DEFAULT '0',
  `Sigla_Curso` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id_Curso`),
  UNIQUE KEY `Id_Curso` (`Id_Curso`),
  KEY `id_teacher` (`id_teacher`),
  CONSTRAINT `id_teacher` FOREIGN KEY (`id_teacher`) REFERENCES `profesores` (`id_teacher`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla tothembd.cursos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;

-- Volcando estructura para tabla tothembd.datos_alumno
CREATE TABLE IF NOT EXISTS `datos_alumno` (
  `Id_evalua` int(11) NOT NULL,
  `Id_alumn` int(11) NOT NULL,
  `Nota` float NOT NULL,
  PRIMARY KEY (`Id_evalua`,`Id_alumn`),
  UNIQUE KEY `Id_evalua` (`Id_evalua`),
  KEY `Id_alu` (`Id_alumn`),
  CONSTRAINT `Id_alu` FOREIGN KEY (`Id_alumn`) REFERENCES `alumnos` (`Id_Alumno`),
  CONSTRAINT `Id_ev` FOREIGN KEY (`Id_evalua`) REFERENCES `evaluaciones` (`Id_Evaluaciones`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla tothembd.datos_alumno: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `datos_alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `datos_alumno` ENABLE KEYS */;

-- Volcando estructura para tabla tothembd.evaluaciones
CREATE TABLE IF NOT EXISTS `evaluaciones` (
  `Id_Evaluaciones` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Asignat` int(11) NOT NULL,
  `Hora_Inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Hora_Final` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Tipo_Actividad` char(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`Id_Evaluaciones`),
  UNIQUE KEY `Id_Evaluaciones` (`Id_Evaluaciones`),
  KEY `Asignatura` (`Id_Asignat`),
  CONSTRAINT `Asignatura` FOREIGN KEY (`Id_Asignat`) REFERENCES `asignaturas` (`Id_Asignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla tothembd.evaluaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `evaluaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `evaluaciones` ENABLE KEYS */;

-- Volcando estructura para tabla tothembd.inf_personalidad
CREATE TABLE IF NOT EXISTS `inf_personalidad` (
  `Id_informe` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Alumno` int(11) NOT NULL,
  `Profesor` int(11) NOT NULL,
  `Descripción` text COLLATE utf8_bin,
  PRIMARY KEY (`Id_informe`),
  UNIQUE KEY `Id_informe` (`Id_informe`),
  KEY `Alumno` (`Id_Alumno`),
  KEY `Profesor` (`Profesor`),
  CONSTRAINT `Alumno` FOREIGN KEY (`Id_Alumno`) REFERENCES `alumnos` (`Id_Alumno`),
  CONSTRAINT `Profesor` FOREIGN KEY (`Profesor`) REFERENCES `profesores` (`id_teacher`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla tothembd.inf_personalidad: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `inf_personalidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `inf_personalidad` ENABLE KEYS */;

-- Volcando estructura para tabla tothembd.material_aula
CREATE TABLE IF NOT EXISTS `material_aula` (
  `Id_material` int(11) NOT NULL AUTO_INCREMENT,
  `Id_unidad` int(11) NOT NULL,
  `Ruta_archivo` varchar(100) COLLATE utf8_bin NOT NULL,
  `Nombre` char(50) COLLATE utf8_bin NOT NULL,
  `Tipo` char(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`Id_material`),
  UNIQUE KEY `Id_material` (`Id_material`),
  KEY `Id_unid` (`Id_unidad`),
  CONSTRAINT `Id_unid` FOREIGN KEY (`Id_unidad`) REFERENCES `unidad` (`Id_unidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla tothembd.material_aula: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `material_aula` DISABLE KEYS */;
/*!40000 ALTER TABLE `material_aula` ENABLE KEYS */;

-- Volcando estructura para tabla tothembd.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla tothembd.migrations: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla tothembd.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla tothembd.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla tothembd.preguntas_eval
CREATE TABLE IF NOT EXISTS `preguntas_eval` (
  `Id_Pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Evaluac` int(11) NOT NULL DEFAULT '0',
  `Res_Correcta` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id_Pregunta`),
  UNIQUE KEY `Id_Pregunta` (`Id_Pregunta`),
  KEY `id_Evalua` (`Id_Evaluac`),
  CONSTRAINT `id_Evalua` FOREIGN KEY (`Id_Evaluac`) REFERENCES `evaluaciones` (`Id_Evaluaciones`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla tothembd.preguntas_eval: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `preguntas_eval` DISABLE KEYS */;
/*!40000 ALTER TABLE `preguntas_eval` ENABLE KEYS */;

-- Volcando estructura para tabla tothembd.profesores
CREATE TABLE IF NOT EXISTS `profesores` (
  `id_teacher` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `Apellidos` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `Rut` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_teacher`),
  UNIQUE KEY `id_teacher` (`id_teacher`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla tothembd.profesores: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `profesores` DISABLE KEYS */;
/*!40000 ALTER TABLE `profesores` ENABLE KEYS */;

-- Volcando estructura para tabla tothembd.unidad
CREATE TABLE IF NOT EXISTS `unidad` (
  `Id_unidad` int(11) NOT NULL AUTO_INCREMENT,
  `id_asignatu` int(11) NOT NULL,
  `Descripcion` text COLLATE utf8_bin,
  PRIMARY KEY (`Id_unidad`),
  UNIQUE KEY `Id_unidad` (`Id_unidad`),
  KEY `id_asignaturas` (`id_asignatu`),
  CONSTRAINT `id_asignaturas` FOREIGN KEY (`id_asignatu`) REFERENCES `asignaturas` (`Id_Asignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla tothembd.unidad: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `unidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `unidad` ENABLE KEYS */;

-- Volcando estructura para tabla tothembd.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla tothembd.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Bastian', 'beaesebas@gmail.com', '$2y$10$qYOCANq5M/V3fKsPtsTPtu3Ubk9i/0//mwLAXtwmkud3ziERz5tcG', 'UN1GocMGXe0xphsA08631LjyA2NGDu9ODieW1VkZhcx3pbJoEoWPybgefLEJ', '2018-05-25 20:54:05', '2018-05-25 20:54:05');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
