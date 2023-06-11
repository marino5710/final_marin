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
        $sql = "SELECT
            a.aplicacion_nombre,
            p.programador_grado,
            p.programador_nombre,
            ap.asignacion_id,
            ap.asignacion_id_aplicacion,
            ap.asignacion_id_programador
        FROM
            aplicaciones a
            JOIN asignacion_programadores ap ON a.aplicacion_id = ap.asignacion_id_aplicacion
            JOIN programadores p ON p.programador_id = ap.asignacion_id_programador";
    
        if ($this->asignacion_id_aplicacion !== null) {
            $sql .= " WHERE asignacion_id_aplicacion = $this->asignacion_id_aplicacion";
        }
    
        if ($this->asignacion_id_programador !== null) {
            if ($this->asignacion_id_aplicacion !== null) {
                $sql .= " AND asignacion_id_programador = $this->asignacion_id_programador";
            } else {
                $sql .= " WHERE asignacion_id_programador = $this->asignacion_id_programador";
            }
        }
    
        $resultado = self::servir($sql);
        
        if (!empty($resultado)) {
            return $resultado;
        } else {
            return array(); // Devuelve un arreglo vacío si no hay resultados
        }
    }
    
    
    public function modificar(){
        $sql = "UPDATE asignacion_programadores SET asignacion_id_aplicacion = '$this->asignacion_id_aplicacion', asignacion_id_programador = '$this->asignacion_id_programador' WHERE asignacion_id = $this->asignacion_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "DELETE FROM asignacion_programadores WHERE asignacion_id = $this->asignacion_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
