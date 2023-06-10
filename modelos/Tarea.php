<?php 
require_once 'Conexion.php';

class Tarea extends Conexion{
    public $tarea_id;
    public $tarea_id_aplicacion;
    public $tarea_descripcion;
    public $tarea_estado;
    public $tarea_fecha;
    public $tarea_situacion;

    public function __construct($args = [])
    {
        $this->tarea_id = $args['tarea_id'] ?? null;
        $this->tarea_id_aplicacion = $args['tarea_id_aplicacion'] ?? null;
        $this->tarea_descripcion = $args['tarea_descripcion'] ?? '';
        $this->tarea_estado = $args['tarea_estado'] ?? '';
        $this->tarea_fecha = $args['tarea_fecha'] ?? '';
        $this->tarea_situacion = $args['tarea_situacion'] ?? '1';
    }

    public function guardar(){
        $sql = "INSERT INTO tareas (tarea_id_aplicacion, tarea_descripcion, tarea_estado, tarea_fecha, tarea_situacion) VALUES ('$this->tarea_id_aplicacion', '$this->tarea_descripcion', '$this->tarea_estado', '$this->tarea_fecha', '$this->tarea_situacion')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM tareas WHERE tarea_situacion = '1'";

        if($this->tarea_id_aplicacion != null){
            $sql .= " AND tarea_id_aplicacion = $this->tarea_id_aplicacion";
        }

        if($this->tarea_estado != ''){
            $sql .= " AND tarea_estado = '$this->tarea_estado'";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE tareas SET tarea_id_aplicacion = '$this->tarea_id_aplicacion', tarea_descripcion = '$this->tarea_descripcion', tarea_estado = '$this->tarea_estado', tarea_fecha = '$this->tarea_fecha' WHERE tarea_id = $this->tarea_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE tareas SET tarea_situacion = '0' WHERE tarea_id = $this->tarea_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}