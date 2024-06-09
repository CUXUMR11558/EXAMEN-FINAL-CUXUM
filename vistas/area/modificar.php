



<?php

    require '../../modelos/area.php';
    
    $_GET['are_codigo'] = filter_var( base64_decode($_GET['are_codigo']), FILTER_SANITIZE_NUMBER_INT);
    $producto = new Puesto();

    $productoRegistrado = $producto->buscarPorId($_GET['are_codigo']);
    var_dump($productoRegistrado);
?>

<?php include_once '../templates/header.php'; ?>

<h1 class="text-center">Formulario de Modificación de Puesto</h1>


<div class="row justify-content-center">
    <form action="../../controladores/area/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
    <input type="hidden" name="pue_codigo" id="pue_codigo" value="<?= $productoRegistrado['are_codigo']?>">
    <div class="row mb-3">
            <div class="col">
                <label for="cli_nombre">Nombre del puesto</label>
                <input type="text" name="pue_nombre" id="pue_nombre" class="form-control" value="<?= $productoRegistrado['are_nombre']?>">
            </div>
        </div>
       
        <div class="row mb-3">
            <div class="col">
                <label for="cli_nit">Observacion</label>
                <input type="number" name="are_sueldo" id="are_sueldo" step="1" class="form-control" value="<?= $productoRegistrado['are_sueldo']?>">
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




