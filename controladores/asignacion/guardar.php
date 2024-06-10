<?php 
    //  ini_set('display_errors', '1');
    //  ini_set('display_startup_errors', '1');
    //  error_reporting(E_ALL);
    require '../../modelos/asignacion.php';
    require '../../includes/funciones.php';
    
    $mensaje = '';
    // VALIDAR INFORMACION

    $_POST['asig_empleado'] = filter_var( $_POST['asig_empleado'], FILTER_VALIDATE_INT);
    $_POST['asig_area'] = filter_var( $_POST['asig_area'], FILTER_VALIDATE_INT);
 

    
    if($_POST['asig_empleado'] < 0 || $_POST['asig_area'] < 0){
        // ALERTA PARA VALIDAR DATOS
        $resultado = [
            'mensaje' => 'DEBE VALIDAR LOS DATOS',
            'codigo' => 2
        ];
    }else{

       

            try {
                // REALIZAR CONSULTA
                $cliente = new Asignacion($_POST);
                $guardar = $cliente->guardar();
                $resultado = [
                    'mensaje' => 'PUESTO INSERTADO CORRECTAMENTE',
                    'codigo' => 1
                ];
                
            } catch (PDOException $pe){
                $resultado = [
                    'mensaje' => 'OCURRIO UN ERROR INSERTANDO A LA BD',
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
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <a href="../../vistas/asignacion/index.php" class="btn btn-primary w-100">Volver al formulario</a>
        </div>
    </div>


<?php include_once '../../vistas/templates/footer.php'; ?>  