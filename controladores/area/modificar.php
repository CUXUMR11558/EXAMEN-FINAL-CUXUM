




<?php

require '../../modelos/puesto.php';
//echo var_dump($_POST);
$_POST['are_nombre'] = htmlspecialchars( $_POST['are_nombre']);
$_POST['are_observacion'] = htmlspecialchars( $_POST['are_observacion']);

if($_POST['are_nombre'] == '' || $_POST['are_observacion'] == '' ){
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'LLENAR FORMULARIO ',
        'codigo' => 2
    ];
}else{
    try {
        // REALIZAR CONSULTA
        $producto = new Puesto($_POST);


        $modficar = $producto->modificar();

        $resultado = [
            'mensaje' => 'PUESTO MODIFICADO CORRECTAMENTE',
            'codigo' => 1
        ];
        
    } catch (PDOException $pe){
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR MODIFICANDO EL REGISTRO A LA BD',
            'detalle' => $pe->getMessage(),
            'codigo' => 0
        ];
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }
    
}


    $alertas = ['danger', 'success', 'warning'];

    
    include_once '../../vistas/templates/header.php'; ?>

    <div class="row justify-content-center">
        <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
            <?= $resultado['mensaje'] ?>
            <?= $resultado['detalle'] ?>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <a href="../../vistas/area/index.php" class="btn btn-primary w-100">Volver al formulario</a>
        </div>
    </div>


<?php include_once '../../vistas/templates/footer.php'; ?>  
