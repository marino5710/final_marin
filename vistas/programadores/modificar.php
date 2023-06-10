<?php
require '../../modelos/programador.php';
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
        <h1 class="text-center">Modificar clientes</h1>
        <div class="row justify-content-center">
            <form action="/final_marin/controladores/programadores/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="cliente_id">
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