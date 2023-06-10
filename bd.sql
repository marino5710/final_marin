------tabla aplicaciones
CREATE TABLE aplicaciones (
    aplicacion_id SERIAL PRIMARY KEY,
    apliacion_nombre VARCHAR(70) NOT NULL,
    aplicacion_descripcion VARCHAR (255),
    aplicacion_fecha_inicio DATETIME,
    aplicacion_situacion char (1) DEFAULT '1'
);

---------tabla tareas
CREATE TABLE tareas (
    tarea_id SERIAL PRIMARY KEY,
    tarea_id_aplicacion INTEGER NOT NULL,
    tarea_descripcion TEXT,
    tarea_estado VARCHAR(50),
    tarea_fecha DATETIME,
    FOREIGN KEY (id_aplicacion) REFERENCES aplicaciones(id)
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
    FOREIGN KEY (id_aplicacion) REFERENCES aplicaciones(id),
    FOREIGN KEY (id_programador) REFERENCES programadores(id)
);