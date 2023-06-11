------tabla aplicaciones
CREATE TABLE aplicaciones (
    aplicacion_id SERIAL PRIMARY KEY,
    aplicacion_nombre VARCHAR(70) NOT NULL,
    aplicacion_fecha_inicio DATETIME YEAR TO MINUTE NOT NULL,
    aplicacion_situacion char (1) DEFAULT '1'
);

---------tabla tareas
CREATE TABLE tareas (
    tarea_id SERIAL PRIMARY KEY,
    tarea_id_aplicacion INTEGER NOT NULL,
    tarea_descripcion TEXT NOT NULL,
    tarea_estado VARCHAR(15) CHECK (tarea_estado IN ('FINALIZADA', 'NO INICIADA')) NOT NULL,
    tarea_fecha DATETIME YEAR TO MINUTE NOT NULL,
    tarea_situacion char (1) DEFAULT '1',
    FOREIGN KEY (tarea_id_aplicacion) REFERENCES aplicaciones(aplicacion_id)
);
------------tabla programadores
CREATE TABLE programadores (
    programador_id SERIAL PRIMARY KEY,
    programador_nombre VARCHAR(70) NOT NULL,
    programador_apellido VARCHAR(70) NOT NULL,
    programador_situacion char (1) DEFAULT '1'

);

-----------tabla asignacion
CREATE TABLE asignacion_programadores (
    asignacion_id SERIAL PRIMARY KEY,
    asignacion_id_aplicacion INTEGER NOT NULL,
    asignacion_id_programador INTEGER NOT NULL,
    FOREIGN KEY (asignacion_id_aplicacion) REFERENCES aplicaciones(aplicacion_id),
    FOREIGN KEY (asignacion_id_programador) REFERENCES programadores(programador_id)
);