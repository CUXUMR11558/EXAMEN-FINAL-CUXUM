



<?php

require '../../modelos/asignacion.php';


    $_POST['asig_empleado'] = filter_var( $_POST['asig_empleado'] , FILTER_SANITIZE_NUMBER_INT);
    $_POST['asig_area'] = filter_var( $_POST['asig_area'] , FILTER_SANITIZE_NUMBER_INT);


if( $_POST['asig_empleado'] < 0 || $_POST['asig_area'] < 0 ){
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'LLENAR FORMULARIO ',
        'codigo' => 2
    ];
}else{
    try {
        // REALIZAR CONSULTA
        $producto = new Asignacion($_POST);


        $modficar = $producto->modificar();

        $resultado = [
            'mensaje' => 'EMPLEADO MODIFICADO CORRECTAMENTE',
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
            <a href="../../controladores/asignacion/buscar.php" class="btn btn-primary w-100">Volver al formulario</a>
        </div>  
    </div>


<?php include_once '../../vistas/templates/footer.php'; ?>  
