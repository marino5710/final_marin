<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

    <div class="container">
        <h1 class="text-center">Buscar programadores</h1>
        <div class="row justify-content-center">
            <form action="/final_marin/controladores/programadores/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="programador_grado">Grado del Programador</label>
                        <input type="text" name="programador_grado" id="programador_grado" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="programador_nombre">Nombre del Programador</label>
                        <input type="text" name="programador_nombre" id="programador_nombre" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="programador_apellido">Apellido del programador</label>
                        <input type="text" name="programador_apellido" id="programador_apellido" class="form-control">
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