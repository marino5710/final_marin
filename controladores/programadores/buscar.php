<?php
require '../../modelos/Programador.php';
try {
    $programador = new Programador($_GET);
    
    $programadores = $programador->buscar();
    // echo "<pre>";
    // var_dump($programadores);
    // echo "</pre>";
    // exit;
    // $error = "NO se guardó correctamente";
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
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
    <title>Resultados</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO. </th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>SITUACIÓN</th>
                            <th>MODIFICAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($programadores) > 0):?>
                        <?php foreach($programadores as $key => $programador) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $programador['programador_nombre'] ?></td>
                            <td><?= $programador['programador_apellido'] ?></td>
                            <td><?= $programador['programador_situacion'] ?></td>
                            <td><a class="btn btn-warning w-100" href="/crud_practica9/vistas/programadores/modificar.php?programador_id=<?= $programador['programador_id']?>">Modificar</a></td>
                            <td><a class="btn btn-danger w-100" href="/crud_practica9/controladores/programadores/eliminar.php?programador_id=<?= $programador['programador_id']?>">Eliminar</a></td>
                        </tr>
                        <?php endforeach ?>
                        <?php else :?>
                            <tr>
                                <td colspan="6">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/final_marin/vistas/programadores/buscar.php" class="btn btn-info w-100">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>