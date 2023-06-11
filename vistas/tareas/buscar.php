<?php
require_once '../../modelos/Tarea.php';
require_once '../../modelos/Aplicacion.php';

try {
    $tarea = new Tarea();
    $aplicacion = new Aplicacion();
    $tareas = $tarea->buscar();
    $aplicaciones = $aplicacion->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}
?>

<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
<div class="container">
    <h1 class="text-center">Formulario de búsqueda de tareas</h1>
    <div class="row justify-content-center">
        <form action="/final_marin/controladores/tareas/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
            <div class="row mb-3">
                <div class="col">
                    <label for="tarea_id_aplicacion">Aplicación</label>
                    <select name="tarea_id_aplicacion" id="tarea_id_aplicacion" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($aplicaciones as $key => $aplicacion) : ?>
                            <option value="<?= $aplicacion['aplicacion_id'] ?>"><?= $aplicacion['aplicacion_nombre'] ?></option>
                        <?php endforeach?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="tarea_descripcion">Descripción de la tarea</label>
                    <input type="text" name="tarea_descripcion" id="tarea_descripcion" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="tarea_estado">Estado de la tarea</label>
                    <select name="tarea_estado" id="tarea_estado" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <option value="FINALIZADA">FINALIZADA</option>
                        <option value="NO INICIADA">NO INICIADA</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="tarea_fecha">Fecha de la tarea</label>
                    <input type="datetime-local" value="<?= date('Y-m-d\TH:i') ?>" name="tarea_fecha" id="tarea_fecha" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <button type="submit" class="btn btn-info w-100">Buscar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once '../../includes/footer.php'?>
