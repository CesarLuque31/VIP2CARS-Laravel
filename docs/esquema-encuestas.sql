CREATE DATABASE IF NOT EXISTS encuestas DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE encuestas;

SET NAMES utf8mb4;
SET time_zone = '+00:00';

-- 1) Encuestas: metadatos básicos de cada encuesta
CREATE TABLE encuestas (
  id               BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  titulo           VARCHAR(255) NOT NULL,
  descripcion      TEXT NULL,
  activa           TINYINT(1) NOT NULL DEFAULT 1,
  vence_el         DATETIME NULL,
  created_at       DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at       DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- - Define la encuesta (nombre, descripción, estado).
-- - 'activa' y 'vence_el' controlan publicación y fecha límite.
-- - Timestamps para auditoría y orden en listados.

-- 2) Preguntas: definición de cada pregunta y su orden dentro de la encuesta
CREATE TABLE preguntas (
  id               BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  encuesta_id      BIGINT UNSIGNED NOT NULL,
  texto            TEXT NOT NULL,
  tipo             ENUM('texto','numero','fecha','opcion','multiopcion') NOT NULL,
  opciones         JSON NULL,                  -- valores para opcion/multiopcion (p. ej. ["Sí","No"])
  obligatoria      TINYINT(1) NOT NULL DEFAULT 0,
  orden            INT NOT NULL,
  created_at       DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at       DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_preguntas_encuesta
    FOREIGN KEY (encuesta_id) REFERENCES encuestas(id) ON DELETE CASCADE,
  UNIQUE (encuesta_id, orden)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- - Lista las preguntas de una encuesta y su posición (orden).
-- - 'tipo' determina validación/render. 'opciones' guarda choices si aplica.
-- - UNIQUE por (encuesta_id, orden) evita colisiones de orden.
-- - ON DELETE CASCADE elimina preguntas al borrar su encuesta.

-- 3) Envíos: una fila por cuestionario completado (anónimo)
CREATE TABLE envios (
  id               BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  encuesta_id      BIGINT UNSIGNED NOT NULL,
  sesion_id        VARCHAR(255) NULL,         -- opcional; útil para limitar múltiples envíos sin identificar persona
  enviado_el       DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  created_at       DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_envios_encuesta
    FOREIGN KEY (encuesta_id) REFERENCES encuestas(id) ON DELETE CASCADE,
  INDEX (encuesta_id, enviado_el)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- - Cabecera del envío de una encuesta.
-- - Permite analizar envíos por fecha y por encuesta.
-- - Índice acelera listados/métricas por encuesta y rango de tiempo.

-- 4) Respuestas: una fila por pregunta respondida dentro de un envío
CREATE TABLE respuestas (
  id               BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  envio_id         BIGINT UNSIGNED NOT NULL,
  pregunta_id      BIGINT UNSIGNED NOT NULL,
  valor_texto      TEXT NULL,
  valor_numero     DECIMAL(10,2) NULL,
  valor_fecha      DATE NULL,
  valor_json       JSON NULL,                 -- para multiopción u otras estructuras
  created_at       DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_respuestas_envio
    FOREIGN KEY (envio_id) REFERENCES envios(id) ON DELETE CASCADE,
  CONSTRAINT fk_respuestas_pregunta
    FOREIGN KEY (pregunta_id) REFERENCES preguntas(id) ON DELETE CASCADE,
  UNIQUE (envio_id, pregunta_id),             -- asegura una sola respuesta por pregunta en cada envío
  INDEX (pregunta_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- - Detalle de cada respuesta. Se usa solo la columna que corresponda al 'tipo' de la pregunta.
-- - UNIQUE evita duplicados por (envio, pregunta).
