<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../modelos/Aplicacion.php';
    try {
        $aplicacion = new Aplicacion();
        $aplicaciones = $aplicacion->buscar();
            // var_dump($clientes);
            // exit;
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }

    //var_dump($aplicaciones); 
    //exit();
?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">Formulario de búsqueda de aplicaciones</h1>
        <div class="row justify-content-center">
            <form action="/final_marin/controladores/aplicaciones/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
            <div class="row mb-3">
                    <div class="col">
                        <label for="aplicacion_nombre">Cliente</label>
                        <select name="aplicacion_nombre" id="aplicacion_nombre" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($aplicaciones as $key => $aplicacion) : ?>
                                <option value="<?= $aplicacion['aplicacion_id'] ?>">
                                    <?= isset($aplicacion['APLICACION_NOMBRE']) ? $aplicacion['APLICACION_NOMBRE'] : '' ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="aplicacion_fecha">Fecha de la aplicacion</label>
                        <input type="datetime" value="<?= date('Y-m-d') ?>" name="aplicacion_fecha" id="aplicacion_fecha" class="form-control">
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