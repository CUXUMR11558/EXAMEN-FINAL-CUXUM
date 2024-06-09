





<?php

    require '../../modelos/empleado.php';
    
    $_GET['emp_codigo'] = filter_var( base64_decode($_GET['emp_codigo']), FILTER_SANITIZE_NUMBER_INT);
    $producto = new Empleado();

    $productoRegistrado = $producto->buscarPorId($_GET['emp_codigo']);
    var_dump($productoRegistrado);
?>

<?php include_once '../templates/header.php'; ?>

<h1 class="text-center">Formulario de modificación de empleados</h1>


<div class="row justify-content-center">
    <form action="../../controladores/empleado/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
    <input type="hidden" name="emp_codigo" id="emp_codigo" value="<?= $productoRegistrado['emp_codigo']?>">




        <div class="row mb-3">
            <div class="col">
                <label for="cli_nombre">Nombre del Empleado</label>
                <input type="text" name="emp_nombre" id="emp_nombre" class="form-control" value="<?= $productoRegistrado['emp_nombre'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_apellido">Apellido del Empleado</label>
                <input type="text" name="emp_apellido" id="emp_apellido" class="form-control" value="<?= $productoRegistrado['emp_apellido'] ?>" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_nit">Edad del Empleado</label>
                <input type="number" name="emp_edad" id="emp_edad" step="1" class="form-control" value="<?= $productoRegistrado['emp_edad'] ?>" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_telefono">Sexo del Empleado</label>
                <input type="text" name="emp_sexo" id="emp_sexo" step="1" class="form-control" value="<?= $productoRegistrado['emp_sexo'] ?>" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_nit">NIT del Enpleado</label>
                <input type="number" name="emp_nit" id="emp_nit" step="1" class="form-control" value="<?= $productoRegistrado['emp_nit'] ?>"  >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_telefono">Teléfono del Empleado</label>
                <input type="tel" name="emp_telefono" id="emp_telefono" step="1" class="form-control" value="<?= $productoRegistrado['emp_telefono'] ?>" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-primary w-100">MODIFICAR</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../vistas/empleado/buscar.php" class="btn btn-info w-100">CANCELAR</a>
            </div>
        </div>
    </form>
</div>










<?php include_once '../templates/footer.php'; ?>