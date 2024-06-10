



<?php

    require '../../modelos/asignacion.php';
    
    $_GET['asig_codigo'] = filter_var( base64_decode($_GET['asig_codigo']), FILTER_SANITIZE_NUMBER_INT);
    $producto = new Asignacion();

    $productoRegistrado = $producto->buscarPorId($_GET['asig_codigo']);
    var_dump($productoRegistrado);
?>

<?php include_once '../templates/header.php'; ?>

<h1 class="text-center">Formulario de Modificación de Asignaciones</h1>


<div class="row justify-content-center">
    <form action="../../controladores/asignacion/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
    <input type="hidden" name="asig_codigo" id="asig_codigo" value="<?= $productoRegistrado['asig_codigo']?>">
    <div class="row mb-3">
            <div class="col">
                <label for="asig_empleado">Empleado</label>
                <input type="text" name="pue_nombre" id="pue_nombre" class="form-control" value="<?= $productoRegistrado['asig_empleado']?>">
            </div>
        </div>
       
        <div class="row mb-3">
            <div class="col">
                <label for="asig_area">Area a Asignar</label>
                <input type="text" name="asig_area" id="asig_area" step="1" class="form-control" value="<?= $productoRegistrado['asig_area']?>">
            </div>
        </div>




        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-primary w-100">MODIFICAR</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/puesto/buscar.php" class="btn btn-info w-100">CANCELAR</a>
            </div>
        </div>
    </form>
</div>










<?php include_once '../templates/footer.php'; ?>