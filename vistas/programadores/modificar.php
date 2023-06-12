<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Programador.php';
    try {
        $programador = new Programador($_GET);

        $programadores = $programador->buscar();
       
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>

<?php include_once '../../includes/header.php'?>
    <div class="container">
        <h1 class="text-center">Modificar Programadores</h1>
        <div class="row justify-content-center">
            <form action="/final_marin/controladores/programadores/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="programador_id"value="<?= $programadores[0]['PROGRAMADOR_ID'] ?>" >
                <div class="row mb-3">
                    <div class="col">
                        <label for="programador_grado">Grado del Programador</label>
                        <input type="text" name="programador_grado" id="programador_grado" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="programador_nombre">Nombre del programador</label>
                        <input type="text" name="programador_nombre" id="programador_nombre" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="programador_apellido">Apellido del programador</label>
                        <input type="text" name="programador_apellido" id="programador_apellido" class="form-control" required>
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
<?php include_once '../../includes/footer.php'?>