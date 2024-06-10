

<?php

require '../../modelos/area.php';
require '../../modelos/empleado.php';
$empleado = new Empleado($_GET);
$empleados = $empleado->buscar();

$area = new Area($_GET);
$areas = $area->buscar();

?>

<?php include_once '../templates/header.php'; ?>

<h1 class="text-center">Formulario de Asignacion de Area</h1>
<div class="row justify-content-center">
    <form action="../../controladores/asignacion/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">

    <div class="row mb-3">
            <div class="col">
                <label for="asig_empleado">Nombre del Empleado</label>
                <select name="asig_empleado" id="asig_empleado" class="form-control">
                    <option value="">SELECCIONE...</option>
                    <?php foreach ($empleados as $empleado) : ?>
                        <option value="<?= $empleado['emp_codigo'] ?>"> <?= $empleado['emp_nombre'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>

       

        <div class="row mb-3">
            <div class="col">
                <label for="asig_area"></label>
                <select name="asig_area" id="asig_area" class="form-control" required>
                    <option value="">SELECCIONE...</option>
                    <?php foreach ($areas as $area) : ?>
                        <option value="<?= $area['are_codigo'] ?>"> <?= $area['are_nombre'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-primary w-100">GUARDAR</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/asignacion/buscar.php" class="btn btn-info w-100">BUSCAR</a>
            </div>
        </div>


        
    </form>
</div>

<?php include_once '../templates/footer.php'; ?>


   