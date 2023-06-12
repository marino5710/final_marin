<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../modelos/Progreso_Aplicacion.php';

// Obtener los valores de los parámetros si están presentes
$aplicacion_id = $_GET['aplicacion_id'] ?? '';
$programador_grado = $_GET['programador_grado'] ?? '';
$programador_nombre = $_GET['programador_nombre'] ?? '';
$asignacion_id = $_GET['asignacion_id'] ?? '';

try {
    $resultados = array();
    $asignacionProgramadores = new AsignacionProgramadores();
    $resultados = $asignacionProgramadores->buscar($aplicacion_id, $programador_grado, $programador_nombre, $asignacion_id);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}


$totalTareas = count($resultados);
$tareasFinalizadas = 0;

foreach ($resultados as $resultado) {
    if ($resultado['TAREA_ESTADO'] === 'FINALIZADA') {
        $tareasFinalizadas++;
    }
}

if ($totalTareas > 0) {
    $porcentajeAvance = ($tareasFinalizadas / $totalTareas) * 100;
} else {
    $porcentajeAvance = 0; 
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultados</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">BUSCAR PROGRESO DE LA APLICACION</h1>
        <table class="table table-bordered border-dark">
            <thead>
                <tr>
                    <th colspan="2">Nombre de la Aplicación</th>
                    <td colspan="2"><?= $resultados[0]['APLICACION_NOMBRE'] ?? '' ?></td>
                </tr>
                <tr>
                    <th colspan="2">Programador Asignado</th>
                    <td colspan="2"><?= $resultados[0]['PROGRAMADOR_GRADO'] ?? '' ?> <?= $resultados[0]['PROGRAMADOR_NOMBRE'] ?? '' ?></td>
                </tr>
                <tr>
                    <th colspan="4" class="text-center">TAREAS POR REALIZAR</th>
                </tr>
                <tr>
                    <th>No.</th>
                    <th>Tarea</th>
                    <th>Fecha de la Realización</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($resultados)) : ?>
                    <?php foreach ($resultados as $key => $resultado) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $resultado['TAREA_DESCRIPCION'] ?></td>
                            <td><?= $resultado['TAREA_FECHA'] ?></td>
                            <td><?= $resultado['TAREA_ESTADO'] ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4">NO EXISTEN REGISTROS</td>
                    </tr>
                <?php endif ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2">Porcentaje de avance</th>
                    <td colspan="2"><?= $porcentajeAvance ?>%</td>
                </tr>
            </tfoot>
        </table>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/final_marin/vistas/progreso_aplicacion/progreso_aplicacion.php" class="btn btn-info w-100">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>
