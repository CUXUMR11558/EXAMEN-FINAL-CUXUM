

<?php include_once '../templates/header.php'; ?>

<h1 class="text-center">FORMULARIO EMPLEADOS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/empleado/buscar.php" method="GET" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="cli_nombre">Nombre del empleado</label>
                <input type="text" name="emp_nombre" id="emp_nombre" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_apellido">Apellido del empleado</label>
                <input type="text" name="emp_apellido" id="emp_apellido" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_nit">NIT del empleado</label>
                <input type="number" name="emp_nit" id="emp_nit" step="1" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_telefono">Teléfono del empleado</label>
                <input type="tel" name="emp_telefono" id="emp_telefono" step="1" class="form-control" >
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


