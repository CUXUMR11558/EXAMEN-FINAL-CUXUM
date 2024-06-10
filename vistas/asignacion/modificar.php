<?php
require '../../modelos/area.php';
require '../../modelos/empleado.php';
require '../../modelos/asignacion.php';

$_GET['asig_codigo'] = filter_var(base64_decode($_GET['asig_codigo']), FILTER_SANITIZE_NUMBER_INT);

$empleado = new Empleado($_GET);
$empleados = $empleado->buscar();

$area = new Area($_GET);
$areas = $area->buscar();

$asignacion = new Asignacion();
$asignacionRegistrada = $asignacion->buscarPorId($_GET['asig_codigo']);


?>

<?php include_once '../templates/header.php'; ?>

<h1 class="text-center">Formulario de Modificación de Asignaciones</h1>

<div class="row justify-content-center">
    <form action="../../controladores/asignacion/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <input type="hidden" name="asig_codigo" id="asig_codigo" value="<?= $asignacionRegistrada['asig_codigo'] ?>">

        <div class="row mb-3">
            <div class="col">
                <label for="asig_empleado">Nombre del Empleado</label>
                <select name="asig_empleado" id="asig_empleado" class="form-control">
                    <option value="">SELECCIONE...</option>
                    <?php foreach ($empleados as $emp) : ?>
                        <option value="<?= $emp['emp_codigo'] ?>" <?= $emp['emp_codigo'] == $asignacionRegistrada['asig_empleado'] ? 'selected' : '' ?>>
                            <?= $emp['emp_nombre']." ".$emp['emp_apellido']?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="asig_area">Área</label>
                <select name="asig_area" id="asig_area" class="form-control">
                    <option value="">SELECCIONE...</option>
                    <?php foreach ($areas as $area) : ?>
                        <option value="<?= $area['are_codigo'] ?>" <?= $area['are_codigo'] == $asignacionRegistrada['asig_area'] ? 'selected' : '' ?>>
                            <?= $area['are_nombre'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-primary w-100">MODIFICAR</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/asignacion/buscar.php" class="btn btn-info w-100">CANCELAR</a>
            </div>
        </div>
    </form>
</div>


<?php include_once '../templates/footer.php'; ?>
