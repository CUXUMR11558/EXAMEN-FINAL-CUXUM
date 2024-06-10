

<?php include_once '../templates/header.php'; ?>

<h1 class="text-center">FORMULARIO EMPLEADOS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/empleado/buscar.php" method="GET" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="emp_nombre">Nombre del empleado</label>
                <input type="text" name="emp_nombre" id="emp_nombre" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="emp_apellido">Apellido del empleado</label>
                <input type="text" name="emp_apellido" id="emp_apellido" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="emp_nit">Edad del Empleado</label>
                <input type="number" name="emp_edad" id="emp_edad" step="1" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="emp_sexo">Sexo del Empleado</label>
                <select name="emp_sexo" id="emp_sexo" class="form-control" >
                    <option value="">Seleccione</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
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


