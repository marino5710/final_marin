<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'Conexion.php';

class AsignacionProgramadores extends Conexion{
    public $asignacion_id;
    public $asignacion_id_aplicacion;
    public $asignacion_id_programador;

    public function __construct($args = [])
    {
        $this->asignacion_id = $args['asignacion_id'] ?? null;
        $this->asignacion_id_aplicacion = $args['asignacion_id_aplicacion'] ?? null;
        $this->asignacion_id_programador = $args['asignacion_id_programador'] ?? null;
    }

    public function buscar($aplicacion_id, $programador_grado, $programador_nombre, $asignacion_id)
    {
        $sql = "SELECT a.aplicacion_nombre, p.programador_grado, p.programador_nombre, ap.asignacion_id,
            t.tarea_descripcion, t.tarea_estado, t.tarea_fecha
            FROM aplicaciones a
            JOIN asignacion_programadores ap ON a.aplicacion_id = ap.asignacion_id_aplicacion
            JOIN programadores p ON ap.asignacion_id_programador = p.programador_id
            JOIN tareas t ON t.tarea_id_aplicacion = a.aplicacion_id
            WHERE 1=1";
    
        if (!empty($aplicacion_id)) {
            $sql .= " AND a.aplicacion_id = $aplicacion_id";
        }
    
        if (!empty($programador_grado)) {
            $sql .= " AND p.programador_grado = '$programador_grado'";
        }
    
        if (!empty($programador_nombre)) {
            $sql .= " AND p.programador_nombre LIKE '%$programador_nombre%'";
        }
    
        if (!empty($asignacion_id)) {
            $sql .= " AND ap.asignacion_id = $asignacion_id";
        }
    
        $resultados = self::servir($sql);
    
        return $resultados;
    }
 }    