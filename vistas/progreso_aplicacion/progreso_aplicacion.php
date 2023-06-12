<?php
require_once '../../modelos/Aplicacion.php';

try {
    $aplicacion = new Aplicacion();
    $aplicaciones = $aplicacion->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}
?>

<?php include_once '../../includes/header.php' ?>
<?php include_once '../../includes/navbar.php' ?>
<div class="container">
    <h1 class="text-center">Formulario de búsqueda de Progreso de Aplicaciones</h1>
    <div class="row justify-content-center">
        <form action="/final_marin/controladores/progreso_aplicacion/progreso_aplicacion.php" class="col-lg-8 border bg-light p-3">
            <div class="row mb-3">
                <div class="col">
                    <label for="aplicacion_id">Aplicación</label>
                    <select name="aplicacion_id" id="aplicacion_id" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($aplicaciones as $key => $aplicacion) : ?>
                            <option value="<?= $aplicacion['APLICACION_ID'] ?>"><?= $aplicacion['APLICACION_NOMBRE'] ?></option>
                        <?php endforeach ?>
                    </select>
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
<?php include_once '../../includes/footer.php' ?>
