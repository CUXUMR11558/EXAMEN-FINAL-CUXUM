
<?php

require '../../modelos/area.php';
require '../../modelos/empleado.php';
$empleado = new Empleado($_GET);
$empleados = $empleado->buscar();

$area = new Area($_GET);
$areas = $area->buscar();

?>



<?php include_once '../templates/header.php'; ?>

<h1 class="text-center">Formulario de Asignaciones</h1>
<div class="row justify-content-center">
    <form action="../../controladores/asignacion/buscar.php" method="GET" class="border bg-light shadow rounded p-4 col-lg-6">


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
                <select name="asig_area" id="asig_area" class="form-control">
                    <option value="">SELECCIONE...</option>
                    <?php foreach ($areas as $area) : ?>
                        <option value="<?= $area['are_codigo'] ?>"> <?= $area['are_nombre'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-info w-100"><i class="bi bi-search me-2"></i>Buscar</button>
            </div>
        </div>
    
    </form>
</div>

<?php include_once '../templates/footer.php'; ?>


