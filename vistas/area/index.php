

<?php include_once '../templates/header.php'; ?>

<h1 class="text-center">Formulario de Areas</h1>
<div class="row justify-content-center">
    <form action="../../controladores/area/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="cli_nombre">Nombre del area</label>
                <input type="text" name="are_nombre" id="are_nombre" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_apellido">Observaciones</label>
                <input type="text" name="are_observacion" id="are_observacion" class="form-control" required>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-primary w-100">GUARDAR</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/area/buscar.php" class="btn btn-info w-100">BUSCAR</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../templates/footer.php'; ?>


   