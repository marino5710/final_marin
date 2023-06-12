<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Programador.php';
require '../../modelos/Aplicacion.php';
require '../../modelos/asigna_programadores.php';



try {
    $programador = new Programador($_GET);
    $programadores = $programador->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}

try {
    $asignacionprogramador = new AsignacionProgramadores($_GET);
    $asignacionprogramadores = $asignacionprogramador->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();

    
}
//  var_dump($asignacionprogramadores);
//  exit;


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
        <form action="/final_marin/controladores/asigna_programadores/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="asignacion_id" value="<?= $asignacionprogramadores[0]['ASIGNACION_ID'] ?>" >
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
                    <button type="submit" class="btn btn-warning w-100">Modificar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once '../../includes/footer.php' ?>
