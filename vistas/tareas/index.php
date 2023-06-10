<?php
require_once '../../modelos/Tareas.php';
require_once '../../modelos/Aplicaciones.php';

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
?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">Formulario de ingreso de tareas por realizar en las aplicaciones</h1>
        <div class="row justify-content-center">
            <form action="/final_marin/controladores/tareas/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="tarea_id">\Aplicacion</label>
                        <select name="tarea_id_aplicacion" id="tarea_id_aplicacion" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($aplicaciones as $key => $aplicacion) : ?>
                                <option value="<?= $aplicacion['APLICACION_ID'] ?>"><?= $aplicacion['APLICACION_NOMBRE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                    <label for="tarea_descripcion">Descripcion de las tareas por realizar</label>
                        <input type="text" name="tarea_descripcion" id="tarea_descripcion" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                <div class="col">
                    <label for="tarea_estado">Estado de la tarea</label>
                    <select name="tarea_estado" id="tarea_estado" class="form-select">
                        <option value="FINALIZADA">FINALIZADA</option>
                        <option value="NO INICIADA">No INICIADA</option>
                    </select>
                </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="tarea_fecha">Fecha de la realizacion de la tarea</label>
                        <input type="datetime-local" value="<?= date('Y-m-d H:i') ?>" name="tarea_fecha" id="tarea_fecha" class="form-control">
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>