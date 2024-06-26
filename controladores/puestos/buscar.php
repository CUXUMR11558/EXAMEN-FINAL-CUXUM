
<?php
    //  ini_set('display_errors', '1');
    //   ini_set('display_startup_errors', '1');
    //   error_reporting(E_ALL);
    require '../../modelos/puesto.php';

    // consulta
    try {
       //var_dump($_GET);

        $_GET['pue_nombre'] = htmlspecialchars( $_GET['pue_nombre']);
        $_GET['pue_sueldo'] = filter_var($_GET['pue_sueldo'], FILTER_VALIDATE_FLOAT) ;
        
        $objCliente = new Puesto($_GET);
        $clientes = $objCliente->buscar();
        $resultado = [
            'mensaje' => 'Datos encontrados',
            'datos' => $clientes,
            'codigo' => 1
        ];
         //var_dump($clientes);
        
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
     
    }       


    $alertas = ['danger', 'success', 'warning'];

    
    include_once '../../vistas/templates/header.php'; ?>

    <div class="row mb-4 justify-content-center">
        <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
            <?= $resultado['mensaje'] ?>
        </div>
    </div>
    <div class="row mb-4 justify-content-center">
        <div class="col-lg-6">
            <a href="../../vistas/puesto/buscar.php" class="btn btn-primary w-100">Volver al formulario de busqueda</a>
        </div>
    </div>
    <h1 class="text-center">Listado de puestos</h1>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Sueldo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($resultado['codigo'] == 1 && count($clientes) > 0) : ?>
                        <?php foreach ($clientes as $key => $cliente) : ?>
                            <tr>
                                <td><?= $key + 1?></td>
                                <td><?= $cliente['pue_nombre'] ?></td>
                                <td>Q. <?= number_format($cliente['pue_sueldo'],2) ?></td>
                              
                                <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../../vistas/puesto/modificar.php?pue_codigo=<?= base64_encode($cliente['pue_codigo'])?>"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href="../../controladores/puestos/eliminar.php?pue_codigo=<?= base64_encode($cliente['pue_codigo'])?>"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                    </ul>
                                </div>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">No hay productos registrados</td>
                        </tr>  
                    <?php endif ?>
                </tbody>
                        
            </table>
        </div>        
    </div>        
<?php include_once '../../vistas/templates/footer.php'; ?>  