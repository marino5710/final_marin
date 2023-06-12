<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Tarea.php';
require '../../modelos/Aplicacion.php';


try {
    $tarea = new Tarea($_GET);

    $tareas = $tarea->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}

try {
    $aplicacion = new Aplicacion($_GET);
    $aplicaciones = $aplicacion->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}
?>

<?php include_once '../../includes/header.php' ?>
<div class="container">
    <h1 class="text-center">Modificar Tareas</h1>
    <div class="row justify-content-center">
        <form action="/final_marin/controladores/tareas/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="tarea_id" value="<?= $tareas[0]['TAREA_ID'] ?>" >
            <div class="row mb-3">
                <div class="col">
                    <label for="tarea">Aplicación</label>
                    <select name="tarea_id_aplicacion" id="tarea_id_aplicacion" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($aplicaciones as $key => $aplicacion) : ?>
                            <option value="<?= $aplicacion['APLICACION_ID'] ?>"><?= $aplicacion['APLICACION_NOMBRE'] ?></option>
                        <?php endforeach?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="tarea_descripcion">Descripción de la tarea</label>
                    <textarea name="tarea_descripcion" id="tarea_descripcion" class="form-control" required></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="tarea_estado">Estado de la tarea</label>
                    <select name="tarea_estado" id="tarea_estado" class="form-control" required>
                        <option value="FINALIZADA">Finalizada</option>
                        <option value="NO INICIADA">No iniciada</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="tarea_fecha">Fecha de la tarea</label>
                    <input type="date" value="<?= date('Y-m-d') ?>" name="tarea_fecha" id="tarea_fecha" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <button type="submit" class="btn btn-warning w-100">Modificar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once '../../includes/footer.php' ?>