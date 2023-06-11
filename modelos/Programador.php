<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'Conexion.php';

class Programador extends Conexion{
    public $programador_id;
    public $programador_grado;
    public $programador_nombre;
    public $programador_apellido;
    public $programador_situacion;

    public function __construct($args = [] )
    {
        $this->programador_id = $args['programador_id'] ?? null;
        $this->programador_grado = $args['programador_grado'] ?? '';
        $this->programador_nombre = $args['programador_nombre'] ?? '';
        $this->programador_apellido = $args['programador_apellido'] ?? '';
        $this->programador_situacion = $args['programador_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO programadores (programador_grado, programador_nombre, programador_apellido) VALUES ('$this->programador_grado', '$this->programador_nombre', '$this->programador_apellido')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM programadores WHERE programador_situacion = 1";

        if($this->programador_grado != ''){
            $sql .= " AND programador_grado LIKE '%$this->programador_grado%'";
        }

        if($this->programador_nombre != ''){
            $sql .= " AND programador_nombre LIKE '%$this->programador_nombre%'";
        }

        if($this->programador_apellido != ''){
            $sql .= " AND programador_apellido LIKE '%$this->programador_apellido%'";
        }

        if($this->programador_id != null){
            $sql .= " AND programador_id = $this->programador_id";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE programadores SET programador_grado = '$this->programador_grado', programador_nombre = '$this->programador_nombre', programador_apellido = '$this->programador_apellido' WHERE programador_id = $this->programador_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE programadores SET programador_situacion = 0 WHERE programador_id = $this->programador_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
?>
