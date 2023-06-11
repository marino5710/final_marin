<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<div class="container">
        <h1 class="text-center">Formulario de ingreso de clientes</h1>
        <div class="row justify-content-center">
            <form action="/final_marin/controladores/programadores/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <div class="row mb-3">
                    <div class="col">
                        <label for="programador_grado">Grado del Programador</label>
                        <input type="text" name="programador_grado" id="programador_grado" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                    <label for="programador_nombre">Nombre del Programador</label>
                        <input type="text" name="programador_nombre" id="progrmador_nombre" class="form-control">
                    </div>
                    <div class="row mb-3">
                    <div class="col">
                        <label for="programador_apellido">Apellido del Programador</label>
                        <input type="text" name="programador_apellido" id="programador_apellido" class="form-control">
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
