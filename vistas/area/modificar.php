



<?php

    require '../../modelos/area.php';
    
    $_GET['are_codigo'] = filter_var( base64_decode($_GET['are_codigo']), FILTER_SANITIZE_NUMBER_INT);
    $producto = new Area();

    $productoRegistrado = $producto->buscarPorId($_GET['are_codigo']);
    var_dump($productoRegistrado);
?>

<?php include_once '../templates/header.php'; ?>

<h1 class="text-center">Formulario de Modificación de Area</h1>


<div class="row justify-content-center">
    <form action="../../controladores/area/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
    <input type="hidden" name="are_codigo" id="are_codigo" value="<?= $productoRegistrado['are_codigo']?>">
    <div class="row mb-3">
            <div class="col">
                <label for="cli_nombre">Nombre del puesto</label>
                <input type="text" name="are_nombre" id="are_nombre" class="form-control" value="<?= $productoRegistrado['are_nombre']?>">
            </div>
        </div>
       
        <div class="row mb-3">
            <div class="col">
                <label for="cli_nit">Observacion</label>
                <input type="text" name="are_observacion" id="are_observacion" class="form-control" value="<?= $productoRegistrado['are_observacion']?>">
            </div>
        </div>




        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-primary w-100">MODIFICAR</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/area/buscar.php" class="btn btn-info w-100">CANCELAR</a>
            </div>
        </div>
    </form>
</div>




