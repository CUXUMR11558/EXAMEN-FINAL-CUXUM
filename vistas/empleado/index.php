<?php
// $objCliente = new Empleado();
//     $clientes = $objCliente->buscar();

require '../../modelos/puesto.php';
$puesto = new Puesto($_GET);
$puestos = $puesto->buscar();
?>

<?php include_once '../templates/header.php'; ?>

<h1 class="text-center my-4">Formulario de Empleados</h1>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Ingrese los Datos del Empleado</h4>
            </div>
            <div class="card-body">
                <form action="/EXAMEN-FINAL-CUXUM/controladores/empleado/guardar.php" method="POST">
                    <div class="form-group mb-3">
                        <label for="emp_nombre">Nombre del Empleado</label>
                        <input type="text" name="emp_nombre" id="emp_nombre" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="emp_apellido">Apellido del Empleado</label>
                        <input type="text" name="emp_apellido" id="emp_apellido" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="emp_edad">Edad del Empleado</label>
                        <input type="number" name="emp_edad" id="emp_edad" step="1" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="emp_sexo">Sexo del Empleado</label>
                        <select name="emp_sexo" id="emp_sexo" class="form-control" required>
                            <option value="">Seleccione</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="emp_nit">NIT del Empleado</label>
                        <input type="number" name="emp_nit" id="emp_nit" step="1" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="emp_telefono">Teléfono del Empleado</label>
                        <input type="number" name="emp_telefono" id="emp_telefono" step="1" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="emp_puesto">Puesto</label>
                        <select name="emp_puesto" id="emp_puesto" class="form-control" required>
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($puestos as $puesto) : ?>
                                <option value="<?= $puesto['pue_codigo'] ?>"> <?= $puesto['pue_nombre'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary w-100">GUARDAR</button>
                    </div>
                    <div class="form-group mb-3">
                        <a href="../../controladores/empleado/buscar.php" class="btn btn-info w-100">BUSCAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once '../templates/footer.php'; ?>
