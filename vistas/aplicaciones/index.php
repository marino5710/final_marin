<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

    <div class="container">
        <h1 class="text-center">Formulario de registro de aplicaciones</h1>
        <div class="row justify-content-center">
            <form action="/final_marin/controladores/aplicaciones/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="aplicacion_nombre">Nombre de la aplicacion</label>
                        <input type="text" name="aplicacion_nombre" id="aplicacion_nombre" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="aplicacion_fecha_inicio">fecha de inicio de la aplicacion</label>
                        <input type="date" name="aplicacion_fecha_inicio" id="aplicacion_fecha_inicio" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>