<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Programador.php';
require '../../modelos/Aplicacion.php';


try {
    $programador = new Programador($_GET);
    $programadores = $programador->buscar();
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
    <h1 class="text-center">Modificar Programadores y Aplicaciones</h1>
    <div class="row justify-content-center">
        <form action="/final_marin/controladores/programadores/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="asignacion_id">
            <div class="row mb-3">
                <div class="col">
                    <label for="asignacion_id_aplicacion">Aplicación</label>
                    <select name="asignacion_id_aplicacion" id="asignacion_id_aplicacion" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($aplicaciones as $key => $aplicacion) : ?>
                            <option value="<?= $aplicacion['aplicacion_id'] ?>"><?= $aplicacion['aplicacion_nombre'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="asignacion_id_programador">Programador</label>
                    <select name="asignacion_id_programador" id="asignacion_id_programador" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($programadores as $key => $programador) : ?>
                            <option value="<?= $programador['programador_id'] ?>"><?= $programador['programador_nombre'] ?></option>
                        <?php endforeach ?>
                    </select>
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
