<?php
require '../../modelos/programador.php';
    try {
        $programador = new Programador($_GET);

        $programadores = $programador->buscar();
       
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>