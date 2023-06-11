<?php
require_once '../../modelos/Aplicacion.php';
require_once '../../modelos/Programador.php';

try {
    $aplicacion = new Aplicacion();
    $programador = new Programador();
    $aplicaciones = $aplicacion->buscar();
    $programadores = $programador->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}
?>

<?php include_once '../../includes/header.php' ?>
<?php include_once '../../includes/navbar.php' ?>
<div class="container">
    <h1 class="text-center">Formulario de búsqueda de asignación de programadores</h1>
    <div class="row justify-content-center">
        <form action="/final_marin/controladores/asigna_programadores/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
            <div class="row mb-3">
                <div class="col">
                    <label for="asignacion_id_aplicacion">Aplicación</label>
                    <select name="asignacion_id_aplicacion" id="asignacion_id_aplicacion" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($aplicaciones as $key => $aplicacion) : ?>
                            <option value="<?= $aplicacion['APLICACION_ID'] ?>"><?= $aplicacion['APLICACION_NOMBRE'] ?></option>
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
                            <option value="<?= $programador['PROGRAMADOR_ID'] ?>"><?= $programador['PROGRAMADOR_NOMBRE'] ?></option>
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
