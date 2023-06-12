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

    public function guardar(){
        $sql = "INSERT INTO asignacion_programadores (asignacion_id_aplicacion, asignacion_id_programador) VALUES ('$this->asignacion_id_aplicacion', '$this->asignacion_id_programador')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
    public function buscar()
    {
        $sql = "SELECT a.aplicacion_nombre, p.programador_grado, p.programador_nombre, ap.asignacion_id,
        t.tarea_descripcion, t.tarea_estado, t.tarea_fecha
        FROM aplicaciones a
        JOIN asignacion_programadores ap ON a.aplicacion_id = ap.asignacion_id_aplicacion
        JOIN programadores p ON ap.asignacion_id_programador = p.programador_id
        JOIN tareas t ON t.tarea_id_aplicacion = a.aplicacion_id
        WHERE 1=1";

    
            if (!empty($nombreAplicacion)) {
                $sql .= " AND a.aplicacion_nombre LIKE '%$nombreAplicacion%'";
            }

            if (!empty($gradoProgramador)) {
                $sql .= " AND p.programador_grado = '$gradoProgramador'";
            }

            if (!empty($nombreProgramador)) {
                $sql .= " AND p.programador_nombre LIKE '%$nombreProgramador%'";
            }

            if (!empty($asignacionId)) {
                $sql .= " AND ap.asignacion_id = $asignacionId";
            }


    
        $resultado = self::servir($sql);
    
        return $resultado;
    }
    
    
    
    
    public function modificar(){
        $sql = "UPDATE asignacion_programadores SET asignacion_id_aplicacion = '$this->asignacion_id_aplicacion', asignacion_id_programador = '$this->asignacion_id_programador' WHERE asignacion_id = $this->asignacion_id";
        

        // echo $sql;
        // exit;
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "DELETE FROM asignacion_programadores WHERE asignacion_id = $this->asignacion_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
