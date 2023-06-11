<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../modelos/Tarea.php';

try {
    $_GET['tarea_fecha'] = $_GET['tarea_fecha'] != '' ? date('Y-m-d', strtotime($_GET['tarea_fecha'])) : '';
    $tarea = new Tarea($_GET);
    $tareas = $tarea->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultado de tareas</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO.</th>
                            <th>DESCRIPCIÓN</th>
                            <th>ESTADO</th>
                            <th>FECHA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($tareas) > 0):?>
                        <?php foreach($tareas as $key => $tarea) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $tarea['tarea_descripcion'] ?></td>
                            <td><?= $tarea['tarea_estado'] ?></td>
                            <td><?= date('d/m/Y', strtotime($tarea['tarea_fecha'])) ?></td>
                        </tr>
                        <?php endforeach ?>
                        <?php else :?>
                            <tr>
                                <td colspan="4">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/final_marin/vistas/tareas/buscar.php" class="btn btn-info w-100">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>
